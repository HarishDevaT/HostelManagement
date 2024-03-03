<html>
  <head>
    <title>Details</title>
    <link rel=stylesheet href="details.css">
  <head>
  <body>
     <h1>Edit Details</h1>
     <form method="POST" action="update.php">
  <div id=inputs>
    <div class=name>
   Student's Phn  Number <br>  <input type =tel pattern=[0-9]{10} name=sphnno id="sphnno" placeholder=" your number" required>
   </div>
    <div class=name>
   Parent's-1 Phn Number <br> <input type =tel pattern=[0-9]{10} name=p1phnno id="p1phnno" placeholder=" parents number"  required>
   </div>
    <div class=name>
   Parent's-2 Phn Number <br> <input type =tel  pattern=[0-9]{10} name=p2phnno id="p2phnno" placeholder=" parents number"  required>
   </div>
    <div class=name>
   Guardian's Phn Number <br>  <input placeholder=" enter phoneno"type =tel pattern=[0-9]{10} name=gphnno id="gphnno" placeholder=" gaurdian number" required>
   </div>
    <div class=name>
   E-mail     <br>   <input placeholder=" enter email" type="email" id="email" name="email"required>
   </div>
    <div class=name>
   Room Number   <br>   <input placeholder=" enter roomno" type="text" id="rmno" name="rmno"required>
   </div>
   </div>
   
  <div class=drops>
   <div class=dropn >
   <label for="yrofsdy" >Year</label> 
   <select name=yrofsdy id="yrofsdy" required>
    <option value = 1>1</option>
    <option value = 2 >2</option>
    <option value = 3 >3</option>
    <option value = 4 >4</option>
   </select><br><br>
  </div> 
  <div class=dropn >
  <label for="hstno">Hostel</label>
  <select name=hstno id="hstno" required>
   <option value = bh1 >BH1</option>
   <option value = bh2 >BH2</option>
   <option value = bh3 >BH3</option>
   <option value = gh1 >GH1</option>
  </select><br><br>
  </div>
  <div class=dropn >
  <label for="flrno">Floor</label>
   <select value="G" name=flrno id="flrno">
    <option value = g >G</option>
    <option value = f >F</option>
    <option value = s >S</option>
    <option value = t >T</option>
   </select><br><br>
    </div>
  </div>  
   <p >*for changing other details contact admin</p>
   <button name="signup" id="signup">Edit</button>
  
    </form>
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
          $query = "select * from studentdetails where name='".$_SESSION['name']."' and password='".$_SESSION['password']."';";
          $result = $con->query($query);
          if($result->num_rows>0){
            $rows = $result->fetch_assoc();
            echo "<script>document.getElementById('year').value =' ".$rows['yrofsdy']."';</script>";
            echo "<script>document.getElementById('rmno').value = '".$rows['rmno']."';</script>";
            echo "<script>document.getElementById('hstno').value = '".$rows['hstno']."';</script>";
            echo "<script>document.getElementById('flrno').value = '".$rows['flrno']."';</script>";
            echo "<script>document.getElementById('p1phnno').value = '".$rows['p1phnno']."';</script>";
            echo "<script>document.getElementById('p2phnno').value = '".$rows['p2phnno']."';</script>";
            echo "<script>document.getElementById('gphnno').value = '".$rows['gphnno']."';</script>";
            echo "<script>document.getElementById('sphnno').value = '".$rows['sphnno']."';</script>";
            echo "<script>document.getElementById('email').value = '".$rows['email']."';</script>";
          }
      }
     ?>
  </body>
<html>
