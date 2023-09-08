
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
            title: 'Registration successfull!',
            showConfirmButton: false,
            timer: 1500
          });
        }
        else{
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!'
          })
        }
    }

    </script>
    <?php
if(isset($_POST["username"]))
{
  include "db.php";
  $username = $_POST['username'];
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $sql = "INSERT INTO users (email, username, password) VALUES ('".$email."', '".$username."', '".$pass."')";

  if (mysqli_query($con, $sql))
    echo "<script>popup('success')</script>";
  else
    echo "<script>popup('error')</script>";
}

?>
<header>
  <h2 class="logo"></h2>
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
  <h2>Registration</h2>
  <form method="post">

      <div class="input-box">
        <span class="icon"><ion-icon name="person"></ion-icon></span>
        <input type="text" name="username" required>
        <label>Username</label>
      </div> 


      <div class="input-box">
        <span class="icon"><ion-icon name="mail"></ion-icon></span>
        <input type="email" name="email" required>
        <label>Email</label>
      </div>
      <div class="input-box">
        <span class="icon"><ion-icon name="lock-closed"></ion-icon></ion-icon></span>
        <input type="password" name="password" required>
        <label>Password</label>
      </div>
      <div class="remember-forget">
        <label><input type="checkbox" required>I agree to the terms & conditions</label>
        <br>
        <br>
      <button type="submit" class="btn">Register</button>
      <div class="login-register"><p>Already have an acoount?<a 
        href="login.php" 
         class="login-link">Login</a>
      </p>
      </div>
    </div>
    </form>

 
  <!-- <div class="wrapper">
    <span class="icon-close">
      <ion-icon name="close-circle-outline"></ion-icon>
    </span>
   
</div> -->
<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  
</body>
</html>