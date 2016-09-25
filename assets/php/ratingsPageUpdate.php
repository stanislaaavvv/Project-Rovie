<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/24/16
 * Time: 9:02 PM
 */
$insertRatingsSql = 'INSERT INTO ratingsTable (imgpath, moviename) VALUES (?, ?)';

$statement = $pdo->prepare($insertPersonSql);



$statement->execute([$moviesData[$i]['imgpath'],$moviesData[$i]['moviename']]);