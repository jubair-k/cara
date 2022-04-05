<?php
    session_start();
    include 'connection.php';

    if(isset($_POST)){
        $error=array();
        $dataArr=[];

        if(!empty($_POST['user']) && !empty($_POST['password'])){
            $sql="SELECT * FROM admin_users WHERE user_name=:un AND password=:ps";
            $stmt=$pdo->prepare($sql);
            $stmt->execute(['un'=>$_POST['user'],'ps'=>$_POST['password']]);
            $postCount=$stmt->rowCount();
            if($postCount==1){
                $_SESSION['cara_admin_login']='yes';
                $_SESSION['cara_admin']=$_POST['user'];
                $loca="dashboard.php";
            }
            else{
                $error['incorrect']= 'Please Enter a valid username or password';
            }
        }

        if(empty($_POST['user'])){
            $error['name']= 'Name is required';
        }

        if(empty($_POST['password'])){
            $error['password']= 'Password is required';
        }

        if(empty($error)){
            $dataArr['massage']=$loca;
        }
        else{
            $dataArr['error']=$error;
        }

        echo json_encode($dataArr);

    }
?>