<?php
session_start();
require_once "pdo.php";
$sess= session_id();
if (isset($_SESSION['email'])&&isset($_SESSION['name'])){
    $sql = "SELECT * FROM users WHERE name=:name AND email = :email";
    print_r($_SESSION);
    #find the user balance
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':email' => $_SESSION['email'],
        ':name' => $_SESSION['name']
    ));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $user_balance = $row['balance'];
    echo "User balance is $user_balance <br>";

    #find all the items and their prices as an assoc array
#    $stmt2 = $pdo->query("select item_id, price from inventory");
#   $results  = $stmt2->fetchAll(PDO::FETCH_KEY_PAIR);

    $stmt3 = $pdo->query("select item_id, item_name, price from items");
   
    while($row2 = $stmt3->fetch(PDO::FETCH_ASSOC)){ 
        echo $row2['item_name'];
        echo ("<br>Price is". $row2['price']."<br>");
        echo ("Enter Quantity <form method = 'post'><input type='number' name = 'qty'><br><input type = 'hidden' name ='item_id' value =".$row2['item_id']."><br>");
        echo ("<input type = 'submit' value = 'Buy'></form><br>");      
    }
    
    if (isset($_POST['item_id']) && isset($_POST['qty'])) {
    #add sql to check whether item is already present 
        $sql2 = "INSERT INTO `cart` (`user_id`, `session_id`, `product_id`, `quantity`) VALUES (:userid, :sessid, :itemid, :qty)";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute(array(
            ':userid' => $_SESSION['user_id'],
            ':sessid' => $sess,
            ':itemid' => $_POST['item_id'],
            ':qty' => $_POST['qty']
        ));
    }
        
        
        //     print_r($_POST);
    //     $user_balance = $user_balance - ($_POST['qty']*$_POST['price']);
    //     echo "Success. Your balance is" ;
    //     echo $user_balance; 
}


    


?>




