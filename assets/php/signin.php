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
$Validation = false;
$name =  isset($_POST['username']) ? $_POST['username'] : '';
$email =  isset($_POST['email']) ? $_POST['email'] : '';
$password =  isset($_POST['password']) ? $_POST['password'] : '';
$repassword =  isset($_POST['repassword']) ? $_POST['repassword'] : '';

if ( preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $name) && preg_match('/[A-Za-z0-9]{5,31}$/', $password) &&
    preg_match('/[A-Za-z0-9]{5,31}$/', $repassword) && $password == $repassword ) {
    $Validation = true;
}

if ($Validation) {
    require_once('db.php');

    $pdo = new PDO('mysql:host=127.0.0.1;dbname=Rovie', DB_User, DB_Pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    $insertUser = 'INSERT INTO phplogin(username, password, email) VALUES (?, ?, ?)';

    $statement = $pdo->prepare($insertUser);

    $statement->execute([$name, $password, $email]);
?>
    <script>  window.location.replace('../html/signup.php')</script>
<?php
} else {
    $_SESSION['regerror'] = ' '; ?>
    <script>  window.location.replace('../html/registration.php')</script><?php
}?>

