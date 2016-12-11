<?php
	$data = array('MerchantID' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', 'Authority' => '000000000000000000000000000000123465', 'Amount' => 100);
	$jsonData = json_encode($data);
	$ch = curl_init('https://www.zarinpal.com/pg/restful/WebGate/PaymentVerification');
	curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($jsonData)
	));

	$result = curl_exec($ch);
	curl_close($ch);
	
	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  echo $result;
	}
?>