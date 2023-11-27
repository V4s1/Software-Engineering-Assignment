<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT DETAILS</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="handledetailchange.php" method="post">
        <h2>EDIT PROFILE</h2>
        <br>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>Username</label>
        <input type="text" name="uname"><br>
        <label>Age</label>
        <input type="number" name="age" min="1" placeholder="1"><br>
        <label>Gender</label>
        <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br>
        <label>Height</label>
        <input type="number" name="height" min="1" placeholder="cm"><br>
        <label>Weight</label>
        <input type="number" name="weight" min="1" placeholder="kg"><br>
        <input type="submit" value="Save"></input>
    </form><br>
    <a href="userprofile.php" class="nav-link back-btn">⮜ Back</a>
</body>
</html>

