<!DOCTYPE html>
<?php
//Obtener parametros de la URL enviados por PayPhone
$transaccion = $_GET["id"];
$client = $_GET["clientTransactionId"];

//Preparar JSON de llamada
$data_array = array(
"id"=> (int)$transaccion,
"clientTxId"=>$client );

$data = json_encode($data_array);

//Iniciar Llamada
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://pay.payphonetodoesposible.com/api/button/V2/Confirm");
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt_array($curl, array(
CURLOPT_HTTPHEADER => array(
"Authorization: Bearer A9IblYZbxZFqSIlahmjnYea1CeAKEFWZoUrNtux1YOeQV-fhvTQ7ouwKqYhYK1vQIqJy165MCSGuANYVJDzdzFW1f2_5M24mlmA4iedc0Ii5h4fQkXilX-4PTxlNq7VzJdAblwueJs2RVWieA6-e8AZnB-zSu5G2dEUkVhVxt9gKdUOLYT4MWK1TVUFPayfwumHLOwhqMeuzkE9CJmSlyQjbUTXc_-ofXi4G8qV1Zfyg4ABO7e03p_e3FiK-v3bdIhQZBUom6dOXOSA7LKMgL_3I-vHkCEB-U1DQhhb4C9a0gGrMeZxysUNdbYpuqHtxQ8-ApQ", "Content-Type:application/json"),
));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
if (curl_errno($curl)) {
    echo 'Error en la solicitud cURL: ' . curl_error($curl);
}
curl_close($curl);

//En la variable result obtienes todos los parámetros de respuesta
echo $result;
?>