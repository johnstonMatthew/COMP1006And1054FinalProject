<!-- Possibly Will be Split Into Four Pages Since the Initial Plan is to use a Database to Store Video Games. But if it is too complicated will just use four separate pages for the games -->
<?php 
    $title = "View Games";
    $description = "This is the page where you can view all the games on smoke";
    require('includes/navigation/header.php');
    require_once('includes/php/database.php');

    if (isset($_POST['searchSubmit'])) {
        $search = $_POST['searchGameName'];

        if ($search != "") {
            $gameTable = $connection->prepare("SELECT * FROM games WHERE name LIKE '$search%' LIMIT 1");
            $gameTable->execute();
            $gameData = $gameTable->fetchAll();

            foreach ($gameData as $key=> $row ) {
                $gameId = $row['gameId'];
                $gameName = $row['name'];
                $description = $row['description'];
                $genre = $row['genre'];
                $publishDate = $row['publishDate'];
                $publisher = $row['publisher'];
                $coverImage = $row['coverImage'];
            }
        } else {
            echo " <p> Empty Search Entered </p>";
        }

    }

?>

<main> 
    <?php 
        if ($search != "") {
            echo '<img src="' . $coverImage . '" alt="image">'; 
            echo "<h2> $gameName </h2>";

            echo "<div>"; 
                echo "<div id='gameInfoContainer'>";
                    echo "<p> $genre </p>"; 
                    echo "<p> $publishDate </p>"; 
                    echo "<p> $publisher </p>"; 
                    echo "<p> $coverImage </p>"; 
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
            $connection = null;
        ?>
    
    <div>
</main>

<?php 
    require('includes/navigation/footer.php');
 ?>