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
    <style>
    	  p{ 
              
            font-size:18px;

            }
        .contain{
                  margin:20px 70px;
                  padding:15px;
            }

        .complaint_forum{
                  width: 410px;
                  overflow: hidden;
                  margin: auto;
                  margin-top: 100px;
                  margin-bottom: 100px;
                  padding: 20px;
                  background: #fff;
                  border: 1px solid red;
                  border-radius: 5px;
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
                      <li><a href='index.php'>Logout</a></li>
                      <li><a href='safetytips.php'>Safety Tips</a></li>
                      <li><a href='homepage.php'>Home</a></li>          
                  </ul>
              </div>
          </nav>
      </header>
              <div class="forum">
                	<h2 class="contain">Post your complaints</h2>
                	<form action="complaint.php" method="post">
                	<label class="nam">Name :<br><input type="text" name="name" required=""><br></label>
                	<label class="mes">Message :<br><textarea id="mess" cols="50" rows="10" name="complaint" required=""></textarea></label><br>
                	<button class="btn-login">Post</button>
                  </form>
              </div>
              <?php
                  $conn=new mysqli('localhost','root' ,'','women_safety');
                      if($conn->connect_error){
                        die('Connection Failed : '.$conn->connect_error);
                      }
                      else{
                        $query="select * from complaint_forum";
                        $result=mysqli_query($conn,$query);
                      }
              ?>
              <div class="complaint_forum">
                  <?php
                      while($row=mysqli_fetch_array($result)){
                      echo "Name:".$row["fname"]."<br>"."Complaint:".$row["complaint"]."<br>";  
                    }
                  ?>
              </div>
            <footer align='center' class="end"><font color=#3498db> <p>Emergency Contacts :</p>
                <p>AMBULANCE : 102</p>
                <p>POLICE : 100</p>
                <p>Press SOS button for HELP</p></font> 
            </footer>
    </body>
</html>