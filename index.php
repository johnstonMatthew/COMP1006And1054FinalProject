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
    </div>
    <div>
        <section id="specialContainer">
            <a> <h2> Specials </h2> </a>
        </section>
    </div>

</main>
<?php 
    require('includes/navigation/footer.php');
?>
 
