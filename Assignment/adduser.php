<?php
session_start();
include "db-connection.php";

if(isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }
}

$uname = validate($_POST['uname']);
$email = validate($_POST['email']);
$pass = validate($_POST['password']);

if(empty($uname)) {
    header("Location: signup.php?error=Username is required");
    exit();  
}else if(empty($email)) {
    header("Location: signup.php?error=Email is required");
    exit();
}else if(empty($pass)) {
    header("Location: signup.php?error=Password is required");
    exit();
}

$sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0) {
    $sql = "INSERT INTO users (user_name, email, password) VALUES ('$uname', '$email', '$pass')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?response=Account created successfully");
        exit();
    } else {
        header("Location: index.php?response=Error creating record");
        exit();
    }

}else {
    header("Location: signup.php?error=Account already exists");
    exit();
}



