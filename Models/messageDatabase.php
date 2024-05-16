<?php
    require_once('allDatabase.php');

    $connect=conn();
    $sql="select * from messages";
    $result=mysqli_query($connect,$sql);
    $row=mysqli_num_rows($result);

    if(isset($_GET['delete']))
    {
       $delete_id = $_GET['delete'];
       $sql = "DELETE FROM `messages` WHERE id = $delete_id";
       if(mysqli_query($connect, $sql)) 
       {
          header('location: adminMessages.php');
          exit();
       } 
       else 
       {
          echo "Error deleting message: " . mysqli_error($connect);
       }
    }

    $sql = "SELECT * FROM `messages`";
    $result = mysqli_query($connect, $sql);
    $messages = [];
    if(mysqli_num_rows($result) > 0) 
    {
       while($row = mysqli_fetch_assoc($result))
       {
          $messages[] = $row;
       }
    }
?>