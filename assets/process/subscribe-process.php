<?php
    require "connect.php";

    use PHPMailer\PHPMailer\PHPMailer;
    function sendmail($reciver){
        $name = "Cara";  // Name of your website or yours
        $to = $reciver;  // mail of reciever
        $subject = "Newsletters";
        $body = "<h1>Thank You</h1>
                YOU'VE BEEN ADDED TO OUR MAILING LIST AND WILL NOW BE AMONG THE FIRST TO HEAR ABOUT NEW ARRIVALS 
                ,BIG EVENTS AND SPECIAL OFFERS.";
        $from = "onlineshopcara@gmail.com";  // you mail
        $password = "Cara@online";  // your mail password

        // Ignore from here

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
        $mail = new PHPMailer();

        // To Here

        //SMTP Settings
        $mail->isSMTP();
        // $mail->SMTPDebug = 3;  Keep It commented this is used for debugging                          
        $mail->Host = "smtp.gmail.com"; // smtp address of your email
        $mail->SMTPAuth = true;
        $mail->Username = $from;
        $mail->Password = $password;
        $mail->Port = 587;  // port
        $mail->SMTPSecure = "tls";  // tls or ssl
        $mail->smtpConnect([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ]
        ]);

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($from, $name);
        $mail->addAddress($to); // enter email address whom you want to send
        $mail->Subject = ("$subject");
        $mail->Body = $body;
        if ($mail->send()) {
            return "Thanks for Subscribing!";
        } else {
            return "Something is wrong <br><br>";
        }
    }

    if(isset($_POST)){
        $result=array();
        if(isset($_POST['pages']) && $_POST['pages']=="suscribe"){
            $reciver=$_POST['mail'];
            if(filter_var($reciver,FILTER_VALIDATE_EMAIL)){
                $sel_mails="SELECT * FROM subscribers WHERE mail=:ml AND status=1";
                $stmt=$pdo->prepare($sel_mails);
                $stmt->execute(array('ml'=>$_POST['mail']));
                if($stmt->rowCount()==0){
                    $res=sendmail($reciver);
                    if($res=="Thanks for Subscribing!"){
                        $inst_mail="INSERT INTO subscribers(mail,status) VALUES(:mil,:st)";
                        $stmt=$pdo->prepare($inst_mail);
                        $stmt->execute(array('mil'=>$reciver,'st'=>1));
                    }
                    $result=$res;
                } else{
                    $result="You Are Already Subscribed";
                }
            }else{
                $result="Please enter a valid email.";
            }
        }

        echo json_encode($result);
    }

?>