<?php
require_once "header.php";
?>
<body>

<!-- Registration Form -->
<div class="container mt-5 w-50">
    <h2>Register</h2>
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
<!-- footer import code  -->
<?php
require_once "footer.php";
?>
