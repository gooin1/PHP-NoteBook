<?php
/**
 * Created by PhpStorm.
 * User: gooin
 * Date: 2017/3/28
 * Time: 20:24
 */
require_once "app_config.php";

//$db = mysqli_connect(DATABASE_HOST,DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
$db = mysqli_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME)
    or handle_error("连接数据库似乎出现了一些问题..",
    "Error No: " . mysqli_connect_errno() . "<br>Error Message: " . mysqli_connect_error());
