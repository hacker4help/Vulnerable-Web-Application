<?php

header ("X-XSS-Protection: 0");



// Is there any input?
if( array_key_exists( "name-2", $_GET ) && $_GET[ 'name-2' ] != NULL ) {
    // Feedback for end user
    echo '<pre>Thank you ' . $_GET[ 'name-2' ] . ' for subscribing</pre>';
    header("Refresh:8; url=index.html");
}
else{
    header("Refresh:0; url=index.html");
}

?>

