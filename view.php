<?php 
    $title = "View Games";
    $description = "This is the page where you can view all the games on smoke";
    require('includes/navigation/header.php');
    require_once('includes/php/database.php');
    require_once('includes/php/validate.php');
    require_once('includes/php/utilities.php');

    $validate = new Validate();
    $utilities = new Utilities();

    if (isset($_POST['searchSubmit']) || isset($_SESSION['search']) || isset($_POST['viewGame']) || isset($_POST['reviewSubmit']) || isset($_POST['bestSubmit']) || isset($_POST['vrSubmit']) || isset($_POST['newSubmit'])) {
        
        if (isset($_POST['searchSubmit'])) {
            $search = $_POST['searchGameName'];
            $_SESSION['search'] = $_POST['searchGameName'];
        } else if (isset($_POST['viewGame'])) {
            $search = $_POST['gameName'];
        } else if (isset($_POST['reviewSubmit'])) {
            $search = $_POST['gameName'];
        } else if (isset($_POST['bestSubmit']) || isset($_POST['vrSubmit']) || isset($_POST['newSubmit'])) {
            $search = "";
            if (isset($_POST['bestSellerId'])) {
                $categoryId = $_POST['bestSellerId'];

            } else if (isset($_POST['VRTitleId'])) {
                $categoryId = $_POST['VRTitleId']; 

            } else if (isset($_POST['newReleaseId'])) {
                $categoryId = $_POST['newReleaseId'];
            }

        } else if (isset($_SESSION['search'])){
            $search = $_SESSION['search'];
        } 
        
        if ($search != "") {
            $query = "SELECT * FROM games WHERE name LIKE '$search%' LIMIT 1";
            $gameData = $utilities->returnData($query, $connection);

        } else {

            if (isset($categoryId)) {
            } else {
                Header("Location: viewAllGames.php");
                exit;
            }
        }

    }

    if (isset($_POST['reviewSubmit']) and isset($_SESSION['accountId'])) {
        $subject = $_POST['subject'];
        $description = $_POST['description'];
        $ratingValue = $_POST['rating'];
        $reviewDate = date("Y-m-d");
        $accountId = $_SESSION['accountId'];
        $gameId = $_SESSION['gameId'];

        $subject = $validate->sanitizeString($_POST['subject']); 
        $description = $validate->sanitizeString($_POST['description']);

        $emptyMessage = $validate->checkEmpty($_POST, array("subject", "description", "rating"));
        $validRating = $validate->validRating($ratingValue);

        if ($emptyMessage != null) {
            echo "<p>$emptyMessage</p>";
        } else if ($validRating == false) {
            echo "<p> Rating Must be Between 1 and 5 </p>";
        } else {
            $query = $connection->prepare("INSERT INTO reviews (gameId, accountId, subject, description, rating, reviewDate) VALUES ('$gameId', '$accountId', '$subject', '$description', '$ratingValue', '$reviewDate')");

            $query->execute();

            echo "<p> Review Submitted </p>";
        }
    }
?>

<main id="notIndexMain"> 
    <?php 
        if (isset($categoryId)) {
            if ($categoryId == 1) {
                $query = "SELECT * FROM games WHERE gameId % 2 = 0;";
            } else if ($categoryId == 2) {
                $query = "SELECT * FROM games WHERE gameId % 2 != 0;";
            } else {
                $query = "SELECT * FROM games WHERE publishDate > '2023-01-01';";
            }
            $gameData = $utilities->returnData($query, $connection);
        }

        foreach ($gameData as $key=> $row) {
            $gameId = $row['gameId'];
            $_SESSION['gameId'] = $row['gameId'];
            $gameName = $row['name'];
            $description = $row['description'];
            $genre = $row['genre'];
            $publishDate = $row['publishDate'];
            $publisher = $row['publisher'];
            $coverImage = $row['coverImage'];

            echo "<figure class='coverImageContainer'>";
            echo '<img class="gameCoverImage" src="' . $coverImage . '" alt=" '. $gameName .' Cover Art">'; 
            echo "<figcaption> $gameName </figcaption>
            </figure>";

            echo "<div class='gameInfoContainer'>"; 
                echo "<div>";
                    echo "<h4> $genre </h4>"; 
                    echo "<h4> $publishDate </h4>"; 
                    echo "<h4> $publisher </h4>"; 
                echo "</div>";

                echo "<div class='descriptionContainer'>"; 
                    echo "<p> $description </p>";
                echo "</div>";
            echo "</div>"; 

            if (isset($categoryId)) {
                $query = "SELECT reviews.gameId, profilePicture, accountName, subject, reviews.description AS reviewDescription, rating, reviewDate 
                FROM reviews 
                INNER JOIN games ON reviews.gameId = games.gameId 
                INNER JOIN useraccounts ON reviews.accountId = useraccounts.accountId
                WHERE games.gameId = $gameId LIMIT 1";
            } else {
                $query = "SELECT reviews.gameId, profilePicture, accountName, subject, reviews.description AS reviewDescription, rating, reviewDate 
                FROM reviews 
                INNER JOIN games ON reviews.gameId = games.gameId 
                INNER JOIN useraccounts ON reviews.accountId = useraccounts.accountId
                WHERE games.gameId = $gameId";
            }
            
            $reviewData = $utilities->returnData($query, $connection);

            foreach ($reviewData as $key=> $row ) {
                $profilePicture = $row['profilePicture'];
                $accountName = $row['accountName'];
                $subject = $row['subject'];
                $description = $row['reviewDescription'];
                $rating = $row['rating'];
                $reviewDate = $row['reviewDate'];

                echo '<div class="review">';
                    echo '<img class="profilePicture" src="' . $profilePicture . '" alt="image">';
                    echo "<div class='reviewContentContainer'>";
                        echo "<p> $accountName </p>";
                        echo "<div class='subjectAndRatingContainer'>";
                        echo "<h4> $subject </h4>";
                        echo "<p> $rating / 5 </p>";
                        echo "</div>";
                        echo "<p class='description'> $description </p>";
                        echo "<p> $reviewDate </p>";
                    echo "</div>";
                echo "</div>";
            }
        }

        $connection = null;
    ?>
    
    <form method="POST" action="view.php"> 
        <fieldset> 
            <legend> Leave a Review </legend>
            <input type="hidden" name='gameName' value="<?php echo "$gameName"?>"> 
            <div> 
                <label for="subject"> Subject </label>
                <input type="text" name="subject" id="subject" required>
            </div>

            <div> 
                <label for="description"> Description </label>
                <textarea name="description" id="description" required> </textarea>
            </div>

            <div> 
                <label for="rating"> Rating </label>
                <input type="number" name="rating" id="rating" min="1" max="5" required>
            </div>

            <div id="buttonContainer">
                <button type="submit" name="reviewSubmit"> Submit Review </button>
                <button type="reset"> Reset </button>
            </div>
        </fieldset>
    </form>
</main>

<?php 
    require('includes/navigation/footer.php');
?>