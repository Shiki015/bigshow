


    <!-- Main Header End -->

    <!-- Banne Slider -->
    <div class="banner-slider-area text-white">
        <div id="banner-slider" class="owl-carousel banner-slider">
            <div class="banner-item banner-item-1">
                <div class="overlay-70">
                    <a class="play-video" href="https://www.youtube.com/watch?v=5cY5PHE4x_g"><i class="fa fa-play"></i></a>
                    <div class="banner-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <h1 class="banner-title"><a href="index.php?page=movie-list">Transformers: The Last Knight</a></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-item banner-item-2">
                <div class="overlay-70">
                    <a class="play-video" href="https://www.youtube.com/watch?v=5cY5PHE4x_g"><i class="fa fa-play"></i></a>
                    <div class="banner-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <h1 class="banner-title"><a href="index.php?page=movie-list">Transformers: The Last Knight</a></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-item banner-item-3">
                <div class="overlay-70">
                    <a class="play-video" href="https://www.youtube.com/watch?v=5cY5PHE4x_g"><i class="fa fa-play"></i></a>
                    <div class="banner-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <h1 class="banner-title"><a href="index.php?page=movie-list">Transformers: The Last Knight</a></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banne Slider End -->

    <div class="main-wrap">

        <!-- Movie Section -->
        <div class="section section-padding movie-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-xs-6">
                        <div class="section-header">
                            <h2 class="section-title">Latest Movies</h2>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-6">
                        <a class="all-link" href="index.php?page=movie-list">See All Movies</a>
                    </div>
                </div>

                <div class="row">
                    <div class="owl-carousel video-carousel" id="video-carousel">

                        <?php foreach ($data['filmovi'] as $film) : ?>
                        <div class="video-item">
                            <div class="thumb-wrap">
                                <img src="<?= $film->moviePicture ?>" alt="Movie Thumb">
                                <div class="thumb-hover">
                                    <a class="play-video" href="<?= $film->movieLink ?>"><i class="fa fa-play"></i></a>
                                </div>
                            </div>
                            <div class="video-details">
                                <h4 class="video-title"><a href="index.php?page=index.php?pagemovie-detail?=$film->id_movie?>"><?= $film->movieName ?></a></h4>
                                <p class="video-release-on"><?= $film->movieYear ?></p>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Movie Section End -->

        <!-- Upcoming Movie Section -->
        <div class="section section-padding bg-image upcomming-section text-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="section-header">
                            <h2 class="section-title">Upcomming Movie</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="upcomming-featured">
                            <img class="img-responsive" src="Public/images/movies/upcomming-featured.png" alt="Upcomming Featured">
                            <a class="play-video" href="https://www.youtube.com/watch?v=5cY5PHE4x_g"><i class="fa fa-play"></i></a>
                            <div class="upcomming-details">
                                <h4 class="video-title"><a href="index.php?pagemovie-detail">Fright Night (2017)</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12 sm-top-30">
                        <div class="upcomming-item">
                            <img class="img-responsive" src="Public/images/movies/upcomming-1.png" alt="Upcomming featured">
                            <div class="upcomming-details">
                                <h4 class="video-title"><a href="index.php?pagemovie-detail">Basketball</a></h4>
\                            </div>
                            <div class="upcomming-hover">
                                <a class="play-video" href="https://www.youtube.com/watch?v=5cY5PHE4x_g"><i class="fa fa-play"></i></a>
                            </div>
                        </div>
                        <div class="upcomming-item">
                            <img class="img-responsive" src="Public/images/movies/upcomming-2.png" alt="Upcomming">
                            <div class="upcomming-details">
                                <h4 class="video-title"><a href="index.php?pagemovie-detail">Expandable</a></h4>
                            </div>
                            <div class="upcomming-hover">
                                <a class="play-video" href="https://www.youtube.com/watch?v=5cY5PHE4x_g"><i class="fa fa-play"></i></a>
                            </div>
                        </div>
                        <div class="upcomming-item">
                            <img class="img-responsive" src="Public/images/movies/upcomming-3.png" alt="upcomming">
                            <div class="upcomming-details">
                                <h4 class="video-title"><a href="index.php?pagemovie-detail">Devine Girl</a></h4>
                            </div>
                            <div class="upcomming-hover">
                                <a class="play-video" href="https://www.youtube.com/watch?v=5cY5PHE4x_g"><i class="fa fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Upcoming Movie Section End -->


       
    </div>

    <!-- Footer Start -->
   