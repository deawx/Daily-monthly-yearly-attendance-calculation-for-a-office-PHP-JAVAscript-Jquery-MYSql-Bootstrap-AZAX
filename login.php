<?php
   include("connection.php");
   session_start();
   if( isset($_SESSION['login_user']) )
   {
   header("location: welcome.php");
   }

   if($_SERVER["REQUEST_METHOD"] == "GET") {
      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 
      
      $sql = "SELECT * FROM login WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($connection,$sql);	  
	  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        	
      $count = mysqli_num_rows($result);
		
      if($count > 0) {
         $_SESSION['designation'] = $row['designation'];
         $_SESSION['login_user'] = $row['username'];
         echo  $_SESSION['login_user'];
         //header("location: welcome.php");
      }else {
		  header("location:error.php");
      }
   }
?>
