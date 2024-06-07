<?php
require 'gameRconfig.php';

// Get vote data
$review_id = intval($_GET['id']);
$type = $_GET['type'];

// Update vote count
if ($type == 'up') {
    $sql = "UPDATE reviews SET thumbs_up = thumbs_up + 1 WHERE id = $review_id";
} else if ($type == 'down') {
    $sql = "UPDATE reviews SET thumbs_down = thumbs_down + 1 WHERE id = $review_id";
} else {
    echo "Invalid vote type.";
    exit;
}

if ($conn->query($sql) === TRUE) {
    echo "Vote updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Redirect back to game detail page
header("Location: index.php?id=" . $_GET['game_id']);
exit;
?>
