<?php
    $title = "Smoke Login Page || Matthew Johnston & Cole Winkler-Sawdon ";
    $description = "Login to your smoke account";
    include("includes/navigation/header.php");
?>
<main>
    <!-- login form -->
    <form class="login-form">
        <fieldset>
            <legend>Login to Your Smoke Account</legend>
            <div>
                <label for="login-email">Email</label>
                <input type="email" id="login-email">
            </div>
            <div>
                <label for="login-password">Password</label>
                <input type="password" id="login-password">
            </div>
            <div id="buttonContainer">
                <button type="submit">Login</button>
            </div>
        </fieldset>
    </form>
</main>

<?php
    include("includes/navigation/footer.html");
?>