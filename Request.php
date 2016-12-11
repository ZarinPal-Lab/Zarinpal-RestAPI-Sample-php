<?php
	$data = array('MerchantID' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', 'Amount' => 10, 'CallbackURL' => 'http://www.google.com/', 'Description' => 'تست');
	$jsonData = json_encode($data);
	$ch = curl_init('https://www.zarinpal.com/pg/rest/WebGate/PaymentRequest.json');
	curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($jsonData)
	));

	$result = curl_exec($ch);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  echo $result;
	}
?>