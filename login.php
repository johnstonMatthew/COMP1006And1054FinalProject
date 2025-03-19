<?php
    $title = "Smoke Login Page || Matthew Johnston & Cole Winkler-Sawdon ";
    $description = "Login to your smoke account";
    require("includes/navigation/header.php");
?>
<main>
    <!-- login form -->
    <form class="login-form" method="POST" action="index.php">
        <fieldset>
            <legend>Login to Your Smoke Account</legend>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password">
            </div>
            <div id="buttonContainer">
                <button type="submit" name="logInSubmit">Login</button>
            </div>
        </fieldset>
    </form>
</main>

<?php
    require("includes/navigation/footer.php");
?>