<?php

$Authority = $_GET['Authority'];
$data = array("merchant_id" => "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx", "authority" => $Authority, "amount" => 1000);
$jsonData = json_encode($data);
$ch = curl_init('https://api.zarinpal.com/pg/v4/payment/verify.json');
curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v4');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData)
));

$result = curl_exec($ch);
curl_close($ch);
$result = json_decode($result, true);
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    if ($result['data']['code'] == 100) {
        echo 'Transation success. RefID:' . $result['data']['ref_id'];
    } else {
        echo'code: ' . $result['errors']['code'];
        echo'message: ' .  $result['errors']['message'];
    }
}
?>
