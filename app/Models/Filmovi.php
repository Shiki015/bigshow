<?php

namespace app\Models;

use app\Config\DB;

class Filmovi{

    private $database;

     public function __construct( DB $database)
     {
        $this->database=$database;
     }

     public function getAllMovies()
     {
        return $this->database->executeQuery("SELECT movieYear, time, movieName, moviePicture, id_movie ,movieDescription, movieLink FROM movies order by movieYear desc Limit 4");

     }
     public function movies(){
         return $this->database->executeQuery("SELECT movieYear, time, movieName, moviePicture, id_movie ,movieDescription, movieLink FROM movies order by id_movie  ");

     }

     public function getMovies()
     {
        return $this->database->executeQuery("SELECT m.movieYear, m.time, m.movieName, m.moviePicture, m.id_movie, m.movieDescription, m.movieLink FROM movies m inner join movie_ganre mg on m.id_movie=mg.id_movie inner join genres g on mg.id_genre=g.id_genre inner join movie_celebrity mc on m.id_movie=mc.id_movie inner join celebrity c on mc.id_celebrity=c.id_celebrity group by m.id_movie LIMIT 4");
     }

    private function getMovieGenres($id)
    {
         return $this->database->executeAll("select genre_name from genres g inner join movie_ganre mg on g.id_genre = mg.id_genre where mg.id_movie= ?",[$id]);
    }

    private function getMovieActors($id)
    {
        return $this->database->executeAll("select birthName from celebrity c inner join movie_celebrity mc on c.id_celebrity = mc.id_celebrity where mc.id_movie= ?", [$id]);
    }

    public function readyForPrintMovies(){
        $movies = $this->getMovies();

        foreach ($movies as $film){
            $actors = $this->getMovieActors($film->id_movie);
            $genre = $this->getMovieGenres($film->id_movie);

            $film->actors=$actors;
            $film->genre=$genre;
        }

        return $movies;

    }
    public function printOneMovie($idMovie){
         return $this->database->executeOneRow("SELECT m.movieYear, m.time, m.movieName, m.moviePicture, m.id_movie, m.movieDescription, m.movieLink FROM movies m inner join movie_ganre mg on m.id_movie=mg.id_movie inner join genres g on mg.id_genre=g.id_genre inner join movie_celebrity mc on m.id_movie=mc.id_movie inner join celebrity c on mc.id_celebrity=c.id_celebrity group by m.id_movie having m.id_movie = ? ", [$idMovie]);

     }


    public function MovieDetail($idmovie){


        $podaci =  $this->printOneMovie($idmovie);



            $actors = $this->getMovieActors($idmovie);
            $genre = $this->getMovieGenres($idmovie);

            $podaci->actors=$actors;
            $podaci->genre=$genre;


        return $podaci;



    }
    public function getMoviesForCelebrity($id)
    {
      $movies = $this->moviesForCelebrity($id);

        foreach ($movies as $film){

            $genre = $this->getMovieGenres($film->id_movie);
            $film->genre=$genre;
        }

        return $movies;
    }
    public function moviesForCelebrity($id){
        return $this->database->executeAll
        ("SELECT m.id_movie,m.movieName, m.movieYear, m.time, m.moviePicture 
                    FROM movies m inner join movie_celebrity mc on m.id_movie = mc.id_movie where mc.id_celebrity = ?", [$id]);

    }
    public function  SearchMovies($data){


        $params = [$data, $data, $data];
        $query = "SELECT m.movieYear, m.time, m.movieName, m.moviePicture, m.id_movie, m.movieDescription, m.movieLink, g.genre_name, c.birthName
                    FROM movies m inner join movie_ganre mg on m.id_movie=mg.id_movie
                    inner join genres g on mg.id_genre=g.id_genre 
                    inner join movie_celebrity mc on m.id_movie=mc.id_movie
                    inner join celebrity c on mc.id_celebrity=c.id_celebrity 
                    group by m.id_movie
                    having LOWER(m.movieName) like ? or LOWER(g.genre_name) like ? or LOWER(c.birthName) like ?
                    LIMIT 4
     ";
        return $this->database->executeAll($query, $params);
    }
    public function getSearchMovies($data){
         $movies = $this->SearchMovies($data);

        foreach ($movies as $film){
            $actors = $this->getMovieActors($film->id_movie);
            $genre = $this->getMovieGenres($film->id_movie);

            $film->actors=$actors;
            $film->genre=$genre;
        }

        return $movies;
    }

    public function moviesPagination($pagPage){

         $movies= $this->moviesForPagination($pagPage);

        foreach ($movies as $film){
            $actors = $this->getMovieActors($film->id_movie);
            $genre = $this->getMovieGenres($film->id_movie);

            $film->actors=$actors;
            $film->genre=$genre;
        }

        return $movies;

    }
    public function moviesForPagination($pagPage){

        $limit = $pagPage * 4;

        return $this->database->executeQuery("SELECT m.movieYear, m.time, m.movieName, m.moviePicture, m.id_movie, m.movieDescription, m.movieLink FROM movies m inner join movie_ganre mg on m.id_movie=mg.id_movie inner join genres g on mg.id_genre=g.id_genre inner join movie_celebrity mc on m.id_movie=mc.id_movie inner join celebrity c on mc.id_celebrity=c.id_celebrity group by m.id_movie LIMIT $limit, 4");
    }

    public function selectMovies(){
         return $this->database->executeQuery(" Select * from movies");
    }
    public function deleteMovie($id){
        return $this->database->executeOneRow("Delete from movies where id_movie = ?", [$id]);
    }
    public function genres(){
         return $this->database->executeQuery("select * from genres");
    }
    public function celebrities(){
         return $this->database->executeQuery("select * from celebrity");
    }
    public function insertMovie($movieYear,$time,$movieName,$putanjaSlika,$movieDescription,$movieLink, $celebrity, $genre){

        $params = [$movieYear,$time,$movieName,$putanjaSlika,$movieDescription,$movieLink];

        $query = "INSERT INTO movies VALUES(NULL, ?, ?, ?, ?, ?, ?)";
        $lastInsertId = $this->database->last_Inserted_Id($query, $params);
        $this->insertToCelebrity($lastInsertId, $celebrity);

        $this->insertToGenre($lastInsertId, $genre);

    }
    public function insertToCelebrity($id,$celebrity){

        $queryParams = [];
        $values = [];

        foreach($celebrity as $idCel){
            $queryParams[] = "(NULL,?,?)";

            $values[] = $id;
            $values[] = $idCel;
        }

        $query = "INSERT INTO movie_celebrity VALUES". implode(",", $queryParams);

        $this->database->insert_update($query, $values);
    }
    public function insertToGenre($id,$genre){

        $queryParams = [];
        $values = [];

        foreach($genre as $idGenre){
            $queryParams[] = "(NULL,?,?)";

            $values[] = $id;
            $values[] = $idGenre;
        }

        $query = "INSERT INTO movie_ganre VALUES". implode(",", $queryParams);

        $this->database->insert_update($query, $values);
    }
    public function updateMovie($id, $movieYear, $time,$movieName,$movieDescription,$movieLink){
         return $this->database->insert_update("update movies set movieYear = ?, time = ?, movieName = ?, movieDescription = ?, movieLink = ? where id_movie = ? ", [$movieYear, $time,$movieName,$movieDescription,$movieLink,$id]);
    }
}

