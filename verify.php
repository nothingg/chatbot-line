<?php
$access_token = '7J9njtQ69rAkO3lahK+hZG7iKcPg1G8U3AwGJ1pu7BjEVZ/SxxD4DYZCh0Q+WpNNsgR7OdNnfCWy3ZelITYhXabs6n3Q4Q0789024rvkKh+pQwJNFfFdFTdV72IS6ZeGZb8ayDpBKtL5vmEqt4/lDAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
