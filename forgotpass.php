<?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $conn=new mysqli('localhost','root' ,'','women_safety');
    if($_POST){
        $email=$_POST['email'];
        $selectquery=mysqli_query($conn,"select * from register where email='{$email}'")or die(mysql_error($conn));
        $count=mysqli_num_rows($selectquery);
        $row=mysqli_fetch_array($selectquery);
        if($count>0){
            //echo $row['pass'];
            
            // Load Composer's autoloader
            require 'vendor/autoload.php';

            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
            //Server settings
                $mail->SMTPDebug = 0;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'vikasts98@gmail.com';                     // SMTP username
                $mail->Password   = '*******';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom('vikasts98@gmail.com', 'women_safety');
                $mail->addAddress($email,$email);     // Add a recipient
    
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Forgot Password';
                $mail->Body    = "Hi $email your password is {$row['pass']}";
                $mail->AltBody = "Hi $email your password is {$row['pass']}";

                $mail->send();
                echo "<script>alert('Password has been sent to your Email ID')</script>";
            } catch (Exception $e) {
                echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
        else{
            echo "<script>alert('Email not registered')</script>";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>WOMEN SAFETY</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='css/style.css'>
    <script src="jquery-3.5.1.min.js"></script>
    <style type="text/css">
    	.error{
            color: red;
            text-align: center;
            padding-bottom: 20px;
        }
        .reset{
            width: 410px;
            overflow: hidden;
            margin: auto;
            margin-top: 100px;
            margin-bottom: 120px;
            padding: 20px;
            background: #fff;
            border: 1px solid silver;
            border-radius: 5px;
        }
        .reset h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .reset input{
            width: 393px;
            height: 35px;
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid silver;
            padding: 5px;
        }
        .reset .btn-login{
            padding: 5px;
            width: 403px;
            height: 40px;
            background-color: #3498db;
            color: #fff;
            border-radius: 3px;
            border: 0;
            font-size: 18px; 
        }
    </style>    
</head>
<body>
    <header>
    	<nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <a href="" class="navbar-brand">
                        <img src="img/banner.png" class="logo" width="80px">
                    </a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href='register.php'>Register</a></li>
                        <li><a href='index.php'>Login</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="reset">
            <h2>Forgot Password</h2>
                <form action="forgotpass.php" method="post">
                	<?php
                        $fullurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        if(strpos($fullurl,"error=1")==true){
                        echo "<p class='error'>Invalid username</p>";
                        }
                    ?>
                <input id="uname" name="email" type="email" placeholder="Your username" required="">
                <button type="submit" class="btn-login">Send password</button>
            </form>
        </div>
            <footer align='center' class="end"><font color=#3498db> <p>Emergency Contacts :</p>
                <p>AMBULANCE : 102</p>
                <p>POLICE : 100</p></font> 
            </footer>
    </body>
</html>