<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Meta Data -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow">
        <meta name="description" content="<?php echo $description; ?>">
        <title> <?php echo $title; ?></title>
        
        <!-- CSS -->
        <link href="css/reset.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" >

        <!-- Fonts --> 
    </head>
    <body>
        <header>
            <img src="images/companyLogo.png" alt="Smoke Logo">
            <form method="POST" action="view.php" >
                <input type="text" name="searchGameName" id="searchGameName" Placeholder="Search for Games Here">
                <input type="submit" name="searchSubmit">
            </form>
            <nav>
                <menu>
                    <li><a href="index.php"> Home </a></li>
                    <li><a href="about.php"> About </a></li>
                    <li><a href="login.php"> Login </a></li>
                    <li><a href="register.php"> Register </a></li>
                    <li><a href="profileManagement.php"> Manage Profiles </a></li>
                    <li><a href="manageReviews.php"> Manage Reviews </a></li>
                </menu> 
            </nav>
            <div>
                <?php 
                    session_start(); 
                    if (isset($_SESSION['accountName'])) {
                        $username = $_SESSION['accountName']; 
                        echo "<p> $username </p>"; 
                    }
                ?> 
                <form method="POST" action="logout.php"> 
                    <button type="submit"> Log Out </button>
                </form>
            </div>
        </header>