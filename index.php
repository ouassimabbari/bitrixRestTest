<?php
echo "Hello world /n";

$myfile = fopen("data.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("data.txt"));
fclose($myfile);

if(!empty($_REQUEST)){
 $log = $_REQUEST['event'];
 $fp = fopen('data.txt', 'a');
 fwrite($fp, $log);
 fclose($fp);
}
?>
