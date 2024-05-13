<?php
    require_once('allDatabase.php');

    $connect=conn();
    $sql="select * from messages";
    $result=mysqli_query($connect,$sql);
    $row=mysqli_num_rows($result);
    if($row==1)
    {
        return true;
    }
    else
    {
        return false;
    }
?>