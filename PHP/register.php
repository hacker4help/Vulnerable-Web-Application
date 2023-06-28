<?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $database = "user_details";

     $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $query = "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Successfully registered')</script>";
        } else {
            echo "<script>alert('Registration failed: " . mysqli_error($conn) . "')</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        form {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: blue;
            border: none;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            border-radius: 3px;
        }
        
        input[type="submit"]:hover {
            background-color: blueviolet;
        }
        
        .image-container {
            position: absolute;
            top: -50px;
            left: 0;
            width: 100%;
            text-align: center;
        }
        
        .image-container img {
            width: 200px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="image-container">
            <img src="../Images/H4H_Logo.png" alt="</hacker4help>">
        </div>
        <h2>Registration Form</h2>
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            
            <input type="submit" name="register" value="Register">
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
