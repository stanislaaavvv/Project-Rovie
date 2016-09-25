<?php
session_start();
if (array_key_exists('id',$_SESSION)) {?>
    <script>  window.location.replace('../html/profile.php')</script>
<?php }
if (array_key_exists('regerror',$_SESSION)) {?>
<script type="text/javascript" src="../../node_modules/jquery/dist/jquery.min.js"></script>
<script>
    $(function() {
        $('span:first-child').before('<p style="color:black;font-size:24px">Unsuccessful registration!</p>' +
            '<p style="color:black;font-size:18px">Username:<br>Start with letter!<br>Contains:A-Z;a-z;0-9</p>'+
            '<p style="color:black;font-size:18px">Password:<br>Contains:A-Z;a-z;0-9</p>');
    })
</script>
<?php } unset($_SESSION['regerror'])?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rovie</title>
    <link rel="stylesheet" href="../css/registration.css" type="text/css"/>
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
        <form action="../php/signin.php" method="post">
            <span>Username</span>
            <input id="username" type="text" name="username">
            <span>E-mail</span>
            <input id="email" type="email" name="email">
            <span>Password</span>
            <input id="password" type="password" name="password">
            <span>Re-Password</span>
            <input id="repassword" type="password" name="repassword">
            <button type="submit" id="registerbutton" >Register</button>
        </form>
    </section>
</div>

</body>
</html>
