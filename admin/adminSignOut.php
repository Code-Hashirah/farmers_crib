<?php
session_start();
session_destroy();
$_SESSION['Phone']=false;
header('Location:index.php');
?>