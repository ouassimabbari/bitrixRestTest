<?php
session_start();
$myfile = fopen("data.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("data.txt"));
fclose($myfile);

if(!empty($_REQUEST)){
 $log = $_REQUEST['data']['FIELDS']['ID'];
 $fp = fopen('data.txt', 'a');
 fwrite($fp, $log);
 fclose($fp);
 file_put_contents('data.txt', print_r($_REQUEST, true));
}

?>
