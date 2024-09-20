<?php
require_once "../database.php";
require_once "../userClass.php";
if(isset($_POST['delete'])){
$id=$_POST['Id'];
if($id){
    $delete_labourer=new User();
    $delete_labourer->delete_labourer($id);
}
}