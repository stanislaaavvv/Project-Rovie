<?php
session_start();
if (array_key_exists('id',$_SESSION)) {?>
    <script>  window.location.replace('../html/profile.php')</script>
    <?php
}
if (array_key_exists('loginerr',$_SESSION)) {?>
    <script type="text/javascript" src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script>
        $(function() {
            var loginerr = '<p style="font-size:35px;font-weight:bold;color:black;">Wrong username or password!</p>';
            $('span:first-child').before(loginerr);
        })
    </script>
<?php } unset($_SESSION['loginerr'])?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rovie</title>
    <link rel="stylesheet" href="../css/signup.css" type="text/css"/>
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
        <form action="../php/login.php" method="post">
            <span id="username">Username</span>
            <input type="text" name="username">
            <span>Password</span>
            <input id="password" type="password" name="password">
            <button type="submit" id="login">Sign</button>
        </form>
        <p class="registration">New to Rovie? Sign up</p>
    </section>
</div>

</body>
</html>
