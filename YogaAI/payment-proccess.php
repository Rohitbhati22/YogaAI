<?php
    
    require_once('vendor/autoload.php');

    $API_KEY = "test_d883b3a8d2bc1adc7a535506713";
    $AUTH_TOKEN = "test_dc229039d2232a260a2df3f7502";
    $URL = "https://test.instamojo.com/api/1.1/";

    $api = new Instamojo\Instamojo($API_KEY, $AUTH_TOKEN, $URL);

    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => "Join THe Class",
            "amount" => $_POST["amount"],
            "user_id" => $_POST["user_id"],
            "class_id" => $_POST["class_id"],
            "send_email" => true,
            "email" => $_POST["email"],
            "redirect_url" => "http://localhost/YogaAI/payment-success.php"
            ));
            
            header('Location: ' . $response['longurl']);
            exit();
    }catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }

?>