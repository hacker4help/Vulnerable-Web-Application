<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sample";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if ($user && $user['password'] == $pwd) {
            session_start();
            $_SESSION['id'] = "testphp.vulnweb.com";
            header("Location: ../Html/dashboard.html");
            exit(); 
        }
    }
    echo "<script>alert('Incorrect Login credentials')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login/SignUp</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
  <link rel="stylesheet" href="../CSS/loginstyle.css">
</head>
<body>
  <div class="container" id="container">
    <div class="form-container sign-up-container">
      <form action="/Html/login.php" method="POST">
        <h1>Create Account</h1>
        <div class="social-container">
          <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
          <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <span>or use your email for registration</span>
        <input type="text" placeholder="Name" />
        <input type="email" placeholder="Email" />
        <input type="password" placeholder="Password" />
        <button>Sign Up</button>
      </form>
    </div>
    <div class="form-container sign-in-container">
      <form action="" method="POST">
        <h1>Sign in</h1>
        <div class="social-container">
          <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
          <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <span>or use your account</span>
        <input id="email" name="email" type="email" placeholder="Email" />
        <input id="pwd" name="pwd" type="password" placeholder="Password" />
        <a href="#">Forgot your password?</a>
        <button type="submit" value="submit">Sign In</button>
      </form>
      <!-- If login is incorrect -->
      <!-- <?php
          // if(isset($incorrectLogin)){
          // ?> 
          // <p><?php
          // echo $incorrectLogin;
          // ?></p> 
          // <?php
          // }
      ?> -->
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Welcome Back!</h1>
          <p>To keep connected with us please login with your personal info</p>
          <button class="ghost" id="signIn">Sign In</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Hello, Friend!</h1>
          <p>Enter your personal details and start the journey with us</p>
          <button class="ghost" id="signUp">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <script src="../js/loginscript.js"></script>
</body>
</html>
