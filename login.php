<html>
<body>
<?php
	$servername="localhost";
	$username = "root";
	$password="";
	$query = "select * from studentdetails where name='".$_POST["lgname"]."'&&password='".$_POST["lgpassword"]."';";
	$con= mysqli_connect($servername,$username,$password,'hostel');
	$result = $con->query($query);
	else if($result->num_rows>0)
	{
	 $rows = $result->fetch_assoc();
	    echo " <form  name=myform id=toout method=post action='index.php'>
                   <input type='hidden' name='name' value= ".$_POST["lgname"]." >
                   <input type='hidden' name='password' value=".$_POST["lgpassword"]." >
                   <input type='hidden' name=logstat value ='Yes'>
                   </form>" ;
            echo "<script>document.getElementById('toout').submit()</script>" ;
            echo "done" ;
        }

	else if($result->num_rows == 0)
	{
	 include('login.html');
         echo "<script>document.getElementById('usr').innerHTML= 'No Users Found'</script>" ;
	} 
	?>
 </body>
</html>
