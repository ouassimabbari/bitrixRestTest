<?php
echo "Hello world \n";
$myfile = fopen("data.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("data.txt"));
fclose($myfile);

print_r($_REQUEST);
writeToLog($_REQUEST, 'incoming');

/**
 * Write data to log file.
 *
 * @param mixed $data
 * @param string $title
 *
 * @return bool
 */
function writeToLog($data, $title = '') {
 $log = "\n------------------------\n";
 $log .= date("Y.m.d G:i:s") . "\n";
 $log .= (strlen($title) > 0 ? $title : 'DEBUG') . "\n";
 $log .= print_r($data, 1);
 $log .= "\n------------------------\n";
 file_put_contents(getcwd() . '/hook.log', $log, FILE_APPEND);
 $fp = fopen('data.txt', 'a');
 fwrite($fp, $log);
 fclose($fp);
 return true;
} 

?>
