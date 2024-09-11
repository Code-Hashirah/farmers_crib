<?php
    require_once "adminHeader.php";
?>


<div class="container-fluid">
            <h1 class="mt-4">Admin Dashboard</h1>
            <p>Welcome to the admin panel. Use the sidebar to navigate through the options.</p>
        </div>
    <!-- Page Content -->

    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg sidenav border-bottom">
            <?php
                require_once "navAdmin.php";
            ?>
            <!-- <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button> -->
        </nav>

      
        <main class="row container-fluid">
    
        </main>

<?php 
require_once "adminFooter.php";
?>
