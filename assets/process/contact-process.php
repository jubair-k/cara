<?php
    require "connect.php";
    if(isset($_POST)){
        $result=array();
        if(isset($_POST['pages']) && $_POST['pages']=="contact"){
            $inst_msg="INSERT INTO messages(user_name,email,subject,message) VALUES(:unm,:em,:sub,:msg)";
            $stmt=$pdo->prepare($inst_msg);
            $stmt->execute(array('unm'=>$_POST['name'],'em'=>$_POST['mail'],'sub'=>$_POST['subject'],'msg'=>$_POST['message']));
            $result='done';
        }

        echo json_encode($result);
    }
?>