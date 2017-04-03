<?php
/**
 * Created by PhpStorm.
 * User: gooin
 * Date: 2017/3/28
 * Time: 20:05
 */
require_once "database_connection.php";


// 获取文本框输入的内容
$query_text = $_REQUEST['query'];
// 将查询结果保存到 result 中
$result = mysqli_query($db, $query_text);
// 转换为大写并删除空格用于检查关键字
$upper_query_text =  trim($query_text);

// 打印报错信息
//if (mysqli_connect_errno()) {
//    printf("Connect failed: %s\n", mysqli_connect_error());
//    exit();
//}
if(mysqli_errno($db)){
    printf("Error: ",mysqli_error($db));
}

$return_rows = true;
//
$regex1 = "/^ *(insert|create|delete|update|drop|)/i";
$regex = "/^\s*(INSERT|CREATE|UPDATE|DELETE|DROP)/i";
if (preg_match($regex, $query_text)) {
    $return_rows = false;
}

if($return_rows){
    // 输出有几行
   // echo "return " . mysqli_num_rows($result) . " rows";
    // 输出每行的名字
    echo "<ul>";
    while ($row = mysqli_fetch_row($result)) {
        echo "<li>{{$row[0]}}</li>";
    }
    echo "<ul>";
} else {
    echo "<p>SQL executed success!</p>";
    echo "<p>{{$query_text}}</p>";
}

