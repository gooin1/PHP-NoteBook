<?php


$string = "regex dafa is dafa dada  good!";
$regex = "/dafa/";

$result = preg_match_all($regex, $string);

echo $result;
echo "<br>fan tong da sabi";
