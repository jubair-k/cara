<?php
    require "connect.php";
    if(isset($_POST)){
        $result=array();
        if(isset($_POST['pages']) && $_POST['pages']=="cart"){
            $products=$_POST['products'];
            $sel_cart="SELECT * FROM product WHERE id IN ($products)";
            $stmt=$pdo->query($sel_cart);
            $result=$stmt->fetchAll();
        }

        echo json_encode($result);
    }
?>