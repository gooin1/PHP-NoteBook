<?php
/**
 * Created by PhpStorm.
 * User: gooin
 * Date: 2017/4/1
 * Time: 13:32
 */
require "database_connection.php";

$name = trim($_REQUEST['name']);
$email = trim($_REQUEST['email']);
$weibo = trim($_REQUEST['weibo']);
$regex = "/^\s*@/";
if(!preg_match($regex, $weibo)){
    $weibo = "@" . $weibo;
}
$weibo_id = str_replace("@", "", $weibo);
$weibo_url = "http://weibo.com/" . $weibo_id;

$insert_sql = "INSERT INTO users(name, email, weibo, weibo_url)". "VALUES('{$name}','{$email}','{$weibo}','{$weibo_url}');";
mysqli_query($db, $insert_sql)or die(mysqli_error($db));
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>create user</title>
    <link href="../../css/bootstrap.css" type="text/css" rel="stylesheet">
</head>
<body class="container">
<div class="alert alert-success">
    <h1>User Created Successful</h1>
</div>
<div class="alert alert-warning">
    <h1>Here is a record of what information you submitted!</h1>
</div>
<div class="alert alert-info">
    <h2>Name: <?php echo $name;?></h2>
    <h2>Email: <?php echo $email;?></h2>
    <h2>Weibo: <?php echo $weibo;?></h2>
    <h2>Weibo URL: <?php echo $weibo_url;?></h2>
</div>
</body>
</html>

