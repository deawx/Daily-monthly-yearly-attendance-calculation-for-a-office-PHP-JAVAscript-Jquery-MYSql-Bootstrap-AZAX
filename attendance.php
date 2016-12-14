<?php
session_start();   
   if(!isset($_SESSION['login_user'])){
      header("location: index.php");
	  
   }
    date_default_timezone_set('Asia/Dhaka');
 if($_SERVER["REQUEST_METHOD"] == "POST") {
        include('connection.php');	
		$username = $_POST['username'];
		$designation=$_POST['designation'];
		$en_time=date('Y:m:d H:i:s');
		$ent_time=date('H:i:s');
        $entry_time = new DateTime($ent_time);
		$office_time = new DateTime('10:00:00');
		
		if($entry_time > $office_time){
		 $since_start = $entry_time->diff(new DateTime('10:00:00'));
		 $hour= $since_start->h.' hours';
		 $minutes=$since_start->i.' minutes';
		}

	if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
	}	
	$sql = "INSERT INTO profile (username,designation,en_time,late_hour,late_minutes)VALUES('$username','$designation','$en_time','$hour','$minutes')";
	if ($connection->query($sql) === TRUE) {
     echo"Sucessfully Inserted";
	} else {
		echo "Error: " . $sql . "<br>" . $connection->error;
	}
	$connection->close();
	

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
			<button onclick="window.location.href='attendance.php'" type="button" class="btn btn-primary">Daily Attendance</button>
			<?php
			if ($_SESSION['catagory']==1){
				?>
				   <button onclick="window.location.href='show.php'" type="button" class="btn btn-primary">Show Attendance</button>
				<?php
			}
			else{
				?>
				   <button onclick="window.location.href='show_hr.php'" type="button" class="btn btn-primary">Show Attendance</button>
				<?php
			}
			?>
			<button type="button" class="btn btn-primary">Sony</button>
       </div>
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Daily Attendance Sheet.. </h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
	  
	  <form  action="" method="POST" id="attendance_form">
			<div class="form-group">
			    <div class="col-sm-3">
					<label for="ex1">Name:</label>
					<input class="form-control" name="username" id="ex1" type="text" value="<?php echo $_SESSION['login_user'];?>"readonly>
			    </div>
			    <div class="col-sm-3">
					<label for="ex2">Designation</label>
					<input class="form-control" name="designation" id="ex2" type="text" value="<?php echo $_SESSION['designation'];?>"readonly>
			    </div>
			    <div class="col-sm-3">
					<label for="ex3">En.Time</label>
					<input class="form-control" name="en_time" id="ex3" type="text" value="<?php echo date('Y:m:d H:i:s');?>"readonly>
			    </div>
				<?php
				   
					  include("connection.php");
						
					  $sql = "SELECT * FROM profile WHERE username = '{$_SESSION['login_user']}' and designation = '{$_SESSION['designation']}'";
					  $result = mysqli_query($connection,$sql);	  				  
					  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);					  
					  $count = mysqli_num_rows($result);					  
					  if($count >0 ) {
						 ?> 
						 <div class="col-sm-3">
					         <label for="ex4">Ex.Time</label>
					         <input class="form-control" name="ex_time" id="ex4" type="text" readonly>
			             </div>  
						 <?php
					  }					    					  
				   
				?>
				<br/><br/><br/>
			    <div class="col-sm-3">
				    <label for="ex5"></label> 
                    <input type="submit" class="form-control" id="ex5">
					
			    </div>
			</div>
      </form>
				<?php
				   
					  include("connection.php");
						
					  $sql = "SELECT * FROM profile WHERE username = '{$_SESSION['login_user']}' and designation = '{$_SESSION['designation']}' and DATE(en_time)= CURDATE() ";
					  $result = mysqli_query($connection,$sql);
					  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);						  
					  $count = mysqli_num_rows($result);									  
					  if($count ==1) {
                        header("location:attendance_cmt.php"); 
					  }					    					  
				   
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

