<?php 
session_start();
require('includes/head.php');
require('includes/nav.php');

?>

<main>
    <div id="home">
    <div class="container mt-4">
    <div class="row">
    <div class="col-md-5 justify-content-center">
    <h2 id="topText">Yoga<span class="mtext">AI</span> -<span class="capEffect"></span><span class="cursor">&nbsp;</span></h2>
                        <p>YOGA is an AI Basied Yoga Trainer and A platfrom for Yoga Teacher and Student. We Working On Making Your Yoga Training Easy And More Comfortable, We Are Working on buling a community for Yoga Learner.</p>
                       <div class="buttons">
                            <button class="mbtn" onclick="window.open('http://localhost/YogaAI/ai.php')">TRY NOW</button>
                        
                            <a class="mbtn" style="text-decoration: none;" href="#howto">LEARN MORE</a>
                       </div>
    </div>
    <div class="col-md-7">
    <video src="src/vids/woman.mp4" id="vidYoga"
                     autoplay="autoplay" muted="muted" loop="loop" 
                     playsinline="" type="video/mp4"></video>

    </div>
  </div>
</div>

<div class="container mt-4">
    <center>
    <h2>Why Choose<span class="mtext"> US?</span></h2>
    </center>
  <div class="container">
  <div class="row">
    <div class="col-md-4">
        <center>
    <video src="src/vids/aihelp.mp4" style="width: 300px; height: 300px;"
                     autoplay="autoplay" muted="muted" loop="loop" 
                     playsinline="" type="video/mp4"></video>

<h5>Train With AI That Help You With Your Poses✌️</h5>
</center>
    </div>
    <div class="col-md-4">
    <center>
    <video src="src/vids/trainer.mp4" style="width: 300px; height: 300px;"
                     autoplay="autoplay" muted="muted" loop="loop" 
                     playsinline="" type="video/mp4"></video>
                     <h5>Find A Great Trainer For You And Learn With More🤞</h5>
                     </center>
    </div>
    <div class="col-md-4">
    <center>
    <video src="src/vids/community.mp4" style="width: 300px; height: 300px;"
                     autoplay="autoplay" muted="muted" loop="loop" 
                     playsinline="" type="video/mp4"></video>
    <h5>Be A Part Of community Of Yoga Learner and Everyone  👊</h5>
    </center>
    </div>
  </div>
  
  </div>

</div>

<div class="container mt-5">
    <center>
    <h2>Connect With<span class="mtext"> Peoples❤️</span></h2>
    </center>
  <div class="container mt-4">
  <div class="row">
    <div class="col-md-5">
    <h5 style="margin-top: 24px;">🔍Find The Peoples Like You Who Want To Learn And Connect  😎</h5>
    <p style="margin-top: 14px;">There are many people like you in world who wants to learn yoga but they don't know how to do it or they don't have good gidense for there jurney so our team make this Ai besed mordan yoga training site thet help you is your yoga jurney and make it more effective and productive.
</br> Here we have a social platform for our users where you can make friends and your partners in your yoga jurney</p>
<button class="mbtn" onclick="window.open(window.location.href+'/page.html?a=book')">GO SOCIAL</button>
</div>
    <div class="col-md-7">
    <center>
    <div class="containerGallery">
    <div class="gallery">
                <figure class="gallery__item gallery__item--1">
                    <img src="src/images/im4.webp" alt="Gallery image 1" class="gallery__img">
                </figure>
                <figure class="gallery__item gallery__item--2">
                    <img src="src/images/im2.webp" alt="Gallery image 2" class="gallery__img">
                </figure>
                <figure class="gallery__item gallery__item--3">
                    <img src="src/images/woman.jpg" alt="Gallery image 3" class="gallery__img">
                </figure>
                <figure class="gallery__item gallery__item--4">
                    <img src="src/images/im3.webp" alt="Gallery image 4" class="gallery__img">
                </figure>
                </figure>
            </div>
            </div>
     </center>
    </div>

  </div>
  
  </div>

</div>

<div class="container">
    <center>
    <h2>Teach With<span class="mtext"> US!</span></h2>
    </center>
  <div class="container">
  <div class="row">
    <div class="col-md-4">
        <center>
    <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_mjlh3hcy.json" background="transparent"  speed="1"  style="width: 300px; height: 300px;" loop autoplay></lottie-player>
    <h5>Make Your Account As Trainer 🧘🏻‍♀️</h5>
</center>
</div>
    <div class="col-md-4">
    <center>
    <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_z01bika0.json" background="transparent"  speed="1"  style="width: 300px; height: 300px;" loop autoplay></lottie-player>
    <h5>Teach Your Students Online 💻</h5>
</center>
    </div>
    <div class="col-md-4">
    <center>
    <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_n4mneu6r.json" background="transparent"  speed="1"  style="width: 300px; height: 300px;" loop autoplay></lottie-player>
    <h5>Make Money By Teaching 💰</h5>
</center>
    </div>
  </div>
  
  </div>

</div>

<div class="container  mt-5" id="howto">
    <center>
    <h2>How It's<span class="mtext"> Work?</span></h2>
    </center>
    <div class="container mt-4">
  <div class="row">
    <div class="col-md-4">
    <center>
         <img src="src/images/c3.png" style="width: 400px; height: 280px;" alt="">
         <h5>Select Your Yoga Asana 4 Practice</h5>

     </center>
    
    </div>
    <div class="col-md-4">
    <center>
         <img src="src/images/p1.jpg" style="width: 400px; height: 280px;" alt="">
         <h5>Allow The Webcam Permission</h5>
     </center>
    
    </div>
    <div class="col-md-4">
    <center>
         <img src="src/images/p2.jpg" style="width: 400px; height: 280px;" alt="">
         <h5>Practice Yoga Asana And Our AI</h5>

     </center>
    </div>
  </div>
  </div>
  </div>

</div>
</main>

<script src="src/js/home.js"></script>
<?php
require('includes/footer.php');
?>