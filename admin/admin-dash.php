<?php
$title="Farmers Crib ::Admin";
require_once "../database.php";
    require_once "adminHeader.php";
    require_once "userClass.php";
?>

<main class="row container-fluid">
<div class="container-fluid col-12">
            <h1 class="mt-4">Admin Dashboard</h1>
            <p>Welcome to the admin panel. Use the sidebar to navigate through the options.</p>
        </div>
    <!-- Page Content -->
<section class="col-md-3 col-sm-3 sidenav">
            <?php
                require_once "navAdmin.php";
            ?>

</section>
    
    <main class="col-md-9 col-sm-9 row" id="admin-details">
        <div class="admin-charts col-4">
        <h4>Labourers</h4>

        </div>
        <div class="admin-charts">
            <h4>Users</h4>

        </div>
        <div class="admin-charts">
            <h4>Hires</h4>
        </div>
    </main>

</main>
<?php 
require_once "adminFooter.php";
?>
