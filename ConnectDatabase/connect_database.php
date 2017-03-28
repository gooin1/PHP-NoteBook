<?php
/**
 * Created by PhpStorm.
 * User: gooin
 * Date: 2017/3/28
 * Time: 12:43
 */
// 连接数据库(已经过时)
//mysql_connect("localhost", "root", "") or die("<p>Error connecting to database:" . mysql_error() . "</p>");

// #1 用 mysqli mysqli 命令替代
$mysqli = new mysqli("localhost", "root", "", "test");
// 检查连接状态
if($mysqli->connect_errno){
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}else{
    echo "<p>Connected to MySQL!(use-mysqli)</p>";
}

$result = mysqli_query($mysqli, "SHOW TABLES");

// #2 用 PDO 连接数据库
try {
    $cdb = new PDO(
        "mysql:host=localhost;dbname=test",
        "root",
        "");
    echo "<p>Connected to MySQL!(use-PDO)</p>";
} catch (PDOException $e) {
    echo $e->getMessage();
}

