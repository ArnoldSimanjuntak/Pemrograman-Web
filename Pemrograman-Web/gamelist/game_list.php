<?php
require 'gameRconfig.php';

// Konfigurasi pagination
$perPage = 20; // Jumlah game per halaman
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Halaman saat ini

// Hitung offset
$offset = ($page - 1) * $perPage;

// Query untuk mendapatkan data game sesuai dengan pagination
$sql = "SELECT * FROM games LIMIT $perPage OFFSET $offset";
$result = $conn->query($sql);

// Ambil jumlah total game untuk pagination
$totalGames = $conn->query("SELECT COUNT(*) as total FROM games")->fetch_assoc()['total'];

// Hitung jumlah halaman
$totalPages = ceil($totalGames / $perPage);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Game List</title>
    <link rel="stylesheet" type="text/css" href="game_list.css">
</head>
<body>
    <h1>Game List</h1>
    
    <ul>
    <?php
    if ($result->num_rows > 0) {
        while ($game = $result->fetch_assoc()) {
            // Perubahan di sini
            echo "<li><a href='game_review.php?id=" . $game['id'] . "'>" . htmlspecialchars($game['title']) . "</a></li>";
        }
    } else {
        echo "<li>No games found.</li>";
    }
    ?>
    </ul>

    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo $page - 1; ?>">Previous</a>
        <?php endif; ?>
        
        <?php if ($page < $totalPages): ?>
            <a href="?page=<?php echo $page + 1; ?>">Next</a>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
