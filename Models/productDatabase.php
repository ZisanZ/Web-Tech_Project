<?php
    require_once('allDatabase.php');
    require_once('../Controllers/productValidationData.php');

    $connect=conn();
    $sql="select * from products";
    $result=mysqli_query($connect,$sql);
    $row=mysqli_num_rows($result);
//Add Product

    $connect = conn();

    if (isset($_POST['submit'])) 
    {
        $validationResult = validateProductData($_POST); 
        if ($validationResult === true) 
        {
            $productID = $_POST['id'];
            $productName = $_POST['name'];
            $productDetail = $_POST['details'];
            $productPrice = $_POST['price'];

            $productImage1 = $_FILES['image_01']['name'];
            $productImage1_tmp_name = $_FILES['image_01']['tmp_name'];
            $productImage1_folder = '../uploaded_img/'.$productImage1;

            $productImage2 = $_FILES['image_02']['name'];
            $productImage2_tmp_name = $_FILES['image_02']['tmp_name'];
            $productImage2_folder = '../uploaded_img/'.$productImage2;

            $productImage3 = $_FILES['image_03']['name'];
            $productImage3_tmp_name = $_FILES['image_03']['tmp_name'];
            $productImage3_folder = '../uploaded_img/'.$productImage3;
            
            $sql = "INSERT INTO products VALUES ('$productID', '$productName', '$productDetail', '$productPrice', '$productImage1', '$productImage2', '$productImage3')";
                
            if (mysqli_query($connect, $sql)) 
            {   
                move_uploaded_file($productImage1_tmp_name, $productImage1_folder);
                move_uploaded_file($productImage2_tmp_name, $productImage2_folder);
                move_uploaded_file($productImage3_tmp_name, $productImage3_folder);
                header('location:../Views/adminProducts.php');
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
//Update Product
    if (isset($_GET['edit_product_id']))
    {
        $id=$_GET['edit_product_id'];
        $sql= "SELECT * FROM `products` WHERE `id` = $id";
        $result=mysqli_query($connect,$sql);
        $r=mysqli_fetch_assoc($result);
        
        $productID = $r['id'];
        $productName = $r['name'];
        $productDetail = $r['details'];
        $productPrice = $r['price'];
        $productImage1 =$r['image_01'];
        $productImage2 =$r['image_02'];
        $productImage3 =$r['image_03'];
    } 

    if (isset($_POST['update'])) 
    {
        $validationResult = validateProductData($_POST);
        if ($validationResult === true) 
        { 
            $productID = $_POST['id'];
            $productName = $_POST['name'];
            $productDetail = $_POST['details'];
            $productPrice = $_POST['price'];

            $oldproductImage1 = $_POST['old_image_01'];
            $oldproductImage2 = $_POST['old_image_02'];
            $oldproductImage3 = $_POST['old_image_03'];

            // Check if a new file is uploaded
            if (!empty($_FILES['image_01']['name']) && !empty($_FILES['image_02']['name']) && !empty($_FILES['image_03']['name'])) 
            {
                $productImage1 = $_FILES['image_01']['name'];
                $productImage1_tmp_name = $_FILES['image_01']['tmp_name'];
                $productImage1_folder = '../uploaded_img/'.$productImage1;

                $productImage2 = $_FILES['image_02']['name'];
                $productImage2_tmp_name = $_FILES['image_02']['tmp_name'];
                $productImage2_folder = '../uploaded_img/'.$productImage2;

                $productImage3 = $_FILES['image_03']['name'];
                $productImage3_tmp_name = $_FILES['image_03']['tmp_name'];
                $productImage3_folder = '../uploaded_img/'.$productImage3;

                // Unlink old image
                if (file_exists('../uploaded_img/'.$oldproductImage1)) 
                {
                    unlink('../uploaded_img/'.$oldproductImage1);
                }

                if (file_exists('../uploaded_img/'.$oldproductImage2)) 
                {
                    unlink('../uploaded_img/'.$oldproductImage2);
                }

                if (file_exists('../uploaded_img/'.$oldproductImage3)) 
                {
                    unlink('../uploaded_img/'.$oldproductImage3);
                }

                // Move uploaded file
                move_uploaded_file($productImage1_tmp_name, $productImage1_folder);
                move_uploaded_file($productImage2_tmp_name, $productImage2_folder);
                move_uploaded_file($productImage3_tmp_name, $productImage3_folder);
            }
        
            $sql = "UPDATE `products` SET `id` = '$productID', `name` = '$productName', `details` = '$productDetail', `price` = '$productPrice',`image_01` = '$productImage1' ,`image_02` = '$productImage2' ,`image_03` = '$productImage3' WHERE `id` = '$id'";
            
            if (mysqli_query($connect, $sql)) 
            {  
                header('location:../Views/adminProducts.php');
                exit;
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
//Delete Product
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