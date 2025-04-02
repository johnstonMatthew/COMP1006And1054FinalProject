<?php
    $title = "Register Smoke Account || Matthew Johnston & Cole Winkler-Sawdon";
    $description = "The Register Account Page";
    require('includes/navigation/header.php');
    require_once('includes/php/validate.php');
    require_once('includes/php/database.php');

    $validate = new Validate();
?>

<!-- page main -->
<main id="notIndexMain">  
    <form id="registerForm" method="POST" enctype='multipart/form-data'>
        <fieldset>
            <legend> Register Smoke Account </legend>
            <div>
                <label for="accountName"> Account Name </label>
                <input type="text" name="accountName" id="accountName">
            </div>

            <div>
                <label for="dateOfBirth"> Date of Birth </label>
                <input type="date" name="dateOfBirth" id="dateOfBirth">
            </div>

            <div> 
                <label for="email"> Email </label>
                <input type="email" name="email" id="email"> 
            </div>

            <div>
                <label for="fName"> First Name </label>
                <input type="text" name="fName" id="fName">
            </div>

            <div>
                <label for="lName"> Last Name </label>
                <input type="text" name="lName" id="lName">
            </div>

            <div>
                <label for="password"> Password </label>
                <input type="password" name="password" id="password" required>
                <p> <span class="passwordText"> Password Must Contain at Least 1 Number and Special Character, and be at Least 8 Characters in Length </span> </p>
            </div>

            <div> 
                <label for="confirmPass"> Confirm Password </label>
                <input type="password" name="confirmPass" id="confirmPass" required> 
            </div>

            <div>
                <label for="file"> Add Profile Picture </label>
                <input type="file" name="file" id="file">
            </div>

            <div class="buttonContainer">
                <button type="submit" name="registerSubmit"> Register </button>
                <button type="reset"> Reset </button>
            </div>
        </fieldset>
    </form>

    <?php 
        if (isset($_POST['registerSubmit'])) {
            $accountTable = $connection->prepare("SELECT * FROM useraccounts");
            $accountTable->execute();
            $accountData = $accountTable->fetchAll();
    
            $accountName = $_POST['accountName'];
            $dateOfBirth = $_POST['dateOfBirth'];
            $email = $_POST['email'];
            $firstName = $_POST['fName'];
            $lastName = $_POST['lName'];
            $password = $_POST['password'];
            $confirmPass = $_POST['confirmPass'];
            $profilePicture = $_FILES['file']['name'];

            $accountName = $validate->sanitizeString($_POST['accountName']);
            $email = $validate->sanitizeString($_POST['email']);
            $password = $validate->sanitizeString($_POST['password']);
    
            if ($profilePicture == null || $profilePicture == "") {
                $profilePicture = "placeholder.png";
            }
    
            $filePath = './uploads/'.$profilePicture;
            $fileExt = pathinfo($filePath, PATHINFO_EXTENSION);
            $fileExt = strtolower($fileExt);
            
            $emptyMessage = $validate->checkEmpty($_POST, array("accountName", "dateOfBirth", "email", "fName", "lName", "password", "confirmPass"));
            $validBirthDate = $validate->validDateOfBirth($dateOfBirth);
            $validEmail = $validate->validEmail($email);
            $validFirstName = $validate->validName($firstName);
            $validLastName = $validate->validName($lastName);
            $validPassword = $validate->validPassword($password);
            $availableEmail = $validate->availableEmail($email, $accountData);
            $samePassword = $validate->samePasswords($password, $confirmPass);
            $lengthMessage = $validate->checkLength(array("Account Name", "Email", "First Name", "Last Name", "Password"), array($accountName, $email, $firstName, $lastName, $password), array(150, 50, 50, 100, 255));
    
            if ($emptyMessage != null) {
                echo "<p>$emptyMessage</p>";
                echo "<a href='javascript:self.history.back();'> Go Back </a>";
            } else if ($lengthMessage != null) {
                echo "<p>$lengthMessage</p>";
                echo "<a href='javascript:self.history.back();'> Go Back </a>";
            } elseif ($validBirthDate == false) {
                echo "<p> Date of birth is invalid </p>";
                echo "<a href='javascript:self.history.back();'> Go Back </a>";
            } elseif ($validEmail == false) {
                echo "<p> Email Field is invalid </p>";
                echo "<a href='javascript:self.history.back();'> Go Back </a>";
            } elseif ($validFirstName == false) {
                echo "<p> First name field is invalid </p>";
                echo "<a href='javascript:self.history.back();'> Go Back </a>";
            } elseif ($validLastName == false) {
                echo "<p> Last name field is invalid </p>";
                echo "<a href='javascript:self.history.back();'> Go Back </a>";
            } else if  ($validPassword == false) {
                echo "<p> Password field is invalid </p>";
                echo "<a href='javascript:self.history.back();'> Go Back </a>";
            } else if ($availableEmail == false) {
                echo "<p> Email Entered Already was Used </p>";
                echo "<a href='javascript:self.history.back();'> Go Back </a>";
            } else if ($samePassword == false) {
                echo "<p> Password Confirmation Doesn't Match Password </p>";
                echo "<a href='javascript:self.history.back();'> Go Back </a>";
            } else {
                $password = hash('sha512', $password);
                $query = $connection->prepare("INSERT INTO useraccounts (accountName, dateOfBirth, email, fName, lName, password, profilePicture) VALUES ('$accountName', '$dateOfBirth', '$email', '$firstName', '$lastName', '$password', '$filePath')");
                $validFileExt = array("svg", "jpeg", "jpg", "png");
                if (in_array($fileExt, $validFileExt)) {
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
                        $query->execute();
                        echo "<p> Account was Successfully Registered </p>";
                    } else if ($filePath == "./uploads/placeholder.png") {
                        $query->execute();
                        echo "<p> Account was Successfully Registered </p>";
                    }
                }
            }
            $connection = null;
        }
    ?>
</main>

<?php
    require('includes/navigation/footer.php');
?>