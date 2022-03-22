
<footer class="container-fluid py-5 mt-4">
<div class="container">
   <div class="row">
      <div class="col-md-6">
         <div class="row">
            <div class="col-md-6 ">
               <div class="logo-part">
                <img src="src/images/logo.png" class="w-50 logo-footer" >

                  <p>Revasdevda road Mandsour Univercity</p>
                  <p>start your traning with our modern Ai technology </p>
               </div>
            </div>
            <div class="col-md-6 px-4">
               <h6> About us</h6>
               <p>we made this platform to help you in your yoga jureney </p>
               <a href="#" class="btn-footer"> Trainer </a><br>
               <a href="#" class="btn-footer"> Subscription</a>
            </div>
         </div>
      </div>
      <div class="col-md-6">
         <div class="row">
            <div class="col-md-6 px-4">
               <h6> Help us</h6>
               <div class="row ">
                  <div class="col-md-6">
                     <ul>
                        <li> <a href="#"> Home</a> </li>
                        <li> <a href="#"> About</a> </li>
                        
                        
                     </ul>
                  </div>
                  <div class="col-md-6 px-4">
                     <ul>
                        <li> <a href="#"> Ai</a> </li>
                        <li> <a href="#"> Team</a> </li>
                        
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-md-6 ">
               <h6> Contect us</h6>
               <div class="social">
                  <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
               </div>
               <form class="form-footer my-3">
                  <input type="text"  placeholder="feedback...." name="search">
                  <input type="button" value="Go" >
               </form>
               <p>That's technology is based on AI machinery </p>
            </div>
         </div>
      </div>
   </div>
</div>
</footer>


<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script src="src/boot/bootstrap.bundle.min.js"></script>
<script>
   const menuToggle = document.getElementById('menuToggle');
const menuItems = document.getElementById('menu_top');


function toogleMenu(){
    if(menuItems.style.display == "none"){
        menuItems.style.display = "flex"
    }
    else{
        menuItems.style.display = "none"
    }
};

menuToggle.addEventListener('click', toogleMenu);
</script>
</body>
</html>