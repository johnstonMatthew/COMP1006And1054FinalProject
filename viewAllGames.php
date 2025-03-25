<?php 
    $title = "View All Games || Matthew Johnston & Cole Winkler-Sawdon";
    $description = "The Page Where you can View all the Games on the Smoke Game Store";
    include('includes/navigation/header.php');
    require_once('includes/php/database.php');
?>

<main>
    <?php
        $gameTable = $connection->prepare("SELECT * FROM games");
        $gameTable->execute();
        $gameData = $gameTable->fetchAll();
        echo "<table>";
        echo "<thead> 
                <tr> 
                    <th> Cover Image </th>
                    <th> Game Name</th>
                    <th> Genre </th>
                    <th> Publish Date </th>
                    <th> Publisher </th>
                </tr>
              </thead>
              <tbody>";
              
        foreach ($gameData as $key=> $row ) {
            $gameId = $row['gameId'];
            $_SESSION['gameId'] = $row['gameId'];
            $gameName = $row['name'];
            $description = $row['description'];
            $genre = $row['genre'];
            $publishDate = $row['publishDate'];
            $publisher = $row['publisher'];
            $coverImage = $row['coverImage'];
            echo "<tr>";
                echo '<td> <div class="coverImageContainer"> 
                                <img class="gameCoverImage" src="' . $coverImage . '" alt="image"> 
                            </div> 
                      </td>'; 
                echo "<td> $gameName </td>";
                echo "<td> $genre </td>"; 
                echo "<td> $publishDate </td>"; 
                echo "<td> $publisher </td>";
                echo "<td> 
                        <form method='POST' action='view.php'> 
                            <input type='hidden' name='gameName' value='$gameName'>
                            <input type='submit' name='viewGame' value='View Game'>
                        </form>
                      </td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        $connection = null;
    ?>
    
</main>

<?php 
    include('includes/navigation/footer.php');
?>