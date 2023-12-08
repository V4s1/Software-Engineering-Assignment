<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGNUP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="adduser.php" method="post">
        <h2>CREATE ACCOUNT</h2>
        <br>
        <?php if (isset($_GET['response'])) { ?>
            <p class="response"><?php echo $_GET['response']; ?></p>
        <?php } ?>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>Username</label>
        <input type="text" name="uname" placeholder="Username"><br>
        <label>Email</label>
        <input type="email" name="email" placeholder="Email"><br>
        <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" value="Create account"></input>
    </form><br>
    <a href="index.php" class="nav-link back-btn">⮜ Back</a><br>
</body>
</html>