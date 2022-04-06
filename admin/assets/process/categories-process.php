<?php
    session_start();
    include 'connection.php';

    if(isset($_POST)){
        if(isset($_POST['categname']) && !empty($_POST['categname'])){
            $inst_categ="INSERT INTO categories(categories,status) VALUES(:categ,:st)";
            $stmt=$pdo->prepare($inst_categ);
            $stmt->execute(['categ'=>$_POST['categname'],'st'=>1]);
            $array="ok";
        }

        echo json_encode($array);
    }

?>