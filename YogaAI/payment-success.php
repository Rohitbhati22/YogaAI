<!DOCTYPE html>
<html>
<head>
<title>Instamojo Thank You - YogaAI</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body class="">
	
	<br><br><br><br>
	<article class="bg-secondary mb-3">  
	<div class="card-body text-center">
	<h4 class="text-white">Thank you for payment<br></h4>
	<?php

		require_once('vendor/autoload.php');
		require('acc/db.php');

        $API_KEY = "test_d883b3a8d2bc1adc7a535506713";
        $AUTH_TOKEN = "test_dc229039d2232a260a2df3f7502";
        $URL = "https://test.instamojo.com/api/1.1/";

		$api = new Instamojo\Instamojo($API_KEY, $AUTH_TOKEN,$URL);

		$payid = $_GET["payment_request_id"];

		try {
		$response = $api->paymentRequestStatus($payid);
		echo "<h5>Payment ID: " . $response['payments'][0]['payment_id'] . "</h5>" ;
		echo "<h5>Payment Name: " . $response['payments'][0]['user_id'] . "</h5>" ;
		echo "<h5>Payment Email: " . $response['payments'][0]['email'] . "</h5>" ;
		echo "<h5>Payment Mobile: " . $response['payments'][0]['buyer_phone'] . "</h5>" ;
		echo "<h5>Payment status: " . $response['payments'][0]['status'] . "</h5>" ;
		echo "<pre>";

		}
		catch (Exception $e) {
		print('Error: ' . $e->getMessage());
		}
	?>
	<br>
	<p><a class="btn btn-warning" target="_blank" href="dash.php"> GO TO DASHBOARD 
	 <i class="fa fa-window-restore "></i></a></p>
	</div>
	<br><br><br>
	</article>

</body>
</html>
