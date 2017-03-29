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
echo "query text is: " . $query_text . "<br>";

// 将查询结果保存到 result 中
$result = mysqli_query($db, $query_text);

// 打印报错信息
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
    // 输出有几行
    printf("return %d rows", mysqli_num_rows($result));
    // 输出每行的名字
    echo "<ul>";
    while ($row = mysqli_fetch_row($result)) {
        echo "<li>{{$row[0]}}</li>";
    }
    echo "<ul>";



