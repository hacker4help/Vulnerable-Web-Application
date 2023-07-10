
<?php
    session_start();
    require_once "pdo.php";
    $sess=session_id();
    #$oldname = isset($_POST['name']) ? $_POST['name'] : '';
    $msg = '';
    

    if ( isset($_POST['name'])&& isset($_POST['email'])&&isset($_POST['password'])){
        $sql = "INSERT INTO users (name,email,password) VALUES (:name,:email,:password)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':name' => $_POST['name'],
            ':email' => $_POST['email'],
            ':password' => $_POST['password']
        ));
    }
    elseif (isset($_POST['email'])&&isset($_POST['password'])){ 
        $sql = "SELECT * FROM users WHERE password=:password AND email = :email";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':email' => $_POST['email'],
            ':password' => $_POST['password']
        ));

        if (($stmt->rowCount()==1) ){ 
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row['email'] == $_POST['email'] && $row['password'] == $_POST['password']){
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                //needs reworking
                $sql = "INSERT INTO `sessions`(`session_id`, `user_id`) VALUES (:sessid,:userid)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(
                    ':sessid' => $sess,
                    ':userid' => $_SESSION['user_id']
                ));
                header('Location: index.html');
                exit();
            }        
            else { 
                $msg = 'Incorrect input';
            }

        }
        else{
            $msg = 'Incorrect input';
        }
    } 
    else{
            $msg = 'Incorrect input';
    } 
    
         
    
?> 

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login/SignUp</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'><link rel="stylesheet" href="../CSS/loginstyle.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#" method="post">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" name="name" />
			<input type="email" name="email" />
			<input type="password" name="password" />
			<button type="submit">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#" method="post" id="SignIn">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="text" name="email" />
			<input type="password" name="password" />
			<a href="#">Forgot your password?</a>
			<button type = "submit">Sign In</button>
		</form>
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
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<!-- partial -->
  <script  src="../js/loginscript.js"></script>

</body>
</html>
=======
<?php

// Establish a connection to the database
$servername = "127.0.0.1";
$username = "admin";
$password = "passkey";
$dbname = "h4hproject1";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['email'])&&isset($_POST['password'])){
$user = $_POST['email'];
$pass = $_POST['password'];


$sql = "SELECT * FROM users WHERE email='$user' AND password='$pass'";


$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "VulnWeb{5qL_1j3ct10n_15_FUN}";
} else {
    echo "Invalid username or password";
}


$conn->close();
}
?>

