<?php 
require_once('config.php');

function getTopRatedGames(){
    global $conn;
    $sql = "
    Select * From Game
    Order By AverageRating Desc";
    

    $result = mysqli_query($conn, $sql);
    $topRatedGames = array();

    while($row = mysqli_fetch_assoc($result)){
        $topRatedGames[] = $row;
    }
    return $topRatedGames;
}

$topRatedGames = getTopRatedGames();
$windowStart = 0;
$windowEnd = 4;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamePlatform</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="home-navagation">
        <div class="home-navagation-game-platform-logo">
            <p>GamePlatform</p>
        </div>
        <div class="home-navagation-game-platform-links">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="store.php">Store</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Library</a></li>
            </ul>
        </div>
        <div class="home-navagation-game-platform-extra">
            <ul>
                <li><a href="#">Login</a></li>
            </ul>
        </div>
    </div>
    <div class="store-main-content">
        <div class="store-game-navagation">
            <button id="store-game-nav-previous-page"><</button>
            <button id="store-game-nav-next-page">></button>
        </div>
        <div class="store-games-display">
        <?php
// Function to display games based on windowStart and windowEnd
        function displayGames($games, $start, $end) {
            for ($i = $start; $i < $end; $i++) {
        ?>
                <div class="store-game-display-item">
                    <div class="store-games-display-img">
                        <img src="<?php echo $games[$i]['Picture']; ?>" alt="">
                    </div>
                    <div class="store-games-display-info">
                        <p class="store-games-display-title"><?php echo $games[$i]['Title']; ?></p>
                        <div class="store-games-display-tags">
                            <p>Genre: <?php echo $games[$i]['Genre']; ?></p>
                            <p>Released: <?php echo date("F j, Y", strtotime($games[$i]['ReleaseDate'])); ?></p>
                            <p>Studio: <?php echo $games[$i]['Developer']; ?></p>
                            <p>Publisher: <?php echo $games[$i]['Publisher']; ?></p>
                            <p>Rating: <?php echo $games[$i]['AverageRating']; ?>/5.0</p>
                        </div>
                    </div>
                    <div class="store-games-purchase-info">
                        <p>Buy Now</p>
                        <button>$ <?php echo $games[$i]['Price']; ?></button>
                    </div>
                </div>
        <?php
            }
        }

        // Display games using the function
        displayGames($topRatedGames, $windowStart, $windowEnd);
        ?>



    </div>

    </div>

</body>
</html>