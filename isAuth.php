<?php 
// session_start();
    if (empty($_SESSION['Phone'])){
        header('Location:index.php');
    }
?>