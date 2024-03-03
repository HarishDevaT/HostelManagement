<html>
  <head>
    <title>Outpass</title>
    <link rel="stylesheet" href="outpass.css">
    <script src="https://kit.fontawesome.com/5b032101ce.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="cloudf" type="image/x-icon">
    <head>
  <body>
     <div class=heading >
        <h1 align="center">Issue Outpass</h1>
     </div>
     <div class=photo>
       
     </div>
     <div>
      <div class=det>
           <div>
            Name : <span id=name></span><br>
            Class : <span id=class></span><br>
            Year :  <span id=year></span><br>
            Room no : <span id=roomno></span><br>
            Hostel : <span id=hstno></span><br>
            Floor : <span id=flrno></span><br>
            Parent1 : <span id=p1phnno></span><br>
            Parent2 : <span id=p2phnno></span><br>
            Student : <span id=sphnno></span><br>
            Guardian : <span id=gphnno></span><br>
            </div>
            <div id=icon>
               <a href="details.php" alt="Edit"><i class="fa fa-edit"></i></a>
            </div>
      </div>
            <form method="post" name="myform" action="final.php">
            <div id="leave">
                Leaving  date and Time <br>  <input name=levdate id=levdate type=date requried ><input name=levtime id=levtime type=time  required ><br>
            </div>
            <div id="enter">
               Entering date and Time <br>  <input name=entdate id=entdate type=date required><input name=enttime id=enttime type=time required ><br><br>
            </div><br><br>
             Reason for leaving the Hostel :<br>
              <textarea id=textar>Going Home For Weekend</textarea><br>
              <button id='reqbtn' type="submit" >request</button><br>
            </form>
     </div>
       </div>
       <?php       
       session_start();
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
             $query = "SELECT * FROM studentdetails where name='".$_SESSION['name']."'and password ='".$_SESSION['password']."';";
             $result= $con->query($query) ;
             if($result->num_rows>0)
              {  
                 $rows = $result->fetch_assoc() ;
                 echo "<script>document.getElementById('name').innerHTML = ' ".$rows['name']."';</script>";
                 echo "<script>document.getElementById('class').innerHTML = ' ".$rows['class']."';</script>";
                 echo "<script>document.getElementById('year').innerHTML = ' ".$rows['yrofsdy']."';</script>";
                 echo "<script>document.getElementById('roomno').innerHTML = ' ".$rows['rmno']."';</script>";
                 echo "<script>document.getElementById('hstno').innerHTML = ' ".$rows['hstno']."';</script>";
                 echo "<script>document.getElementById('flrno').innerHTML = ' ".$rows['flrno']."';</script>";
                 echo "<script>document.getElementById('p1phnno').innerHTML = ' ".$rows['p1phnno']."';</script>";
                 echo "<script>document.getElementById('p2phnno').innerHTML = ' ".$rows['p2phnno']."';</script>";
                 echo "<script>document.getElementById('gphnno').innerHTML = ' ".$rows['gphnno']."';</script>";
                 echo "<script>document.getElementById('sphnno').innerHTML = ' ".$rows['sphnno']."';</script>";
                 
              }
           }
             ?>
  </body>
</html>