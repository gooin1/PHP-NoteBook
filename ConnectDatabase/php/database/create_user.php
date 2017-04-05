<?php
/**
 * Created by PhpStorm.
 * User: gooin
 * Date: 2017/4/1
 * Time: 13:32
 */
require_once "database_connection.php";
$upload_dir = __DIR__ . "/user_uploads/";

$image_fieldname = "user_pic";

// 上传可能出现的错误
$php_errors = array(1 => "超过 php.ini 最大文件限制",
    2 => "超过 html 表单最大文件限制",
    3 => "只上传了部分文件",
    4 => "没有上传文件");
// 没有 if 的 if 语句 确保没有上传错误的图片
($_FILES[$image_fieldname]['error'] == 0)
or handle_error("服务器不能上传你的小黄图", $php_errors[$_FILES[$image_fieldname]['error']]);
// 上传的是有效文件吗?
@is_uploaded_file($_FILES[$image_fieldname]['tmp_name'])
or handle_error("无效的文件(请选择上传的文件)",
    "Uploaded request: file named:" . "{$_FILES[$image_fieldname]['tmp_name']}");
// 是图像文件吗?
@getimagesize($_FILES[$image_fieldname]['tmp_name'])
or handle_error("你上传的文件" . "{$_FILES[$image_fieldname]['name']}"
    . "不是图片啊!!<br>"
    . "图片大小: " . var_dump(getimagesize($_FILES[$image_fieldname]['tmp_name'])),
    "{$_FILES[$image_fieldname]['tmp_name']}" . "不是有效的图片");
// 生成唯一的文件名
$now = time();
while (file_exists($upload_filename = $upload_dir . $now . '-' . $_FILES[$image_fieldname]['name'])) {
    $now++;
}
//chmod($upload_filename, 0666);
move_uploaded_file($_FILES[$image_fieldname]['tmp_name'], $upload_filename)
or handle_error($_FILES[$image_fieldname]['tmp_name'],
    "移动文件到" . $upload_filename . "出现问题: " . $php_errors);


//copy($_FILES[$image_fieldname]['tmp_name'], "../images/" . $upload_filename)
//or handle_error($_FILES[$image_fieldname]['tmp_name'], "移动文件到" . $upload_filename . "出现问题: " . print_r($_FILES));
// 获取表单中的姓名 删除无关字符
$name = trim($_REQUEST['name']);
$email = trim($_REQUEST['email']);
$weibo = trim($_REQUEST['weibo']);
$bio = trim($_REQUEST['bio']);
$regex = "/^\s*@/";
// 检测填入的微博名字中是否有 @ 符号
if (!preg_match($regex, $weibo)) {
    $weibo = "@" . $weibo;
}
// 获取不带 @ 的微博 id
$weibo_id = str_replace("@", "", $weibo);
$weibo_url = "http://weibo.com/" . $weibo_id;
// SQL 语句
$insert_sql = sprintf("INSERT INTO users(name, email, weibo, weibo_url, bio, user_pic_path)" .
    "VALUES('%s','%s','%s','%s','%s','%s');",
    mysqli_real_escape_string($db, $name),
    mysqli_real_escape_string($db, $email),
    mysqli_real_escape_string($db, $weibo),
    mysqli_real_escape_string($db, $weibo_url),
    mysqli_real_escape_string($db, $bio),
    mysqli_real_escape_string($db, $upload_filename));

//$insert_sql = "INSERT INTO users(name, email, weibo, weibo_url, bio ,user_pic_path)" .
//    "VALUES('{$name}','{$email}','{$weibo}','{$weibo_url}','{$bio}','{$upload_filename}');";
//// 执行 SQL 语句
mysqli_query($db, $insert_sql) or die(mysqli_error($db));
// 保存用户id
$user_id = mysqli_insert_id($db);

// 把图像插入到 images 表中
$image = $_FILES[$image_fieldname];
$image_filename = $image['name'];
$image_info = getimagesize($upload_filename);
$image_mime_type = $image_info['mime'];
$image_size = $image['size'];
/**大坑
如果 tmp_name 取不到文件信息, 可以用上传好的文件获取信息
$image_data = file_get_contents($image['tmp_name']);
**/
// 用我!!
$image_data = file_get_contents($upload_filename);

// SQL 语句
$insert_image_sql = sprintf("INSERT INTO  images(file_name, mime_type, file_size, image_data)".
    "VALUES('%s','%s','%s','%s');",
    mysqli_real_escape_string($db,$image_filename),
    mysqli_real_escape_string($db,$image_mime_type),
    mysqli_real_escape_string($db,$image_size),
    mysqli_real_escape_string($db,$image_data));

//$insert_image_sql = "INSERT INTO images(file_name, mime_type, file_size, image_data)" .
//    "VALUES('{$image_filename}', '{$image_mime_type}','{$image_size}','{mysqli_real_escape_string($db,$image_data)}');";
//
mysqli_query($db, $insert_image_sql) or die(mysqli_error($db));

//echo $_FILES[$image_fieldname]['n'];
//print_r($_FILES);
//ini_set('display_errors', true);
//error_reporting(E_ALL);
//list($width, $height) = getimagesize($upload_filename);
//echo $width;
//echo $height;
//echo var_dump( $image_data);
//echo $image_mime_type = $image_info['mime'];
// 将用户定位到新页面
header("Location:show_user.php?user_id=" . $user_id);
exit();
?>


