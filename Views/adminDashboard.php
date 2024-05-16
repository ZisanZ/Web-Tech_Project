<?php
session_start();
if(empty($_SESSION['adminId'])){
	header("location:adminLogin.php");
}
else if(isset($_GET['out'])){
	session_destroy();
	header("location:adminLogin.php");
}

include '../Views/adminHeader.php';

?>
<!DOCTYPE html>
<html>
   <head>
      <title>Dashboard</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital@0;1&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
   </head>

   <body>
      <main>
         <!--dashboard-->
         <div class="insights">
               <div class="sales">
                  <span class="material-symbols-outlined">analytics</span>
                  <div class="middle">
                     <div class="left">
                        <h3>Total Sales</h3>
                        <h1>Tk 125,000</h1>
                     </div>
                     <div class="progress">
                        <svg>
                           <circle cx="38" cy="38" r="36"></circle> 
                        </svg> 
                        <div class="number">
                           <p>81%</p>
                        </div>
                     </div>
                  </div>
                  <small class="text-muted">Last 24 hours</small>
               </div>
               <!--sales-->
               <div class="expenses">
                  <span class="material-symbols-outlined">bar_chart</span>
                  <div class="middle">
                     <div class="left">
                        <h3>Total Expenses</h3>
                        <h1>Tk 50,000</h1>
                     </div>
                     <div class="progress">
                        <svg>
                           <circle cx="38" cy="38" r="36"></circle> 
                        </svg> 
                        <div class="number">
                           <p>62%</p>
                        </div>
                     </div>
                  </div>
                  <small class="text-muted">Last 24 hours</small>
               </div>
               <!--expenses-->
               <div class="income">
                  <span class="material-symbols-outlined">stacked_line_chart</span>
                  <div class="middle">
                     <div class="left">
                        <h3>Total Income</h3>
                        <h1>Tk 75,000</h1>
                     </div>
                     <div class="progress">
                        <svg>
                           <circle cx="38" cy="38" r="36"></circle> 
                        </svg> 
                        <div class="number">
                           <p>44%</p>
                        </div>
                     </div>
                  </div>
                  <small class="text-muted">Last 24 hours</small>
               </div>
               <!--income-->
         </div>
      </main>
   </body>
</html>