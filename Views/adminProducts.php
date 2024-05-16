<?php
session_start();
if(empty($_SESSION['adminId'])){
	header("location:adminLogin.php");
}
else if(isset($_GET['out'])){
	session_destroy();
	header("location:adminLogin.php");
}
include('../Views/adminHeader.php');

include('../Models/productDatabase.php');
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Products</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital@0;1&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
      <link rel="stylesheet" href="../css/adminDashboardstyle.css">
      <link rel="stylesheet" href="../css/adminProductstyle.css">
   </head>

   <body>
   <div class="product-table">
    <h2>Products</h2>
    <table>
      <thead>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Image</th>
            <th>Product Operations</th>
          </tr>
      </thead>

        <?php while($r=mysqli_fetch_assoc($result)){ ?>
          <tbody>
            <tr>
              <td><?php echo $r["id"]?></td>
              <td><?php echo $r["name"]?></td>
              <td><?php echo $r["price"]?></td>
              <td><img src="../uploaded_img/<?php echo $r['image_01'];?>"></td>
              <td>
                <a href="productEdit.php?edit_product_id=<?php echo $r["id"]; ?>"><button class="productEdit-button">Edit</button></a>
                <a href="productDelete.php?delete_product_id=<?php echo $r["id"]; ?>"><button class="productDelete-button" onclick="return confirm('Delete this account?');">Delete</button></a>
              </td>
            </tr>
          </tbody>
        <?php } ?>
        </table>
        <a href="productAdd.php"><button class="productAdd-button">Add</button></a>
        <a href="adminDashboard.php"><button class="productBack-button">Back</button></a>
   </div>
      
   </body>
</html>