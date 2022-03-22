<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: login.php');
}
require('acc/db.php'); 
require('includes/head.php');
require('includes/nav.php');

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

$no_of_records_per_page = 9;
$offset = ($pageno-1) * $no_of_records_per_page; 

$total_pages_sql = "SELECT COUNT(*) FROM post where user_id = '$uid' ORDER BY `post_id` DESC";
$result = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);


$sqlpost = "SELECT * FROM post where user_id = '$uid' ORDER BY `post_id` DESC LIMIT $offset, $no_of_records_per_page";
$resPost = mysqli_query($conn, $sqlpost);

$appcount = mysqli_num_rows($resPost);

if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno'];
} else {
  $pageno = 1;
}

$no_of_records_per_page = 9;
$offset = ($pageno-1) * $no_of_records_per_page; 

$total_pages_sql_c = "SELECT COUNT(*) FROM join_class where user_id = '$uid'";
$result_c = mysqli_query($conn,$total_pages_sql_c);
$total_rows_c = mysqli_fetch_array($result_c)[0];
$total_pages_c = ceil($total_rows_c / $no_of_records_per_page);


$sqlclass = "SELECT * FROM join_class where user_id = '$uid' LIMIT $offset, $no_of_records_per_page";
$resclass = mysqli_query($conn, $sqlclass);

?>

<main>
<div class="container mt-4">
  <div class="row">
    <div class="col-md-3">
    <img class="userImg" src="<?php echo $profile ?>" alt="Avatar">

    </div>
    <div class="col-md-9">
      <h3 style="margin-top: 44px;"><?php echo $name ?></h3>
      <h5>@<?php echo $username ?></h5>
      <h4><?php echo $bio ?></h4>
      <div class="buttons">
                            <button class="mbtn_a" onclick="window.open('http://localhost/YogaAI/ai.php')">USE AI</button>
                            <button class="mbtn_a" onclick="window.open('http://localhost/YogaAI/edit_profile.php')">Edit Profile</button>
                            <button class="mbtn_a" onclick="window.open('http://localhost/YogaAI/social.php')">SOCIAL</button>
                       </div>
    </div>
  </div>

  <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">POST</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#classes" type="button" role="tab" aria-controls="profile" aria-selected="false">JOINED CLASSES</button>
  </li>
  <?php
                                        if($typeu == "teacher"){
                                          echo '<li class="nav-item" role="presentation">
                                          <button class="nav-link" id="yc-tab" data-bs-toggle="tab" data-bs-target="#yc" type="button" role="tab" aria-controls="yc" aria-selected="false">YOUR CLASSES</button>
                                        </li>';
                                        }
                                        ?>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <div class="row">
           

           <?php 
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
            <div>  <a style="color: #000;text-decoration: none;"  href="comments.php?post_id='.$post_id.'"><i class="bi bi-chat-quote-fill"></i> Comments</a></div>
                          </div>   </div>
    </div>'; 
           }
           else if($type == 'image'){
            echo  '<div class="card-body">
            <h6><b>'.$cap.'</b></h6>
            <img style="height:200px;
            width:300px;" src="'.$url.'">
            <div>  <a style="color: #000;text-decoration: none;"  href="comments.php?post_id='.$post_id.'"><i class="bi bi-chat-quote-fill"></i> Comments</a></div>
                          </div>   </div>
    </div>'; 
           }
           else{
            echo  '<div class="card-body">
            <h6><b>'.$cap.'</b></h6>
            <iframe id="yt" width="300" height="200px"
            src="https://www.youtube.com/embed/'.$url.'"></iframe>
            <div>  <a style="color: #000;text-decoration: none;"  href="comments.php?post_id='.$post_id.'"><i class="bi bi-chat-quote-fill"></i> Comments</a></div>
            </div>   </div>
    </div>'; 
           }
         }
         ?>
         
        
                                   
                                      
</div>
<div class="container-fluid">
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


  </div>

  <div class="tab-pane fade" id="classes" role="tabpanel" aria-labelledby="profile-tab">
  <?php 

while ($row = mysqli_fetch_assoc($resclass)) {
                       $id=$row['class_id'];
                       $sql = "SELECT * FROM class  WHERE class_id = '$id'";
                       $res = mysqli_query($conn, $sql);
                       
                       $row1 = mysqli_fetch_assoc($res);
                       
                      echo '<div class="col-sm-4 grid-margin m-2">
           <div class="card">';
            echo  '<div class="card-body">
            <h4><a style="color: #000;
            text-decoration: none;" href="class.php?key='.$id.'"><b>'.$row1['name'].'</b></a></h4>
            <p>'.$row1['dic'].'</p>
                          </div>   </div>
    </div>'; 
         }
         ?>
         
        
         <div class="container-fluid">
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

  </div>                                
         
  <?php
                                       
                                        if($typeu == "teacher"){
                                          echo '<div class="tab-pane fade" id="yc" role="tabpanel" aria-labelledby="yc-tab">';
                                          $total_pages_sql_yc = "SELECT COUNT(*) FROM class where user_id = '$uid'";
                                          $result_yc = mysqli_query($conn,$total_pages_sql_yc);
                                          $total_rows_yc = mysqli_fetch_array($result_yc)[0];
                                          $total_pages_yc = ceil($total_rows_yc / $no_of_records_per_page);
                                          
                                          
                                          $sqlyclass = "SELECT * FROM class where user_id = '$uid' LIMIT $offset, $no_of_records_per_page";
                                          $resyclass = mysqli_query($conn, $sqlyclass);
                                          while ($row = mysqli_fetch_assoc($resyclass)) {
                                            $id=$row['class_id'];
                                            
                                           echo '<div class="col-sm-4 grid-margin m-2">
                                <div class="card">';
                                 echo  '<div class="card-body">
                                 <h4><a style="color: #000;
                                 text-decoration: none;" href="class.php?key='.$id.'"><b>'.$row['name'].'</b></a></h4>
                                 <p>'.$row['dic'].'</p>
                                               </div>   </div>
                         </div>'; 
                              }
                                          echo '</div>';
                                       
                                        }
                                        ?>

</div>

  </div>
</div>
</div>

<?php
    if($typeu == "teacher"){
                                          echo '<div class="fab-container">
  <div class="fab fab-icon-holder">
  <i  style="font-size: 35px;
  font-weight: 700;" class="bi bi-plus"></i>
  </div>
  <ul class="fab-options">
    <li>
      <div class="fab-icon-holder">
        <a href="add_post.php?work=text" style="all:unset"><i class="bi bi-chat-quote"></i></a>
      </div>
    </li>
    <li>
      <div class="fab-icon-holder">
        <a href="add_post.php?work=video" style="all:unset"><i class="bi bi-pause-btn"></i></a>
      </div>
    </li>
    <li>
      <div class="fab-icon-holder">
        <a href="add_post.php?work=image" style="all:unset"><i class="bi bi-image-fill"></i></a>
      </div>
    </li>
  <li>
                                          <div class="fab-icon-holder">
                                            <a href="add_post.php?work=class" style="all:unset"><i class="bi bi-pencil-square"></i></a>
                                          </div>
                                        </li> </ul>
                                        </div>';
                                        }
                                        ?>
 

</main>


<?php
require('includes/footer.php');
?>