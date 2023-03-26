<?php
require_once('session_controller.php');
function genReference($qtd){
    $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
    $QuantidadeCaracteres = strlen($Caracteres);
    $QuantidadeCaracteres--;

    $Hash=NULL;

    for($x=1;$x<=$qtd;$x++){
        $Posicao = rand(0,$QuantidadeCaracteres);
        $Hash .= substr($Caracteres,$Posicao,1);
    }

    return $Hash;
}

$postemail=$_POST['email'];
$postamount=$_POST['amount'];
$charge=$postamount*2.0/100;
$final_amount=$postamount+$charge;


//Set other parameters as keys in the $postdata array
$postdata = array(
    'email' => $postemail,
    'amount' => $final_amount*100,
    "reference" => genReference(10)
);

$url = "https://api.paystack.co/transaction/initialize";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = [
    'Authorization: Bearer '.$paystack_sk.'',
    'Content-Type: application/json',

];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$request = curl_exec($ch);
curl_close($ch);
$result = json_decode($request, true);

header('Location: ' . $result['data']['authorization_url']);
exit();

?>