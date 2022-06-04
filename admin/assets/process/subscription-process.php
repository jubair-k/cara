<?php
    session_start();
    include 'connection.php';
    use PHPMailer\PHPMailer\PHPMailer;

    if(isset($_POST)){
        $result=array();
        if(isset($_POST['pages']) && $_POST['pages']=="loadMails"){
            $stmt=$pdo->query("SELECT * FROM subscribers ORDER BY id DESC ");
            $result['mails']=$stmt->fetchAll();
        }

        if(isset($_POST['pages']) && $_POST['pages']=="deletmail"){
            $dlt_mail="DELETE FROM subscribers WHERE id=:mailid";
            $stmt=$pdo->prepare($dlt_mail);
            $stmt->execute(['mailid'=>$_POST['mail']]);
            $result="success";
        }

        if(isset($_POST['pages']) && $_POST['pages']=="sendBulk"){
            $stmt=$pdo->query("SELECT * FROM subscribers WHERE status=1");
            if($stmt->rowCount()>0){
                $users=$stmt->fetchAll();
                $name = "Cara";  
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
        
                $ind=0;
                $arr=array();
                foreach ($users as $value) {
                    $to=$value->mail;
                    $mail->isHTML(true);
                    $mail->setFrom($from, $name);
                    $mail->addAddress($to);
                    $mail->Subject = ("$subject");
                    $mail->Body = $body;
                    if ($mail->send()) {
                        $ind++;
                    } else{
                        array_push($arr,$value->mail);
                    }
                }    
                
                if(count($users)==$ind){
                    $result['done']="done";
                } else{
                    $result['error']=$arr;
                }
            }
        }

        echo json_encode($result);
    }    
?>