<?php
session_start();
if(empty($_SESSION['adminId'])){
	header("location:adminLogin.php");
}
else if(isset($_GET['out'])){
	session_destroy();
	header("location:adminLogin.php");
}
?>
<?php
  include("../Models/productDatabase.php");

  if(isset($_GET['delete_product_id']))
  {
    $id=$_GET['delete_product_id'];

    $sql="delete from `products` where `id` = '$id'";
    $result=mysqli_query($connect,$sql);

    if($result)
    {
      //echo "Deleted Successfully";
      header('location: adminProducts.php');
    }

    else
    {
      die(mysqli_error($connect));
    }
  }
?>