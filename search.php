<?php
    require_once "config.inc.php";

    if(!isset($_GET['query'])){
        header('Location: index.php');
    }

    $query = $_GET['query'];
		
    $raw_results = $con->query("SELECT * FROM musics
        WHERE (`title` LIKE '%".$query."%')");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang['searchh'] ?></title>

    <link rel="stylesheet" href="./assets/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <form action="search.php" method="get" class="col-md-6">
                <input type="text" class="form-control" name="query" placeholder="<?php echo $lang['search'] ?>" />
                <button type="submit" class="mt-3 btn btn-block btn-primary"><?php echo $lang['searchh'] ?></button>
            </form>
        </div>
    </div>


    <?php

if($raw_results->num_rows == 0){
    ?>
    <div class=" whole_container mt-5">
        <p>No Results Found</p>
    </div>
    <?php
}
else {
    ?>
    <div class="container">
        <table class="table mt-5">
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

while ($row = $raw_results->fetch_assoc()){
    ?>
                <tr>
                    <th scope="row"><?php echo $row['id'] ?></th>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['artist'] ?></td>
                    <td>
                        <i class="fa-solid fa-fast-backward music_button mr-2" onclick="fast_backward()"></i>
                        <i class="fa-solid fa-circle-play music_button mr-2"
                            onclick="play_audio('<?php echo $BASE_URL . '/music/' . $row['artist'] . '/' . $row['path'] ?>')"></i>
                        <i class="fa-solid fa-fast-forward music_button mr-2" onclick="fast_forward()"></i>
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
    <?php
}

?>

    <audio id="audio_player"></audio>

    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/bootstrap.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>