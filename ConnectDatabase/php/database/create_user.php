<?php
/**
 * Created by PhpStorm.
 * User: gooin
 * Date: 2017/4/1
 * Time: 13:32
 */
require_once "database_connection.php";
// 获取表单中的姓名 删除无关字符
$name = trim($_REQUEST['name']);
$email = trim($_REQUEST['email']);
$weibo = trim($_REQUEST['weibo']);
$bio = trim($_REQUEST['bio']);
$regex = "/^\s*@/";
// 检测填入的微博名字中是否有 @ 符号
if(!preg_match($regex, $weibo)){
    $weibo = "@" . $weibo;
}
// 获取不带 @ 的微博 id
$weibo_id = str_replace("@", "", $weibo);
$weibo_url = "http://weibo.com/" . $weibo_id;
// SQL 语句
$insert_sql = "INSERT INTO users(name, email, weibo, weibo_url, bio)". "VALUES('{$name}','{$email}','{$weibo}','{$weibo_url}','{$bio}');";
// 执行 SQL 语句
mysqli_query($db, $insert_sql)or die(mysqli_error($db));

// 将用户定位到新页面
header("Location:show_user.php?user_id=" .mysqli_insert_id($db));
exit();
?>

<!--在 html 中表现出来-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>create user</title>
    <link href="../../../css/bootstrap.css" type="text/css" rel="stylesheet">
</head>
<body class="container">
<div class="alert alert-success" style="margin-top: 10%">
    <h1>User Created Successfully</h1>
</div>
<div class="alert alert-warning">
    <h1>Here is a record of what information you submitted!</h1>
</div>
<div class="alert alert-info">
    <h2>Name: <?php echo $name;?></h2>
    <h2>Email: <?php echo $email;?></h2>
    <h2>Weibo: <?php echo $weibo;?></h2>
    <h2>Weibo URL: <?php echo $weibo_url;?></h2>
    <h2>Bio: <?php echo $bio;?>
</div>
</body>
</html>

