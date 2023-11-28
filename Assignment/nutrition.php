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
        <title>NUTRITION</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1>NUTRITION</h1>
        <table border=1>
            <tr>
                <th>Meal</th>
                <th>Calories consume</th>
                <th>Date</th>
                <th>Delete entry</th>
            </tr>
        <?php
        
        if(isset($_POST['delete'])) {
            $sql = "DELETE FROM nutrition WHERE id='{$_POST['id']}'";
            if ($conn->query($sql) === TRUE) {
                header("Location: nutrition.php?response=Record deleted successfully");
                exit();
            } else {
                header("Location: nutrition.php?response=Error deleting record");
                exit();
            }
        }

        $sql = "SELECT * FROM nutrition WHERE user_id='{$_SESSION['id']}' ORDER BY id DESC";

        $response = mysqli_query($conn, $sql);

        while ($fetch = mysqli_fetch_array($response))
        {
            echo "<tr>";
            echo "<td>" . $fetch['meal'] . "</td>";
            echo "<td>" . $fetch['calories'] . "</td>";
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
        <form action="addnutrition.php" method="post">
            <?php
                $sql = "SELECT SUM(ALL calories) FROM nutrition WHERE user_id='{$_SESSION['id']}' AND date=CURDATE()";

                $response = mysqli_query($conn, $sql);

                while ($fetch = mysqli_fetch_array($response))
                {
                    $_SESSION['calories'] = $fetch['SUM(ALL calories)'];
                }
            ?>
            <label class="calorie-max">Calorie budget: 2000</label><br> <!-- need to change depending on gender -->
            <label class="calorie-consumed">Calories consumed: <?php echo ($_SESSION['calories'] == 0) ? 0 : $_SESSION['calories']; ?></label><br>
            <label class="calorie-left">Calories remaining: <?php echo 2000 - $_SESSION['calories']; ?></label><br>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?><br>
            <label>Meal</label>
            <select name="meal">
                <option value="Breakfast">Breakfast</option>
                <option value="Lunch">Lunch</option>
                <option value="Dinner">Dinner</option>
                <option value="Snack">Snack</option>
                <option value="Other">Other</option>
            </select><br>
            <label>Calories consumed</label>
            <input type="number" name="calories" min="0" placeholder=""><br>
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