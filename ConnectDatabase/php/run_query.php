<?php
/**
 * Created by PhpStorm.
 * User: gooin
 * Date: 2017/3/28
 * Time: 20:05
 */
require "database_connection.php";


// 获取文本框输入的内容
$query_text = $_REQUEST['query'];
// 转换为大写并删除空格用于检查关键字
$upper_query_text =  trim(strtoupper($query_text));
// 将查询结果保存到 result 中
$result = mysqli_query($db, $query_text);

// 打印报错信息
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$return_rows = false;
// 保存关键字出现的位置
$location = strpos($upper_query_text, "CRATE");
// 如果没有关键字, 则继续向下查找
if ($location === false || $location>0){
    $location = strpos($upper_query_text, "UPDATE");
    if ($location === false || $location>0) {
        $location = strpos($upper_query_text, "DELETE");
        if($location === false || $location>0){
            $location = strpos($upper_query_text, "DROP");
            if($location === false || $location>0){
                $location = strpos($upper_query_text, "INSERT");
                if ($location === false || $location>0) {
                    // 代码运行到此处说明输入的查询语句没有上面几个关键词
                    // 应该是返回结果行
                    $return_rows = true;
                }
            }
        }
    }
}

if($return_rows){
    // 输出有几行
    printf("return %d rows", mysqli_num_rows($result));
    // 输出每行的名字
    echo "<ul>";
    while ($row = mysqli_fetch_row($result)) {
        echo "<li>{{$row[0]}}</li>";
    }
    echo "<ul>";
} else {
    echo "<p>你输入的 SQL 语句已经成功执行</p>";
    echo "<p>{{$query_text}}</p>";
}

