<?php
    $title = "Manage Game Reviews || Matthew Johnston & Cole Winkler-Sawdon";
    $description = "A Page Where a Logged in User can Edit/Delete Their Reviews of Games";
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
    $query = "SELECT * FROM reviews WHERE accountId = '$accountId'";

    $reviewData = $utilities->returnData($query, $connection);

    $result = $connection->prepare($query);

    $result->execute();

    $rowCount = $result->rowCount();
?>

<main id="notIndexMain">
        <?php
            if ($rowCount > 0) {

                echo "<table id='allReviewTable'> 
                        <thead> 
                            <tr> 
                                <td> Subject </td>  
                                <td> Description </td> 
                                <td> Rating </td> 
                                <td> Date Published </td>   
                                <td> Edit Review </td> 
                                <td> Delete Review </td> 
                            </tr>
                        </thead>
                        <tbody>";

                foreach ($reviewData as $key=> $row) {
                    $reviewId = $row['reviewId'];
                    $subject = $row['subject'];
                    $description = $row['description'];
                    $rating = $row['rating'];
                    $reviewDate = $row['reviewDate'];

                echo "
                    <tr> 
                        <td> $subject </td>
                        <td> $description </td>
                        <td> $rating </td>
                        <td> $reviewDate </td>
                        <td>
                            <form method='POST' action='manageReviews.php'> 
                                <input type='hidden' value='$reviewId' name='reviewId'>
                                <input type='submit' value='Edit' name='edit'>
                            </form>
                        </td>

                        <td>
                            <form method='POST' action='manageReviews.php'> 
                                <input type='hidden' name='reviewId' value='$reviewId'>
                                <input type='submit' value='Delete' name='delete'>
                            </form>
                        </td>
                    </tr>
                ";
                }
            } else {
                echo "<p> You Have Left no Reviews </p>";
            }
        ?>
        </tbody>
    </table>

    <?php 
        if (isset($_POST['edit'])) {
            $reviewId = $_POST['reviewId'];

            $query = "SELECT * FROM reviews WHERE reviewId = '$reviewId'";
            $reviewRow = $utilities->returnData($query, $connection);

            foreach ($reviewRow as $key=> $row) {
                $subject = $row['subject'];
                $description = $row['description'];
                $rating = $row['rating'];
                $reviewDate = $row['reviewDate'];
            }

            echo"<form method='POST' action='manageReviews.php'>
                    <fieldset>
                        <legend> Edit Review </legend>
                        <input type='hidden' name='reviewId' value='$reviewId'> 
                        <div> 
                            <label for='subject'> </label>
                            <input type='text' name='subject' value='$subject'>
                        </div>

                        <div> 
                            <label for='description'> </label>
                            <textarea name='description'>" . $description . "</textarea>
                        </div>

                        <div> 
                            <label for='rating'> </label>
                            <input type='number' name='rating' value='$rating' min='1' max='5'>
                        </div>

                        <div> 
                            <label for='reviewDate'> </label>
                            <input type='date' name='reviewDate' value='$reviewDate'>
                        </div>

                        <div class='buttonContainer'>
                            <button type='submit' name='submitEdit' id='submitEdit'> Edit Review </button>
                            <button type='reset'> Reset </button>
                        </div>
                    </fieldset>
                 </form>";
        }

        if (isset($_POST['submitEdit'])) {
            $reviewId = $_POST['reviewId'];
            $subject = $_POST['subject'];
            $description = $_POST['description'];
            $rating = $_POST['rating'];
            $reviewDate = $_POST['reviewDate'];

            $subject = $validate->sanitizeString($_POST['subject']);
            $description = $validate->sanitizeString($_POST['description']);
 
            $emptyMessage = $validate->checkEmpty($_POST, array("subject", "description", "rating"));
            $validRating = $validate->validRating($rating);
            
            if ($emptyMessage != null) {
                echo "<p>$emptyMessage</p>";
            } else if ($validRating == false) {
                echo "<p> Rating Must be Between 1 and 5 </p>";
            } else {
                $query = $connection->prepare("UPDATE reviews SET subject = '$subject', description = '$description', rating = '$rating', reviewDate = '$reviewDate' WHERE reviewId = '$reviewId'");
                $query->execute();
                
                echo "Review was Edited";
            }
            $connection = null;

        }

        if (isset($_POST['delete'])) {
            $reviewId = $_POST['reviewId'];

            $query = "SELECT * FROM reviews WHERE reviewId = '$reviewId'";
            $reviewRow = $utilities->returnData($query, $connection);

            foreach ($reviewRow as $key=> $row) {
                $subject = $row['subject'];
                $description = $row['description'];
                $rating = $row['rating'];
                $reviewDate = $row['reviewDate'];
            }
            echo "<h3> You Would Like to Delete This Review? </h3>";
            echo "<h3> Your Review </h3>
                  <div id='deleteReviewSummary'> 
                      <p> $subject </p>
                      <p> $description </p>
                      <p> $rating </p>
                      <p> $reviewDate </p>
                  </div>
                      <form method='POST' action='manageReviews.php'>
                          <fieldset> 
                              <legend> Delete Profile </legend>
                              <div> 
                                  <input type='hidden' name='reviewId' value='$reviewId'>
                                  <label for='confirmDelete'> Confirm Delete </label>
                                  <input type='checkBox' name='confirmDelete' id='confirmDelete' value='confirm' required>  
                              </div>
                            <input type='submit' name='submitDelete'>
                        </fieldset>
                      </form>";
        }

        if (isset($_POST['submitDelete'])) {
            $reviewId = $_POST['reviewId'];
            $accountId = $_SESSION['accountId'];
            $confirmValue = $_POST['confirmDelete'];
            echo "<p> $confirmValue </p>";
            
            if ($confirmValue === "confirm") {
                $query = $connection->prepare("DELETE FROM reviews WHERE reviewId = '$reviewId'");
                $query->execute();
                echo "<p> Review has Been Deleted </p>";
            }
        }
    ?>
</main>

<?php
    require('includes/navigation/footer.php');  
?>