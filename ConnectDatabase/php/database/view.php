<?php
/**
 * Created by PhpStorm.
 * User: gooin
 * Date: 2017/4/8
 * Time: 18:24
 */
require_once 'app_config.php';

define('SUCCESS_MESSAGE', 'Success');
define('ERROR_MESSAGE', 'Error');

function display_messages($success_msg = NULL, $error_msg = NULL)
{

    if (!is_null($success_msg)) {
        echo "<div class='alert alert-success'>";
        display_message($success_msg, SUCCESS_MESSAGE);
    }
    if (!is_null($error_msg)) {
        echo "<div class='alert alert-danger'>";
        display_message($error_msg, ERROR_MESSAGE);
    }
    echo "</div>";
}

function display_message($msg, $msg_type)
{
    echo "<h2>{$msg_type} ";
    echo "<small>{$msg}</small></h2>";
}

function display_head($page_title = "", $embedded_javascript = NULL)
{
    echo <<<EOD
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{$page_title}</title>
    <link href="../../../css/bootstrap.css" type="text/css" rel="stylesheet">
EOD;
    if (!is_null($embedded_javascript)) {
        echo <<<EOD
<script type="text/javascript">
      $embedded_javascript;       
</script>
</head>
EOD;
    }
}

function display_title($title, $success_msg = NULL, $error_msg = NULL)
{
    echo <<<EOD
<body class="container">
<div class="alert alert-success" style="margin-top: 5%">
    <h1 class="text-center">{$title}</h1>
</div>
EOD;
    display_messages($success_msg, $error_msg);
}


function display_footer()
{
    echo <<<EOD
</body>
</html>
EOD;


}