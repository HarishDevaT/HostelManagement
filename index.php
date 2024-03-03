<!DOCTYPE html>
<html>
    <head>
        <title>
            Hostel
        </title>
        <link rel="stylesheet" href="indexstyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>  
        <div id="menubar" >
            <li>
                <ul><a href="#">Home</a></ul>
                <ul onclick="document.getElementById('nextform').submit()">Outpass</ul>
                <ul><a href="#Events">Events</a></ul>
                <ul><a href="#Contact">Contact</a></ul>
            </li>
        </div>
            <h2>Current Update's</h2>
        <marquee>
            <span>There are no updates available. . . .  . . . . . . . . .</span>
        </marquee>
        <section id="Home">
        <div id="Home">
           <img src="home.jpg" alt="HostelImage">
           <p>"Hostel life is not just about sharing rooms and facilities,
               but also about sharing dreams and memories"</p>
        </div>
        </section>
        <section id="Events">
        <h2 class="sections" id="Events">Events</h2>
        <div id="galary">
            <img src="hstl4.jpg" alt="hostelCorener">
            <img src="hstl4.jpg" alt="hostelCorener">
            <img src="hstl4.jpg" alt="hostelCorener">
            <img src="hstl4.jpg" alt="hostelCorener">
            <img src="hstl4.jpg" alt="hostelCorener">
            <img src="hstl4.jpg" alt="hostelCorener">
        </div>
        </section>
        <br>
        <section id="Contact"> 
           <h2 class="sections" id="Contact">Contact</h2>
           <br><br>
           <h3>Nearby Health Center   <input type="tel" value="8567456723" class="input" id="hltcent"></h3>
           <h3>Nearby Police Station   <input type="tel" value="8567456723" class="input" id="plccent"></h3>
           <h3>Cheif  Wadern's     <input type="tel" value="8567456723" class="input" id="wrdn1"></h3>
           <h3>Associate Wadern's    <input type="tel" value="8567456723" class="input" id="wrdn1"></h3>
           <h3>Deputy Wadern's  <input type="tel" value="8567456723" class="input" id="wrdn1"></h3>
        </section>
        <div id="final">
             <p>
                
             </p>
        </div>
        <form id="nextform" method="GET" action="outpass.php" >
        </form>
        <?php
        session_start();
        $_SESSION['name'] =$_POST['name'];
        $_SESSION['password'] =$_POST['password'];
      ?>
      <script>
        function copyy1(){
         var copyText = document.getElementById("hltcent");
         copyText.setSelectionRange(0, 99999);
         alert("Copied the text: " + copyText.value);
        }
        function copyy2(){
         var copyText = document.getElementById("plccent");
         copyText.setSelectionRange(0, 99999);
         alert("Copied the text: " + copyText.value);
        }
        function copyy3(){
         var copyText = document.getElementById("wrdn1");
         copyText.setSelectionRange(0, 99999);
         alert("Copied the text: " + copyText.value);
        }
      </script>
    </body>
</html>