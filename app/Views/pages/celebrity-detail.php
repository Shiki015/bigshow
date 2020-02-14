 <!-- Page Header -->
 <?php

 ?>
 <div class="page-header single-celebrity-header">
        <div class="page-header-overlay">
            <div class="container">
                <h2 class="page-title"><?=$data['ispis']->birthName ?></h2>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="main-wrap">
        <div class="section section-padding celebrity-single-section">
            <div class="container">
                <div class="celebrity-single">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="content-wrap">
                                <div class="celebrity-thumb">
                                    <img src="Public/<?=$data['ispis']->celebrityPhoto ?>" alt="Actress Pic">
                                </div>
                                <div class="celebrity-details">
                                    <div class="single-section">
                                        <h3 class="celebrity-name"><?=$data['ispis']->birthName ?></h3>
                                        <p class="celebrity-profession"><?=$data['ispis']->name_cp ?></p>
                                        <div class="celebrity-infos">
                                            <p class="birthname"><label>Birth Name:</label> <?=$data['ispis']->birthName ?></p>
                                            <p class="birthdate"><label>Date of Birth:</label> <?=$data['ispis']->dateOfBirth ?></p>
                                            <p class="residence"><label>Residence:</label> <?=$data['ispis']->residence ?></p>

                                            <p class="gender"><label>Gender: </label> <?=$data['ispis']->gender ?></p>

                                            <p class="height"><label>Height:</label> <?=$data['ispis']->height ?>cm</p>
                                        </div>

                                    </div>
                                    <div class="single-section bio-entry">
                                        <h3 class="single-section-title">Biography</h3>
                                        <div class="section-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                            <p>Pri quas audiam virtute ut, case utamur fuisset eam ut, iisque accommodare an eam. Reque blandit qui eu, cu vix nonumy volumus. Legendos intellegam id usu, vide oporteat vix eu, id illud principes has.</p>
                                        </div>
                                    </div>

                                    <div class="single-section">
                                        <h3 class="single-section-title">Filmography</h3>
                                        <div class="section-content">
                                            <table class="filmography-table">
                                                <tr class="head-tr">
                                                    <th colspan="2">Movie Name</th>
                                                    <th>Release Year</th>
                                                </tr>
<!--                                                --><?//=var_dump($data['filmovi'])?>
                                                <?php foreach ($data['filmovi'] as $film) : ?>
                                                <tr>
                                                    <td class="film-poster">
                                                        <a class="film-thumb" href="index.php?page=movie-detail&id=<?=$film->id_movie?>"><img width="100" height="110" src="<?=$film->moviePicture?>" alt="<?=$film->movieName?>"></a>
                                                    </td>
                                                    <td class="film-details">
                                                        <div class="film-info">
                                                            <h4 class="film-title"><a href="index.php?page=movie-detail&id=<?=$film->id_movie?>"><?=$film->movieName?></a></h4>
<!--                                                            <p class="film-category">Action, Drama</p>-->
                                                        </div>
                                                    </td>
                                                    <td class="film-release"><?=$film->movieYear?></td>
                                                </tr>
                                                <?php endforeach;?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  