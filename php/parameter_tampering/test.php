<?php
if(isset($_POST['testing'])){
    echo $_POST['testing'];
}
?>

<form action="cart.php" method='post' target='_blank'>
    <input type='number' name='testing'>
    <input type="submit">
</form>

<form method = "post">
    <input type = 'text' name='testing' target='blank'>
    <input type='submit'>
</form>

