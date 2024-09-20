<?php
$title="Farmers Crib ::Admin";
require_once "../database.php";
    require_once "adminHeader.php";
    require_once "../userClass.php";
    $result=new User();
$labourers=$result->getAllLabourers();
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
    
<section class="col-md-9">
    <?php if($labourers!==false){ ?>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Image</th>
                <th>Date Added</th>
                <th>Actions</th>
            </tr>
          <?php if(!empty ($labourers)){
           foreach($labourers as $labourer) { ?>
           <tr> 
                <td><?php echo $labourer['id'] ?></td>
                <td><?php echo $labourer['name'] ?></td>
                <td><?php echo $labourer['phone'] ?></td>
                <td><?php echo $labourer['address'] ?></td>
                <td><img src="<?php echo $labourer['image'] ?>" alt="food item" width="100%" height="100px"></td>
                <td><?php echo $labourer['date_added'] ?></td>
                <td> 
                <form action="delete_labourer.php" method="post">
                    <input type="hidden" name="Id" class="" value="<?php echo $labourer['id'] ?>">
                    <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                    <a href="" class="btn  btn-success">Update</a>
                </form> </td>
            </tr>
        <?php } 
     } 
     else{ ?>
    <h2>No Records  found</h2>
 <?php    }
     ?>
          </table>
     <?php   } 
     
     else{ ?>
     <h2>No Food added at the moment</h2>
  <?php   }?>
       

</main>
<?php 
require_once "adminFooter.php";
?>
