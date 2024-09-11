<?php
    require_once "header.php";
    // require_once "database.php";
    // require_once "productClass.php";
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

<!-- Features Section -->
<section class="features-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Find Skilled Laborers</h5>
                        <p class="card-text">Access a database of vetted and experienced farm workers.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Easy Scheduling</h5>
                        <p class="card-text">Schedule laborers according to your farm's needs and timeline.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Secure Enough Manpower</h5>
                        <p class="card-text">Ensure reliable workers and grow your farm with quick and effective steps</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once "footer.php";
?>
</html>
