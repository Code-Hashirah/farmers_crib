<?php
$title="Registration Page";
    require_once "header.php";
    require_once "database.php";
    require_once "Reg-Login-Ctrl.php";
    require_once "userClass.php";
    $error=[];
    if(isset($_POST['Register'])){
       if(empty($_POST['Name'])){
            $error['nameErr']="cannot be empty";
       }
       else{
        $name=$_POST['Name'];
       }

       if(empty($_POST['Address'])){
        $error['addErr']="cannot be empty";
         }
        else{
            $address=$_POST['Address'];
        }
       
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
         if($_POST['Re-password']!=$_POST['Password']){
            $error['confirmErr']="Passwords do not match";
         }
        $image=$_FILES['Image']['name'];
        $tmp_name=$_FILES['Image']['tmp_name'];
        $path='files/'.$image;
        $img_ext=pathinfo($path,PATHINFO_EXTENSION);
        if($img_ext!='jpg' && $img_ext!="png" && $img_ext!="jpeg" && $img_ext!="gif"){
            $error['imgErr']="*Invalid file type";
        }
            $picPath=move_uploaded_file($tmp_name,$path);
            $register=new User();
            // decaling again o 
            $name=$_POST['Name'];
            $address=$_POST['Address'];
            $role="Client";
            $phone=$_POST['Phone'];
            $password=$_POST['Password'];
            $register->signUp_user($name, $address, $phone, $password, $path, $role);
    }
?>

<body>

<main class="row w-100">
    <!-- Registration Form -->
<div class="container mt-5 col-6">
    <h2 class="text-centre">Register</h2>
    <form id="registerForm" action="signUp.php" method="post" enctype="multipart/form-data">
        <div class="form-group my-3">
            <label for="username">Name</label>
            <input name="Name"  value="<?php echo array_key_exists('Name',$_POST)? $_POST['Name']: ''  ?>" type="text" class="form-control" id="username" placeholder="Enter name" >
            <label for="" class="text-danger"> 
            <?php 
            echo array_key_exists('nameErr',$error)?$error['nameErr']: '<span class="text-success">Good</span>'
            ?>    
            </label>
        </div>
        <div class="form-group my-3">
            <label for="email">Phone number</label>
            <input name="Phone" value="<?php echo array_key_exists('Phone',$_POST)? $_POST['Phone']: ''  ?>" type="tel" class="form-control" id="email" placeholder="Phone" >
            <label for="" class="text-danger"> 
            <?php 
            echo array_key_exists('phoneErr',$error)?$error['phoneErr']: '<span class="text-success">Good</span>'
            ?>    
            </label>
        </div>
        <div class="form-group my-3">
            <label for="password">Password</label>
            <input name="Password" value="<?php echo array_key_exists('Password',$_POST)? $_POST['Password']: ''  ?>"  type="password" class="form-control" id="password" placeholder="Password" >
            <label for="" class="text-danger"> 
            <?php 
            echo array_key_exists('passErr',$error)?$error['passErr']: '<span class="text-success">Good</span>'
            ?>    
            </label>
        </div>
        <div class="form-group my-3">
            <label for="password">Re-enterPassword</label>
            <input name="Re-password"  type="password" class="form-control" id="password" placeholder="Re-type Password" >
            <label for="" class="text-danger"> 
            <?php 
            echo array_key_exists('confirmErr',$error)?$error['confirmErr']: ' '
            ?>    
            </label>
        </div>

        <div class="form-group my-3">
            <label for="password">Address</label>
            <input name="Address" value="<?php echo array_key_exists('Address',$_POST)? $_POST['Address']: ''  ?>" type="text"  class="form-control" id="password" placeholder="address" >
            <label for="" class="text-danger"> 
            <?php 
            echo array_key_exists('addErr',$error)?$error['addErr']: '<span class="text-success">Good</span>'
            ?>    
            </label>
        </div>

        <div class="form-group my-3">
            <label for="password">Profile pic</label>
            <input name="Image" type="file" class="form-control" id="password" placeholder="file" >
        </div>
        <button type="submit" name="Register" class="btn btn-primary my-3">Get started</button>
        <a href="index.php" class="btn btn-danger my-3">Cancel</a>
        <p>Already have an account? <a href="signIn.php" class="btn text-success">Sign in</a></p>
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
<!-- footer import code  -->
<?php
require_once "footer.php";
?>
