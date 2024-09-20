<?php
$title = "Farmers's Crib::Add Lbourer";
require_once "../database.php";
require_once "../userClass.php";
require "adminHeader.php";


if(isset($_POST['Add-labourer'])){
    $name=$_POST['Name'];
    $address=$_POST['Address'];
    $phone=$_POST['Phone'];
    $password=$_POST['Password'];
    $image_name=$_FILES['Image']['name'];
    $tmp_name=$_FILES['Image']['tmp_name'];
    $path='../files/'.$image_name;
    $role="Labourer";
    $img_ext=pathinfo($path,PATHINFO_EXTENSION);

    if($img_ext!='jpg' && $img_ext="png" && $img_ext!="jpeg" && $img_ext="gif"){
        $error['imgErr']="*Invalid file type";
    }
// input set to variables 
    // if(count($error)==0){
        $picPath=move_uploaded_file($tmp_name,$path);
        $addlabourer= new User();
        $addlabourer->add_labourer($name,$address,$phone, $password,$path,$role);
    // }
}
?>
</head>

<body>
    <main class="row container-fluid">
    <section class="col-md-3 col-sm-3 sidenav">
            <?php
                require_once "navAdmin.php";
            ?>

</section>
    <section class="col-md-9  add-up">
        
           <form action="addLabourers.php" method="post" class="addlabourerForm" enctype="multipart/form-data">
            <h3 id="sign-up-h3" style="color: rgb(27, 6, 6);">Add labourers Farmer's Crib</h3>
                <div class="input">
                    <label class="label" for="">Name</label>
                    <input  class="inpt-tag" name="Name" type="text">
                </div>
                <div class="input">
                    <label class="label" for=""> Address</label>
                    <input  class="inpt-tag" name="Address" type="text">
                </div>
                <div class="input">
                    <label class="label" for=""> Phone</label>
                    <input  class="inpt-tag" name="Phone" type="number">
                </div>
                <div class="input">
                    <label class="label" for=""> Password</label>
                    <input  class="inpt-tag" name="Password" type="password">
                </div>
                <div class="input">
                    <label class="label" for="">Image</label>
                    <input  class="inpt-tag" name="Image" type="file">
                </div>
              
                <div class="input">
                  <button class="btn btn-primary" name="Add-labourer" type="submit">Add to Records</button>
                </div>
                <div class="input">
                   <a href="admin-dash.php" class="cancel">Cancel</a>
                </div>
            </form>
       
            <section class="addup-pic">
              
                    <img src="../assets/farmer1.jpg" alt="farmer1" class="d-block signup-img ">
                   
                </section>
        </section>
    </main>
<?php require_once "adminFooter.php" ?>
</body>
</html>