<?php
 session_start();
 $hostname = "localhost";
 $username = "root";
 $password = "";
 $con = new mysqli($hostname,$username,$password,"hostel");
 if($con->connect_error){
    echo "oops!! error occured";
 }
 else{
    $query = "update studentdetails set sphnno=".$_POST["sphnno"].",p1phnno=".$_POST["p1phnno"].",p2phnno=".$_POST["p2phnno"].",gphnno=".$_POST["gphnno"].",email='".$_POST["email"]."',rmno='".$_POST["rmno"]."',yrofsdy='".$_POST["yrofsdy"]."',hstno='".$_POST["hstno"]."',flrno='".$_POST["flrno"]."' where name='".$_SESSION["name"]."' and password='".$_SESSION["password"]."' ;";
    if($con->query($query)==1){
        echo "<script>alert('Updated')</script>";
        session_abort();
        include('details.php') ;
    }
 }
?>