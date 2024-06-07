<?php
require 'gameRconfig.php';

// Get game ID from URL
$game_id = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Fetch game details
$sql = "SELECT * FROM games WHERE id = $game_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $game = $result->fetch_assoc();
} else {
    echo "Game not found.";
    exit;
}

// Fetch reviews
$sql = "SELECT * FROM reviews WHERE game_id = $game_id ORDER BY created_at DESC";
$reviews_result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $game['title']; ?></title>
    <link rel="stylesheet" type="text/css" href="game_review.css">
</head>
<body>
    <h1><?php echo $game['title']; ?></h1>
    <p><?php echo $game['description']; ?></p>
    <p><strong>Release Date:</strong> <?php echo $game['release_date']; ?></p>
    <p><strong>Developer:</strong> <?php echo $game['developer']; ?></p>

    <h2>Reviews</h2>
    <form action="add_review.php" method="post">
        <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="comment">Comment:</label><br>
        <textarea id="comment" name="comment" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" value="Submit Review">
    </form>

    <div id="reviews">
        <?php
        if ($reviews_result->num_rows > 0) {
            while ($review = $reviews_result->fetch_assoc()) {
                echo "<div>";
                echo "<h3>" . htmlspecialchars($review['username']) . "</h3>";
                echo "<p>" . htmlspecialchars($review['comment']) . "</p>";
                echo "<p>Thumbs Up: " . $review['thumbs_up'] . " <a href='vote.php?id=" . $review['review_id'] . "&type=up'>👍</a></p>";
                echo "<p>Thumbs Down: " . $review['thumbs_down'] . " <a href='vote.php?id=" . $review['review_id'] . "&type=down'>👎</a></p>";
                echo "<p><small>Posted on: " . $review['created_at'] . "</small></p>";
                echo "<p>";
                echo "<a href='edit_comment.php?id=" . $review['id'] . "&comment=" . urlencode($review['comment']) . "'>Edit</a> | ";
                echo "<a href='delete_comment.php?review_id=" . $review['review_id'] . "'>Delete</a>";
                echo "</p>";
                echo "</div><hr>";
            }
        } else {
            echo "<p>No reviews yet.</p>";
        }
        ?>

    // <script src="pop_up.js"></script>

</body>
</html>


<?php
$conn->close();
?>
