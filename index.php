<?php
session_start();
$myfile = fopen("data.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("data.txt"));
fclose($myfile);

if(!empty($_REQUEST)){
 $log = $_REQUEST['data']['FIELDS']['ID'];
 file_put_contents('data.txt', print_r($_REQUEST, true));
 $queryUrl = 'http://34.65.80.46/bitrixOdooMiddleware/index.php';
 $queryData = "id=$log";
 $curl = curl_init();
 curl_setopt_array($curl, array(
 CURLOPT_SSL_VERIFYPEER => 0,
 CURLOPT_POST => 1,
 CURLOPT_HEADER => 0,
 CURLOPT_RETURNTRANSFER => 1,
 CURLOPT_URL => $queryUrl,
 CURLOPT_POSTFIELDS => $queryData,
 ));
 $result = curl_exec($curl);
 file_put_contents('data.txt', $result);
 curl_close($curl);
}

?>
