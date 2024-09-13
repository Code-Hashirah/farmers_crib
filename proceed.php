<?php 
    if (empty($_SESSION['Phone'])){
        header('Location:index.php');
    }

    else{
        header('Location:labourers.php');
    }
?>