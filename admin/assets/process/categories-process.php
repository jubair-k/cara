<?php
    session_start();
    include 'connection.php';

    if(isset($_POST)){
        if(isset($_POST['categname']) && !empty($_POST['categname'])){
            $chk_exist="SELECT * FROM categories WHERE categories=:categ";
            $stmt=$pdo->prepare($chk_exist);
            $stmt->execute(['categ'=>$_POST['categname']]);
            $chk_count=$stmt->rowCount();
            if($chk_count==0){
                $inst_categ="INSERT INTO categories(categories,status) VALUES(:categ,:st)";
                $stmt=$pdo->prepare($inst_categ);
                $stmt->execute(['categ'=>$_POST['categname'],'st'=>1]);
                $array="ok";    
            }
            else{
                $array['exist']="category already exist";
            }

        }

        if(isset($_POST['loadCategories']) && !empty($_POST['loadCategories'])){
            $stmt=$pdo->query("SELECT * FROM categories");
            $array['categs']=$stmt->fetchAll();
        }

        echo json_encode($array);
    }

?>