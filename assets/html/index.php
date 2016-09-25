<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rovie</title>
    <link rel="stylesheet" href="../css/index.css" type="text/css"/>
    <script type="text/javascript" src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="../js/links.js"></script>
    <script type="text/javascript" src="../js/ImgChanger.js"></script>
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
                <input type="text">
            </nav>
        </section>
        <section id="body">
            <h1>Rovie</h1>
        </section>
    </div>
</body>
</html>

<script type="text/javascript" src="../js/Loader.js"></script>
