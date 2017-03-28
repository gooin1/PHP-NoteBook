<?php
/**
 * Created by PhpStorm.
 * User: gooin
 * Date: 2017/3/28
 * Time: 12:43
 */

require 'app_config.php';

// 连接数据库(已经过时)
//mysql_connect("localhost", "root", "") or die("<p>Error connecting to database:" . mysql_error() . "</p>");

// #1 用 mysqli 命令替代 mysql
$mysqli = mysqli_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
// 检查连接状态
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
} else {
    echo "<p>Connected to MySQL!(use-mysqli)</p>";
}
// 查询
//$rst = mysqli_query($mysqli,"SHOW TABLES");

if ($result = mysqli_query($mysqli, "SHOW TABLES")) {
    // 查看结果
    printf("return %d rows.\n", mysqli_num_rows($result));

    echo "<p>Tables in databases:</p>";
    echo "<ul>";
    while ($row = mysqli_fetch_row($result)) {
        // echo "<li>Table:" . $row[0] . "</li>";
        echo "<li>Table: {$row[0]} </li>";
    }
    echo "</ul>";
    // 关闭数据库
    mysqli_free_result($result);
}

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

