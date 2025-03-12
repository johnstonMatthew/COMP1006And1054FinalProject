<!DOCTYPE html>

<head lang="en">
    <!-- Meta Data -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="description" content="The Register Account Page ">
    <title> Register Smoke Account </title>
    
    <!-- CSS -->
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" >

    <!-- Fonts --> 
</head>

<body>
    <header>
        <?php
            include_once('includes/navigation/header.html');
        ?>
    </header>

    <main>  
        <form id="registerForm" method="POST">
            <fieldset>
                <legend> Register Smoke Account </legend>
                <div>
                    <label for="registerAccount"> Account Name </label>
                    <input type="text" id="registerAccount">
                </div>

                <div>
                    <label for="dateOfBirth"> Date of Birth </label>
                    <input type="date" id="dateOfBirth">
                </div>

                <div>
                    <label for="fName"> First Name </label>
                    <input type="text" id="fName">
                </div>

                <div>
                    <label for="lName"> Last Name </label>
                    <input type="text" id="lName">
                </div>

                <div>
                    <label for="registerPass"> Password </label>
                    <input text="password" id="registerPass">
                </div>

                <div>
                    <label> Add Profile Picture </label>
                    <input type="file" name="files[]">
                </div>

                <div id="buttonContainer">
                    <button type="submit"> Register </button>
                    <button type="reset"> Reset </button>
                </div>
            </fieldset>
        </form>
    </main>

    <footer>
        <?php
            include_once('includes/navigation/footer.html');
        ?>
    </footer>
</body>