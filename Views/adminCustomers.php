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

include('../Models/customerDatabase.php');
$result=mysqli_query($connect,$sql);
?>

<!DOCTYPE html>
<html>
   <head>
      <title>Customers</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital@0;1&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
      <link rel="stylesheet" href="../css/adminCustomerstyle.css">
   </head>

  <body>
    <div class="customer-table">
      <h2>Customers</h2>
         <table>
            <thead>
               <tr>
                  <th>Customer ID</th>
                  <th>Customer Name</th>
                  <th>Customer Email</th>
                  <th>Operations</th>
               </tr>
            </thead>
         

            <?php while($r=mysqli_fetch_assoc($result)){ ?>
            <tbody>
               <tr>
                  <td><?php echo $r["id"]?></td>
                  <td><?php echo $r["name"]?></td>
                  <td><?php echo $r["email"]?></td>
                  <td>
                  <a href="customerUpdate.php?update_customer_id=<?php echo $r["id"]; ?>"><button class="customerEdit-button">Edit</button></a>
                  <a href="customerDelete.php?delete_customer_id=<?php echo $r["id"]; ?>"><button class="customerDelete-button" onclick="return confirm('Delete this account?');">Delete</button></a>
                  </td>
               </tr>
            </tbody>
            
            <?php } ?>
         </table>
         <a href="customerAdd.php"><button class="customerAdd-button">Add</button></a>
         <a href="adminDashboard.php"><button class="customerBack-button">Back</button></a>
    </div>
  </body>
</html>