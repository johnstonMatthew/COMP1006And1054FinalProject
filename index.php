<?php
    $title = "Smoke Homepage || Matthew Johnston & Cole Winkler-Sawdon"; 
    $description = "This is the Homepage for our Final Project";
    require('includes/navigation/header.php');
    require_once('includes/php/database.php');
    require_once('includes/php/validate.php');

    $validate = new Validate();
    
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
    <h1> Smoke </h1>
</div>
<!-- Page Main -->
<main>
    <div id="categoryContainer">
        <section id="bestSellerContainer" class="splitThree">
            <form method="POST" action="view.php">
                <input type="hidden" name="bestSellerId" value="1">
                <input type="submit" name="bestSubmit" value="Best Sellers" id="bestSellerButton">
            </form>
        </section>

        <section id="vrTitlesContainer" class="splitThree">
            <form method="POST" action="view.php">  
                <input type="hidden" name="VRTitleId" value="2">
                <input type="submit" name="vrSubmit" value="VR Titles" id="VRTitleButton">
            </form>
        </section>

        <section id="newReleaseContainer" class="splitThree">
            <form method="POST" action="view.php">  
                <input type="hidden" name="newReleaseId" value="3">
                <input type="submit" name="newSubmit" value="New Releases" id="newReleaseButton">
            </form>  
        </section>
    </div>
    <div id="categoryContainer2">
        <section id="specialContainer">
    
        </section>
    </div>

</main>
<?php 
    require('includes/navigation/footer.php');
?>
 
