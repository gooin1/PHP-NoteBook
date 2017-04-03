<?php
/**
 * Created by PhpStorm.
 * User: gooin
 * Date: 2017/3/28
 * Time: 18:51
 * 将重要参数放入常量中
 */

// 设置调试模式
define("DEBUG_MODE", true);


// 数据库连接常量
define("DATABASE_HOST", "localhost");
define("DATABASE_USERNAME", "root");
define("DATABASE_PASSWORD", "yzt753951");
define("DATABASE_NAME", "test");


function debug_print($error_message)
{
    if (DEBUG_MODE) {
        echo $error_message;
    }
}