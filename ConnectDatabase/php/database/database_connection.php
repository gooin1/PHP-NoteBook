<?php
/**
 * Created by PhpStorm.
 * User: gooin
 * Date: 2017/3/28
 * Time: 20:24
 */
require_once "app_config.php";

// 链接到数据库
//try{
//    $db = mysqli_connect(DATABASE_HOST,DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
//    //echo "<p>Connected to MySQL, using database: " . DATABASE_NAME . "</p>";
//}catch (mysqli_sql_exception $e){
//    echo $e->getMessage();
//}

//$db = mysqli_connect(DATABASE_HOST,DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
$db = mysqli_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
if (mysqli_connect_errno()) {
    $user_error_message = "连接数据库似乎出现了一些问题..";
    $system_error_message = "Error No: " . mysqli_connect_errno() . "<br>" . "Error Message: " . mysqli_connect_error();
    // 跳转到错误页面对错误进行说明
    header("Location: show_error.php?" .
        "error_message={$user_error_message}&" .
        "system_error_message={$system_error_message}");
    exit();
}