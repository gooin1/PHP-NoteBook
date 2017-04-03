<?php
/**
 * Created by PhpStorm.
 * User: gooin
 * Date: 2017/4/1
 * Time: 19:18
 */

require "database_connection.php";
// 获取用户id
$user_id = $_REQUEST['user_id'];
//$user_id = 1;
// 创建查询语句
$select_query = "SELECT * FROM users WHERE user_id = " . $user_id;
// 进行查询
$result = mysqli_query($db, $select_query);
//
if($result){
// 查询
    $row = mysqli_fetch_array($result);
    // 将查到的字段分别赋值给变量
    $name = $row['name'];
    $email = $row['email'];
    $weibo = $row['weibo'];
    $weibo_url = $row['weibo_url'];
    $bio = $row['bio'];
}else{
    // 报错
    die("Error locating user with ID {$user_id}");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>show user</title>
    <link href="../../../css/bootstrap.css" type="text/css" rel="stylesheet">
</head>
<body>
<header class="container alert alert-info" style="margin-top: 8%">
    <h1 class="text-center">User Information</h1>
</header>
<div class="container alert alert-warning">
    <div class="col-md-12">
        <h2><?php echo $name;?></h2>
    </div>
    <div class="col-md-8">
        <h2><?php echo $bio;?></h2>
    </div>
    <div class="col-md-4">
        <img src="../../images/logo.png" width="300px" height="300px">
    </div>
    <div class="col-md-12">
        <h3>get in touch with <?php echo $name;?></h3>
        <ul class="list-group">
            <li>Email <a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></li>
            <li>Weibo <a href="<?php echo $weibo_url;?>"><?php echo $weibo;?></a></li>
        </ul>
    </div>
</div>

<footer></footer>
</body>
