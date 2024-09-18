<?php
$title="Login Page";
    require_once "header.php";
    require_once "database.php";
    require_once "userClass.php";
    require_once "Reg-Login-Ctrl.php";
$errorLog=[];
if(isset($_POST['Login'])){
  if(empty($_POST['Phone'])){
    $error['phoneErr']="cannot be empty";
     }
     else{
        $phone=$_POST['Phone'];
     }

     if(empty($_POST['Password'])){
      $error['passErr']="Password ";
   }
   else{
      $password=$_POST['Password'];
   }

   $sign_In=new User();
   $phone=$_POST['Phone'];
   $password=$_POST['Password'];
   $sign_In->login($phone,$password);
}
?>

<main class="row">
    
<!-- Login Form -->
<div class="container mt-5 col-6">
    <h2>Login</h2>
    <form id="loginForm" action="signIn.php" method="post">
        <div class="form-group my-2">
            <label for="email">Phone Number</label>
            <input type="tel" name="Phone" class="form-control" id="email" placeholder="Enter Phone number here.." required>
        </div>
        <div class="form-group my-2">
            <label for="password">Password</label>
            <input type="password" name="Password" class="form-control" id="password" placeholder="Password" required>
        </div>
        <button type="submit" name="Login" class="btn btn-primary my-3">Continue</button>
        <a href="index.php" class="btn btn-danger my-3">Cancel</a>

        <p>Don't have an account yet? <a href="signUp.php" class="btn text-success">Sign Up</a></p>
        
    </form>
</div>
<section class="col-6">
    <!-- ******************************************************************************************* -->
<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

<!-- Indicators/dots -->
<div class="carousel-indicators">
  <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
</div>

<!-- The slideshow/carousel -->
<div class="carousel-inner">
  <div class="carousel-item active">
  <img src="assets/farm1.webp" alt="farm1" class="d-block img w-100 h-25">
  </div>
  <div class="carousel-item">
  <img src="assets/farm5.webp" alt="farm2" class="d-block img img w-100 h-25">
  </div>
  <div class="carousel-item">
  <img src="assets/farm6.webp" alt="farm3" class="d-block img img w-100 h-25">
  </div>
</div>

<!-- Left and right controls/icons -->
<button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
  <span class="carousel-control-next-icon"></span>
</button>
</div>
<!-- end of carousel  -->
<!-- ******************************************************************************************* -->

</section>


</main>

<?php
require_once "footer.php";
?>
