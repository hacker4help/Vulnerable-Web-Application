<?php
    session_start();
    require_once "pdo.php";
    $sess=session_id();
    #$oldname = isset($_POST['name']) ? $_POST['name'] : '';
    $msg = '';
    
    if (isset($_POST['email'])&&isset($_POST['password'])){ 
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
                
                $sql = "INSERT INTO `sessions`(`session_id`, `user_id`) VALUES (:sessid,:userid)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(
                    ':sessid' => $sess,
                    ':userid' => $_SESSION['user_id']
                ));
                header('Location: shop.php');
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
         
    
?>    

<html>
    <head>
    Login page
    </head>
    <body>
        <form method = "post">
            <p> Enter email:</p>
            <input type ="text" name = "email" id = "email"/><br> 
            <p> Enter password: </p>
            <input type ="password" name = "password" id = "password"/><br>
            <input type ="submit" />
        </form>
        <?php echo $msg;?>
    </body>
</html>