<?php
session_start();

$title = trim(filter_var($_POST['events-title'], FILTER_SANITIZE_SPECIAL_CHARS));
$description = trim(filter_var($_POST['events-text'], FILTER_SANITIZE_SPECIAL_CHARS));
$image = trim(filter_var($_POST['events-image'], FILTER_SANITIZE_SPECIAL_CHARS));
$date = trim(filter_var($_POST['events-date'], FILTER_DEFAULT));

try {
    require 'db.php';

    echo "Successfully connected to the database.<br>";

    $sql = 'INSERT INTO events (title, description, img, date) VALUES (?, ?, ?, ?)';

    $query = $pdo->prepare($sql);

    if ($query->execute([$title, $description, $image, $date])) {
        header('Location: /user.php');
        exit;
    } else {
        echo "Adding failed!";
    }

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

