<?php
session_start();
include "db-connection.php";

$sql = "SELECT * FROM user_details WHERE user_id='{$_SESSION['id']}'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) >= 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['age'] = $row['age'];
    $_SESSION['gender'] = $row['gender'];
    $_SESSION['height'] = $row['height'];
    $_SESSION['weight'] = $row['weight'];
}else {
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
    <title>USER DETAILS</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php if (isset($_GET['response'])) { ?>
        <p class="response"><?php echo $_GET['response']; ?></p>
    <?php } ?>

    <div class="user-details">
        <p class="user-label-title">Welcome back, <?php echo $_SESSION['user_name']; ?></p>
        <p class="user-label">Age:</p>
        <p class="user-info"><?php echo $_SESSION['age']; ?></p>
        <p class="user-label">Gender:</p>
        <p class="user-info"><?php echo $_SESSION['gender']; ?></p>
        <p class="user-label">Height:</p>
        <p class="user-info"><?php echo $_SESSION['height']; ?>cm</p>
        <p class="user-label">Weight</p>
        <p class="user-info"><?php echo $_SESSION['weight']; ?>kg</p>
        <br>
        <a href="editdetails.php" class="edit-btn">Edit</a>
    </div>
    
    <a href="home.php" class="nav-link back-btn">⮜ Back</a><br>
</body>
</html>

