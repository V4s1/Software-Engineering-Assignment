<?php
session_start();
include "db-connection.php";

if(isset($_POST['type']) && isset($_POST['distance']) && isset($_POST['duration']) && isset($_POST['intensity']) && isset($_POST['date'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }

    function validateDate($data) {
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }
}

$type = validate($_POST['type']);
$distance = validate($_POST['distance']);
$duration = validate($_POST['duration']);
$intensity = validate($_POST['intensity']);
$date = validateDate($_POST['date']);

if(empty($type)) {
    header("Location: activities.php?error=Activity type is required");
    exit();
}else if(empty($distance)) {
    header("Location: activities.php?error=Distance is required");
    exit();
}else if(empty($duration)) {
    header("Location: activities.php?error=Duration is required");
    exit();
}else if(empty($intensity)) {
    header("Location: activities.php?error=Intensity is required");
    exit();
}else if(empty($date)) {
    header("Location: activities.php?error=Date is required");
    exit();
}

$sql = "INSERT INTO activities (user_id, type, distance, duration, intensity, date) VALUES ('{$_SESSION['id']}', '$type', '$distance', '$duration', '$intensity', '$date')";

if ($conn->query($sql) === TRUE) {
    header("Location: activities.php?response=Record updated successfully");
    exit();
} else {
    header("Location: activities.php?response=Error updating record");
    exit();
}
?>



