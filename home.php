<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HOME</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="body-part-1">
            <div class="nav-container"> 
                <br>
                <a href="logout.php" class="nav-link">Logout</a><br>
                <a href="userprofile.php" class="nav-link">User Details</a><br>
                <a href="activities.php" class="nav-link">Activities</a><br>
                <a href="nutrition.php" class="nav-link">Nutrition</a><br>
            </div> 
            <div class="welcome-message-container">
                <h1 class="welcome-message">Hello, <?php echo $_SESSION['user_name']; ?></h1>
            </div>

            <h2 class="scroll-down-arrow">🠋</h2>
        </div>
        
        <div class="body-part-2">
            <h2 class="section-header">Fitness Programs</h2>
            <div class="images-container">
                <br>
                <div class="image-box">
                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.LEeKiG9eAORySDI6FhySxgHaES%26pid%3DApi&f=1&ipt=2f66ea7566f0af36165825da8ab77d0d95ad368f7a5165e2e5b5c96d1c3385cc&ipo=images" alt="Fitness Program 1">
                    <a class="nav-link" href="https://www.family-action.org.uk/what-we-do/children-families/change4lifeservice/">Learn More</a>
                </div>

                <div class="image-box">
                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.2uc_aWHMc6T6eQ5KaCxLpgHaHa%26pid%3DApi&f=1&ipt=d6775ee978513f9a309c71bc52ef7cb8a4fbb0c3564eae0abc23bb3381d65fae&ipo=images" alt="Fitness Program 2">
                    <a class="nav-link" href="https://www.nhs.uk/live-well/exercise/running-and-aerobic-exercises/get-running-with-couch-to-5k/">Learn More</a>
                </div>
                <br>
            </div>  
        </div>
        <div class="body-part-3">
            <h2 class="section-header">Health News</h2>
            <div class="images-container">
                <br>
                <div class="image-box">
                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedicalinterpreterblog.files.wordpress.com%2F2018%2F08%2F1200x630bb-1.jpg&f=1&nofb=1&ipt=7a7907ae65125d38480e464740aca452c6ce062e43a97e68712842fc0a77041a&ipo=images" alt="Health News 1">
                    <a class="nav-link" href="https://medicalinterpreterblog.com/2018/08/18/podcasts-for-medical-interpreters/">Read More</a>
                </div>

                <div class="image-box">
                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fyt3.ggpht.com%2Fa%2FAGF-l7-7WWvFgWsjbeyql3F6ppLQfq9hxX1loSVc3g%3Ds900-c-k-c0xffffffff-no-rj-mo&f=1&nofb=1&ipt=f7cb8d8b0eec9cbeb48e998757a48fb032f9f7570bb2dd1e0d7c1af27ffddbcf&ipo=images" alt="Health News 2">
                    <a class="nav-link" href="https://www.webmd.com/">Read More</a>
                </div>

                <div class="image-box">
                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmanchestercommunitycentral.org%2Fsites%2Fmanchestercommunitycentral.co.uk%2Ffiles%2FNHS%2520England_0.png&f=1&nofb=1&ipt=534b7c760466b9b414548f5966d76882c93aa45b293a8e3406b59858333824ca&ipo=images" alt="Health News 3">
                    <a class="nav-link" href="https://www.england.nhs.uk/">Read More</a>
                </div>
                <br>
            </div>
        </div>
    </body>
    </html>
    <?php
}else {
    header("Location: index.php");
    exit();
}
?>