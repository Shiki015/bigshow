

    <!-- Page Header -->
    <div class="page-header">
        <div class="page-header-overlay">
            <div class="container">
                <h2 class="page-title">Latest Movies</h2>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="main-wrap">
        <div class="section section-padding video-list-section">

            <div class="container">
                <form class="accountform signupform movieform">
                    <label>Search:</label>
                    <p>
                        <input  id="search_Movies" type="text" name="searchMovies" >
                    </p>

                </form>

                <div class="video-list">
                    <div id="videoLista">

                    </div>
                    <!-- Video Pagination -->
                    <nav class="navigation pagination" role="navigation">
                        <div class="nav-links">
                            <?php
                            $recent = $data['movies'];
                            $numberOfRecent = count($recent);
                            $numberOfPages = ceil($numberOfRecent / 4);
                            for ($i = 1; $i <= $numberOfPages; $i++): ?>
                                <a href="#" class="page-numbers paginate" data-i="<?= $i - 1; ?>"><?= $i; ?>.</a>
                            <?php endfor; ?>



                        </div>
                    </nav>
                    <!-- Video Pagination End -->
                </div>
            </div>
        </div>
    </div>

   