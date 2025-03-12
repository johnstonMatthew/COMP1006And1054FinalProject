<!DOCTYPE html>

<head lang="en">
    <!-- Meta Data -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="description" content="Home Page for COMP1006/COMP1054 Final Project">
    <title> Smoke Home Page || Matthew Johnston & Cole Winkler-Sawdon </title>
    
    <!-- CSS -->
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" >

    <!-- Fonts --> 
</head>

<body>
    <!-- Page Header -->
    <header>
        <?php
            include_once('includes/navigation/header.html');
        ?>
    </header>
    <!-- Title -->
    <div class="title">
        <h1> Placeholder </h1>
    </div>
    <!-- Page Main -->
    <main>
        <div id="categoryContainer">
            <section id="bestSellerContainer" class="splitThree">
                <a> <h2> Best Sellers </h2> </a>
            </section>

            <section id="newReleaseContainer" class="splitThree">
                <a> <h2> New Releases </h2> </a>
            </section>

            <section id="vrTitlesContainer" class="splitThree">
                <a> <h2> VR Titles </h2> </a>
            </section>

            <section id="specialContainer">
                <a> <h2> Specials </h2> </a>
                
            </section>
        </div>

    </main>

    <footer>
        <?php 
            include_once('includes/navigation/footer.html');
        ?>
    </footer>
</body>