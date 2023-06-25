<!DOCTYPE html>
<html>
    <head>
      
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Aboreto&display=swap" rel="stylesheet">
      <title>LOGIN PAGE</title>
      
      

    </head>
    <body>
    <!-- partial:index.partial.html -->
<section class='login' id='login'>
    <div class='head'>
    <h1 class='company'>LOGIN PAGE</h1>
    </div>
    
    <div class='form'>
      <form method="POST">
    <input type="text" name="email" placeholder='username' class='text' id='email' required><br>
    <input type="password" name="password" placeholder='Password' class='password'><br>
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">LOGIN</button>
    <a href="/pr1/index.php" class='register'>Want to register?</a>
    
      </form>
    </div>
  </section>
  <footer>
   
  </footer>
  <!-- partial -->
  
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
       //$sql = "INSERT INTO `credentials` ( `email`, `password`) VALUES ('$email', '$password');";
       //$result = mysqli_query($conn, $sql);

     // Check user is exist in the database
       
     $query    = "SELECT * FROM `credentials` WHERE email ='$email' AND password= '$password'";
     $result = mysqli_query($conn, $query) or die(mysqli_connect_error());
     $rows = mysqli_num_rows($result);
     
     if ($rows == 1) {
     $_SESSION['email'] = $email;
     // Redirect to user dashboard page
     
     echo "<h3>welcome</h3>";
     echo '<script type="text/javascript">
     alert("Congrats!  f3de3vrjudswe84d");
     </script>';
     } else {
     echo "<div class='form'>
     <h3>Incorrect username/password.</h3><br/>
     <p class='link'>Click here to <a href='Login.php'>Login</a> again.</p>
     </div>";
     }

     

    }



  
  ?>



    </body>
</html>



<?php








?>