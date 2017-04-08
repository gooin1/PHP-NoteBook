<?php
/**
 * Created by PhpStorm.
 * User: gooin
 * Date: 2017/4/6
 * Time: 17:05
 */
require_once 'app_config.php';
require_once 'database_connection.php';
require_once 'view.php';

// 建立select 语句
$select_users = "SELECT user_id, name, email FROM users";
// 进行查询
$result = mysqli_query($db, $select_users);

// 获取传回的success参数
if (isset($_REQUEST['success_message'])) {
    $msg = $_REQUEST['success_message'];
}
?>
<?php
// 将 delete 的脚本在 函数中加载
$delete_user_script = <<<EOD
    function delete_user(user_id) {
        if (confirm("确定要删除这个炮灰吗?" +
            "删除后不能还原")) {
            window.location = "delete_user.php?user_id=" + user_id;
        }
    } 
EOD;
display_head("Current Users" ,$delete_user_script);
?>
<body class="container">
<div class="alert alert-success" style="margin-top: 5%">
    <h1 class="text-center">Users List</h1>
</div>
<?php display_messages($msg); ?>

<div class="alert alert-info">
    <ul>
        <?php
        while ($user = mysqli_fetch_array($result)) {
            $user_row = sprintf("<li><a href='show_user.php?user_id=%d'>%s</a>" .
                "(<a href='mailto:%s'>%s</a>)" .
                "<a href='javascript:delete_user(%d)'>删除</a>" .
                "</li>",
                $user['user_id'], $user['name'], $user['email'], $user['email'], $user['user_id']);
            echo $user_row;
        }
        ?>
    </ul>
</div>

</body>
</html>
