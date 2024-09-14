<?php
$title="Registration Page";
    require_once "header.php";
    require_once "database.php";
    require_once "userClass.php";
    require_once "navbar.php";
?>

<!-- Hero Section -->
<section class="hero-section text-center">
    <div class="container">
        <h1 class="display-4">Welcome to <bold class="text-success display-1">F</bold>armers  <bold class="text-warning display-1">C</bold>rib</h1>
        <p class="lead">Outsource your farm labour needs efficiently and effectively.</p>
        <a href="signUp.php" class="btn btn-primary btn-lg">Get Started</a>
    </div>
</section>

<body>

<main class="row w-100">
    <!-- Registration Form -->
<div class="container mt-5 col-6">
    <h2 class="text-centre">Register</h2>
    <form id="registerForm">
        <div class="form-group my-3">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Enter username" required>
        </div>
        <div class="form-group my-3">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" required>
        </div>
        <div class="form-group my-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary my-3">Register</button>
        <a href="index.php" class="btn btn-danger my-3">Cancel</a>
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
