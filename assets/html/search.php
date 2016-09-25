<?php
session_start();
$searchTerm = $_SESSION['term'];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rovie</title>
    <link rel="stylesheet" href="../css/movie.css" type="text/css"/>
    <script type="text/javascript" src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="../js/links.js"></script>
    <link rel="stylesheet" href="../../node_modules/font-awesome/css/font-awesome.min.css" type="text/css"/>
</head>

<body>
<div id="container">
    <section id="header">
        <img id="logo" src="../img/logo2.png">
        <nav class="topnav">
            <a href="movie.php" id="movielink">Movies</a>
            <a href="ratings.php" id="ratinglink">Ratings</a>
            <a href="profile.php" id="profile">Profile</a>
            <a href="signup.php" id="loginlink">Log in</a>
            <?php if (!array_key_exists('id',$_SESSION)) {

                ?>
                <script> $('#profile').hide() </script>
            <?php  } else { ?>
                <script> $('#loginlink').hide() </script>
            <?php } ?>
            <a id="search" class="fa fa-search"></a>
            <input type="text" >
        </nav>
    </section>
    <section id="body">
    </section>
    <?php
    require_once ('../php/db.php');
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=Rovie',DB_User,DB_Pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    $selected = $pdo->prepare("SELECT * FROM movies WHERE upper(moviename) LIKE '%' :sessionterm '%'");
    $selected->execute([':sessionterm' => $_SESSION['term']]);

    $moviesInf = $selected->fetchAll(PDO::FETCH_ASSOC);
    $noMatch = true;
    for ($i = 0 ; $i < count($moviesInf) ; $i++) {

        $imdbrating[$i] = $moviesInf[$i]["imdblink"];
        $imdbrating[$i] = str_replace('http://www.imdb.com/title/', '', $imdbrating[$i]);
        $imdbrating[$i] = str_replace('/', '', $imdbrating[$i]);
        if ($_SESSION['term'] != '') {
            ?>
            <script>


                var htmlElements = '<hr><div class="moviecontainer"><div class="imgcontainer"><img src="<?php echo $moviesInf[$i]["imgpath"]?>"></div> <div class="descriptioncontainer">' +
                    '<p class="moviename"><?php echo $moviesInf[$i]["moviename"]?></p><p class="year"><?php echo $moviesInf[$i]["movieyear"] ?></p> <img class="imdblink" onclick="window.open(\'<?php echo $moviesInf[$i]["imdblink"] ?>\')" src="../img/IMDb.png">' +
                    '<span id ="<?php echo $moviesInf[$i]['id']?>"class="imdbrating"></span>' +
                    '<p class="rate"><i value="5" class="fa fa-star-o" aria-hidden="true"></i><i  value="4" class="fa fa-star-o" aria-hidden="true"></i><i value="3" class="fa fa-star-o" aria-hidden="true"></i><i value="2" class="fa fa-star-o" aria-hidden="true"></i><i value="1" class="fa fa-star-o" aria-hidden="true"></i></p>' +
                    '<p class="add">Add to watchlist</p><p class="trailer" onclick="window.open(\'<?php echo $moviesInf[$i]["trailerlink"] ?>\')">Watch trailer</p></div> </div>' +
                    '<p class="description"><?php echo $moviesInf[$i]["description"] ?></p><hr>';
                $('#body').append(htmlElements);


                $.ajax({
                    url: "http://www.omdbapi.com/",
                    async: false,
                    data: {i: "<?php echo $imdbrating[$i]; ?>"},
                    success: function (resp) {
                        $("#" + (<?php echo $i + 1; ?>)).html(' ' + resp.imdbRating);
                    }
                });

            </script>
            <?php
            $noMatch = false;
        }
    }
    if ($noMatch) {
            ?>
            <script>
                var htmlEl = "<p>NO RESULTS</p>";
                $('#body').append(htmlEl);
            </script>
        <?php
    }
    $_SESSION['term'] = '';
    ?>

</div>
</body>
</html>
<script>
    $('i').on('click',function (e) {
        var element = e.target;
        var movieID = $(element).parent().siblings('span').attr('id');
        var rating = $(element).attr('value');

        $.ajax({
            method: "POST",
            url: "http://localhost/Homeworks/PROJECT/assets/php/userrating.php",
            async: false,
            data: {rating:rating , movieID:movieID},
            success: function (resp) {
                var response = resp;
                if (response) {
                    window.location.replace('../html/signup.php');
                }
            }
        });

    });


    $('.add').on('click',function (e) {
        var element = e.target;
        var movieID = $(element).siblings('span').attr('id');

        $.ajax({
            method: "POST",
            url: "http://localhost/Homeworks/PROJECT/assets/php/userwatchlist.php",
            async: false,
            data: {movieID:movieID},
            success: function (resp) {
                var response = resp;
                if (response) {
                    window.location.replace('../html/signup.php');
                }
            }
        });
    });


</script>
