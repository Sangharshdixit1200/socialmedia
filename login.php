<?php
$k = 0;
if ($k == 1) {
    require_once 'autoload.php'; // Replace with the actual path to the Google API client library

    // Set up the Google API client
    $client = new Google_Client();
    $client->setClientId('1000636123089-svk1errmls8h5vsv0ifedso46s9ct1tr.apps.googleusercontent.com'); // Replace with your actual client ID
    $client->setClientSecret('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'); // Replace with your actual client secret
    $client->setRedirectUri('afterlogin.php');
    $client->addScope("email");
    $client->addScope("profile");

    // Check if the user is already authenticated or not
    session_start();
    if (!isset($_SESSION['access_token'])) {
        // If not authenticated, redirect to Google's authentication page
        $authUrl = $client->createAuthUrl();
        header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
    } else {
        // If authenticated, fetch user data
        $client->setAccessToken($_SESSION['access_token']);
        $oauth2 = new Google_Service_Oauth2($client);
        $userData = $oauth2->userinfo->get();

        // Now you have access to user's data like $userData->email, $userData->name, etc.
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Username</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.all.min.js"></script>

  <meta name="google-signin-client_id" content="YOUR_CLIENT_ID"> <!-- Replace with your actual client ID -->
  <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<body>
<script>
    function popup(val){
      if(val == "success"){
      Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Login successful!',
            showConfirmButton: false,
            timer: 1500
            
          }).then(function() {
            
      // Redirect to the next page after successful login
            window.location.href = "afterlogin.php"; // Replace with the desired URL
    });
        }
        // location.href
        else{
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Invalid login!'
          })
        }
    }
</script>

<?php
if (isset($_POST["username"])) {
    include "db.php"; // Make sure to include the correct database connection file
    session_start();
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$pass."'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0){
        $_SESSION['username'] = $username;
        echo "<script>popup('success')</script>";
    }
    else {
        echo "<script>popup('error')</script>";
    }
}
?>

<header>
  <h2 class="logo"></h2>
  <nav class="navigation">
    <a href="index.php">Home</a>
    <a href="login.php">Login</a>
    <a href="reg.php">Register</a>
    <a href="contact.php">Contact</a>
  </nav>
</header>
 
<div class="wrapper">
  <div class="form-box login">
    <h2>Login</h2>
    <form method="post">
      <div class="input-box">
        <span class="icon"><ion-icon name="mail"></ion-icon></span>
        <input type="text" name="username" required>
        <label>Username</label>
      </div>
      <div class="input-box">
        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
        <input type="password" name="password" required>
        <label>Password</label>
      </div>
      <div class="remember-forget">
        <label><input type="checkbox">Remember me</label>
        <a href='#'>Forgot Password?</a>
      </div>
      <br>
      <button type="submit" id="loginButton" class="btn">Login</button>
      <div class="g-signin2" data-onsuccess="onSignIn"></div>
      <div class="login-register">
        <p>Don't have an account?<a href="#" class="register-link">Register</a></p>
      </div>
    </form>
  </div>
</div>

<script>
  function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    var id_token = googleUser.getAuthResponse().id_token;

    // Send the id_token to your server for verification and user authentication
    // You can use AJAX or any other method to send the token to your server

    // Example using AJAX:
    // $.ajax({
    //   type: "POST",
    //   url: "your-server-url.php",
    //   data: { id_token: id_token },
    //   success: function(response) {
    //     // Handle the response from your server
    //   }
    // });

    // For testing purposes, you can print user information to the console
    console.log('ID: ' + profile.getId());
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail());
  }
</script>

</body>
</html>
