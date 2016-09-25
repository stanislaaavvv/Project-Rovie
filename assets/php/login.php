<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/7/16
 * Time: 11:39 PM
 */
session_start()
?>
    <html style="background-color: #C1E1A6">
    <link rel="stylesheet" href="../../node_modules/font-awesome/css/font-awesome.min.css" type="text/css"/>
    <body>
    <div style="width:800px ; height: 700px;margin: 0 auto">
        <i class="fa fa-spinner fa-spin" aria-hidden="true" style="text-align: center;font-size: 70px;color:black;display: block;position: relative;top: 300px;"></i>
    </div>
    </body>
    </html>
<?php
$login = false;
$name =  isset($_POST['username']) ? $_POST['username'] : '';
$password =  isset($_POST['password']) ? $_POST['password'] : '';

require_once ('db.php');
$pdo = new PDO('mysql:host=127.0.0.1;dbname=Rovie',DB_User,DB_Pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$selected = $pdo->prepare('SELECT * FROM phplogin');
$selected->execute();

$users = $selected->fetchAll(PDO::FETCH_ASSOC);

for ($i = 0 ; $i < count($users) ; $i++ ) {
    if ($users[$i]['username'] == $name && $users[$i]['password'] == $password) {
        $login = true;
        $thisUserId = $users[$i]['id'];
        $thisUserName = $users[$i]['username'];
        break;

    }
}


if ($login) {
    $_SESSION['id'] = $thisUserId;
    $_SESSION['name'] = $thisUserName;
    ?>
<script>  window.location.replace('../html/index.php')</script>
<?php }else {
    $_SESSION['loginerr'] = ''; ?>
    <script>window.location.replace('../html/signup.php');</script>
<?php } ?>
