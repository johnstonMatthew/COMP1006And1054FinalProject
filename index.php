<?php
    $title = "Smoke Homepage || Matthew Johnston & Cole Winkler-Sawdon"; 
    $description = "This is the Homepage for our Final Project";
    require('includes/navigation/header.php');
    require_once('includes/php/database.php');
    require_once('includes/php/validate.php');
    require_once('includes/php/utilities.php');

    $validate = new Validate();
    $utilities = new Utilities();
    
    if (isset($_POST['logInSubmit'])) {
        session_start();
        echo "<p> In Isset Session </p> ";
        $email = $_POST['email'];
        $password = $_POST['password'];

        $logInSuccess = false;

        $accountTable = $connection->prepare('SELECT * FROM userAccounts');
        $accountTable->execute();
        $accountData = $accountTable->fetchAll();

        foreach ($accountData as $key=> $row ) {
            if ($email === $row['email'] && $password === $row['password']) {
                $logInSuccess = true;
                $accountName = $row['accountName'];
            }
        }

        if ($logInSuccess) {
            echo "Log in was Successful";
            $_SESSION['accountName'] = $accountName;
            $loggedUser = $_SESSION['accountName'];
        } else {
            echo "<p> Log in Failed </p>";
            echo "<p> Email and/or Password Field was Incorrect </p>";
            echo "<a href='javascript:self.history.back();'> Go Back </a>";
        }
        $connection = null;
    }
    
?>
<!-- Title -->
<div class="title">
    <div>
        <h1> Smoke </h1>
    </div>
</div>
<!-- Page Main -->
<main>
    <section class="sectionSeperator"> <h2> Categories </h2> </section>
    <div id="categoryContainer">
        <div id="bestSellerContainer" class="splitThree">
            <div>
                <form method="POST" action="view.php">
                    <input type="hidden" name="bestSellerId" value="1">
                    <input type="submit" name="bestSubmit" value="Best Sellers" id="bestSellerButton">
                </form>
            </div>
        </div>

        <div id="vrTitlesContainer" class="splitThree">
            <div>
                <form method="POST" action="view.php">  
                    <input type="hidden" name="VRTitleId" value="2">
                    <input type="submit" name="vrSubmit" value="VR Titles" id="VRTitleButton">
                </form>
            </div>
        </div>

        <div id="newReleaseContainer" class="splitThree">
            <div>
                <form method="POST" action="view.php">  
                    <input type="hidden" name="newReleaseId" value="3">
                    <input type="submit" name="newSubmit" value="New Releases" id="newReleaseButton">
                </form> 
            </div> 
        </div>
    </div>
    <section class="sectionSeperator"> <h2 class="specialHeader"> Special </h2> </section>
    <div id="categoryContainer2"> 
        <?php 
            $gameData = $connection->prepare("SELECT * FROM games");
            $gameData->execute();

            $rowCount = $gameData->rowCount();

            $randomNum = rand(1, $rowCount); 
            $oldPriceStart = rand(10, 60);
            $oldPriceEnd = rand(0, 99);

            $oldPrice = (string)$oldPriceStart . "." . (string)$oldPriceEnd;

            if (strlen($oldPrice) == 4) {
                $oldPrice . "0";
            }

            $newPrice = round( (float) $oldPrice * 0.70, 2);

            $gameData = $utilities->returnData("SELECT * FROM games WHERE gameId = $randomNum", $connection);

            foreach ($gameData as $key=> $row) {
                $coverImage = $row['coverImage'];
                $gameName = $row['name'];
                echo 
                "<div class='specialGameContainer'>
                    <img src='". $coverImage ."' alt='". $gameName." Image' class='specialImage'> 
                    <div> 
                        <h3 class='specialGameName'> $gameName </h3>
                        <h4> Old Price </h4>
                        <p class='oldPrice'> $$oldPrice </p>
                        <h4> Sale Price </h4>
                        <p class='newPrice'> $$newPrice </p>
                    </div>
                </div>"; 
            }      
        ?>
    </div>
</main>
<?php 
    require('includes/navigation/footer.php');
?>
 
