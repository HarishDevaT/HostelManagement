<?php

 $server = "localhost";
 $username = "root";
 $password = "";

 $query="insert into studentdetails values ( '".$_POST["name"]."','".$_POST["class"]."','".$_POST["sphnno"]."','".$_POST["p1phnno"]."','".$_POST["p2phnno"]."','".$_POST["gphnno"]."','".$_POST["email"]."','".$_POST["rmno"]."','".$_POST["password"]."','".$_POST["yrofsdy"]."','".$_POST["hstno"]."','".$_POST["flrno"]."');";

  $sql = "select * from studentdetails where name = '".$_POST["name"]."'and rmno = '".$_POST["rmno"]."';";
 $con = new mysqli($server,$username,$password,"hostel");
 
   $result=$con->query($sql);
   if($result->num_rows>0)
   {
    include('login.html');
    echo "<script>document.getElementById('userfound').innerHTML= 'User Found!!'</script>" ;
   }
 else if($con->query($query))
  {
    include('index.php');
    echo "<script>document.getElementById('logina').style.display='none' ;</script>" ;
    echo "<script>document.getElementById('manicon').style.display='block' ;</script>" ;

    $url='outpass.php';
    $var='name='.$_POST['name'].'&password='.$_POST['password'].'&roomno='.$_POST['rmno'];
    
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$var);
    curl_setopt($ch,CURLOPT_HEADER,0);
  }
 else
   echo "OOPS!!" ;
 
 ?>
