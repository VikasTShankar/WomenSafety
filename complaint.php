<?php 
      
      $name=$_POST['name'];
      $complaint=$_POST['complaint'];
      $conn=new mysqli('localhost','root' ,'','women_safety');
      if($conn->connect_error){
      	die('Connection Failed : '.$conn->connect_error);
      }
      else{
      	$stmt=$conn->prepare("insert into complaint_forum(fname,complaint)values(?,?)");
      	$stmt->bind_param("ss",$name,$complaint);
      	$stmt->execute();
      	header("Location: cforum.php");
      	$stmt->close();
      	$conn->close();
      }
?>