<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/24/16
 * Time: 7:16 PM
 */
session_start();

$editText = isset($_POST['search']) ? $_POST['search'] : '';
$editText = strtoupper($editText);
$editText = trim($editText);
$_SESSION['term'] = $editText;