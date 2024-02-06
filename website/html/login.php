<?php
    include_once '../php_servers/rules.php';

    session_start();

    // checks if the user is logged in, by checking if $_SESSION['isLoggedIn'] is set
    // if true, the user will be redirected to home.html
    // this ensures that if the user is already logged in, it does not login
    if (isset($_SESSION['isLoggedIn'])) {
        header("Location: home.php");
    }

    // handles the login form
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // gets the user data; the function returns a User object
        $user = getUser($email, $password);

        // if $user is not null, that is if exists, the user will be logged-in,
        // and its information, such as email, first name, and last name will be stored in the superglobal array $_SESSION;
        // then, the user will be redirected to home.html
        if ($user !== null) {
            $_SESSION['email'] = $email;
            $_SESSION['firstName'] = $user->firstName; $_SESSION['lastName'] = $user->lastName; $_SESSION['isLoggedIn'] = true; header("Location: home.php"); }
        else { $error = "Invalid username or password."; } 
        } 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>IT Discover Hub - Login</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css" />
  </head>

  <body>
    <div class="container">
      <div class="box1">
        <div class="details">
          <h2>Sign in</h2>
          <p>
            Please enter your details to sign in<br />
            and be part of our great team.
          </p>

          <p1> Don't have an account? </p1><br />

          <a href="sign-up.php">Sign up</a>
        </div>
      </div>

      <div class="box2">
        <form action="#" method="post">
          <img class="logo" src="../images/IDH-logo-1.png" alt="" />

          <div class="head">
            <hh> Sign in </hh>
          </div>

          <input
            type=""
            name="email"
            placeholder="Enter email address"
            required
          />
          <img
            class="image-inside-textbox"
            src="../images/email-icon.png"
            alt="Image"
          />

          <input
            type="password"
            name="password"
            placeholder="Enter Password"
            required
          />
          <img class="image-inside" src="../images/lock-icon.png" alt="Image" />
          <button type="submit">Login</button>

          <p class="fp">Don't have an account?<a href="sign-up.php">Sign up</a></p>
        </form>
      </div>
    </div>
  </body>
</html>
