<?php  
      if(isset($_POST['submit'])){
            $email=$_POST['email'];
            $pass=$_POST['pass']; 
            $conn=new mysqli('localhost','root' ,'','women_safety');
        if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
        }
        else{
            $stmt=$conn->prepare("select * from register where email=?");
            $stmt->bind_param("s",$email);
            $stmt->execute();
            $stmt_result=$stmt->get_result();
                if($stmt_result->num_rows > 0){
                    $data=$stmt_result->fetch_assoc();
                    if($data['pass'] === $pass){
                        header("Location: homepage.php");
                    }else{
                        header("Location: index.php?error=1");
                    }
                }
                else{
                     header("Location: index.php?error=1");
                }
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
                    </ul>
                </div>
           </nav>
        </header>
            <div class="wrap">
                <h2>Login</h2>
                <form action="index.php" method="post">
                    <?php
                        $fullurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        if(strpos($fullurl,"error=1")==true){
                        echo "<p class='error'>Invalid username or password</p>";
                        }
                    ?>
                <input id="uname" name="email" type="email" placeholder="Your username" required="">
                <input id="password" name="pass" type="password" placeholder="Your password" required="">
                <button type="submit" name="submit" class="btn-login">Log in</button>
                <a href="forgotpass.php">Forgot Password?</a>
                </form>
            </div>
            
            <footer align='center' class="end"><font color=#3498db> <p>Emergency Contacts :</p>
                <p>AMBULANCE : 102</p>
                <p>POLICE : 100</p></font> 
            </footer>
    </body>
</html>