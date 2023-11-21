<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HOME</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="welcome-message-container">
            <h1 class="welcome-message">Hello, <?php echo $_SESSION['user_name']; ?></h1>
        </div>
        
        <div class="nav-container"> 
            <br>
            <a href="logout.php" class="nav-link">Logout</a><br>
            <a href="userprofile.php" class="nav-link">User Details</a><br>
            <a href="activities.php" class="nav-link">Activities</a><br>
            <a href="nutrition.php" class="nav-link">Nutrition</a><br>
        </div> 
        <div class="body-main">

        </div>
    </body>
    </html>
    <?php
}else {
    header("Location: index.php");
    exit();
}
?>