<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/23/16
 * Time: 3:46 PM
 */
session_start();



if (array_key_exists('id',$_SESSION)) {
    $rating =  isset($_POST['rating']) ? $_POST['rating'] : '';
    $movieID = isset($_POST['movieID']) ? $_POST['movieID'] : '';
    $userID = $_SESSION['id'];
    $duplicateUser = false;
    require_once ('db.php');
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=Rovie',DB_User,DB_Pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    $selected = $pdo->prepare('SELECT * FROM ratings');
    $selected->execute();

    $users = $selected->fetchAll(PDO::FETCH_ASSOC);

    for ($i = 0 ; $i < count($users) ; $i++ ) {
        if ($users[$i]['userid'] == $userID && $users[$i]['movieid'] == $movieID) {
            $pdo = new PDO('mysql:host=127.0.0.1;dbname=Rovie', DB_User, DB_Pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
            $updateUser = $pdo->prepare('UPDATE ratings SET rating = :rating WHERE movieid = :movieid AND userid = :userid');

            $updateUser->execute([':rating' => $rating, ':movieid' => $movieID,':userid' => $userID]);
            $duplicateUser = true;
        }
    }

    if(!$duplicateUser) {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=Rovie', DB_User, DB_Pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        $insertUser = 'INSERT INTO ratings(userid, movieid, rating) VALUES (?, ?, ?)';

        $statement = $pdo->prepare($insertUser);

        $statement->execute([$userID, $movieID, $rating]);
    }


}else {
    echo json_encode(true);
}