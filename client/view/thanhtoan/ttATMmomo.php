<?php
// thanh toán thành công: 9704 0000 0000 0018, NGUYEN VAN A, 03/07, OTP
// thẻ bị khóa: 9704 0000 0000 0026, NGUYEN VAN A, 03/07, OTP
// nguồn tiền không đủ: 9704 0000 0000 0034, NGUYEN VAN A, 03/07, OTP
// hạn mức thẻ: 9704 0000 0000 0042, NGUYEN VAN A, 03/07, OTP
header('Content-type: text/html; charset=utf-8');

include('helpper_momo.php');

$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$serectkey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

$orderInfo = "Thanh toán bằng ATM MoMo";
if(isset($_SESSION['tongbill'])){
    $amount = $_SESSION['tongbill'];
}
$orderId = time()."";
$redirectUrl = "http://localhost/Duan1/client/?act=thank&id_bill=$idBill";
$ipnUrl = "http://localhost/Duan1/index.php?act=thank&id_bill=$idBill";
$extraData = "";

$requestId = time() . "";
$requestType = "payWithATM";
$extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
//before sign HMAC SHA256 signature
$rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" .
    $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId .
    "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode .
    "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId .
    "&requestType=" . $requestType;

$signature = hash_hmac("sha256", $rawHash, $serectkey);

$data = array('partnerCode' => $partnerCode,
    'partnerName' => "Test",
    "storeId" => "MomoTestStore",
    'requestId' => $requestId,
    'amount' => $amount,
    'orderId' => $orderId,
    'orderInfo' => $orderInfo,
    'redirectUrl' => $redirectUrl,
    'ipnUrl' => $ipnUrl,
    'lang' => 'vi',
    'extraData' => $extraData,
    'requestType' => $requestType,
    'signature' => $signature);
$result = execPostRequest($endpoint, json_encode($data));
$jsonResult = json_decode($result, true);  // decode json

//Just a example, please check more in there
unset($_SESSION['cart']);
unset($_SESSION['tongbill']);
header('Location: ' . $jsonResult['payUrl']);
?>