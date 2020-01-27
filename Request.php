<?php

$data = array('MerchantID' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', 'Amount' => 100, 'CallbackURL' => 'http://www.YourSite.com/', 'Mobile' => '09111111111' , 'Description' => 'خرید تست');
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
$result = json_decode($result, true);
curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    if ($result["Status"] == 100) {
        header('Location: https://www.zarinpal.com/pg/StartPay/' . $result["Authority"]);
    } else {
        echo'ERR: ' . $result["Status"];
    }
}
?>
