<?php
session_start();
include "db-connection.php";

$sql = "SELECT * FROM user_details WHERE user_id='{$_SESSION['id']}'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) >= 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user_name'] = $row['user_name'];
    $_SESSION['age'] = $row['age'];
    $_SESSION['gender'] = $row['gender'];
    $_SESSION['height'] = $row['height'];
    $_SESSION['weight'] = $row['weight'];
}else {
    $_SESSION['user_name'] = "...";
    $_SESSION['age'] = "...";
    $_SESSION['gender'] = "...";
    $_SESSION['height'] = "...";
    $_SESSION['weight'] = "...";
}
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
        <input type="text" name="uname" value="<?php echo $_SESSION['user_name']; ?>"><br>
        <label>Age</label>
        <input type="number" name="age" min="1" value="<?php echo $_SESSION['age']; ?>"><br>
        <label>Gender</label>
        <select name="gender" value="<?php echo $_SESSION['gender']; ?>">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br>
        <label>Height</label>
        <input type="number" name="height" min="1" value="<?php echo $_SESSION['height']; ?>"><br>
        <label>Weight</label>
        <input type="number" name="weight" min="1" value="<?php echo $_SESSION['weight']; ?>"><br>
        <input type="submit" value="Save"></input>
    </form><br>
    <a href="userprofile.php" class="nav-link back-btn">⮜ Back</a>
</body>
</html>

