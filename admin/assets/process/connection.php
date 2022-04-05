<?php
    //session_start();
    $host="localhost:3308";
    $user="root";
    $password="";
    $db_name="cara";
    $ds="mysql:host=".$host.";dbname=".$db_name;
    $pdo=new PDO($ds,$user,$password);
    $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);        

?>