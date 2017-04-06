<?php
/**
 * Created by PhpStorm.
 * User: gooin
 * Date: 2017/4/6
 * Time: 17:05
 */
require_once 'app_config.php';
require_once 'database_connection.php';

// 建立select 语句
$select_users = "SELECT user_id, name, email FROM users";
// 进行查询
$result = mysqli_query($db, $select_users);

//while ($row = mysqli_fetch_row($result)) {
//    echo "<li>{$row['col_name']}</li>";
//}
//$user_row = sprintf("<li><a href='show_user.php?user_id=%d'>%s</a>" .
//    "(<a href='mailto:%s'>%s</a>)" .
//    "<a href='delete_user?user_id=%d'>删除</a>" .
//    "</li>", $user['user_id'], $user['name'], $user['email'], $user['user_id']);
//
//?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Users</title>
    <link href="../../../css/bootstrap.css" type="text/css" rel="stylesheet">
</head>
<body class="container">
<div class="alert alert-success" style="margin-top: 5%">
    <h1 class="text-center">Users List</h1>
</div>

<div class="alert alert-info">
<ul>
    <?php
    while ($user = mysqli_fetch_array($result)){
        $user_row = sprintf("<li><a href='show_user.php?user_id=%d'>%s</a>" .
            "(<a href='mailto:%s'>%s</a>)" .
            "<a href='delete_user?user_id=%d'>删除</a>" .
            "</li>",
            $user['user_id'], $user['name'], $user['email'],$user['email'], $user['user_id']);
        echo $user_row;
    }
    ?>
</ul>
</div>

</body>
</html>
