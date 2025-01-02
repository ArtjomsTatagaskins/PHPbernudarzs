<?php

session_start();
$parent_id = $_SESSION['user_id'];

$name = trim(filter_var($_POST['child-name'], FILTER_SANITIZE_SPECIAL_CHARS));
$surname = trim(filter_var($_POST['child-surname'], FILTER_SANITIZE_SPECIAL_CHARS));
$info = trim(filter_var($_POST['child-useful-info'], FILTER_SANITIZE_SPECIAL_CHARS));
$dob = trim(filter_var($_POST['child-dob'], FILTER_DEFAULT));

try {
    require 'db.php';

    echo "Successfully connected to the database.<br>";

    $sql = 'INSERT INTO children_applications (parent_id, child_name, child_surname, dob, useful_info) VALUES (?, ?, ?, ?, ?)';

    $query = $pdo->prepare($sql);

    if ($query->execute([$parent_id, $name, $surname, $dob, $info])) {
        header('Location: /user.php');
        exit;
    } else {
        echo "Adding failed!";
    }

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


