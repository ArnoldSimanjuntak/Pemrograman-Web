<?php
require 'gameRconfig.php';

// Ambil komentar yang sudah ada dari parameter URL
$existingComment = isset($_GET['comment']) ? htmlspecialchars($_GET['comment']) : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reviews = intval($_POST['review_id']);
    $reviews = $_POST['comment'];

    // Update komentar
    $sql = "UPDATE reviews SET comment = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $reviews, $reviews);

    if ($stmt->execute()) {
        echo "Comment updated successfully";
    } else {
        echo "Error updating comment";
    }

    $stmt->close();
    $conn->close();
    exit;
}

// Jika bukan metode POST, mungkin halaman ini diakses secara langsung
// Anda dapat melakukan redirect atau menampilkan pesan error
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Comment</title>
    <link rel="stylesheet" type="text/css" href="game_review.css">
</head>
<body>
<div class="overlay" id="overlay"></div>
<div class="popup" id="popup">
    <h2>Edit Comment</h2>
    <form action="edit_comment.php" method="post" id="editForm">
        <textarea name="new_comment" id="new_comment" rows="4" cols="50"><?php echo $existingComment; ?></textarea>
        <input type="hidden" name="comment_id" value="<?php echo $_GET['id']; ?>">
        <input type="submit" value="Save">
    </form>
</div>
</body>
</html>
