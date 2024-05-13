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
    include('../Models/productDatabase.php');
    $result=mysqli_query($connect,$sql);

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

    if (isset($_POST['update'])) 
    {
        if (!empty($_POST['id']) && !empty($_POST['name']) && !empty($_POST['details']) && !empty($_POST['price'])) 
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
                header('location:adminProducts.php');
                exit;
            } 
            else 
            {    
                die(mysqli_error($connect));
            }
        } 
        else 
        {    
            echo "Fill Up The Form First";
        }
    }   
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Product Edit</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital@0;1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="../css/adminDashboardstyle.css">
        <link rel="stylesheet" href="../css/adminEditProductstyle.css">
    </head>
    <body>
        <!--header-->
        <div class="header" style="
            display: flex;">
               <div class="left-section" style="
                display: flex;">
                  <div class="main-icon"><img src="../images/icon.png" alt=""></div>
                  <div class="main-brand"><p class="gamestop-icon">GameStop</p></div>
               </div>
               <div class="middle-section" style="
               display: flex;">
                  <input class="dashboard-searchbar" type="text" placeholder="Search">
               </div>
               <div class="right-section" style="
               display: flex;">
                  <div class="account-button-box">
                     <button class="account-button"><?php echo $_SESSION['adminName']; ?></button>
                  </div>
                  <div class="message-button-box" style="
                  display: flex;">
                     <a href="adminMessages.php" class="message-button"><img src="../images/message.png"></a>
                  </div>
               </div>
            </div>
         <div class="breadcrunch" style="
            display: flex;">
         <!--breadcrunch-->
         <div class="breadcrunch2" style="
            display: flex;">
         <!--breadcrunch-->
         </div>
         <!--sidebar-->
            <div class="sidebar">
               <aside>
                  <div class="menu-box" style="
                  display: flex;">
                     <p class="menu-text">Menu</p>
                  </div>
                  <div class="dashboard-button-box" style="
                  display: flex;">
                     <img src="../images/dashboardicon.png">
                     <a href="../Views/adminDashboard.php"><button class="dashboard-button">Dashboard</button></a>
                  </div>
                  <div class="analytics-button-box" style="
                  display: flex;">
                     <img src="../images/analyticsicon.png">
                     <a href="../Views/adminAnalytics.php"><button class="analytics-button">Analytics</button></a>
                  </div>
                  <div class="management-box" style="
                  display: flex;">
                     <p class="management-text">Management</p>
                  </div>
                  <div class="product-button-box" style="
                  display: flex;">
                     <img src="../images/productsicon.png">
                     <a href="adminProducts.php"><button class="product-button">Products</button></a>
                  </div>
                  <div class="customer-button-box" style="
                  display: flex;">
                     <img src="../images/customericon.png">
                     <a href="adminCustomers.php"><button class="customer-button">Customers</button></a>
                  </div>
                  <div class="order-button-box" style="
                  display: flex;">
                     <img src="../images/oredericon.png">
                     <a href="adminOrders.php"><button class="order-button">Orders</button></a>
                  </div>
                  <div class="administrator-box" style="
                  display: flex;">
                     <p class="administrator-text">Administrator</p>
                  </div>
                  <div class="settings-button-box" style="
                  display: flex;">
                     <img src="../images/settingicon.png">
                     <a href="adminSettings.php"><button class="settings-button">Settings</button></a>
                  </div>
                  <div>
                     <form>
                        <div class="logout-button-box" style="
                        display: flex;">
                           <img src="../images/logouticon.png">
                           <button class="logout-button" name="out" style="border:none;">LogOut</button>
                        </div>
                     </form>
                  </div>
               </aside>
            </div>
      </div>
        <div class="edit-product-table">
            <h2>Edit Product</h2>
            <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="old_image_01" value="<?php echo $r['image_01'];?>">
                    <input type="hidden" name="old_image_02" value="<?php echo $r['image_02'];?>">
                    <input type="hidden" name="old_image_03" value="<?php echo $r['image_03'];?>">
                    <table>
                        <tbody>
                            <tr><td>Product ID: <input type="number" name="id" class="edit-product-table-id-box" value="<?php echo $productID; ?>" placeholder="Enter Product ID" autocomplete="off"><br></td></tr>
                            <tr><td>Product Name: <input type="text" name="name" class="edit-product-table-name-box" value="<?php echo $productName; ?>" placeholder="Enter Product Name" autocomplete="off"><br></td></tr>
                            <tr><td>Product Detail:<input type="text" name="details" class="edit-product-table-detail-box" value="<?php echo $productDetail; ?>" placeholder="Enter Product Detail" autocomplete="off"><br></td></tr>
                            <tr><td>Product Price: <input type="text" name="price" class="edit-product-table-price-box" value="<?php echo $productPrice; ?>" placeholder="Enter Product Price" autocomplete="off"><br></td></tr>
                            <tr><td><span>Product Image 01(Required) </span><input type="file" class="edit-product-table-image01-box" name="image_01" required><br></td></tr>
                            <tr><td><span>Product Image 02(Required) </span><input type="file" class="edit-product-table-image02-box" name="image_02" required><br></td></tr>
                            <tr><td><span>Product Image 03(Required) </span><input type="file" class="edit-product-table-image03-box" name="image_03" required><br></td></tr>
                            <tr><td><button class="editproductUpdate-button" name="update">Update</button></td></tr>  
                        </tbody>
                    </table>
                </form>
            <a href="adminProducts.php"><button class="editproductBack-button">Back</button></a>
        </div>
    </body>
</html>