<!DOCTYPE html>
<html>
    <head>
      
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Aboreto&display=swap" rel="stylesheet">
      <title>REGISTRATION PAGE</title>
      
      

    </head>
    <body>
    <!-- partial:index.partial.html -->
<section class='login' id='login'>
    <div class='head'>
    <h1 class='company'>REGISTRATION PAGE</h1>
    </div>
    <p class='msg'>Welcome </p>
    <div class='form'>
      <form method="POST">
    <input type="text" name="email" placeholder='username' class='text' id='email' required><br>
    <input type="password" name="password" placeholder='Password' class='password'><br>
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Register</button>
    
    <a href="/pr1/Login.php" class='Login'>Login?</a>
      </form>
    </div>
  </section>
  <footer>
   
  </footer>
  <!-- partial -->
  <script>
    
    //var btnLogin = document.getElementById('do-login');//
//var idLogin = document.getElementById('login');
//var email = document.getElementById('email');//
//btnLogin.onclick = function(){//
//idLogin.innerHTML = '<p>We\'re happy to see you , </p><h1>' +email.value+ '</h1>';//
//}
  </script>
  <?php
     //connecting to database//
     $servername = "localhost";
     $username = "root";
     $password = "";
     $database = "credentials";
     $conn = mysqli_connect($servername, $username, $password, $database);
     
    
    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];
     
         
         
        //submitting to a database//
        $sql = "INSERT INTO `credentials` ( `email`, `password`) VALUES ('$email', '$password');";
        $result = mysqli_query($conn, $sql);

     }
  
  ?>



    </body>
</html>



<?php








?>





