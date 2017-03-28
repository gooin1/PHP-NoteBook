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
mysqli_connect("localhost","root","","test")or die("<p>Error connecting to database:" . mysql_error() . "</p>");
echo "<p>Connected to MySQL!(use-mysqli)</p>";

// #2 用 PDO 连接数据库
try {
    $cdb = new PDO(
        "mysql:host=localhost;dbname=test",
        "root",
        "");
    echo "<p>Connected to MySQL!(use-PDO)</p>";
}catch (PDOException $e){
    echo $e->getMessage();
}

