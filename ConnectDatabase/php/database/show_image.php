<?php
/**
 * Created by PhpStorm.
 * User: gooin
 * Date: 2017/4/5
 * Time: 19:39
 */
require_once "app_config.php";
require_once "database_connection.php";
try {
    if (!isset($_REQUEST['image_id'])) {
        handle_error("没有指定图片", "没指定图片");
    }

    $image_id = $_REQUEST['image_id'];

// select 语句
    $select_query = sprintf("SELECT * FROM images WHERE image_id = %d", $image_id);
//
    $result = mysqli_query($db, $select_query);
//var_dump($result);

//
    if (mysqli_num_rows($result) == 0) {
        handle_error("can't find the requested image",
            "No images found with an ID of " . $image_id);
    }
    $image = mysqli_fetch_array($result);


    header('Content-type:' . $image['mime_type']);
    header('Content-length:' . $image['file_size']);
    echo $image['image_data'];
} catch (Exception $exception) {
    handle_error("error to load image", $exception->getMessage());
}


