<?php
    session_start();
    
   
   $con= mysqli_connect('localhost','root');
    if($con){
        echo "connected";
    }
    else{
        echo "Not connected";
    }
    mysqli_select_db($con,'h4h');
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $quer = "select * from register 
    where username = '$username' && email = '$email' && password ='$password'";
    $result = mysqli_query($con,$quer);
    $num = mysqli_num_rows($result);
    if($num ==1){
      echo "Duplicate data";
    }
    else{
        $querr = "insert into 
        register(username,email,password) values('$username','$email','$password')";
        mysqli_query($con,$querr);      
        header('location:login.html');    
    }

?>