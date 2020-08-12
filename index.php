<?php
echo "Hello world /n";

$myfile = fopen("data.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("data.txt"));
fclose($myfile);

if(!empty($_REQUEST)){
 $log = $_REQUEST['data']['FIELDS']['ID'];
 $fp = fopen('data.txt', 'a');
 fwrite($fp, $log);
 fclose($fp);

 $queryUrl = 'https://b24-iolu5k.bitrix24.com/rest/1/5u5y5za5ze1mvden/crm.deal.get.json';
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
 curl_close($curl);
 $result = json_decode($result, 1);

 $fp = fopen('data.txt', 'a');
 fwrite($fp, $result);
 fclose($fp);

}

?>
