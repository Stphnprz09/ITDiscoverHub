<?php
    // this PHP file logs out the user, 
    // it clears the $_SESSION array that contains session information such as email, first, and lastname;
    // and call the session_destroy() function

    session_start();

    $_SESSION = array();

    session_destroy();

    header("Location: home.html");  // redirects to home.html after logout

    exit();
?>
