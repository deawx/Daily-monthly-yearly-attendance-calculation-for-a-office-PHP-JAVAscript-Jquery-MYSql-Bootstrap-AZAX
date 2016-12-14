<?php
   
   session_start();
   if( isset($_SESSION['login_user'])  )
   {
		header("location: welcome.php");
   }
	$msg = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
	  include("connection.php");
      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 
      
      $sql = "SELECT * FROM login WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($connection,$sql);	  
	  
	  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
          
      $count = mysqli_num_rows($result);
	  $_SESSION['catagory'] = $row['catagory'];
      if($count > 0) {
		  if($_SESSION[catagory]==1)
		  {
			  $_SESSION['designation'] = $row['designation'];
              $_SESSION['login_user'] = $row['username'];
			  header("location: welcome.php");
		  }
			else{
			   $_SESSION['designation'] = $row['designation'];
               $_SESSION['login_user'] = $row['username'];
			   header("location: welcome_hr.php");
			}	
      }else {
		  $msg = "Wrong input!";
      }
   }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
            padding: 41px;
        }

        .row.content {height: 450px}
        footer {
            background-color: black;
            color: white;
            padding: 2%;
        }

        #index h1 {
            color:red;
        }

        body{
            background: #00589F;

        }

        div.well{
            height: 60%;
        }

        .Absolute-Center {
            margin: auto;
            position: absolute;
            top: 0; left: 0; bottom: 0; right: 0;
        }

        .Absolute-Center.is-Responsive {
            width: 100%;
            height: 100%;
			min-width: 200px;
            max-width: 400px;
			padding-top: 220px;
         }
		 
	 @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      } 
    }



    </style>
</head>

<body>
<nav class="navbar navbar-inverse ">
    <div id="index">
          <h1 class="text-center">Welcome To Content House Ltd</h1>
    </div>

</nav>

<div class="container-fluid text-center">
    <div class="row content">
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="Absolute-Center is-Responsive">
            <div ></div><br><br>
            <div class="col-sm-12 col-md-10 col-md-offset-1">
				<?php if(strlen($msg) > 0) echo $msg;?>
                <form action="" id="loginForm" method="POST">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input class="form-control" type="text" name='username' placeholder="username" required/>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input class="form-control" type="password" name='password' placeholder="password" required/>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> I agree to the <a href="#">Terms and Conditions</a>
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-def btn-block">Login</button>
                    </div>
                    <div class="form-group text-center">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid text-center">
    <p>Copyright © Content House Ltd</p>
</footer>
</body>
</html>






