<!-- Possibly Will be Split Into Four Pages Since the Initial Plan is to use a Database to Store Video Games. But if it is too complicated will just use four separate pages for the games -->
<?php 
    $title = "View Games";
    $description = "This is the page where you can view all the games on smoke";
    require('includes/navigation/header.php');
    require_once('includes/php/database.php');
    require_once('includes/php/validate.php');

    $validate = new Validate();

    if (isset($_POST['searchSubmit']) || isset($_SESSION['search']) || isset($_POST['viewGame'])) {

        if (isset($_POST['searchSubmit'])) {
            $search = $_POST['searchGameName'];
            $_SESSION['search'] = $_POST['searchGameName'];
        } else if (isset($_POST['viewGame'])) {
            $search = $_POST['gameName'];
        } else if (isset($_SESSION['search'])){
            $search = $_SESSION['search'];
        } 
        
        if ($search != "") {
            $gameTable = $connection->prepare("SELECT * FROM games WHERE name LIKE '$search%' LIMIT 1");
            $gameTable->execute();
            $gameData = $gameTable->fetchAll();

            foreach ($gameData as $key=> $row ) {
                $gameId = $row['gameId'];
                $_SESSION['gameId'] = $row['gameId'];
                $gameName = $row['name'];
                $description = $row['description'];
                $genre = $row['genre'];
                $publishDate = $row['publishDate'];
                $publisher = $row['publisher'];
                $coverImage = $row['coverImage'];
            }
        } else {
            Header("Location: viewAllGames.php");
            exit;
        }

    }
?>

<main> 
    <?php 
        if ($search != "") {
            echo "<div class='coverImageContainer'>";
                echo '<img class="gameCoverImage" src="' . $coverImage . '" alt="image">'; 
                echo "<h2> $gameName </h2>
                 </div>";

            echo "<div>"; 
                echo "<div id='gameInfoContainer'>";
                    echo "<p> $genre </p>"; 
                    echo "<p> $publishDate </p>"; 
                    echo "<p> $publisher </p>"; 
                echo "</div>";

                echo "<div id='descriptionContainer'>"; 
                    echo "<p> $description </p>";
                echo "</div>";
            echo "</div>";
        }
    ?>
    <div id="reviewContainer"> 
        <?php
            if ($search != "") {
                $reviewTable = $connection->prepare("SELECT reviews.gameId, profilePicture, accountName, subject, reviews.description AS reviewDescription, rating, reviewDate 
                FROM reviews 
                INNER JOIN games ON reviews.gameId = games.gameId 
                INNER JOIN useraccounts ON reviews.accountId = useraccounts.accountId
                WHERE games.gameId = $gameId");
                $reviewTable->execute();
                $reviewData = $reviewTable->fetchAll();

                foreach ($reviewData as $key=> $row ) {
                    $profilePicture = $row['profilePicture'];
                    $accountName = $row['accountName'];
                    $subject = $row['subject'];
                    $description = $row['reviewDescription'];
                    $rating = $row['rating'];
                    $reviewDate = $row['reviewDate'];

                    echo '<div class="review">';
                        echo '<img src="' . $profilePicture . '" alt="image">';
                        echo "<p> $accountName </p>";
                        echo "<h4> $subject </h4>";
                        echo "<p> $rating </p>";
                        echo "<h4> $description </h4>";
                        echo "<h4> $reviewDate </h4>";
                    echo "</div>";
                }
                
            }
        ?>
    
    <div>

    <form method="POST"> 
        <fieldset> 
            <div> 
                <label for="subject"> Subject </label>
                <input type="text" name="subject" id="subject" required>
            </div>

            <div> 
                <label for="description"> Description </label>
                <textarea type="textarea" name="description" id="description" required> </textarea>
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

        <?php 
            if (isset($_POST['reviewSubmit']) and isset($_SESSION['accountId'])) {
                $subject = $_POST['subject'];
                $description = $_POST['description'];
                $ratingValue = $_POST['rating'];
                $reviewDate = date("Y-m-d");
                $accountId = $_SESSION['accountId'];
                $gameId = $_SESSION['gameId'];

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
                $connection = null;
            }
        ?>
    </form>
</main>

<?php 
    require('includes/navigation/footer.php');
 ?>