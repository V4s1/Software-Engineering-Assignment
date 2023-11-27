<?php
session_start();
include "db-connection.php";

if(isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }
}

$email = validate($_POST['email']);
$pass = validate($_POST['password']);

if(empty($email)) {
    header("Location: index.php?error=Email is required");
    exit();
}else if(empty($pass)) {
    header("Location: index.php?error=Password is required");
    exit();
}

$sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) >= 1) {
    $row = mysqli_fetch_assoc($result);
    if($row['email'] === $email && $row['password'] === $pass) {
        echo "Logged in!";
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['id'] = $row['id'];

        $sql = "SELECT * FROM user_details WHERE user_id='{$_SESSION['id']}'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0) {
            $sql = "INSERT INTO user_details (user_id, user_name) VALUES ('{$_SESSION['id']}', '{$_SESSION['user_name']}')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        header("Location: home.php");
        exit();
    }else {
        header("Location: index.php?error=Incorrect email or password");
        exit();
    }
}else {
    header("Location: index.php?error=Incorrect email or password");
    exit();
}



