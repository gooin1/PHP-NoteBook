<?php
/**
 * Created by PhpStorm.
 * User: gooin
 * Date: 2017/4/2
 * Time: 16:46
 */
require_once "app_config.php";

// 用 isset 检查 $error_message 是否被赋值
//$isSet = isset($_REQUEST['$error_message']);
$isSet = $_REQUEST['error_message'];
if ($isSet) {
//    $error_message = $_REQUEST['error_message'];
    $error_message = preg_replace("/\\\\/", '', $_REQUEST['error_message']);
} else {
    $error_message = "有些蛋疼的错误发生了, 真的有请求参数吗?";
}

if (isset($_REQUEST['system_error_message'])) {
    $system_error_message = preg_replace("/\\\\/", "", $_REQUEST['system_error_message']);
} else {
    $system_error_message = "没有系统错误发生";
}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error Page</title>
    <link href="../../../css/bootstrap.css" type="text/css" rel="stylesheet">
</head>
<body class="container">
<div class="alert alert-danger" style="margin-top: 5%">
    <h1>Error
        <small class="text-danger"> 似乎有一些错误发生了</small>
    </h1>
</div>
<div class="alert alert-warning">
    <h2></h2>
    <h2>联系背锅侠 @goooinn 解决</h2>
</div>
<div class="alert alert-info">
    <h3>错误信息为: </h3>
    <h1><?php echo $error_message; ?></h1>
</div>
<div class="alert alert-danger">
    <h3>系统错误信息为:</h3>
    <?php
    debug_print("<h1>{$system_error_message}</h1>");

    ?>
</div>
</body>
</html>