<?php
$access_token = '7J9njtQ69rAkO3lahK+hZG7iKcPg1G8U3AwGJ1pu7BjEVZ/SxxD4DYZCh0Q+WpNNsgR7OdNnfCWy3ZelITYhXabs6n3Q4Q0789024rvkKh+pQwJNFfFdFTdV72IS6ZeGZb8ayDpBKtL5vmEqt4/lDAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back

            
            if ($text == 'สอนเป็ด') {
			$messages = [
				'type' => 'text',
				'text' => 'ขอบคุณครับที่สอนเป็ด'
			];

            $messages2 = [
				'type' => 'sticker',
				'packageId' => '1',
                'stickerId' => '13'
			];
            }else{
               $messages = [
				'type' => 'text',
				'text' => $text
			];

            $messages2 = [
				'type' => 'sticker',
				'packageId' => '1',
                'stickerId' => '1'
			]; 
            }


			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages ,$messages2],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";