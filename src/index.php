<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>page store</title>
</head>
<body>
	<button id="buy_btn">click me</button>
	<script src="jquery.min.js"></script>
	<script>
		$(document).ready(function () {
			$('#buy_btn').click(function () {

				var parametros ={
					amount: 18.20 * 100,
					amountWithoutTax: 18.20*100,
					clientTransactionID: "24sd453f4sd6f118sd6fsd34sd",
					responseUrl: "https://page-store.onrender.com/payphone.php",
					cancellationUrl: "https://page-store.onrender.com/payphone.php"
				};

				$.ajax({
				    data: parametros,
				    url: 'https://pay.payphonetodoesposible.com/api/button/Prepare',
				    type:'POST',
				    beforeSend:function(xhr){
					    xhr.setRequestHeader ('Authorization', "Bearer A9IblYZbxZFqSIlahmjnYea1CeAKEFWZoUrNtux1YOeQV-fhvTQ7ouwKqYhYK1vQIqJy165MCSGuANYVJDzdzFW1f2_5M24mlmA4iedc0Ii5h4fQkXilX-4PTxlNq7VzJdAblwueJs2RVWieA6-e8AZnB-zSu5G2dEUkVhVxt9gKdUOLYT4MWK1TVUFPayfwumHLOwhqMeuzkE9CJmSlyQjbUTXc_-ofXi4G8qV1Zfyg4ABO7e03p_e3FiK-v3bdIhQZBUom6dOXOSA7LKMgL_3I-vHkCEB-U1DQhhb4C9a0gGrMeZxysUNdbYpuqHtxQ8-ApQ")
					},
				    success:function SolicitarPago(respuesta){
				      location.href = respuesta.payWithCard;
				    }, 
				    error: function(mensajeerror){
				     	alert ("Error en la llamada:" + mensajeerror.Message);
				    }
			  	});

			})
		})
	</script>
</body>
</html>