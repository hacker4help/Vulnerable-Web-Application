<?php
        session_start();
        
        $con= mysqli_connect('localhost','root');
    if($con){
      
    }
    else{
        echo "Not connected";
    }
    mysqli_select_db($con,'h4h');

     if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
    
    $sql = "SELECT * FROM register WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $sql) or die(mysqli_connect_error());

    if (mysqli_num_rows($result) == 1) {
      // The username and password are correct, so log the user in
      session_start();
      $_SESSION["username"] = $username;
      header("Location: index.html");
    } else {
      // The username and password are incorrect, so show an error message
      echo"Invaild credentials";
    }
    }
?>