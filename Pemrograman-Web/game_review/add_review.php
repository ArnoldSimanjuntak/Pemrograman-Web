<?php
require 'gameRconfig.php';
// Get POST data
$game_id = intval($_POST['game_id']);
$username = $_POST['username'];
$comment = $_POST['comment'];

// Insert new review
$sql = "INSERT INTO reviews (game_id, username, comment) VALUES ($game_id, '$username', '$comment')";
if ($conn->query($sql) === TRUE) {
    echo "New review added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Redirect back to game detail page
header("Location: index.php?id=$game_id");
exit;
?>
