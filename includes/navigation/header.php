<!DOCTYPE html>
<html>
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
            <img src="images/placeholder.png" alt="Placeholder Image">
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
                </menu> 
            </nav>

            <p> Welcome <p>
        </header>