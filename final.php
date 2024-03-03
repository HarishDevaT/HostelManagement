<html>
   <head>
      <title>Status</title>
      <link rel="stylesheet" href="final.css">
      <script src=
"https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js">
    </script>
   </head>
   <body>
      <h1 id="head" >Status</h1><br><br><br>
      <ul id="progress">
         <li id="rqst">
            <div class="admins">
               <img src="user.png" alt="tut">
               <h2>Requested</h2>
            </div>
            <span><img src="checked.png" alt="done"></span>
         </li><li id="rqst">
            <div class="admins">
               <img src="user.png" alt="tut">
               <h2>Tutor</h2>
            </div>
            <div id="tut"></div>
         </li>
         <li id="tut">
            <div class="admins">
               <img src="user.png" alt="tut">
               <h2>HOD</h2>
            </div>
            <div id="hod"></div>
         </li>
         <li id="awrd">
            <div class="admins" >
               <img src="user.png" alt="tut">
               <h2>Associate Wadern</h2>
            </div>
            <div id="assocwadern"></div>
         </li>
         <li id="wrd">
            <div class="admins">
               <img src="user.png" alt="tut">
               <h2>Wadern</h2>
            </div>
            <div id="wadern"></div>
         </li>
      </ul>
      <a href="cancel.php"id="cancl"><button id="cancel">Cancel</button></a>
      <button id="download" onclick="pdfGene()">PDF</button>
      <script>
         function pdfGene(){
            let doc = new jsPDF("p", "mm", [300, 300]);
            let makePDF = document.querySelector("#pdf");
            doc.fromHTML(makePDF);
            doc.save("output.pdf");
         }
      </script>
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
   $query = "SELECT * FROM admin where name='".$_SESSION['name']."'and password ='".$_SESSION['password']."';";
   $result= $con->query($query) ;
   if($result->num_rows>0)
    { 
      $rows = $result->fetch_assoc() ;  
      if($rows['tut']=="N"||$rows['hod']=="N"||$rows['assocwad']=="N"||$rows['deptwad']=="N"){
         echo "<script>window.alert('Request rejected')</script>" ;
         $qry = "delete from admin where name = '".$_SESSION['name']."' and password = '".$_SESSION['password']."';";
         $con->query($qry);
         echo "<script>history.back();</script>";
      }
      else if($rows['tut']!="Y"||$rows['hod']!="Y"||$rows['assocwad']!="Y"||$rows['deptwad']!="Y"){
         echo "<script>const btn = document.getElementById('download');
         btn.setAttribute('disabled','') ;
         </script>" ;
      }
      else if($rows['tut']=="Y"&&$rows['hod']=="Y"&&$rows['assocwad']=="Y"&&$rows['deptwad']=="Y"){
         echo "<script>const btn = document.getElementById('download');
         btn.setAttribute('enabled','') ;
         </script>" ;
         echo "
          <div id='pdf'><hr>Leaving Date : ".$_POST['levdate']."    Leaving Time: ".$_POST['levtime'].
          "<br>Entering Date : ".$_POST['entdate']."    Entering Time : ".$_POST['enttime']."
          <br>Name : ".$_SESSION['name']."<br>
          <h2>Verified</h2>
          <br><br>
          Leaving Date : ".$_POST['levdate']."    Leaving Time: ".$_POST['levtime'].
          "<br>Entering Date : ".$_POST['entdate']."    Entering Time : ".$_POST['enttime']."
          <br>Name : ".$_SESSION['name']."<br>
          <h2>Verified</h2>
          <hr>
          <div>
         ";
      }
      if($rows['tut']==null){
         echo "
         <script>
          var image1 = document.createElement('img');
          image1.setAttribute('src','Nchecked.png');
          document.getElementById('tut').appendChild(image1);
         </script>" ;
      }
      else{
         echo "
         <script>
          image1 = document.createElement('img');
          image1.setAttribute('src','checked.png');
          document.getElementById('tut').appendChild(image1);
         </script>" ;
      }if($rows['assocwad']==null){
         echo "
         <script>
          image1 = document.createElement('img');
          image1.setAttribute('src','Nchecked.png');
          document.getElementById('assocwadern').appendChild(image1);
         </script>" ;
      }
      else{
         echo "
         <script>
          image1 = document.createElement('img');
          image1.setAttribute('src','checked.png');
          document.getElementById('assocwadern').appendChild(image1);
         </script>" ;
      }if($rows['deptwad']==null){
         echo "
         <script>
          image1 = document.createElement('img');
          image1.setAttribute('src','Nchecked.png');
          document.getElementById('wadern').appendChild(image1);
         </script>" ;
      }
      else{
         echo "
         <script>
          image1 = document.createElement('img');
          image1.setAttribute('src','checked.png');
          document.getElementById('wadern').appendChild(image1);
         </script>" ;
      }
      if($rows['hod']==null){
         echo "
         <script>
          image1 = document.createElement('img');
          image1.setAttribute('src','Nchecked.png');
          document.getElementById('hod').appendChild(image1);
         </script>" ;
      }
      else{
         echo "
         <script>
          image1 = document.createElement('img');
          image1.setAttribute('src','checked.png');
          document.getElementById('hod').appendChild(image1);
         </script>" ;
    }
   }
   else{
      $query = "insert into admin values('".$_SESSION['name']."','".$_SESSION['password']."','".$_POST['enttime']."','".$_POST['entdate']."','".$_POST['levtime']."','".$_POST['levdate']."',null,null,null,null);";
            $con->query($query);
      echo "<script>window.alert('Request Done')</script>" ;
   }
 }
?>
   </body>
</html>