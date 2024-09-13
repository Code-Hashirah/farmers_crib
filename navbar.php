<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand text-bg-success rounded-2" href="index.php">Farmers Crib</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
        <li class="list"><a class="nav-link" href="index.php">Home</a></li>
                <li class="list"><a class="nav-link" href="labourers.php">Farmers</a></li>
            <li class="list"><a class="nav-link" href="about.php">About us</a></li>
            <?php if(!empty($_SESSION['Phone'])){ ?>
                <li class="list"><a class="link-list" href="logout.php">Logout</a></li>
        <?php     } ?>
        <?php if(empty($_SESSION['Phone'])){ ?>
            <li class="nav-item">
                <a class="nav-link" href="signIn.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="signUp.php">Register</a>
            </li>
        <?php   } ?>
            
        </ul>
    </div>
</nav>