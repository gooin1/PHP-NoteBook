<?php
/**
 * Created by PhpStorm.
 * User: gooin
 * Date: 2017/4/6
 * Time: 23:04
 */
require_once 'app_config.php';
require_once 'database_connection.php';

// 获取要删除的用户id
$user_id = $_REQUEST['user_id'];
// 建立 delete 语句
$delete_query = sprintf("DELETE FROM users WHERE user_id=%d",$user_id);
// 进行删除
$result = mysqli_query($db, $delete_query);


// 重定向到 show_users 刷新显示的用户
$msg="选中的用户已经删除";
header("Location:show_users.php?success_message={$msg}");
exit();