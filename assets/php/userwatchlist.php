<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/23/16
 * Time: 3:46 PM
 */

session_start();

if (array_key_exists('id',$_SESSION)) {
    $movieID = isset($_POST['movieID']) ? $_POST['movieID'] : '';
    $userID = $_SESSION['id'];
    $duplicateUser = false;


    require_once('db.php');
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=Rovie', DB_User, DB_Pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    $selected = $pdo->prepare('SELECT * FROM watchlist');
    $selected->execute();
    $users = $selected->fetchAll(PDO::FETCH_ASSOC);


    for ($i = 0 ; $i < count($users) ; $i++ ) {
        if ($users[$i]['userid'] == $userID && $users[$i]['movieid'] == $movieID) {
            $duplicateUser = true;
        }
    }


    if(!$duplicateUser) {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=Rovie', DB_User, DB_Pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        $insertUser = 'INSERT INTO watchlist(userid, movieid) VALUES (?, ?)';

        $statement = $pdo->prepare($insertUser);

        $statement->execute([$userID, $movieID]);
    }
}
else {
    echo json_encode(true);
}