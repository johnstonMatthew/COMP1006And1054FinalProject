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
        <link href="css/styles.css" rel="stylesheet">

        <!-- Fonts --> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anta&family=Audiowide&family=Limelight&display=swap" rel="stylesheet">
    </head>
    <body>
        <!-- Page Header -->
        <header>
            <img src="images/companyLogo.png" alt="Smoke Logo">
            <form method="POST" action="view.php" id="searchForm" >
                <input type="text" name="searchGameName" id="searchGameName" Placeholder="Search for Games Here">
                <input type="submit" name="searchSubmit" value='Search'>
            </form>

            <div id="desktopNav"> 
                <nav>
                    <menu>
                        <li><a href="index.php"> Home </a></li>
                        <li><a href="viewAllGames.php"> Games </a></li>
                        <li><a href="about.php"> About </a></li>
                        <li><a href="login.php"> Login </a></li>
                        <li><a href="register.php"> Register </a></li>
                        <li><a href="profileManagement.php"> Manage Profiles </a></li>
                        <li><a href="manageReviews.php"> Manage Reviews </a></li>
                    </menu> 
                </nav>
            </div>
            <div id="mobileNav">
                <nav> 
                    <menu> 
                        <li><a href="index.php"> Home </a></li>
                        <li><a href="viewAllGames.php"> Games </a></li>
                        <li><a href="about.php"> About </a></li>
                        <li><a href="login.php"> Login </a></li>
                        <li><a href="register.php"> Register </a></li>
                        <li><a href="profileManagement.php"> Manage Profiles </a></li>
                        <li><a href="manageReviews.php"> Manage Reviews </a></li>
                    </menu> 
                </nav>
            </div>
            <div id="logoutContainer">
                <?php 
                    session_start(); 
                    if (isset($_SESSION['accountName'])) {
                        $username = $_SESSION['accountName']; 
                        echo "<p id='username'> $username </p>"; 
                    }
                
                if (isset($_SESSION['accountName'])) {
                    echo "<form method='POST' action='logout.php' id='logoutForm'> 
                    <button type='submit'> Log Out </button>
                    </form>";
                } else {
                    echo "<form method='POST' action='login.php' id='loginForm'> 
                    <button type='submit'> Log In </button>
                    </form>"; 
                }
                 
                ?> 
            </div>
        </header>