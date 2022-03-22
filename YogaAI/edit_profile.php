<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: login.php');
}
require('acc/db.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Profile</title>
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

$username = $_SESSION['username'];
$sql = "SELECT * FROM user  WHERE username = '$username'";
$res = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($res);
$profile = $row['proflie'];
$name = $row['name'];
$bio = $row['bio'];
$id = $row['user_id'];
$type = $row['type'];

if(isset($_POST['text'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $bio = mysqli_real_escape_string($conn, $_POST['bio']);

    $sql2 = "UPDATE user SET name='$name', bio='$bio' WHERE user_id = '$id'";
    $res1 = mysqli_query($conn, $sql2);
    if($res1){
        header('Location: dash.php');
    }

}

if(isset($_POST['img'])){
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["imgfile"]["name"]);

    $content = mysqli_real_escape_string($conn, $_POST['content']);
    if (move_uploaded_file($_FILES["imgfile"]["tmp_name"], $target_file)){
        $sql2 = "UPDATE user SET proflie='$target_file' WHERE user_id = '$id'";
        $res1 = mysqli_query($conn, $sql2);
        if($res1){
            header('Location: dash.php');
        }
    }
}
if(isset($_POST['update'])){
    $sql2 = "UPDATE user SET type='teacher' WHERE user_id = '$id'";
    $res1 = mysqli_query($conn, $sql2);
    if($res1){
        header('Location: dash.php');
    }

}

?>

<main>

<div class="mt-4">
 <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#name" type="button" role="tab" aria-controls="home" aria-selected="true">NAME & BIO</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">PROFILE</button>
  </li>
</ul>

<div class="tab-content mt-2" id="myTabContent">
  <div class="tab-pane fade show active" id="name" role="tabpanel" aria-labelledby="home-tab">
  <center>
<form method="post" action="">
				<h2 class="title">EDIT YOUR NAME AND BIO</h2>
                                          
                <div class="input-div mt-4">
           		   <div class="div">
           		   	    <input name="name" type="text" placeholder="Your Name"/>
           		   </div>
           		</div>
                   <div class="input-div mt-4">
           		   <div class="div">
           		   	    <input name="bio" type="text" placeholder="Your Bio"/>
           		   </div>
           		</div>
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                           <input class="btn btn-primary" style="background: linear-gradient(-45deg, #cf11da 0%, #3482fd 100%);
                                           border:none" type="submit" name="text"  value="POST"></input>
                                            </div>
                                        </form>
                                        <?php
                                        if($type == "user"){
                                          echo '<form method="post" action="">
                                            <input class="btn btn-primary" style="background: linear-gradient(-45deg, #cf11da 0%, #3482fd 100%);
                                                                                     border:none;" type="submit" name="update"  value="Become Teacher"></input>
                                                                                      </div>
                                          </form>';
                                        }
                                        ?>
                                     
</center>

</div>


<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<div id="image">
<div  class="row">
                              <div class="col-md-7">
                                  <center>
                                  <img id="myImg" src="#">
                                  </center>
                              </div>
                              <div class="col-md-5">

<form method="post" action="" enctype="multipart/form-data">
				<h2 class="title">UPDATE PROFILE</h2>

                   <div class="input-div mt-4">
           		   <div class="div">

                      <input class="input" id="imgfile" name="imgfile" type='file' />
                              </div>
                          </div>

                          <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                           <input class="btn btn-primary" style="background: linear-gradient(-45deg, #cf11da 0%, #3482fd 100%);
                                           border:none" type="submit" name="img"  value="POST"></input>
                                            </div>
                                        </form>
           		   </div>
           		</div>
                                            
                                            
    </center>

</div>
</div>
</div>


</main>
<?php
require('includes/footer.php');
?>