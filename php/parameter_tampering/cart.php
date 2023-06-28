<?php
session_start();
require_once "pdo.php";

if(isset($_SESSION['user_id'])&&isset($_SESSION['name'])){
    $sql = "SELECT cart.cart_id, items.item_name, items.price, cart.quantity FROM items, cart where cart.product_id = items.item_id and cart.user_id = :userid";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':userid' => $_SESSION['user_id']
    ));

    if(isset($_POST['amount'])){
        //check if user has enough balance, create new order, copy cart to orders, change balance of users
        print_r($_POST);
        print_r($_SESSION);
        $sql2 = "SELECT balance from users where user_id = :userid";
        $stmt2=$pdo->prepare($sql2);
        $stmt2->execute(array(
            ':userid' => $_SESSION['user_id']
        ));
        $row2=$stmt2->fetch(PDO::FETCH_ASSOC);
        $userbalance = $row2['balance'];
        echo $userbalance;
        $orderamount = $_POST['amount'];
        if($_POST['amount']<$userbalance){
            //create new entry in orders
            $sql2 = "INSERT INTO orders (user_id, amount) VALUES (:userid, :amount)";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute(array(
                ':userid' => $_SESSION['user_id'],
                ':amount' => $_POST['amount']
            ));
            //get order_id
            $sql2 = "select max(order_id) as order_id from orders where user_id = :userid";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute(array(
                'userid' => $_SESSION['user_id']
            ));
            
            $row2=$stmt2->fetch(PDO::FETCH_ASSOC);
            print_r($row2);
            $orderid = $row2['order_id'];
            //copy cart into order_items, delete items from cart
            $sql2 = "INSERT INTO order_items (order_id, product_id, quantity) SELECT :orderid, product_id, quantity FROM cart WHERE user_id = :userid";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute(array(
                ':userid' => $_SESSION['user_id'],
                ':orderid' => $orderid
            ));

            $sql2 = "delete from cart where user_id = :userid";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute(array(
                ':userid' => $_SESSION['user_id']
            ));

            //change user balance
            $userbalance =$userbalance - $orderamount;
            $sql2 = "UPDATE users SET balance = :userbalance WHERE user_id = :userid";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute(array(
                ':userbalance' => $userbalance,
                ':userid' => $_SESSION['user_id']
            ));
            //introduce order checking if it is success
            header('Location: receipt.php');
            exit();

        }
        else{
            echo 'Insufficient balance in account.';
        }
    }
?>


    
<?php    
    if ($stmt->rowCount() > 0) {
        echo '<table>';

        // Fetch column names
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo '<tr>';
        
        echo '<th> Sr.no. </th>';
        echo '<th> Item name </th>';
        echo '<th> Price </th>';
        echo '<th> Quantity </th>';

        echo '</tr>';

        // Fetch and display rows
        $stmt->execute(); // Reset statement to the beginning
        $total = 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            
            echo '<td>' . $row['cart_id'] . '</td>';
            echo '<td>' . $row['item_name'] . '</td>';
            echo '<td>' . $row['price'] . '</td>';
            echo '<td>' . $row['quantity'] . '</td>';

            $total = $total + ($row['price']*$row['quantity']);
            // foreach ($row as $value) {
            //     echo '<td>' . $value . '</td>';
            // }

            echo '</tr>';
        }

        echo '</table><br>';
        echo 'Total amount is : '. $total;
        echo '<br><button onclick="launchMyForm()">COnfirm purchase</button>'; 
    
    }
     else {
        echo 'No data available.';
    }

    $stmt->closeCursor(); // Close the statement
}


?>

<script>
        var totalAmount = <?php echo $total; ?>;

        function launchMyForm() {
            var myForm = document.createElement("form");
            myForm.setAttribute("id", "myForm");
            document.body.appendChild(myForm);

            var amountInput = document.createElement("input");
            amountInput.setAttribute("type", "hidden");
            amountInput.setAttribute("name", "amount");
            amountInput.setAttribute("value", totalAmount);
            myForm.appendChild(amountInput);

            myForm.method = "POST";
            myForm.action = "";
            myForm.submit();
        }
    </script>