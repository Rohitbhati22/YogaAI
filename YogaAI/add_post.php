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
    <title>Add Post</title>
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
$typeu = $row['type'];

if(isset($_POST['text'])){
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $cid = mysqli_real_escape_string($conn, $_POST['cid']);
    $sql2 = "INSERT INTO post(cap, url, type, user_id) VALUES ('$content', '#', 'text', '$id')";
    $res1 = mysqli_query($conn, $sql2);
    if($res1){
        header('Location: dash.php');
    }

}
if(isset($_POST['class'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $dic = mysqli_real_escape_string($conn, $_POST['dic']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    $sql2 = "INSERT INTO class(user_id, name, dic, price) VALUES ('$id', '$name', '$dic', '$price')";
    $res1 = mysqli_query($conn, $sql2);
    if($res1){
        header('Location: dash.php');
    }

}
if(isset($_POST['yt'])){
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $url = mysqli_real_escape_string($conn, $_POST['url']);

    $sql2 = "INSERT INTO post(cap, url, type, user_id) VALUES ('$content', '$url', 'video', '$id')";
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
        $sql2 = "INSERT INTO post(cap, url, type, user_id) VALUES ('$content', '$target_file', 'image', '$id')";
        $res1 = mysqli_query($conn, $sql2);
        if($res1){
            header('Location: dash.php');
        }
    }
}

?>

<main>
<div class="mt-4">

<div id="text">

<center>
<form method="post" action="">
				<h2 class="title">ADD TEXT POST</h2>

                <div class="input-div mt-4">
           		   <div class="div">
           		   	    <input name="content" type="text" placeholder="Your Thought" require/>
           		   </div>
           		</div>
            
                   <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                       <label>ADD This Post In This Class</label>
                          <select style="color:#000;" class="form-control" name="category" >
  <?php
                          $sqlyc = "SELECT * FROM class where user_id = '$id' ORDER BY class_id DESC";
$resyc = mysqli_query($conn, $sqlyc); 

      while ($row4 = mysqli_fetch_array($resyc)) {
  $title = $row4['name'];
  $class_id = $row4['class_id'];
  echo'<option value="'.$class_id.'">'.$title.'</option>';

      }
  ?>
  </select>
  </div>

                                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                           <input class="btn btn-primary" style="background: linear-gradient(-45deg, #cf11da 0%, #3482fd 100%);
                                           border:none" type="submit" name="text"  value="POST"></input>
                                            </div>
                                        </form>
</center>

</div>

<div id="image">
<div  class="row">
                              <div class="col-md-7">
                                  <center>
                                  <img id="myImg" src="#">
                                  </center>
                              </div>
                              <div class="col-md-5">

<form method="post" action="" enctype="multipart/form-data">
				<h2 class="title">ADD IMAGE POST</h2>
                                          
                <div class="input-div mt-4">
           		   <div class="div">
           		   	    <input class="input" id="textinput" name="content" type="text" placeholder="Your Thought"/>
           		   </div>
           		</div>

                   <div class="input-div mt-4">
           		   <div class="div">

                      <input class="input" id="imgfile" name="imgfile" type='file' />
                              </div>
                          </div>

                          <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                          <label>ADD This Post In This Class</label>
                          <select style="color:#000;" class="form-control" name="category" >
  <?php
                          $sqlyc = "SELECT * FROM class where user_id = '$id' ORDER BY class_id DESC";
$resyc = mysqli_query($conn, $sqlyc); 

      while ($row4 = mysqli_fetch_array($resyc)) {
  $title = $row4['name'];
  $class_id = $row4['class_id'];
  echo'<option value="'.$class_id.'">'.$title.'</option>';

      }
  ?>
  </select>
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

<div id="video">
<div  class="row">
                              <div class="col-md-7">
                                  <center>
                                  <iframe id="yt" width="420" height="315"
src="https://www.youtube.com/embed/iycfB8rLFbE">
</iframe>
                                  </center>
                              </div>
                              <div class="col-md-5">

<form method="post" action="">
				<h2 class="title">ADD YOUTUBE VIDEO POST</h2>
                                          
                <div class="input-div mt-4">
           		   <div class="div">
           		   	    <input class="input" name="content" type="text" placeholder="Your Thought" />
           		   </div>
           		</div>

                   <div class="input-div mt-4">
           		   <div class="div">

                      <input class="input" id="urlyt" name="url" type='text' placeholder="Your Video URL" require/>
                              </div>
                          </div>

                          <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                          <label>ADD This Post In This Class</label>
                          <select style="color:#000;" class="form-control" name="category" >
  <?php
                          $sqlyc = "SELECT * FROM class where user_id = '$id' ORDER BY class_id DESC";
$resyc = mysqli_query($conn, $sqlyc); 

      while ($row4 = mysqli_fetch_array($resyc)) {
  $title = $row4['name'];
  $class_id = $row4['class_id'];
  echo'<option value="'.$class_id.'">'.$title.'</option>';

      }
  ?>
  </select>
  </div>

                          <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                          <input class="btn btn-primary" id="urlsave" style="background: linear-gradient(-45deg, #cf11da 0%, #3482fd 100%);margin-right:7px;
                                           border:none"  value="VIEW DEMO"></input>
                                           <input class="btn btn-primary" style="background: linear-gradient(-45deg, #cf11da 0%, #3482fd 100%);
                                           border:none" type="submit" name="yt"  value="POST"></input>
                                            </div>
                                        </form>
           		   </div>
           		</div>
                                            
                                            
    </center>
</div>

<div id="class">
<center>
<form method="post" action="">
				<h2 class="title">ADD NEW CLASS</h2>

                <div class="input-div mt-4">
           		   <div class="div">
           		   	    <input name="name" type="text" placeholder="Your Class Name" require/>
           		   </div>
           		</div>
                   <div class="input-div mt-4">
           		   <div class="div">
           		   	    <input name="dic" type="text" placeholder="Your Class Discartion" require/>
           		   </div>
           		</div>
                   <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">                  
                          <label for="price">If You Enter 0 Your Class Will BE Free To Join</label>
           		   	    <input name="price" type="text" placeholder="Enter Your Class Jion Monthly Fee" require/>
           		   </div>                                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                           <input class="btn btn-primary" style="background: linear-gradient(-45deg, #cf11da 0%, #3482fd 100%);
                                           border:none" type="submit" name="class"  value="ADD CLASS"></input>
                                            </div>
                                        </form>
</center>
</div>


</div>


</main>

<script>
    function youtube_parser(url){
    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
    var match = url.match(regExp);
    return (match&&match[7].length==11)? match[7] : false;
}

    window.addEventListener('load', function() {
  document.querySelector('input[type="file"]').addEventListener('change', function() {
      if (this.files && this.files[0]) {
          var img = document.querySelector('img');
          img.onload = () => {
              URL.revokeObjectURL(img.src);  // no longer needed, free memory
          }

          img.src = URL.createObjectURL(this.files[0]); // set src to blob url
      }
  });
});

let urlsave = window.document.getElementById('urlsave');
let text = window.document.getElementById('text');
let image = window.document.getElementById('image');
let video = window.document.getElementById('video');
let yturl = window.document.getElementById('urlyt');
let classL = window.document.getElementById('class');
let yt = document.getElementById('yt');

var url_string = window.location.href; //window.location.href
var url = new URL(url_string);
var c = url.searchParams.get("work");
if(c == "text"){
    text.style.display = 'block';
    image.style.display = 'none';
    video.style.display = 'none';
    classL.style.display = 'none';

}
else if(c== "image"){
    text.style.display = 'none';
    image.style.display = 'block';
    video.style.display = 'none';
    classL.style.display = 'none';

}
else if(c=="class"){
    text.style.display = 'none';
    image.style.display = 'none';
    video.style.display = 'none';
    classL.style.display = 'block';

}
else {
    text.style.display = 'none';
    image.style.display = 'none';
    video.style.display = 'block';
    classL.style.display = 'none';

}
urlsave.addEventListener('click', ()=>{
    let url  = youtube_parser(yturl.value);
    yturl.value = url;
      url = 'https://www.youtube.com/embed/'+url;
      yt.src = url;
});
</script>
<?php
require('includes/footer.php');
?>