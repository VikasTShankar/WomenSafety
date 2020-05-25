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
      
      .btn-1{
            width: 200px;
            height: 40px;
            background-color: #3498db;
            color: #fff;
            border-radius: 3px;
            border: 0;
            font-size: 18px;
     }   
    .left{
          margin-left: 300px;
          margin-top: 200px;
          margin-bottom: 200px;
    }
    </style>
    <script type="text/javascript">
      function sos(){
      if('geolocation' in navigator){
          console.log('geolocation is available');
          navigator.geolocation.getCurrentPosition(position => {
            var locate={};
            locate.lat=position.coords.latitude;
            locate.lon=position.coords.longitude;
            $.ajax({
                url:"locationsms.php",
                method:"POST",
                data:{locate:JSON.stringify(locate)},
                success:function(res){
                  console.log(res);
                }
            })
            });
          alert('Location has been sent');
        }
        else{
          console.log('geolocation not available');
        }  
    }
  </script>
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
                      <li><a href='cforum.php'>Complaint Forum</a></li>
                      <li><a href='safetytips.php'>Safety Tips</a></li>
                      <li><a href='homepage.php'>Home</a></li>          
                  </ul>
              </div>
          </nav>
      </header>
          <div class="container">
              <div class="left">
                  <button class="btn-1" type="submit" name="sos" onclick="sos()">Send Location</button>
                  <a href="https://www.olacabs.com/">
                  <button class="btn-1" type="submit" name="cab">Book a cab</button>
                  </a>
              </div>
          </div>
          <footer align='center' class="end"><font color=#3498db> <p>Emergency Contacts :</p>
              <p>AMBULANCE : 102</p>
              <p>POLICE : 100</p>
              <p>Press SOS button for HELP</p></font> 
          </footer>
    </body>
</html>



