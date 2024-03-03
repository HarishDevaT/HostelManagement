 
 function togglePassword()
 {
  if(document.getElementById("lgpassword").type=="password")
  {
   document.getElementById("lgpassword").type="text";
   document.getElementById("togglePassword").style.display= "none";
   document.getElementById("togglePasswords").style.display= "block";
  }
  else
  {
   document.getElementById("lgpassword").type="password";
   document.getElementById("togglePasswords").style.display="none";
   document.getElementById("togglePassword").style.display="block";
   }
 }

  
