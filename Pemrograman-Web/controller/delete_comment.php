<?php
require 'gameRconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Pastikan parameter review_id ada dan merupakan bilangan bulat positif
    $reviewId = isset($_GET['review_id']) ? intval($_GET['review_id']) : 0;
    if ($reviewId <= 0) {
        echo "Invalid review ID";
        exit;
    }

    // Hapus komentar
    $sql = "DELETE FROM reviews WHERE review_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $reviewId);

    if ($stmt->execute()) {
        echo "Comment deleted successfully";
    } else {
        echo "Error deleting comment: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    exit;
}

// Jika bukan metode GET, tampilkan pesan error
echo "Invalid request method";
?>
