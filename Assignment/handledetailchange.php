<?php
session_start();
include "db-connection.php";

if(isset($_POST['uname']) && isset($_POST['age']) && isset($_POST['gender']) && isset($_POST['height']) && isset($_POST['weight'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }
}

$uname = validate($_POST['uname']);
$age = validate($_POST['age']);
$gender = validate($_POST['gender']);
$height = validate($_POST['height']);
$weight = validate($_POST['weight']);

if(empty($uname)) {
    header("Location: editdetails.php?error=Username is required");
    exit();
}

$sql = "SELECT * FROM user_details WHERE user_id='{$_SESSION['id']}'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) >= 1) {
    $sql = "UPDATE user_details SET user-name='$uname', age='$age', gender='$gender', height='$height', weight='$weight' WHERE user_id='{$_SESSION['id']}'";
}else {
    $sql = "INSERT INTO user_details (user_id, user_name, age, gender, height, weight) VALUES ('{$_SESSION['id']}', '$uname', '$age', '$gender', '$height', '$weight')";
}

if ($conn->query($sql) === TRUE) {
    header("Location: userprofile.php?response=Record updated/added successfully");
    exit();
} else {
    header("Location: userprofile.php?response=Error updating record");
    exit();
}
?>

