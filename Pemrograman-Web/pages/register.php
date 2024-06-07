<?php
require '../config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password == $password_confirm) {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $mysqli->query("INSERT INTO users (username, password, role) VALUES ('$username', '$password_hashed', 'customer')");
        echo "Registration successful! You can now <a href='login.php'>login</a>.";
    } else {
        echo "Passwords do not match!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <form method="POST">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        Confirm Password: <input type="password" name="password_confirm" required><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>