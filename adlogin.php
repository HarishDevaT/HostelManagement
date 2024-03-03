<html>
<body>
<?php
    session_start();
    $_SESSION['adminpassword']= $_POST['adminpassword'];
    $_SESSION['adminname']= $_POST['adminname'];
    $_SESSION['adminpos']= $_POST["adminpos"] ;
	$servername="localhost";
	$username = "root";
	$password="";
	$query = "select * from manage where name='".$_POST['adminname']."'&&pass='".$_POST['adminpassword']."';";
	$con= mysqli_connect($servername,$username,$password,'hostel');
	$result = $con->query($query);
	if($result->num_rows>0)
	{
	 $rows = $result->fetch_assoc();
	    echo " <form  name=myform id=toout method=post action='admin.php'>
                   <input type='hidden' name='name' value= ".$_POST["adminname"]." >
                   <input type='hidden' name='password' value=".$_POST["adminpassword"]." >
                   <input type='hidden' name='password' value=".$_POST["adminpos"]." >
                   <input type='hidden' name=logstat value ='Yes'>
                   </form>" ;
            echo "<script>document.getElementById('toout').submit()</script>" ;
            echo "done" ;
        }
	else if($result->num_rows == 0)
	{
        include("adlogin.html");
        echo "<script>document.getElementById('usr').innerHTML= 'No Users Found'</script>" ;
	} 
	?>
 </body>
</html>
