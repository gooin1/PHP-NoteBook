<?php
/**
 * Created by PhpStorm.
 * User: gooin
 * Date: 2017/4/4
 * Time: 10:35
 */
print_r($_FILES);
$file_name = $_FILES['user_pic']['name'];
$tmp_name = $_FILES['user_pic']['tmp_name'];
if(isImg($tmp_name)){
    echo "is image";
}else{
    echo "not image";
}

//echo "<br>";
//echo $file_name;
echo "<br>";
echo $tmp_name;
move_uploaded_file($tmp_name, "/home/wwwroot/gooin.win/ConnectDatabase/php/database/user_uploads/" . "1-" . $file_name)
or handle_error("上传失败", "不知道错误是啥");
//move_uploaded_file($tmp_name, "../../user_uploads/" . "-" . $file_name)
//or handle_error("上传失败", "不知道错误是啥");
