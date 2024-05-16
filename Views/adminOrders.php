<?php
session_start();
if(empty($_SESSION['adminId'])){
	header("location:adminLogin.php");
}
else if(isset($_GET['out'])){
	session_destroy();
	header("location:adminLogin.php");
}
include('../Models/orderDatabase.php');
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Orders</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital@0;1&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
      <link rel="stylesheet" href="../css/adminDashboardstyle.css">
      <link rel="stylesheet" href="../css/adminOrderstyle.css">
   </head>
   <body>
   <div>
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
      <section class="orders">
         <div class="order-table">
               <table border="1">
                  <h2>Orders</h2>
                  <tbody>
                     <tr>
                           <td>
                              <?php if (mysqli_num_rows($result) > 0): ?>
                              <?php while ($order = mysqli_fetch_assoc($result)): ?>
                                    <p> Placed on: <span><?= $order['placed_on']; ?></span> </p>
                                    <p> Name: <span><?= $order['name']; ?></span> </p>
                                    <p> Number: <span><?= $order['number']; ?></span> </p>
                                    <p> Address: <span><?= $order['address']; ?></span> </p>
                                    <p> Total Products: <span><?= $order['total_products']; ?></span> </p>
                                    <p> Total Price: <span>Tk <?= $order['total_price']; ?></span> </p>
                                    <p> Payment Method: <span><?= $order['method']; ?></span> </p>
                                    <form action="" method="post">
                                       <input type="hidden" name="order_id" value="<?= $order['id']; ?>">
                                       <select name="payment_status" class="select">
                                          <option selected disabled><?= $order['payment_status']; ?></option>
                                          <option value="Pending">Pending</option>
                                          <option value="Completed">Completed</option>
                                       </select>
                                          <input type="submit" value="Update" class="option-btn" name="update_payment">
                                          <a href="adminOrders.php?delete=<?= $order['id']; ?>" class="delete-btn" onclick="return confirm('Delete this order?');"><button>Delete</button></a>
                                    </form>
                              <?php endwhile; ?>
                           <?php else: ?>
                              <p class="empty">No orders placed yet!</p>
                           <?php endif; ?>
                        </td>
                     </tr>     
                  </tbody> 
               </table>
         </div>
      </section>
   </body>
</html>