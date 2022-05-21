<?php
    require "connect.php";
    if(isset($_POST)){
        $result=array();
        if(isset($_POST['page']) && $_POST['page']=="shop"){
            $stmt=$pdo->query("SELECT * FROM product WHERE status=1 ORDER BY id DESC");
            $result['prdct']=$stmt->fetchAll();

            $stmt=$pdo->query("SELECT * FROM categories WHERE status=1");
            $result['categ']=$stmt->fetchAll();


        }    




        echo json_encode($result);

    }
?>