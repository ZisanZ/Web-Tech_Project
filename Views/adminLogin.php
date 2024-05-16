<!DOCTYPE html>
<html>
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/adminLogin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/adminFooter.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="post" action="../Controllers/loginCheckController.php">
    <h3>
        <img src="" alt="">
        GameStop
    </h3>
        <div>
            <div>
                <input type="text" name="adminId" placeholder="Enter ID">
            </div>
            <div>
                <input type="password" name="adminPassword" placeholder="Enter Password">
            </div>
            <div>
                <button name="adminLogin">Login</button>
            </div>
            <div>
                <a class="back" href="#">Back</a>
            </div>
        </div>
    </form>

    
</body>
</html>