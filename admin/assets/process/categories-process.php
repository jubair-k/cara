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

        if(isset($_POST['categsavename']) && !empty($_POST['categsavename'])){
            $chk_exist="SELECT * FROM categories WHERE categories=:categ AND id!=:categid";
            $stmt=$pdo->prepare($chk_exist);
            $stmt->execute(['categ'=>$_POST['categsavename'],'categid'=>$_POST['categsave']]);
            $chk_count=$stmt->rowCount();
            if($chk_count==0){
                $updt_categ="UPDATE categories SET categories=:sacateg WHERE id=:scategid";
                $stmt=$pdo->prepare($updt_categ);
                $stmt->execute(['sacateg'=>$_POST['categsavename'],'scategid'=>$_POST['categsave']]);
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

        if(isset($_POST['deletecateg']) && !empty($_POST['deletecateg'])){
            $dlt_categ="DELETE FROM categories WHERE id=:categid";
            $stmt=$pdo->prepare($dlt_categ);
            $stmt->execute(['categid'=>$_POST['categ']]);
            $array="success";
        }

        if(isset($_POST['deactivecateg']) && !empty($_POST['deactivecateg'])){
            $deact_categ="UPDATE categories SET status=:categst WHERE id=:categid";
            $stmt=$pdo->prepare($deact_categ);
            $stmt->execute(['categst'=>0,'categid'=>$_POST['categ']]);
            $array="success";
        }

        if(isset($_POST['activecateg']) && !empty($_POST['activecateg'])){
            $act_categ="UPDATE categories SET status=:categst WHERE id=:categid";
            $stmt=$pdo->prepare($act_categ);
            $stmt->execute(['categst'=>1,'categid'=>$_POST['categ']]);
            $array="success";
        }


        echo json_encode($array);
    }

?>