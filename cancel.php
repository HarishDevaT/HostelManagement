<?php
     session_start() ;
    $host="localhost" ;
$usrname="root";
$password="";
$con = new mysqli($host,$usrname,$password,'hostel');
if ($con->connect_error)
 {
    echo "OOps!!!" ;
  }
else
 {
   $query = "delete FROM admin where name='".$_SESSION['name']."'and password ='".$_SESSION['password']."';";
   $con->query($query) ;
   echo "<script>window.alert('Request Cancelled');history.go(-2);</script>";
 }
?>