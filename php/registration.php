
<?php
    require_once "pdo.php";
    #$oldname = isset($_POST['name']) ? $_POST['name'] : '';

    if ( isset($_POST['name'])&& isset($_POST['email'])&&isset($_POST['password'])){
        $sql = "INSERT INTO users (name,email,password) VALUES (:name,:email,:password)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':name' => $_POST['name'],
            ':email' => $_POST['email'],
            ':password' => $_POST['password']
        ));
    }
?>    

<html>
    <head>
    Registration page
    </head>
    <body>
        <form method = "post">
            <p> Enter Name: </p>
            <input type="text" name = "name" id = "name"/><br>
            <p> Enter email:</p>
            <input type ="text" name = "email" id = "email"/><br> 
            <p> Enter password: </p>
            <input type ="password" name = "password" id = "password"/><br>
            <input type ="submit" />
        </form>
        <a href="login.php">Login here</a>
        <?php 
        if($_POST){
         echo "Registered, please go to login";}?>
    </body>
</html>