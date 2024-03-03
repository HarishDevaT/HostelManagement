<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <center><h1>Manager</h1></center>
    <form class = "det" method="post" action="manager.php" >
        <center><h3>Add Admin</h3></center>
        Enter Name : <br>
        <input required type="name" name="addname"> <br>
        Enter Position : <br>
        <input required type="name" name="addpos"> <br>
        Enter Password : <br>
        <input required name="addpass" type="Password"> <br>
        <button type="submit">Add</button>
    </form>
    <div>
        <h2>Admins</h2>
    </div>
    <?php
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
            if(isset($_POST['addname'])&&isset($_POST['addpos'])&&isset($_POST['addpass'])){
                $query = "select * from manage where name='".$_POST['addname']."' and pos='".$_POST['addpos']."' and pass='".$_POST['addpass']."';";
                $result = $con->query($query);
                if($result->num_rows>0){
                    echo "<script>window.alert('User Exist')</script>";
                }
                else{
                 $squery = "insert into manage values ('".$_POST['addname']."','".$_POST['addpos']."','".$_POST['addpass']."');";
                 if($con->query($squery)){   
                   echo "<script>window.alert('User Added')</script>";
                   echo "<script>window.back()</script>";
                }
                 else{
                   echo "<script>window.alert('Error Occured')</script>" ;
                   echo "<script>window.back()</script>";
                }
                }
              }
              if(isset($_POST['removename'])&&isset($_POST['removepos'])&&isset($_POST['removepass'])) {
                $query = "delete from manage where name='".$_POST['removename']."' and pos='".$_POST['removepos']."' and pass='".$_POST['removepass']."';";
                if($con->query($query)){
                  echo "<script>window.alert('User Removed');</script>";
                  echo "<script>window.back()</script>";
                }
                else{
                    echo "<script>window.alert('Error Occured');</script>";
                    echo "<script>window.back()</script>";
                }
              }
            $aquery = "SELECT * FROM manage ;";
            $aresult = $con->query($aquery);
            if($aresult->num_rows>0){
                while($value = mysqli_fetch_array($aresult)){
                echo "<form action='manager.php' method='post'><div class=det>
                <p>Name : ".$value['name']."</p>
                <p>Position : ".$value['pos']."</p>
                <p>Password : ".$value['pass']."</p><br>
                <button name='removename'  id='reject' value='".$value['name']."' type=submit>Remove</button>
                <input type='hidden' name='removepass' value='".$value['pass']."'>
                <input type='hidden' name='removepos' value='".$value['pos']."'>
            </div><br></form>";   
                } 
            }
           }
    ?>
</body>
</html>