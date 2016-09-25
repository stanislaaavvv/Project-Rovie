<?php
session_start();
require_once('../php/db.php');
$pdo = new PDO('mysql:host=127.0.0.1;dbname=Rovie', DB_User, DB_Pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$selected = $pdo->prepare('SELECT imgpath,moviename FROM movies');
$selected->execute();

$moviesData = $selected->fetchAll(PDO::FETCH_ASSOC);

for ($i = 0; $i < count($moviesData);$i++) {
   ////require once ratingsPageUpdate.php when new movies are added to DB and remove Update/////
    $movieID = $i + 1;
    $selectedRatings = $pdo->prepare('SELECT rating FROM ratings WHERE movieid = :movieid');
    $selectedRatings->execute([':movieid' => $movieID]);
    $userRatings[$movieID] = $selectedRatings->fetchAll(PDO::FETCH_ASSOC);
}


for ($z = 1; $z < count($userRatings) + 1; $z++) {
    $ratingForSQL = 0;
    if (count($userRatings[$z]) != 0) {
        $limiter = count($userRatings[$z]);
        for ($j = 0 ; $j < count($userRatings[$z]); $j++) {
            $ratingForSQL = $ratingForSQL + $userRatings[$z][$j]['rating'];
        }
        $ratingForSQL = $ratingForSQL / $limiter;
    }
    $updateUser = $pdo->prepare('UPDATE ratingsTable SET rating = :rating WHERE id = :id ');
    $updateUser->execute([':rating' => $ratingForSQL,':id' =>$z]);
    //echo $ratingForSQL.'//';
}
//var_dump(count($userRatings));
//var_dump(count($userRatings[1]));
//
//;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rovie</title>
    <link rel="stylesheet" href="../css/ratings.css" type="text/css"/>
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
        <table>
            <tr id="first">
                <th class="rank">Rank</th>
                <th class="image"></th>
                <th class="name">Name</th>
                <th class="rating">Users rating</th>
            </tr>
        </table>
            <?php
                $selectedRatingsTable = $pdo->prepare('SELECT * FROM ratingsTable ORDER BY rating DESC ');
                $selectedRatingsTable->execute();
                $arrRatingsTable = $selectedRatingsTable->fetchAll(PDO::FETCH_ASSOC);
                for ($i = 0; $i < count($arrRatingsTable); $i++) {
            ?>
            <script>
                var htmlEl = '<tr><td class="rank"><?php echo $i + 1?></td><td class="image"><img src="<?php
                     echo $arrRatingsTable[$i]['imgpath']?>"></td><td class="name"><?php echo $arrRatingsTable[$i]['moviename']?></td> <td class="rating"><?php if ($arrRatingsTable[$i]['rating'] == 0) { echo 'No rating';}else {echo $arrRatingsTable[$i]['rating']; }   ?></td></tr>';
                     $('table').append(htmlEl);
            </script>
            <?php } ?>

    </section>

</div>
</body>
</html>
