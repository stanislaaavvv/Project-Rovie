<?php
session_start();
if (!array_key_exists('id',$_SESSION)) {?>
    <script>  window.location.replace('../html/signup.php')</script>
    <?php } ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rovie</title>
    <link rel="stylesheet" href="../css/profile.css" type="text/css"/>
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
      <div id="userinfo">
          <?php if (!array_key_exists('id',$_SESSION)) {

          ?>
          <p>User Anonymous</p>
          <?php }else {
          ?>
          <p>User <?php echo $_SESSION['name'] ?></p>
          <?php } ?>
          <button  id="logout">Log out</button>
      </div>
      <div id="watchlist">
          <p class="yours">Your watchlist:</p>
          <table id="watchlisttable">
              <tr>
                  <th></th>
                  <th class="name">Name</th>
                  <th class="year">Year</th>
              </tr>
          </table>
          <?php
          require_once ('../php/db.php');
          $pdo = new PDO('mysql:host=127.0.0.1;dbname=Rovie',DB_User,DB_Pass, [
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
          ]);

          $selected = $pdo->prepare('SELECT * FROM watchlist WHERE userid = :id');
          $selected->execute([ ':id' => $_SESSION['id'] ]);

          $userWatchlist = $selected->fetchAll(PDO::FETCH_ASSOC);
          $moviesID = [];

          for ($i = 0 ; $i < count($userWatchlist) ; $i++) {
            $moviesID[] = $userWatchlist[$i]['movieid'];
          }

          $WLM = []; //watchlist movies
          for ($j = 0 ; $j < count($moviesID); $j++) {
              $pdo = new PDO('mysql:host=127.0.0.1;dbname=Rovie',DB_User,DB_Pass, [
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              ]);

              $select = $pdo->prepare('SELECT * FROM movies WHERE id = :id');
              $select->execute([ ':id' => $moviesID[$j]]);

              $WLM[] = $select->fetchAll(PDO::FETCH_ASSOC);
          }
          for ($z = 0 ; $z < count($WLM); $z++) {

          ?>
          <script>
          var HTMLelement = '<tr><td class="image"><img src="<?php echo $WLM[$z][0]["imgpath"]?>"></td><td class="name"><?php echo $WLM[$z][0]["moviename"]?></td>'+
              '<td class="year"><?php echo $WLM[$z][0]["movieyear"] ?></td> </tr>';

          $('#watchlisttable').append(HTMLelement);
          </script>
          <?php } ?>
      </div>
      <div id="ratedmovies">
          <p class="yours">Your ratings:</p>
          <table id="ratingtable">
              <tr>
                  <th class="image"></th>
                  <th class="name">Name</th>
                  <th class="year">Year</th>
                  <th class="userrating">Rating</th>
              </tr>
          </table>
          <?php
          require_once ('../php/db.php');
          $pdo = new PDO('mysql:host=127.0.0.1;dbname=Rovie',DB_User,DB_Pass, [
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
          ]);

          $selected = $pdo->prepare('SELECT * FROM ratings WHERE userid = :id');
          $selected->execute([ ':id' => $_SESSION['id'] ]);

          $userRatelist = $selected->fetchAll(PDO::FETCH_ASSOC);
          $moviesID = [];

          for ($i = 0 ; $i < count($userRatelist) ; $i++) {
              $moviesID[] = $userRatelist[$i]['movieid'];
          }

          $RLM = []; //watchlist movies
          for ($j = 0 ; $j < count($moviesID); $j++) {
              $pdo = new PDO('mysql:host=127.0.0.1;dbname=Rovie',DB_User,DB_Pass, [
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              ]);
              $selectrating = $pdo->prepare('SELECT rating FROM ratings WHERE userid = :id AND movieid = :movieid');
              $select = $pdo->prepare('SELECT * FROM movies WHERE id = :id');
              $select->execute([ ':id' => $moviesID[$j]]);
              $selectrating->execute([':id' => $_SESSION['id'],':movieid' => $moviesID[$j] ]);
              $finalrating[] = $selectrating->fetchAll(PDO::FETCH_ASSOC);
              $RLM[] = $select->fetchAll(PDO::FETCH_ASSOC);
          }
          for ($z = 0 ; $z < count($RLM); $z++) {

              ?>
              <script>
                  var HTMLelement = '<tr><td class="image"><img src="<?php echo $RLM[$z][0]["imgpath"]?>"></td><td class="name"><?php echo $RLM[$z][0]["moviename"]?></td>'+
                      '<td class="year"><?php echo $RLM[$z][0]["movieyear"] ?></td><td class="userrating"><?php echo $finalrating[$z][0]['rating'] ?></td></tr>';

                  $('#ratingtable').append(HTMLelement);
              </script>
          <?php } ?>
      </div>
    </section>

</div>
</body>
</html>
