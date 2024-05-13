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
  include("../Models/customerDatabase.php");

  if(isset($_GET['delete_customer_id']))
  {
    $id=$_GET['delete_customer_id'];

    $sql="delete from `users` where `id` = '$id'";
    $result=mysqli_query($connect,$sql);

    if($result)
    {
      //echo "Deleted Successfully";
      header('location: adminCustomers.php');
    }

    else
    {
      die(mysqli_error($connect));
    }
  }
?>