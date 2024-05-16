<?php
require_once('allDatabase.php');
require_once('../Controllers/customerValidationData.php');

$connect = conn();
$sql = "SELECT * FROM users";
$result = mysqli_query($connect, $sql);
$row = mysqli_num_rows($result);

// Add Customer
$connect = conn();

if (isset($_POST['submit'])) 
{
    $validationResult = validateCustomerData($_POST);
    if ($validationResult === true) 
    {
        $customerID = $_POST['customerID'];
        $customerName = $_POST['customerName'];
        $customerEmail = $_POST['customerEmail'];
        $customerPassword = $_POST['customerPassword'];

        $sql = "INSERT INTO `users` VALUES ('$customerID', '$customerName', '$customerEmail', '$customerPassword')";

        if (mysqli_query($connect, $sql)) 
        {
            header('Location: ../Views/adminCustomers.php');
        } 
        else 
        {
            die(mysqli_error($connect));
        }
    } 
    else 
    {
        echo "<script>alert('$validationResult');</script>";
    }
}

// Update Customer
if (isset($_GET['update_customer_id'])) 
{
    $id = $_GET['update_customer_id'];
    $sql = "SELECT * FROM `users` WHERE `id` = $id";
    $result = mysqli_query($connect, $sql);
    $r = mysqli_fetch_assoc($result);
    $customerID = $r['id'];
    $customerName = $r['name'];
    $customerEmail = $r['email'];
    $customerPassword = $r['password'];
}

if (isset($_POST['update'])) 
{
    $validationResult = validateCustomerData($_POST);
    if ($validationResult === true) 
    {
        $customerID = $_POST['customerID'];
        $customerName = $_POST['customerName'];
        $customerEmail = $_POST['customerEmail'];
        $customerPassword = $_POST['customerPassword'];

        $sql = "UPDATE `users` SET `name` = '$customerName', `email` = '$customerEmail', `password` = '$customerPassword' WHERE `id` = $id";

        if (mysqli_query($connect, $sql)) 
        {
            header('Location: ../Views/adminCustomers.php');
            exit();
        } 
        else 
        {
            die(mysqli_error($connect));
        }
    } 
    else 
    {
        echo "<script>alert('$validationResult');</script>";
    }
}

// Delete Customer
if (isset($_GET['delete_customer_id'])) 
{
    $id = $_GET['delete_customer_id'];

    $sql = "DELETE FROM `users` WHERE `id` = '$id'";
    $result = mysqli_query($connect, $sql);

    if ($result) 
    {
        //echo "Deleted Successfully";
        header('Location: adminCustomers.php');
    } 
    else 
    {
        die(mysqli_error($connect));
    }
}
?>