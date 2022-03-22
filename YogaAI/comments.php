<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: login.php');
}
require('acc/db.php'); 
require('includes/head.php');
require('includes/nav.php');

$noComment = false;

$username = $_SESSION['username'];
$sql = "SELECT * FROM user  WHERE username = '$username'";
$res = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($res);
$profile = $row['proflie'];
$uid = $row['user_id'];
$name = $row['name'];
$bio = $row['bio'];
$typeu = $row['type'];

if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno'];
} else {
  $pageno = 1;
}
$post_id = $_GET['post_id'];
$no_of_records_per_page = 9;
$offset = ($pageno-1) * $no_of_records_per_page; 

if(isset($_POST['add'])){

    $data = mysqli_real_escape_string($conn, $_POST['data']);
    $sql2 = "INSERT INTO comments(post_id, user_id, data) VALUES ('$post_id', '$uid', '$data')";
    $res1 = mysqli_query($conn, $sql2);
    
}


$total_pages_sql = "SELECT COUNT(*) FROM comments WHERE post_id = '$post_id' ORDER BY c_id  DESC LIMIT $offset, $no_of_records_per_page";

$result = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sqlpost = "SELECT * FROM comments WHERE post_id = '$post_id' ORDER BY c_id  DESC LIMIT $offset, $no_of_records_per_page";
$resPost = mysqli_query($conn, $sqlpost);

$appcount = mysqli_num_rows($resPost);

if($total_rows == 0){
    $noComment = true;
}


?>

<main>
<div class="container mt-4">
    <center>
    <h2 class="m-4">COMMENTS✍️</h2>
    </center>

    
           <?php 

           if($noComment){
               echo '<center>
               <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
           <lottie-player src="https://assets9.lottiefiles.com/private_files/lf30_mMEl1Z.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
           <h2 class="mt-2">BE THE FIREST COMMENTER</h2>
           </center>';
           }
           else {
            while ($row = mysqli_fetch_assoc($resPost)) {
                $id=$row['user_id'];
                $post_id=$row['post_id'];
                $data = $row['data'];

                $sqlU = "SELECT * FROM user  WHERE user_id = '$id'";
                $resU = mysqli_query($conn, $sqlU);
                
                $rowU = mysqli_fetch_assoc($resU);
                $profile = $rowU['proflie'];
                $name = $rowU['name'];                
                
               echo '<div class="col-sm-4 grid-margin mt-2">
    <div class="card">
    <div style="display: flex;
    flex-direction: row;
    margin-top: 14px;
    justify-content: start center;">
    <img style="width:60px;
    height: 60px;
    border-radius: 50%;
    margin-right:14px;
    margin-left:14px;
    box-shadow: rgba(0, 0, 0, 0.05) 0px 0.5rem 1rem;" src="'.$profile.'" alt="Avatar">
    <h4 style="margin-top: 14px;">'.$name.'</h4>
    </div>
    ';

    echo  '<div class="card-body">
     <p><b>'.$data.'</b></p>
                   </div>   </div>
</div>'; 
    
  }
           }

         ?>
         
        
                                   
                                      
</div>
<div class="container-fluid mt-2">
<ul class="pagination">
    <li><a class="btn btn-primary m-1" href="?pageno=1">First</a></li>
    <li class="btn btn-primary <?php if($pageno <= 1){ echo 'disabled'; } ?> m-1">
        <a style="color: #FFFFFF;text-decoration: none;" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
    </li>
    <li class="btn btn-primary <?php if($pageno >= $total_pages){ echo 'disabled'; } ?> m-1">
        <a style="color: #FFFFFF;text-decoration: none;"  href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
    </li>
    <li><a class="btn btn-primary m-1" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
</ul></div>


<center>
<form method="post">
<div class="line">
  <div class="col-auto" style="margin-right: 14px;">
    <label for="inputPassword6" class="col-form-label">YOUR COMMENT</label>
  </div>
  <div class="col-auto" style="margin-right: 14px;">
    <input type="text" id="data" name="data" class="form-control">
  </div>
  <div class="col-auto">
  <input class="btn btn-primary" style="background: linear-gradient(-45deg, #cf11da 0%, #3482fd 100%);
                                           border:none" type="submit" name="add"  value="ADD"></input>
  </div>
</div>
</form>
</center>
</div>

</main>


<?php
require('includes/footer.php');
?>