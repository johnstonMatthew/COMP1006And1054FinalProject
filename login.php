<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- metadata -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow">
        <meta name="description" content="Login to your smoke account">
        <title> Login </title>
        <!-- css -->
        <link href="css/reset.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <!-- fonts -->

    </head>
    <body>
        <!-- header -->
        <header>
            <?php
                include_once("includes/navigation/header.html");
            ?>
        </header>
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
        <!-- footer -->
        <footer>
            <?php
                include_once("includes/navigation/footer.html");
            ?>
        </footer>
    </body>
</html>