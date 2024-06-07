<?php
$servername = "sql311.infinityfree.com";
$username = "if0_36683677";
$password = "s4U87mVgjR";
$dbname = "if0_36683677_games_reviews";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
