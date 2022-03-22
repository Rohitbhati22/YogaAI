<?php
require('acc/db.php'); 
$err = false;
$err2 = false;   

if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    
    $sql = "SELECT * FROM user  WHERE username = '$username'";
    $res = mysqli_query($conn, $sql);

    $sql = "SELECT COUNT(*) FROM user  WHERE username = '$username' && password='$pass'";
    $resU = mysqli_query($conn, $sql);
    $resU =  mysqli_fetch_array($resU)[0];

    if($resU > 0){
        $row = mysqli_fetch_assoc($res);
    
        $password = $row['password'];
     
          
    if($password == $pass){
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        header('Location: dash.php');
    } 
    else {
        $err2 = true;
    }
    }
    else{
        $err2 = true;  
    }
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
	<link rel="stylesheet" type="text/css" href="src/login/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" href="src/css/style.css">
    <link href="src/boot/bootstrap.min.css" rel="stylesheet" >
     <!-- Bootstrap Font Icon CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">

</head>
<body>
<?php
require('includes/nav.php');
?>
<main>
<?php
if($err2){
    echo '<div class="alert alert-danger alert-dismissible fade show my-4 m-4" role="alert">
    <strong>Error!</strong> Username And Password is Worng.
  </div>';
}
if($err){
    echo '<div class="alert alert-danger alert-dismissible fade show my-4 m-4" role="alert">
    <strong>Error!</strong> Account With this username is noot found!!
  
  </div>';
}               ?>
	<div class="container">
		<div class="img">
        <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_yupefrh2.json" background="transparent"  speed="1" loop autoplay></lottie-player>
		</div>
			<div class="login-content">
                

                                        <form method="post" action="login.php">
                                            <img src="src/images/user.png">
				<h2 class="title">Welcome</h2>
                                            <div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   	    <input class="input" name="username" type="text" required/>
           		   </div>
           		</div>
                                            	<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
                        <input class="input" name="password" type="password" required/>
            	   </div>
            	</div>
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                           <input class="btn btn-primary" style="background: linear-gradient(-45deg, #cf11da 0%, #3482fd 100%);
                                           border:none" type="submit" name="login"  value="Login"></input>
                                            </div>
                                            <p> <a style="color: #0d6efd;text-decoration: none;font-weight: 700;" href="singup.php">Don't Have Account !! Sing Up Here...</a></p>
                                        </form>
                                    </div>
    </div>
</main>
<script type="text/javascript" src="src/login/js/main.js"></script>

<?php

require('includes/footer.php');

?>