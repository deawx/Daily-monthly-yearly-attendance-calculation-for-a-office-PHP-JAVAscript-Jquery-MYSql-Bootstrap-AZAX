<?php
session_start();   
   if(!isset($_SESSION['login_user'])){
      header("location: index.php");
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
            padding: 15px;
        }
	    #index h1 {
            color:red;
        }

    .row.content {height: 450px}
    

    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }

        footer {
            background-color: black;
            color: white;
            padding: 2%;
        }

    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div id="index">
          <h1 class="text-center">Welcome To Content House Ltd</h1>
    </div> 
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
		<div class="col-sm-2 sidenav">
		   <div class="btn-group-vertical">
		         <?php
				// include('connection.php');
				// if ($connection->connect_error) {
					 // die("Connection failed: " . $connection->connect_error);
				// } 
				// $sql = "SELECT * FROM profile";
				// $result = $connection->query($sql);

				// if ($result->num_rows > 0) {				 						 
					// <a type="button" class="btn btn-primary" href="."attendance.php?id=".$row["id"]."&username=".$row["username"]."&designation=".$row["designation"].">Daily Attendance</a>					 
				// } else {
					 // echo "0 results";
				// }  				
				// $connection->close();
                // ?>
				 <a type="button" class="btn btn-primary" href="attendance.php">Daily Attendance</a>	
				<button onclick="window.location.href='show.php'" type="button" class="btn btn-primary">Show Atendance</button>
				<button type="button" class="btn btn-primary">Management</button>
		   </div>
		</div>
		<div class="col-sm-10 text-left"> 
		  <h1>Welcome</h1>
		  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
		  incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
		  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint
		  occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id 
		  est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
		  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
		  laboris nisi ut aliquip ex ea commodo consequat.</p>
		  <hr>
		  <h3>Test</h3>
		  <p>Lorem ipsum...</p>
		</div>
    </div>
</div>


<footer class="container-fluid text-center">
  <p>Copyright © Content House Ltd</p>
</footer>

</body>
</html>

