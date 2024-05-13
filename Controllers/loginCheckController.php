<?php 
    include('../Models/adminDatabase.php');

    session_start();

    if(!empty($_SESSION['adminId'])) 
    {
        header("location:../Views/adminDashboard.php");
        exit;
    }

    if(isset($_POST['adminLogin'])) 
    {
        $adminId = $_POST['adminId'];
        $adminPassword = $_POST['adminPassword'];

        if(empty($adminId) || empty($adminPassword)) 
        {
            echo "<script>alert('Fill up the Data');</script>";

            echo "<script>window.location='../Views/adminLogin.php';</script>";
            exit;
        } 
        else 
        {
            $sql = "SELECT * FROM `admins` WHERE `Admin ID`='$adminId' AND `Admin Password`='$adminPassword'";
            $result = mysqli_query($connect, $sql);
            
            if ($result) 
            {
                if(mysqli_num_rows($result) > 0) 
                {
                    $r = mysqli_fetch_assoc($result);
                    $_SESSION['adminId'] = $adminId;
                    $_SESSION['adminName'] = $r['Admin Name'];
                    echo "<script>window.location='../Views/adminDashboard.php';</script>";
                    exit;
                } 
                else 
                {
                    echo "<script>alert('Invalid ID or Password');</script>";

                    echo "<script>window.location='../Views/adminLogin.php';</script>";
                }
            } 
            else 
            {
                echo "<script>alert('Error: " . mysqli_error($connect) . "');</script>";
                echo "<script>window.location='../Views/adminLogin.php';</script>";
            }
        }
    }
?>