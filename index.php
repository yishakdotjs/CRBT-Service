<?php

include "config.inc.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $lang['title'] ?></title>
    <link rel="stylesheet" href="./assets/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>
    <div class="header w-100 d-flex align-items-center justify-content-between">
        <div class="container d-flex justify-content-between">
            <div class="header__left">
                <a href="">
                    <img src="http://hruyan.com/assets/images/logo.png" alt="AbemCRBT LOGO" class="header__logo" />
                </a>
            </div>
            <div class="header__right d-flex">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="languageDropDown"
                        data-toggle="dropdown" aria-expanded="false">
                        <?php echo $lang['language'] ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="languageDropDown">
                        <a class="dropdown-item" href="?lang=en"><?php echo $lang['english'] ?></a>
                        <a class="dropdown-item" href="?lang=am"><?php echo $lang['amharic'] ?></a>
                    </div>
                </div>

                <form action="search.php" method="get" class="d-flex">
                    <input type="text" placeholder="<?php echo $lang['search'] ?>" class="form-control" name="query" />
                    <button class="btn btn-light">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-3 mb-3">
        <div class="row">
            <ul class="nav nav-pills col-md-6">
                <li class="nav-item">
                    <a class="nav-link text-dark active" id="homeTab" href="#"><?php echo $lang['home'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" id="ranksTab" href="#"><?php echo $lang['ranks'] ?></a>
                </li>
                <!-- <li
            class="nav-item d-flex align-items-center justify-content-center"
            type="button"
            id="dropdownMenuButton"
            data-toggle="dropdown"
            aria-expanded="false"
          >
            <a class="nav-link text-dark" href="#">RBT Contents</a>
            <i class="fa fa-caret-down"></i>
          </li>
          <div class="dropdown-menu" aria-labelledby="rbtDropDown">
            <a class="dropdown-item" id="calledRBTTab" href="#"
              >Called RBT Content</a
            >
            <a class="dropdown-item" id="callingRBTTab" href="#"
              >Calling RBT Content</a
            >
          </div>
          <li class="nav-item">
            <a class="nav-link text-dark" id="allRBTTab" href="#">All RBT</a>
          </li> -->
            </ul>
            <div class="col-md-6 d-flex justify-content-end">
                <?php
                    if (isset($_SESSION['username'])){
                        ?>
                <span class="mr-2">Welcome, <?php echo $_SESSION['username'] ?></span> | <a href="logout.inc.php"
                    class="text-dark ml-2">Logout</a>
                <?php
                    }
                    else {
                        ?>
                <a href="#" class="mr-2 text-dark" id="login"><?php echo $lang['login'] ?></a> |
                <a href="#" class="ml-2 text-dark" id="register"><?php echo $lang['register'] ?></a>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>

    <div id="home">
        <div id="sliderControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/img/1.jpg" class="d-block w-100 img-fluid" alt="AbemCRBT Banner Ads" />
                </div>
                <div class="carousel-item">
                    <img src="assets/img/2.jpg" class="d-block w-100" alt="AbemCRBT Banner Ads" />
                </div>
                <div class="carousel-item">
                    <img src="assets/img/3.jpg" class="d-block w-100" alt="AbemCRBT Banner Ads" />
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#sliderControls" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#sliderControls" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>

        <div class="container mt-5 mb-5">
            <div class="row justify-content-between">
                <div class="col-md-4">
                    <h3 class="text-center"><?php echo $lang['hot'] ?></h3>
                    <ul class="m-0">
                        <?php 
                        $hotQuery = $con->query("SELECT * FROM `musics` WHERE tag='hot' ORDER BY id DESC LIMIT 10");

                        if ($hotQuery->num_rows == 0){
                            echo $lang['no_song'];
                        }
                        else {
                            while ($row = $hotQuery->fetch_assoc()){
                                ?>
                        <li class="list-unstyled mt-3 p-1 music">
                            <span class="song_title"><?php echo $row['title'] ?></span>
                            <span class="song_artist">By <?php echo $row['artist'] ?></span>
                            <div class="d-flex mt-2 justify-content-center">
                                <i class="fa-solid fa-circle-play music_button mr-2"
                                    onclick="play_audio('<?php echo $BASE_URL . '/music/' . $row['artist'] . '/' . $row['path'] ?>')"></i>
                                <a href="<?php echo $BASE_URL . "/music/" . $row['artist'] . "/" . $row['path'] ?>"
                                    class="text-dark">
                                    <i class=" fa-solid fa-circle-down music_button"></i>
                                </a>
                            </div>
                        </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3 class="text-center"><?php echo $lang['new'] ?></h3>
                    <ul class="m-0">

                        <?php

                    $newQuery = $con->query("SELECT * FROM musics ORDER BY id DESC LIMIT 10");

                    while ($row = $newQuery->fetch_assoc()){
                        ?>
                        <li class="list-unstyled mt-3 p-1 music">
                            <span class="song_title"><?php echo $row['title'] ?></span>
                            <span class="song_artist">By <?php echo $row['artist'] ?></span>
                            <div class="d-flex mt-2 justify-content-center">
                                <i class="fa-solid fa-circle-play music_button mr-2"
                                    onclick="play_audio('<?php echo $BASE_URL . '/music/' . $row['artist'] . '/' . $row['path'] ?>')"></i>
                                <a href="<?php echo $BASE_URL . "/music/" . $row['artist'] . "/" . $row['path'] ?>"
                                    class="text-dark">
                                    <i class="fa-solid fa-circle-down music_button"></i>
                                </a>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                    </ul>

                </div>
                <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
                    <!-- <h3 class="text-center"><?php echo $lang['categories'] ?></h3>
                    <a href="category.php?category=hot" class="mt-3">Hot</a>
                    <a href="category.php?category=trending">Trending</a>
                    <br />
                    <a href="category.php?category=liked">Most Liked</a> -->
                </div>
            </div>
        </div>
    </div>
    <div id="ranks" class="d-none">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"><?php echo $lang['rank_title'] ?></th>
                        <th scope="col"><?php echo $lang['rank_artist'] ?></th>
                        <th scope="col"><?php echo $lang['rank_play'] ?></th>
                        <th scope="col"><?php echo $lang['rank_download'] ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $result = $con->query("SELECT * FROM musics ORDER BY id DESC");
                        while($row = $result->fetch_assoc()){
                            ?>
                    <tr>
                        <th scope="row">1</th>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['artist'] ?></td>
                        <td>
                            <i class="fa-solid fa-circle-play music_button mr-2"
                                onclick="play_audio('<?php echo $BASE_URL . '/music/' . $row['artist'] . '/' . $row['path'] ?>')"></i>
                        </td>
                        <td>
                            <a href="<?php echo $BASE_URL . "/music/" . $row['artist'] . "/" . $row['path'] ?>"
                                class="text-dark">
                                <i class="fa-solid fa-circle-down music_button"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="calledRBT" class="d-none"></div>
    <div id="callingRBT" class="d-none"></div>
    <div id="allRBT" class="d-none"></div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel"><?php echo $lang['login'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="loginForm" method="post" action="login.inc.php">
                        <input type="email" id="loginEmail" class="form-control"
                            placeholder="<?php echo $lang['email'] ?>..." required name="email" />
                        <input type="password" id="loginPassword" class="form-control mt-3"
                            placeholder="<?php echo $lang['password'] ?>..." required />
                        <button type="submit" class="btn btn-block btn-primary mt-3">
                            <?php echo $lang['login'] ?>
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <?php echo $lang['close'] ?>
                    </button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- /Login Modal -->

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel"><?php echo $lang['register'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="registerForm" method="post" action="register.inc.php">
                        <input type="text" id="registerName" class="form-control"
                            placeholder="<?php echo $lang['username'] ?>..." required name="username" />
                        <input type="email" id="registerEmail" class="form-control mt-3"
                            placeholder="<?php echo $lang['email'] ?>..." required name="email" />
                        <input type="password" id="registerPassword" class="form-control mt-3"
                            placeholder="<?php echo $lang['password'] ?>..." required name="password" />
                        <button type="submit" class="btn btn-block btn-primary mt-3" name="register">
                            <?php echo $lang['register'] ?>
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <?php echo $lang['close'] ?>
                    </button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- / Register Modal -->

    <audio id="audio_player"></audio>
</body>

<script src="./assets/js/jquery.js"></script>
<script src="./assets/js/bootstrap.js"></script>
<script src="./assets/js/main.js"></script>
<script>
$(".carousel").carousel({
    interval: 1500,
});
</script>

</html>