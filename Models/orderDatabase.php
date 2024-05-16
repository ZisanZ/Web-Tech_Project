<?php
    require_once('allDatabase.php');

    $connect=conn();
    $sql="select * from orders";
    $result=mysqli_query($connect,$sql);
    $row=mysqli_num_rows($result);
//Order Update
    if (isset($_POST['update_payment'])) 
    {
        $order_id = $_POST['order_id'];
        $payment_status = $_POST['payment_status'];
        $sql = "UPDATE orders SET `payment_status` = '$payment_status' WHERE `id` = '$order_id'";
        mysqli_query($connect, $sql);
        $message = 'Payment status updated!';
        
        header('location:../Views/adminOrders.php');
        exit;
    }
//Order Delete
    if(isset($_GET['delete']))
    {
       $delete_id = $_GET['delete'];
       $sql = "DELETE FROM `orders` WHERE id = $delete_id";
       if(mysqli_query($connect, $sql)) 
       {
          header('location:../Views/adminOrders.php');
          exit();
       } 
       else 
       {
          echo "Error deleting order: " . mysqli_error($connect);
       }
    }
?>