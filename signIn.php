<?php
$title="Login Page";
    require_once "header.php";
    require_once "database.php";
    require_once "userClass.php";
    require_once "navbar.php";
?>

<!-- Login Form -->
<div class="container mt-5 w-50">
    <h2>Login</h2>
    <form id="loginForm">
        <div class="form-group my-2">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" required>
        </div>
        <div class="form-group my-2">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary my-3">Login</button>
        <a href="index.php" class="btn btn-danger my-3">Cancel</a>

        <p>Don't have an account yet? <a href="signUp.php" class="btn text-success">Sign Up</a></p>
        
    </form>
</div>

<?php
require_once "footer.php";
?>
