<?php
    session_start();
    include 'connection.php';
    use PHPMailer\PHPMailer\PHPMailer;

    if(isset($_POST)){
        $result=array();
        if(isset($_POST['pages']) && $_POST['pages']=="loadMessages"){
            $stmt=$pdo->query("SELECT * FROM messages ORDER BY id DESC ");
            $result['msgs']=$stmt->fetchAll();
        }

        if(isset($_POST['pages']) && $_POST['pages']=="deletMsg"){
            $dlt_msg="DELETE FROM messages WHERE id=:msgid";
            $stmt=$pdo->prepare($dlt_msg);
            $stmt->execute(['msgid'=>$_POST['msg']]);
            $result="success";
        }

        if(isset($_POST['pages']) && $_POST['pages']=="viewMsg"){
            $view_msg="SELECT message FROM messages WHERE id=:msg";
            $stmt=$pdo->prepare($view_msg);
            $stmt->execute(['msg'=>$_POST['msg']]);
            $result=$stmt->fetch();
        }

        if(isset($_POST['pages']) && $_POST['pages']=="sendmsg"){
            $view_msg="SELECT * FROM messages WHERE id=:msg";
            $stmt=$pdo->prepare($view_msg);
            $stmt->execute(['msg'=>$_POST['msg']]);
            if($stmt->rowCount()>0){
                $user=$stmt->fetch()->email;
                $name = "Cara"; 
                $to = $user;  
                $subject = $_POST['subject'];
                $body = $_POST['body'];
                $from = "onlineshopcara@gmail.com";  
                $password = "Cara@online";  
        
                require_once "PHPMailer/PHPMailer.php";
                require_once "PHPMailer/SMTP.php";
                require_once "PHPMailer/Exception.php";
                $mail = new PHPMailer();
        
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com"; 
                $mail->SMTPAuth = true;
                $mail->Username = $from;
                $mail->Password = $password;
                $mail->Port = 587;  
                $mail->SMTPSecure = "tls";  
                $mail->smtpConnect([
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                    ]
                ]);
        
                $mail->isHTML(true);
                $mail->setFrom($from, $name);
                $mail->addAddress($to); 
                $mail->Subject = ("$subject");
                $mail->Body = $body;
                if ($mail->send()) {
                    $result['done']="done";
                } else {
                    $result['error']="error";
                }        
            } else {
                $result['error']="error";  
            }
        }

        echo json_encode($result);
    }    
?>