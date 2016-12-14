<?php
include('connection.php');
session_start();
$username = $_SESSION['login_user'];
$designation =$_SESSION['designation'];
$ses_sql = mysqli_query($connection,"select username from login where username = '$username'");
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session = $row['username'];
$login_designation = $row['designation'];
if(!isset($_SESSION['login_user'])){
    header("location: index.php");
}
?>

