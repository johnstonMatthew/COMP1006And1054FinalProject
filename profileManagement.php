<?php
    $title = "Manage Smoke Accounts || Matthew Johnston & Cole Winkler-Sawdon";
    $description = "The Manage Accounts Page";
    require('includes/navigation/header.php');
    require_once('includes/php/database.php');

    $accountTable = $connection->prepare("SELECT * FROM useraccounts");
    $accountTable->execute();
    $accountData = $accountTable->fetchAll();
?>

<main> 
    <table> 
        <thead> 
            <tr> 
                <th> Account ID </th>
                <th> Profile Picture </th>
                <th> Account Name </th>
                <th> Date of Birth </th>
                <th> Email </th>
                <th> First Name </th>
                <th> Last Name </th>
            </tr>
        </thead>

        <tbody> 
            <?php 
                foreach ($accountData as $key => $row) {
                    $accountId = $row['accountId'];
                    $accountName = $row['accountName'];
                    $dateOfBirth = $row['dateOfBirth'];
                    $email = $row['email'];
                    $fName = $row['fName'];
                    $lName = $row['lName'];
                    $profilePicture = $row['profilePicture'];

                    echo "<tr>";
                    echo "<th> $accountId </th>";
                    echo '<th> <img src="' . $profilePicture . '" alt="image"> </th>';
                    echo "<th> $accountName </th>";
                    echo "<th> $dateOfBirth </th>";
                    echo "<th> $email </th>";
                    echo "<th> $fName </th>";
                    echo "<th> $lName </th>";
                    echo "</tr>";
                }
                $connection = null
            ?>
        </tbody>
    </table>

</main>

<?php
    require('includes/navigation/footer.php');  
?>