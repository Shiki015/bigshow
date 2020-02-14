<body>

    <!-- Preloader -->
    <div class="preloader" id="preloader">
        <div class="lds-css ng-scope">
            <div class="lds-ripple">
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Top Header -->
    <header class="topbar text-white" id="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-8">
                    <p class="topbar-intro"></p>
                </div>
                <div class="col-lg-6 col-sm-4">
                    <div class="topbar-right-btns welcome">
                        <?php if(!isset($_SESSION['user'])): ?>
                        <a class="btn" href="index.php?page=login">Log In</a>
                        <a class="btn" href="index.php?page=signup">Register</a>
                        <?php endif?>
                            <?php if(isset($_SESSION['user'])): ?>
                                <a class="btn" href="index.php?page=logout">LogOut</a>
                                <?php if($_SESSION['idRola']==1): ?>
                                    <a class="btn" href="index.php?page=adminUsers">Users</a>
                                    <a class="btn" href="index.php?page=adminMovies">Movies</a>
                                    <a class="btn" href="index.php?page=adminCelebrity">Celebrites</a>
                                <?php endif?>
                                <p>Welcome : <?php echo $_SESSION['user']->username; ?></p>
                            <?php endif?>

                    
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Top Header End -->

    <!-- Main Header -->
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php?page=pocetna">
                    <img src="Public/images/template/logo.png" alt="Site Logo">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="main-nav-collapse">
               
                <ul class="nav navbar-nav navbar-right">
                    <?php foreach ($data['navigacija'] as $nav)  : ?>
                    <li><a href="index.php?page=<?= $nav->path_nav; ?>"><?= $nav->nav_name;?></a></li>

                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </nav>