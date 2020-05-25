<?php 
      if(isset($_POST['register'])){
          $fname=$_POST['fname'];
          $lname=$_POST['lname'];
          $mnumber=$_POST['mnumber'];
          $email=$_POST['email'];
          $pass=$_POST['pass'];
          $econ1=$_POST['econ1'];
          $econ2=$_POST['econ2'];
          $conn=new mysqli('localhost','root' ,'','women_safety');
          $sql_e="select * from register where email='$email'";
          $res_e=mysqli_query($conn,$sql_e) or die(mysql_errno($conn));
          if(mysqli_num_rows($res_e)>0){
              header("Location:register.php?error=2");
          }
          else{
            $stmt=$conn->prepare("insert into register(fname,lname,mnumber,email,pass,econ1,econ2)values(?,?,?,?,?,?,?)");
            $stmt->bind_param("ssissii",$fname,$lname,$mnumber,$email,$pass,$econ1,$econ2);
            $stmt->execute();
            if(!preg_match("/^\d{10}+$/",$mnumber)){
                 header("Location:register.php?error=1"); 
            }
            else{
            header("Location:index.php");
            }
            $stmt->close();
            $conn->close();
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
                        <li><a href='index.php'>Login</a></li>
                    </ul>
                </div>
            </nav>
        </header>
                <div class="register">
                    <form method="post" id="register" action="register.php">
                        <h2>Registeration Form</h2>
                        <?php
                            $fullurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                            if(strpos($fullurl,"error=1")==true){
                            echo "<p class='error'>Invalid Phone Number</p>";
                            }
                        ?>
                        <?php
                            $fullurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                            if(strpos($fullurl,"error=2")==true){
                              echo "<p class='error'>Sorry!This email is already taken</p>";
                            }
                        ?>
                        <label> First Name :</label><br>
                        <input type="text" name="fname" id="fname" placeholder="First Name" required=""><br><br>
                        <label> Last Name :</label><br>
                        <input type="text" name="lname" id="lname" placeholder="Last Name" required=""><br><br>
                        <label> Mobile Number :</label><br>
                        <input type="number" name="mnumber" id="mnum" placeholder="Mobile Number" required=""><br><br>
                        <label> Email :</label><br>
                        <input type="email" name="email" id="email" placeholder="Email" required=""><br>
                        <label> Password :</label><br>
                        <input type="password" name="pass" id="pass" placeholder="Password" required=""><br><br>
                        <label> Emergency Contact 1 :</label><br>
                        <input type="number" name="econ1" id="econ1" placeholder="Contact 1" required=""><br><br>
                        <label> Emergency Contact 2 :</label><br>
                        <input type="number" name="econ2" id="econ2" placeholder="Contact 2" required=""><br><br>
                        <button  type="submit" name="register" class="btn-login">Register</button>
                    </form>
                </div>	
                </div>
                <span id="result"></span>
                <footer align='center' class="end"><font color=#3498db> <p>Emergency Contacts :</p>
                       <p>AMBULANCE : 102</p>
                       <p>POLICE : 100</p></font> 
                </footer>
    </body>
</html>
