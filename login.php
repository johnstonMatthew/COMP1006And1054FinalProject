<?php
    $title = "Smoke Login Page || Matthew Johnston & Cole Winkler-Sawdon ";
    $description = "Login to your smoke account";
    require("includes/navigation/header.php");
    require_once ('./includes/php/database.php');

    if (isset($_POST['logInSubmit']) ) {
        $email = $_POST['email'];
        $password = hash('sha512', $_POST['password']);

        $results = $connection->prepare("SELECT accountId, accountName FROM useraccounts WHERE email = '$email' AND password = '$password'");

        $results->execute();

        $rowCount = $results -> rowCount();

        if ($rowCount == 1) {
            echo "Login was Successful";
            foreach ($results as $key => $row) {
                session_start();
                $_SESSION['accountId'] = $row['accountId'];
                $_SESSION['accountName'] = $row['accountName'];
                Header('Location: profileManagement.php');
            }
        } else {
            echo " Login was Unsuccessful";
        }

        $connection = null;  
    }
?>
<main>
    <!-- login form -->
    <form class="login-form" method="post">
        <fieldset>
            <legend>Login to Your Smoke Account</legend>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="buttonContainer">
                <button type="submit" name="logInSubmit">Login</button>
            </div>
        </fieldset>
    </form>
</main>

<?php
    require("includes/navigation/footer.php");
?>