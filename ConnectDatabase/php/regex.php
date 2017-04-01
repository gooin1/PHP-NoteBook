<?php

$string = "regex Mr.Dc  Dr.Dc is  dada  good!";
$regex = "/(Dr|Mr)\.Dc/";

$result = preg_match_all($regex, $string);

echo $result;

