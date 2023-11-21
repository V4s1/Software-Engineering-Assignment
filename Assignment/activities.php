<?php
session_start();
include "db-connection.php";
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ACTIVITIES</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1>ACTIVITIES</h1>
        <table border=1>
            <tr>
                <th>Type</th>
                <th>Distance (km)</th>
                <th>Duration (h:m:s)</th>
                <th>Date</th>
                <th>Delete entry</th>
            </tr>
        <?php
        
        if(isset($_POST['delete'])) {
            $sql = "DELETE FROM activities WHERE id='{$_POST['id']}'";
            if ($conn->query($sql) === TRUE) {
                header("Location: activities.php?response=Record deleted successfully");
                exit();
            } else {
                header("Location: activities.php?response=Error deleting record");
                exit();
            }
        }

        $sql = "SELECT * FROM activities WHERE user_id='{$_SESSION['id']}' ORDER BY id DESC";

        $response = mysqli_query($conn, $sql);

        while ($fetch = mysqli_fetch_array($response))
        {
            echo "<tr>";
            echo "<td>" . $fetch['type'] . "</td>";
            echo "<td>" . $fetch['distance'] . "</td>";
            echo "<td>" . $fetch['duration'] . "</td>";
            echo "<td>" . $fetch['date'] . "</td>";
            echo "<td><form class=delete-btn method='POST'>
            <input type=hidden name=id value=".$fetch["id"]." >
            <input type=submit value=Delete name=delete >
            </form></td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
        <br>
        <form action="addactivity.php" method="post">
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?><br>
            <label>Type</label>
            <input type="text" name="type" placeholder=""><br>
            <label>Distance</label>
            <input type="text" name="distance" placeholder="0"><br>
            <label>Duration</label>
            <input type="time" value="00:00:00" name="duration" step="1"><br>
            <label>Date</label>
            <input type="date" name="date"><br>
            <input type="submit" value="Submit"></input>
        </form><br>
        <a href="home.php" class="nav-link back-btn">⮜ Back</a><br>
        <?php if (isset($_GET['response'])) { ?>
            <p class="response"><?php echo $_GET['response']; ?></p>
        <?php } ?>
    </body>
    </html>
    <?php
}else {
    header("Location: index.php");
    exit();
}
?>