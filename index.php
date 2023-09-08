<?php
function curlX($social, $username)
{
    $url = "https://api-proxy.get.inc/check-username/".$social."/".$username;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $res = curl_exec($ch);
    curl_close($ch);
    
    if($res == "true")
        return "<span style='color:green'>Available!</span>";
    return "<span style='color:red'>Not Available!</span>";
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']))
{
    $username = $_POST['username'];
    $instagram = curlX('instagram', $username);

    $username = $_POST['username'];
    $facebook = curlX('facebook', $username);

    $username = $_POST['username'];
    $twitter = curlX('twitter', $username);

    $username = $_POST['username'];
    $linkedin = curlX('linkedin', $username);

    $username = $_POST['username'];
    $youtube = curlX('youtube', $username);

    $username = $_POST['username'];
    $snapchat = curlX('snapchat', $username);



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="download (2).png" type="image/icon type">
    <title>Uername Checker</title>
    <style>
        .cl {
            width: 70%;
            height: 60px;
            margin: 10px;
        }
        </style>
</head>
<body>

    <header id="hd">
        <h2  class="logo" ></h2>
        <nav class="navigation">
          <a href="Home.php">Home</a>
          <a href="login.php">Login</a>
          <a href="reg.php">Register </a>
          <a href="contact.php">contact</a>
          <!-- <input type="checkbox" class="checkbox"> -->
          <script>
    // Function to toggle dark mode on the body element
    function toggleDarkMode() {
      document.body.classList.toggle('dark-mode');
      document.getElementById('hd').classList.toggle('dark-hd');
    }
  </script>
      <button onclick="toggleDarkMode()" class="toggle">Toggle Dark Mode</button>

          
        </nav>
      </header>
      <div id="particles-js" style="
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
">

</div>
<div style="margin-top: 250px">
      <center>
    <form action="" method="post">
    
    
    <h1>Social Media Username Checker</h1>
    <br>
        <div class="input-box" style="display:flex; width:50%">
      <span class="icon"><ion-icon name="mail"></ion-icon></span>
      <input style="width:70%" type="text" name="username" required> 
      <button style="width:40%" type="submit" class="btn">Check</button>
      <label>Username</label>

    </div>
   
</form>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']))
{
?>

    <p class="wrapper cl">
    <img src="https://uploads-ssl.webflow.com/62a1d1a0ec4af83867f15047/62ff68eef3feaebc2f91a1eb_instagram-brands_seo-tool.svg">
    &nbsp;
    Instagram:&nbsp;<?=$instagram?>
    </p>


    <p class="wrapper cl">
    <img src="https://uploads-ssl.webflow.com/62a1d1a0ec4af83867f15047/62ff68ed1b6a211bffd68add_facebook-brands_seo-tool.svg">
    &nbsp;
    Facebook:&nbsp;<?=$facebook?>
    </p>

    <p class="wrapper cl">
    <img src="https://uploads-ssl.webflow.com/62a1d1a0ec4af83867f15047/62ff68f2d8582770563d3faf_twitter-brands_seo-tool.svg">
    &nbsp;
    twitter:&nbsp;<?=$twitter?>
    </p>

    <p class="wrapper cl">
    <img src="https://uploads-ssl.webflow.com/62a1d1a0ec4af83867f15047/62ff68ed12d11d0f2cb53a90_linkedin-brands_seo-tool.svg">
    &nbsp;
    linkedin:&nbsp;<?=$linkedin?>
    </p>

    <p class="wrapper cl">
    <img src="https://uploads-ssl.webflow.com/62a1d1a0ec4af83867f15047/62ff68f3c7c585701a511abd_youtube-brands_seo-tool.svg">
    &nbsp;
    youtube:&nbsp;<?=$youtube?>
    </p>

    <p class="wrapper cl">
    <img src="https://uploads-ssl.webflow.com/62a1d1a0ec4af83867f15047/62ff68f1c7c5850e1e511a93_snapchat-brands_seo-tool.svg">
    &nbsp;
    snapchat:&nbsp;<?=$snapchat?>
    </p>

<?php
}
?>
    </center>
</div>

    <script src="particles.min.js"></script>
<script src="app.js"></script>
</body>
</html>