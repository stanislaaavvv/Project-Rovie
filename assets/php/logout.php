<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/8/16
 * Time: 3:40 PM
 */
session_start();
?>
    <html style="background-color: #C1E1A6">
    <link rel="stylesheet" href="../../node_modules/font-awesome/css/font-awesome.min.css" type="text/css"/>
    <body >
    <div style=>
        <i class="fa fa-spinner fa-spin" aria-hidden="true" style="text-align: center;font-size: 70px;color:black;display: block;position: relative;top: 300px;"></i>
    </div>
    </body>
    </html>
<?php
session_destroy();
?>
<script>  window.location.replace('../html/index.php')</script>

