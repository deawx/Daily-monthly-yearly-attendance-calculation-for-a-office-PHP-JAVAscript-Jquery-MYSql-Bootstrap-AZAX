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
	th, td {
          border:1px solid black;
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
			<button onclick="window.location.href='attendance.php'" type="button" class="btn btn-primary">Daily Attendance</button>
			<button onclick="window.location.href='show.php'" type="button" class="btn btn-primary">Show Attendance</button>
			<button type="button" class="btn btn-primary">Sony</button>
       </div>
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Daily Attendance Sheet.. </h1>
	     <?php

				include('connection.php');
				if ($connection->connect_error) {
					 die("Connection failed: " . $connection->connect_error);
				} 
				$sql = "SELECT * FROM profile WHERE username = '{$_SESSION['login_user']}' ";
				$result = $connection->query($sql);

				if ($result->num_rows > 0) {
					 echo "<table>
					 <tr>
					 <th>Name</th>
					 <th>Designation</th>
					 <th>Entrance Time</th>
					 <th>Exit Time</th>
					 <th>Late Hour</th>
					 <th>Late Minutes</th>
					 <th>Exit Hour</th>
					 <th>Late Minutes</th>
					 </tr>";
					 while($row = $result->fetch_assoc()) {
						 echo "<tr>
						 <td>" . $row["username"]. " </td>
						 <td>" . $row["designation"]. "</td>						 
						 <td> " . $row["en_time"]. "</td>						 
						 <td>" . $row["ex_time"]. "</td>
						 <td>" . $row["late_hour"]. "</td>
						 <td>" . $row["late_minutes"]. "</td>
						 <td>" . $row["exit_hour"]. "</td>
						 <td>" . $row["exit_mitues"]. "</td>
						 </tr>";
					 }
					 echo "</table>";
				} else {
					 echo "0 results";
				}

				$connection->close();
				?>
	  
    </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Copyright © Content House Ltd</p>
</footer>

</body>
</html>

