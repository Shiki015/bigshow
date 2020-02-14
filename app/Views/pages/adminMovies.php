
<div class="main-wrap">
    <div class="section section-padding video-list-section">
        <div class="container">
            <div style="margin:0 auto;"class="sirina col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col " >
                <div class="tm-bg-primary-dark tm-block tm-block-products">
                    <div class="tm-product-table-container">
                        <table class="table table-hover tm-table-small tm-product-table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">MOVIE NAME</th>
                                <th scope="col">YEAR</th>
                                <th scope="col">TIME</th>
                                <th scope="col">LINK</th>
                                <th scope="col">&nbsp;</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($data['movies'] as $movie) : ?>
                                <tr>
                                    <th scope="row"><?=$movie->id_movie?></th>
                                    <td class="tm-product-name"><?=$movie->movieName?></td>
                                    <td><?=$movie->movieYear?></td>
                                    <td><?=$movie->time?></td>
                                    <td><?=$movie->movieLink?></td>
                                    <td>
                                        <a href="index.php?page=deleteMovie&id=<?=$movie->id_movie?>" ><i class="fa fa-trash"></i></a>
                                    </td>
                                    <td>
                                        <a href="index.php?page=editMovie&id=<?=$movie->id_movie?>" ><i class="fa fa-edit"></i></a>

                                    </td>
                                </tr>


                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- table container -->
                    <br>
                    <br>
                    <h3>New Movie Form</h3>
                    <br>
                    <form action="index.php?page=addMovie" method="post" enctype="multipart/form-data" >

                        <div class='form-group mb-3'>
                            <label for="Movie Name">Movie Name</label>
                            <input id='movieName'name='movieName'type='text' placeholder='Movie Name'class='form-control validate'/>
                        </div>
                        <div class='form-group mb-3'>
                            <label for='movieYear'>Movie Year</label>
                            <input id='movieYear'name='movieYear'type='text' placeholder='Movie Year'class='form-control validate'/>
                        </div>
                        <div class='form-group mb-3'>
                            <label for='time'>Time</label>
                            <input id='time'name='time'type='text' placeholder='Time'class='form-control validate'/>
                        </div>
                        <div class='form-group mb-3'>
                            <label for='movieDescription'>Movie Description</label>
                            <input id='movieDescription'name='movieDescription'type='text' placeholder='Movie Description'class='form-control validate'/>
                        </div>
                        <div class='form-group mb-3'>
                            <label for='movieLink'>Movie Link</label>
                            <input id='movieLink'name='movieLink'type='movieLink' placeholder='Movie Link' class='form-control validate'/>
                        </div>
                        <div class='form-group mb-3'>
                            <label for='moviePicture'>Movie Picture</label>
                            <input type="file" name="movie_photo">
                        </div>
                        <div class='form-group mb-3'>
                            <label for="genres">Genres :</label><br>
                            <?php foreach ($data['genres'] as $genre) :?>
                              <span><input name="genre[]" type="checkbox" value="<?=$genre->id_genre?>"/>&nbsp<?=$genre->genre_name?></span>&nbsp&nbsp&nbsp&nbsp
                            <?php endforeach; ?>

                        </div>
                        <div class='form-group mb-3'>
                            <label for="celebrity">Celebrities in the movie :</label><br>
                            <?php foreach ($data['celebrities'] as $celebrity) :?>
                            <span><input name="celebrity[]" type="checkbox" value="<?=$celebrity->id_celebrity?>"/>&nbsp<?=$celebrity->birthName?></span><br>
                            <?php endforeach; ?>

                        </div>

                        <button type="submit" name="btnUpdate" class="btn btn-primary btn-block text-uppercase">Add  Now</button>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
