<div class="main-wrap">
    <div class="section section-padding video-list-section">
        <div class="container">
            <h3>Movie Edit Form</h3>
            <br>
            <form action="index.php?page=updateMovie" method="post"  >

                <div class='form-group mb-3'>
                    <input id="movieID" name="movieId" type="hidden" value='<?=$data['movieInfo']->id_movie?>'/>
                    <label for="Movie Name">Movie Name</label>
                    <input id='movieName'name='movieName'type='text' placeholder='Movie Name'class='form-control validate'value='<?=$data['movieInfo']->movieName?>'/>
                </div>
                <div class='form-group mb-3'>
                    <label for='movieYear'>Movie Year</label>
                    <input id='movieYear'name='movieYear'type='text' placeholder='Movie Year'class='form-control validate'value='<?=$data['movieInfo']->movieYear?>'/>
                </div>
                <div class='form-group mb-3'>
                    <label for='time'>Time</label>
                    <input id='time'name='time'type='text' placeholder='Time'class='form-control validate'value='<?=$data['movieInfo']->time?>'/>
                </div>
                <div class='form-group mb-3'>
                    <label for='movieDescription'>Movie Description</label>
                    <input id='movieDescription'name='movieDescription'type='text' placeholder='Movie Description'class='form-control validate'value='<?=$data['movieInfo']->movieDescription?>'/>
                </div>
                <div class='form-group mb-3'>
                    <label for='movieLink'>Movie Link</label>
                    <input id='movieLink'name='movieLink'type='movieLink' placeholder='Movie Link' class='form-control validate'value='<?=$data['movieInfo']->movieLink?>'/>
                </div>

<!--                <div class='form-group mb-3'>-->
<!--                    <label for="genres">Genres :</label><br>-->
<!--                    --><?php //foreach ($data['genres'] as $genre) :
//                        if():?>
<!--                        <span><input name="genre[]" type="checkbox" value="--><?//=$genre->id_genre?><!--"/>&nbsp--><?//=$genre->genre_name?><!--</span>&nbsp&nbsp&nbsp&nbsp-->
<!--                    --><?php //endif; endforeach; ?>
<!---->
<!--                </div>-->
<!--                <div class='form-group mb-3'>-->
<!--                    <label for="celebrity">Celebrities in the movie :</label><br>-->
<!--                    --><?php //foreach ($data['celebrities'] as $celebrity) :?>
<!--                        <span><input name="celebrity[]" type="checkbox" value="--><?//=$celebrity->id_celebrity?><!--"/>&nbsp--><?//=$celebrity->birthName?><!--</span><br>-->
<!--                    --><?php //endforeach; ?>
<!---->
<!--                </div>-->

                <button type="submit" name="btnUpdate" class="btn btn-primary btn-block text-uppercase">Edit  Now</button>
                </form>
        </div>
    </div>
</div>
