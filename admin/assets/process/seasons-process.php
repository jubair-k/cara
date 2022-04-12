<?php
    session_start();
    include 'connection.php';

    if(isset($_POST)){
        if(isset($_POST['sesnname']) && !empty($_POST['sesnname'])){
            $chk_exist="SELECT * FROM seasons WHERE season=:sesn";
            $stmt=$pdo->prepare($chk_exist);
            $stmt->execute(['sesn'=>$_POST['sesnname']]);
            $chk_count=$stmt->rowCount();
            if($chk_count==0){
                $inst_sesn="INSERT INTO seasons(season,status) VALUES(:sesn,:st)";
                $stmt=$pdo->prepare($inst_sesn);
                $stmt->execute(['sesn'=>$_POST['sesnname'],'st'=>1]);
                $array="ok";    
            }
            else{
                $array['exist']="season already exist";
            }
        }

        if(isset($_POST['sesnsavename']) && !empty($_POST['sesnsavename'])){
            $chk_exist="SELECT * FROM seasons WHERE season=:sesn AND id!=:sesnid";
            $stmt=$pdo->prepare($chk_exist);
            $stmt->execute(['sesn'=>$_POST['sesnsavename'],'sesnid'=>$_POST['sesnsave']]);
            $chk_count=$stmt->rowCount();
            if($chk_count==0){
                $updt_sesn="UPDATE seasons SET season=:sasesn WHERE id=:ssesnid";
                $stmt=$pdo->prepare($updt_sesn);
                $stmt->execute(['sasesn'=>$_POST['sesnsavename'],'ssesnid'=>$_POST['sesnsave']]);
                $array="ok";    
            }
            else{
                $array['exist']="category already exist";
            }
        }


        if(isset($_POST['loadSeasons']) && !empty($_POST['loadSeasons'])){
            $stmt=$pdo->query("SELECT * FROM seasons");
            $array['sesns']=$stmt->fetchAll();
        }

        if(isset($_POST['deletesesn']) && !empty($_POST['deletesesn'])){
            $dlt_sesn="DELETE FROM seasons WHERE id=:sesnid";
            $stmt=$pdo->prepare($dlt_sesn);
            $stmt->execute(['sesnid'=>$_POST['sesn']]);
            $array="success";
        }

        if(isset($_POST['deactivesesn']) && !empty($_POST['deactivesesn'])){
            $deact_sesn="UPDATE seasons SET status=:sesnst WHERE id=:sesnid";
            $stmt=$pdo->prepare($deact_sesn);
            $stmt->execute(['sesnst'=>0,'sesnid'=>$_POST['sesn']]);
            $array="success";
        }

        if(isset($_POST['activesesn']) && !empty($_POST['activesesn'])){
            $act_sesn="UPDATE seasons SET status=:sesnst WHERE id=:sesnid";
            $stmt=$pdo->prepare($act_sesn);
            $stmt->execute(['sesnst'=>1,'sesnid'=>$_POST['sesn']]);
            $array="success";
        }

        echo json_encode($array);
    }


?>

