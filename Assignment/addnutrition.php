<?php
session_start();
include "db-connection.php";

if(isset($_POST['meal']) && isset($_POST['calories'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }
}

$meal = validate($_POST['meal']);
$calories = validate($_POST['calories']);
date_default_timezone_set("Uk/Bournemouth");
$date = date("Y-m-d");

if(empty($meal)) {
    header("Location: nutrition.php?error=Meal type is required");
    exit();
}else if(empty($calories)) {
    header("Location: nutrition.php?error=Calories consumed is required");
    exit();
}

$sql = "INSERT INTO nutrition (user_id, meal, calories, date) VALUES ('{$_SESSION['id']}', '$meal', '$calories', '$date')";

if ($conn->query($sql) === TRUE) {
    header("Location: nutrition.php?response=Record updated successfully");
    exit();
} else {
    header("Location: nutrition.php?response=Error updating record");
    exit();
}
?>

