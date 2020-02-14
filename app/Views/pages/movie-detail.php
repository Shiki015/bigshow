
    <!-- Page Header -->
    <div class="page-header single-video-header" >
        <div class="page-header-overlay">
            <div class="container">
                <h2 class="page-title"><?=$data['ispis']->movieName?></h2>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="main-wrap">
        <div class="section section-padding video-single-section">
            <div class="container">
                <div class="video-single">
                    <div class="row">
                        <div class="col-xs-12">
<!--                            <div class="thumb-wrap single-thumb">-->
<!--                                <img src="Public/images/movies/movie-single.png" alt="Dark Night - 2">-->
<!--                                <div class="thumb-hover">-->
<!--                                    <a class="play-video" href="https://www.youtube.com/watch?v=5cY5PHE4x_g"><i class="fa fa-play"></i></a>-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="content-wrap">
                                <div class="video-thumb">
                                    <img src="<?=$data['ispis']->moviePicture?>" alt="Movie thumb">
                                </div>
                                <div class="video-details xs-top-40">
                                    <div class="single-section">
<!--                                        --><?//= var_dump($data['ispis'])?>
                                        <h3 class="video-title"><?=$data['ispis']->movieName?></h3>
                                        <p class="video-release-date"><?=$data['ispis']->movieYear?></p>
                                        <div class="ratings-wrap">

                                        </div>
                                        <div class="video-attributes">
                                            <p class="cast"><label>Actors:</label>
                                                <?php foreach ($data['ispis']->actors as $actor) : ?>
                                                    <?= $actor->birthName; ?>
                                                <?php endforeach;?>
                                            </p>
                                            <p class="duration"><label>Time:</label> <?=$data['ispis']->time?></p>
                                            <p class="genre"><label>Genres:</label>
                                                <?php foreach ($data['ispis']->genre as $genre) : ?>
                                                    <?= $genre->genre_name; ?>
                                                <?php endforeach;?>
                                            </p>

                                        </div>

                                    </div>
                                    <div class="single-section video-entry">
                                        <h3 class="single-section-title">Movie Story</h3>
                                        <div class="section-content">
                                            <p><?=$data['ispis']->movieDescription?></p>
                                        </div>
                                    </div>
                                    <div class="single-section video-entry">
                                        <h3 class="single-section-title">Video </h3>
                                        <div class="thumb-hover">
                                            <a class="play-video" href="<?= $data['ispis']->movieLink ?>"><i class="fa fa-play"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Latest Movies -->
        <div class="section section-padding top-padding-normal movie-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="section-header">
                            <h2 class="section-title">Latest Movies</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="owl-carousel video-carousel" id="video-carousel">

                        <?php foreach ($data['filmovi'] as $film) : ?>
                            <div class="video-item">
                                <div class="thumb-wrap">
                                    <img src="<?= $film->moviePicture ?>" alt="Movie Thumb">
                                    <span class="rating">9.2</span>
                                    <div class="thumb-hover">
                                        <a class="play-video" href="<?= $film->movieLink ?>"><i class="fa fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="video-details">
                                    <h4 class="video-title"><a href="movie-detail.html"><?= $film->movieName ?></a></h4>
                                    <p class="video-release-on"><?= $film->movieYear ?></p>
                                </div>
                            </div>
                        <?php endforeach;?>


                    </div>
                </div>
            </div>
        </div>
        <!-- Latest Movies End -->
    </div>