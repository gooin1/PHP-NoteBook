<?php
/**
 * Created by PhpStorm.
 * User: gooin
 * Date: 2017/3/28
 * Time: 20:24
 */
require "app_config.php";

// 链接到数据库
try{
    $db = mysqli_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
    //echo "<p>Connected to MySQL, using database: " . DATABASE_NAME . "</p>";
}catch (mysqli_sql_exception $e){
    $e->getMessage();
}