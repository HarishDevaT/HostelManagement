<html>
  <head>
    <title>Admin</title>
    <link rel=stylesheet href="admin.css">
  <head>
  <body>
    <div id=photo>
    </div>
    <center><h1>Requested Outpass</h1></center><br>
    <div id="adminInfo">
        <h2>Admin's Info</h2>
        Admin Name : <span id="adminName"></span><br>
        Admin Position : <span id="adminPos"></span><br><br>
    </div>
    
        <!--
    <div class=det>
        Name : <span id=name></span> <br>
        Class : <span id=class></span> <br>
        Year :  <span id=year></span> <br>
        Room no : <span id=roomno></span> <br>
        Hostel : <span id=hstno></span> <br>
        Floor : <span id=flrno></span> <br>
        Parent1 : <span id=p1phnno></span> <br>
        Parent2 : <span id=p2phnno></span> <br>
        Student : <span id=sphnno></span> <br>
        Guardian : <span id=gphnno></span> <br>
    </div>
    <div id=remarkdiv>
     Remarks :<br>
      <textarea id="textar">travel safe !!</textarea>
    </div>
    -->
    <?php       
       session_start();
       echo "
       <script>
       document.getElementById('adminName').innerHTML= '".$_SESSION['adminname']."';
       document.getElementById('adminPos').innerHTML= '".$_SESSION['adminpos']."';
       </script>
       " ;
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
           if(isset($_POST['name'])&&isset($_POST['password'])&&isset($_POST['ar'])){
             $query = "update admin set ".$_POST['pos']."='".$_POST['ar']."' where name = '".$_POST['name']."' and password = '".$_POST['password']."';";
             if($con->query($query)){
              echo "<script>history.back();</script>" ;
             }
             else{
              echo "<script>window.alert('Error Occured')</script>";
             }
           }
            $aquery = "SELECT * FROM admin where ".$_SESSION['adminpos']." is null ;";
            $aresult = $con->query($aquery);
            if($aresult->num_rows>0){
                while($value = mysqli_fetch_array($aresult)){
                echo "<form method='post' action='admin.php'><div class=det>
                <p>Name : ".$value['name']."</p>
                <p>Leaving Date : ".$value['levdate']."</p>
                <p>Leaving Time : ".$value['levtime']."</p>
                <p>Entering Date : ".$value['enttime']."</p>
                <p>Entering Time : ".$value['entdate']."</p><br>
                <input type='name' hidden name='name'value=".$value['name']." >
                <input type='password' hidden name='password'value=".$value['password']." >
                <input type='name' hidden name='pos'value=".$_SESSION['adminpos']." >
                <button id='accept' type='submit' name='ar' value='Y' type=submit>Accept</button>
                <button id='reject' type='submit' name='ar' value='N' type=submit>Reject</button>
            </div></form><br>";   
                } 
            }
           }
    ?>
  </body>
<html>
