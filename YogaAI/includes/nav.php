<?php
if(!isset($_SESSION['login'])){
   echo '<header>
   <nav id="nav">
   <div id="left">
   <h1 id="logo">Yoga<b>AI</b></h1>
   <img id="menuToggle" src="images/menu.png" height="50px" width="40px">
   </div>
   <ul id="menu_top">
       <li class="item"><i class="bi bi-house-heart-fill"></i><a style="color: #000000; text-decoration: none;" href="index.php"> Home</a></li>
       <li class="item"><i class="bi bi-bookmark-check-fill"></i> Teacher</li>
       <li class="item"><i class="bi bi-person-badge"></i> Learn</li>
       <li class="item"><a href="ai.php"><i class="bi bi-braces"></i> AI</a></li>
       <li class="ai_btn"><a style="color: #FFFFFF; 
       text-decoration: none;
       font-size: 18px;
       letter-spacing: 1.1px;
       font-family: cursive;" href="login.php"><i class="bi bi-person-circle"></i> MY ACCOUNT</a></li>
   </ul>
   </nav>
   </header>';
}
else{
 echo '<header>
 <nav id="nav">
 <div id="left">
 <h1 id="logo">Yoga<b>AI</b></h1>
 <img id="menuToggle" src="images/menu.png" height="50px" width="40px">
 </div>
 <ul id="menu_top">
     <li class="item"><i class="bi bi-house-heart-fill"></i><a style="color: #000000; text-decoration: none;" href="index.php"> Home</a></li>
     <li class="item"><i class="bi bi-bookmark-check-fill"></i> Teacher</li>
     <li class="item"><i class="bi bi-person-badge"></i> Learn</li>
     <li class="item"><a href="ai.php"><i class="bi bi-braces"></i> AI</a></li>
     <li class="ai_btn"><a style="color: #FFFFFF; 
     text-decoration: none;
     font-size: 18px;
     letter-spacing: 1.1px;
     font-family: cursive;" href="dash.php"><i class="bi bi-person-circle"></i> '. $_SESSION['username'] .'</a></li>
 </ul>
 </nav>
 </header>';
}
?>

