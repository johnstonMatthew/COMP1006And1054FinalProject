<?php
    $title = "Manage Smoke Accounts || Matthew Johnston & Cole Winkler-Sawdon";
    $description = "The Manage Accounts Page";
    require('includes/navigation/header.php');
    require_once('includes/php/database.php');
    require_once('includes/php/validate.php');
    require_once('includes/php/utilities.php');

    $validate = new Validate();
    $utilities = new Utilities();

    if (!isset($_SESSION['accountId'])) {
        Header("Location: index.php");
        exit;
    }

    $accountId = $_SESSION['accountId'];
?>

<!-- page main -->
<main id="notIndexMain"> 
    <?php 
        if (isset($_POST['updateSubmit'])) {
            $newUsername = $_POST['uAccountName'];
            $newDateOfBirth = $_POST['uDateOfBirth'];
            $newEmail = $_POST['uEmail'];
            $newfName = $_POST['ufName'];
            $newlName = $_POST['ulName'];
            $newProfilePicture = $_FILES['file']['name'];
    
            $newUsername = $validate->sanitizeString($_POST['uAccountName']);
            $newDateOfBirth = $validate->sanitizeString($_POST['uDateOfBirth']);
            $newEmail = $validate->sanitizeString($_POST['uEmail']);
    
            $emptyMessage = $validate->checkEmpty($_POST, array('uAccountName', 'uDateOfBirth', 'uEmail', 'ufName', 'ulName'));
            $validBirthDate = $validate->validDateOfBirth($newDateOfBirth);
            $validEmail = $validate->validEmail($newEmail);
            $validFirstName = $validate->validName($newfName);
            $validLastName = $validate->validName($newlName);
            $lengthMessage = $validate->checkLength(array("Account Name", "Email", "First Name", "Last Name"), array($newUsername, $newEmail, $newfName, $newlName), array(150, 50, 50, 100));
    
            if ($emptyMessage != "") {
                echo "<p>$emptyMessage</p>";
    
            } else if ($lengthMessage != null) {
                echo "<p> $lengthMessage </p>";
            } elseif ($validBirthDate == false) {
                echo "<p>Date of birth is invalid</p>";
            } elseif ($validEmail == false) {
                echo "<p> Email Field is invalid </p>";
            } elseif ($validFirstName == false) {
                echo "<p> First name field is invalid </p>";
            } elseif ($validLastName == false) {
                echo "<p> Last name field is invalid </p>";
            } else { 
    
                if ($newProfilePicture == null) {
                    $result = $connection->prepare("UPDATE useraccounts SET accountName = '$newUsername', dateOfBirth = '$newDateOfBirth', email = '$newEmail', fName = '$newfName', lName = '$newlName' WHERE accountId = '$accountId'");
                    $result->execute();
                    $_SESSION['accountName'] = $newUsername;
                    echo "<p> Account was Successfully Updated </p>";
                
                } else {
    
                    $filePath = './uploads/' . $newProfilePicture;
                    $fileExt = pathinfo($filePath, PATHINFO_EXTENSION);
                    $fileExt = strtolower($fileExt);
    
                    $query = $connection->prepare("UPDATE useraccounts SET accountName = '$newUsername', dateOfBirth = '$newDateOfBirth', email = '$newEmail', fName = '$newfName', lName = '$newlName', profilePicture = '$filePath' WHERE accountId = '$accountId'");
                    $validFileExt = array("svg", "jpeg", "jpg", "png");
                    if (in_array($fileExt, $validFileExt)) {
                        if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
                            $query->execute();
                            $_SESSION['accountName'] = $newUsername;
                            echo "<p> Account was Successfully Updated </p>";
                        }
                    }
                }
            }
        }
    
        if (isset($_POST['submitDelete'])) {
            $confirmValue = $_POST['confirmDelete'];
            echo "<p> $confirmValue </p>";
            if ($confirmValue === "confirm") {
                $result = $connection->prepare("DELETE FROM reviews WHERE accountId = '$accountId'");
                $query = $connection->prepare("DELETE FROM useraccounts WHERE accountId = '$accountId' ");
                
                $result->execute();
                $query->execute();
                echo "<p> Account has Been Deleted </p>";
                $connection = null;
    
                Header("Location: logout.php");
                exit;
            }
        }
    ?>
    <div id="tableContainer"> 
        <table> 
            <thead> 
                <tr> 
                    <td> Account ID </td>
                    <td> Profile Picture </td>
                    <td> Account Name </td>
                    <td> Date of Birth </td>
                    <td> Email </td>
                    <td> First Name </td>
                    <td> Last Name </td>
                </tr>
            </thead>

            <tbody> 
                <?php 
                    $accountData = $utilities->returnData("SELECT * FROM useraccounts", $connection);
                    foreach ($accountData as $key => $row) {
                        $accountId = $row['accountId'];
                        $accountName = $row['accountName'];
                        $dateOfBirth = $row['dateOfBirth'];
                        $email = $row['email'];
                        $fName = $row['fName'];
                        $lName = $row['lName'];
                        $profilePicture = $row['profilePicture'];

                        echo "<tr>";
                        echo "<td> $accountId </td>";
                        echo '<td> <img class="profilePicture" src="' . $profilePicture . '" alt="image"> </td>';
                        echo "<td> $accountName </td>";
                        echo "<td> $dateOfBirth </td>";
                        echo "<td> $email </td>";
                        echo "<td> $fName </td>";
                        echo "<td> $lName </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <div id="editAndDeleteContainer"> 
        <form method="POST" enctype="multipart/form-data">
            <?php 
                $accountId = $_SESSION['accountId'];
                $loggedInUserData = $utilities->returnData("SELECT * FROM useraccounts WHERE accountId = '$accountId'", $connection);
    

                foreach ($loggedInUserData as $key=> $row) {
                    $currentUsername = $row['accountName'];
                    $currentDateOfBirth = $row['dateOfBirth'];
                    $currentEmail = $row['email'];
                    $currentfName = $row['fName'];
                    $currentlName = $row['lName'];
                    $currentProfilePicture = $row['profilePicture'];
                }
            ?>
            <fieldset> 
                <legend> Edit Profile </legend>
                <div>
                    <label for="uAccountName"> Account Name </label>
                    <input type="text" name="uAccountName" id="uAccountName" value="<?php echo"$currentUsername";?>">
                </div>

                <div>
                    <label for="uDateOfBirth"> Date of Birth </label>
                    <input type="date" name="uDateOfBirth" id="uDateOfBirth" value="<?php echo "$currentDateOfBirth"; ?>">
                </div>

                <div> 
                    <label for="uEmail"> Email </label>
                    <input type="email" name="uEmail" id="uEmail" value="<?php echo "$currentEmail"; ?>"> 
                </div>

                <div>
                    <label for="ufName"> First Name </label>
                    <input type="text" name="ufName" id="ufName" value="<?php echo "$currentfName"; ?>">
                </div>

                <div>
                    <label for="ulName"> Last Name </label>
                    <input type="text" name="ulName" id="ulName" value="<?php echo "$currentlName"; ?>">
                </div>

                <div>
                    <label for="file"> Edit Profile Picture </label>
                    <input type="file" name="file" id="file">
                </div>

                <div class="buttonContainer">
                    <button type="submit" name="updateSubmit" id="updateSubmit"> Update </button>
                    <button type="reset"> Reset </button>
                </div>
            </fieldset> 
        </form>

        <form method="POST" action="profileManagement.php">
            <fieldset> 
                <legend> Delete Profile </legend>
                <div> 
                    <label for="confirmDelete"> Confirm Delete </label>
                    <input type="checkBox" name="confirmDelete" id="confirmDelete" value="confirm" required>  
                </div>
                <input type="submit" name="submitDelete">
            </fieldset>
        </form>
    </div>

    
</main>

<?php
    require('includes/navigation/footer.php');  
?>