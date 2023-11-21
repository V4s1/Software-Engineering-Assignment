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
        <label>Age</label>
        <input type="text" name="age" placeholder="0"><br>
        <label>Gender</label>
        <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br>
        <label>Height</label>
        <input type="text" name="height" placeholder="cm"><br>
        <label>Weight</label>
        <input type="text" name="weight" placeholder="kg"><br>
        <input type="submit" value="Save"></input>
    </form><br>
    <a href="userprofile.php" class="nav-link back-btn">⮜ Back</a>
</body>
</html>

