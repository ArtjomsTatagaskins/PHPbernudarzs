<?php
session_start();

$title = trim(filter_var($_POST['news-title'], FILTER_SANITIZE_SPECIAL_CHARS));
$description = trim(filter_var($_POST['news-text'], FILTER_SANITIZE_SPECIAL_CHARS));
$date = trim(filter_var($_POST['news-date'], FILTER_DEFAULT));

try {
    require 'db.php';

    echo "Successfully connected to the database.<br>";

    $sql = 'INSERT INTO news (title, description, date) VALUES (?, ?, ?)';

    $query = $pdo->prepare($sql);

    if ($query->execute([$title, $description, $date])) {
        header('Location: /user.php');
        exit;
    } else {
        echo "Adding failed!";
    }

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


