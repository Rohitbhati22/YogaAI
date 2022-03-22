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
$email = $row['email'];
$bio = $row['bio'];
$id = $row['user_id'];
$jion = false;
$cid = $_GET['key'];
$sqlC = "SELECT * FROM class WHERE class_id = '$cid'";
$resC = mysqli_query($conn, $sqlC);
$row1 = mysqli_fetch_assoc($resC);
$cname = $row1['name'];
$dic = $row1['dic'];
$price = $row1['price'];

$sqlJ = "SELECT COUNT(*) FROM join_class WHERE class_id = '$cid' && user_id='$id'";
$resJ = mysqli_query($conn, $sqlJ);
$total_rows = mysqli_fetch_array($resJ)[0];
if($total_rows>0){
    $jion = true;
}
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
  } else {
    $pageno = 1;
  }
$no_of_records_per_page = 9;
$offset = ($pageno-1) * $no_of_records_per_page; 

$total_pages_sql = "SELECT COUNT(*) FROM post where class_id = '$cid' ORDER BY `post_id` DESC";
$result = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sqlpost = "SELECT * FROM post where class_id = '$cid' ORDER BY `post_id` DESC LIMIT $offset, $no_of_records_per_page";
$resPost = mysqli_query($conn, $sqlpost);

$total_pages_sql_s = "SELECT COUNT(*) FROM join_class where class_id = '$cid'";
$result_s = mysqli_query($conn,$total_pages_sql_s);
$total_rows_s = mysqli_fetch_array($result_s)[0];
$total_pages_s = ceil($total_rows_s / $no_of_records_per_page);

$sqlStudent = "SELECT * FROM join_class where class_id = '$cid' LIMIT $offset, $no_of_records_per_page";
$resStudent = mysqli_query($conn, $sqlStudent);
?>

<main>
<div id="topInfo" class="card" style="width:100%;margin:34px;">
  <div class="card-body">
      <center>
      <h1><?php echo $cname ?></h1>
<h4><?php echo $dic ?></h4>
<?php
if(!$jion){
    if($price > 0){
        echo '<form method="post" action="payment-proccess.php">
        <input name="user_id" type="hidden" value="'.$id.'"/>
            <input name="class_id" type="hidden" value="'.$cid.'"/>
            <input name="amount" type="hidden" value="'.$price.'"/>
            <input name="email" type="hidden" value="'.$email.'"/>
        <input type="submit" name="paid" style="text-decoration: none;" class="mbtn_a" value="Jion BY Paying '.$price.' RS /-"/>
        </form>';
        }
        else {
            echo '<form method="post" action="">
            <input name="user_id" type="hidden" value="'.$id.'"/>
            <input name="class_id" type="hidden" value="'.$cid.'"/>
            <input type="submit" name="free" style="text-decoration: none;" class="mbtn_a" value="Jion This Class"/>
            </form>';
        
        }
}
?>
      </center>
  </div>
</div>
<div  id="listContent">
    <?php
    if(!$jion){
        echo '<center><h4 class="m-4">1st You Have To Jion The Class To View The Content!!</h4></center>';
    }
    else{
        echo '
        <ul class="nav nav-pills mb-3 m-5" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Posts</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">All Students</button>
        </li>
      </ul>
      <div class="tab-content m-5" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="row">
        ';
      
        while ($row = mysqli_fetch_assoc($resPost)) {
            $id=$row['user_id'];
            $post_id=$row['post_id'];
            $cap = $row['cap'];
            $type = $row['type']; 
            $url = $row['url']; 
            
     
           echo '<div class="col-sm-4 grid-margin mt-2">
<div class="card">';

if($type == 'text'){
 echo  '<div class="card-body">
 <h4><b>'.$cap.'</b></h4>
               </div>   </div>
</div>'; 
}
else if($type == 'image'){
 echo  '<div class="card-body">
 <h6><b>'.$cap.'</b></h6>
 <img style="height:200px;
 width:300px;" src="'.$url.'">
               </div>   </div>
</div>'; 
}
else{
 echo  '<div class="card-body">
 <h6><b>'.$cap.'</b></h6>
 <iframe id="yt" width="300" height="200px"
 src="https://www.youtube.com/embed/'.$url.'"></iframe>
               </div>   </div>
</div>'; 
}
        }

        echo '</div></div>

        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">';
        while ($rows = mysqli_fetch_assoc($resStudent)) {
          $id=$rows['user_id'];
          $sqluser = "SELECT * FROM user where user_id = '$id'";
          $resuser = mysqli_query($conn, $sqluser);
          
          $rowU = mysqli_fetch_assoc($resuser);

         echo '<div class="col-sm-4 grid-margin mt-2">
<div class="card"> 
<img style="height:200px;
 width:300px;" src="'.$rowU['proflie'].'">
<div class="card-body">
 <h4><a style="  color: #000000; 
 text-decoration: none;
 font-size: 18px;
 letter-spacing: 1.1px;
 font-family: cursive;" href="profile.php?username='.$rowU['username'].'" ><b>'.$rowU['name'].'</b></a></h4>
 <p>'.$rowU['bio'].'</h6>

               </div>   </div>
</div>'; 
      echo  '</div></div>';
    }
  }
    ?>
</div>
</main>
<?php
require('includes/footer.php');
?>