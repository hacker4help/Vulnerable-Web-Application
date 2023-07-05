<?php

header ("X-XSS-Protection: 0");



// Is there any input?
if( array_key_exists( "name", $_GET ) && $_GET[ 'name' ] != NULL ) {
    // Feedback for end user
    echo '<pre>Hello ' . $_GET[ 'name' ] . '</pre>';
    header("Refresh:8; url=index.html");
}
else{
    header("Refresh:0; url=index.html");
}

?>