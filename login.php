<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.all.min.js"></script>
</head>
<body>
<script>
    function popup(val){
      if(val == "success"){
      Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Login successfull!',
            showConfirmButton: false,
            timer: 1500
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
if(isset($_POST["username"]))
{
  include "db.php";
  $username = $_POST['username'];
  $pass = $_POST['password'];
  $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$pass."'";
  $result = mysqli_query($con, $sql);
  echo mysqli_num_rows($result);

  if (mysqli_num_rows($result) > 0)
    echo "<script>popup('success')</script>";
  else
    echo "<script>popup('error')</script>";
}

?>
<header>
  <h2  class="logo" ></h2>
  <nav class="navigation">
    <a href="Home.php">Home</a>
    <a href="login.php">Login</a>
    <a href="reg.php">Register </a>
    <a href="contact.php">contact</a>

    <button class="btnlogin-popup">login</button>

  </nav>
</header>
 
<div class="wrapper">
  <span class="icon-close">
    <ion-icon name="close-circle-outline"></ion-icon>
  </span>
  <div class="form-box login">
  <h2>Login</h2>
  <form method="post">
    <div class="input-box">
      <span class="icon"><ion-icon name="mail"></ion-icon></span>
      <input type="text" name="username" required>
      <label>Username</label>
    </div>
    <div class="input-box">
      <span class="icon"><ion-icon name="lock-closed"></ion-icon></ion-icon></span>
      <input type="password" name="password" required>
      <label>Password</label>
    </div>
    <div class="remember-forget">
      <label><input type="checkbox">Remember me</label>
      <a href ='#'>Forgot Password ?</a>
    </div>
    <br>
    <button type="submit" class="btn">Login</button>
    <div class="login-register"><p>Don't have an acoount?<a 
      href="#" class="register-link">Register</a>
    </p>
    </div>
  </div>
  </form>
<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  
</body>
</html>