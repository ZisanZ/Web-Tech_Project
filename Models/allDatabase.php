<?php
    function conn()
    {
        $serverName="localhost";
        $userName="root";
        $pass="";
        $dbName="shop_db";
        $con=new mysqli($serverName,$userName,$pass,$dbName);
        return $con;
    }
?>