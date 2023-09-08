<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.all.min.js"></script>

  <title> Contact Form </title>
   <style>
      body {
         font-family : Arial, sans-serif;
      }
      h1 {
         text-align : center;
      }
      form { margin : auto; max-width: 500px;
      }
      label { 
         display : block; margin-bottom: 10px;
      }
      input[type = "text"], input[type = "email"], textarea { padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin-bottom: 20px;
      }
      submit{ 
         background-color : #4CAF50;
         color : #fff;
         padding : 10px 20px; border :  none; border-radius : 4px; cursor : pointer;
      }
      button:hover { 
         background-color : #3e8e41;
      }
   </style>
</head> 
<body>
   <script>
    function popup(val){
      if(val == "success"){
      Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Message Sent successfull!',
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
if(isset($_POST["name"]))
{
  include "db.php";
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $sql = "INSERT INTO contacts (name, email, message) VALUES ('".$name."', '".$email."', '".$message."')";

  if (mysqli_query($con, $sql))
    echo "<script>popup('success')</script>";
  else
    echo "<script>popup('error')</script>";
}

?>


  <header>
    <h2  class="logo" ></h2>
    <nav class="navigation">
      <a href="index.php">Home</a>
      <a href="login.php">Login</a>
      <a href="reg.php">Register </a>
      <a href="contact.php">contact</a>
  
      
  
    </nav>
</header>
<form action="" method="post">  
<h1> Contact Us </h1>
   <br>
      <form method = "post" action = "sendcontact.php" >
      <div class="Contact-box">
         <label for = "name" > Name: </label>
         <input type = "text" name="name" id="name" required>
         <label for = "email" > Email: </label>
         <input type = "email" name="email" id="email" required>
         <label for = "message" > Message: </label>
         <textarea name = "message" id="message" required></textarea>
         <button type = ”submit” name = ”submit”> Submit </buton>
      </div>
    

    
      
   </form>
</body>