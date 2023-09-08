<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "loginsystem";

$con = mysqli_connect($serverName, $userName, $password, $dbName);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = mysqli_real_escape_string($con, $_SESSION['username']);

$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($con, $sql);

if (!$result) {
    echo "Error fetching user data: " . mysqli_error($con);
    exit();
}

if ($row = mysqli_fetch_assoc($result)) {
    $fullName = $row['full_name'];
    $email = $row['email'];
    // Add more fields as needed
} else {
    echo "User not found!";
    exit();
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, <?php echo $fullName; ?></title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <header>
        <h2 class="logo"><!-- Your logo here --></h2>
        <nav class="navigation">
            <a href="Home.php">Home</a>
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <div class="wrapper">
        <div class="profile-box">
            <h2>Welcome, <?php echo $fullName; ?></h2>
            <p><strong>Username:</strong> <?php echo $username; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <!-- Add more profile information here as needed -->
        </div>
        <div class="clock" id="clock"></div>
    </div>
    

    
</body>
</html>
