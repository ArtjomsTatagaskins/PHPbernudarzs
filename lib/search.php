<?php
try {

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require 'db.php';

    if (isset($_GET['query'])) {
        $query = $_GET['query'];
        $searchTerm = "%" . $query . "%";

        $stmt_events = $pdo->prepare("SELECT 'events' AS source, title, description, date FROM events WHERE title LIKE :searchTerm OR description LIKE :searchTerm");
        $stmt_events->execute(['searchTerm' => $searchTerm]);
        $result_events = $stmt_events->fetchAll(PDO::FETCH_ASSOC);

        $stmt_news = $pdo->prepare("SELECT 'news' AS source, title, description, date FROM news WHERE title LIKE :searchTerm OR description LIKE :searchTerm");
        $stmt_news->execute(['searchTerm' => $searchTerm]);
        $result_news = $stmt_news->fetchAll(PDO::FETCH_ASSOC);

        echo '<h2>Meklēšanas rezultāti priekš: ' . htmlspecialchars($query) . '</h2>';

        $results = array_merge($result_events, $result_news);

        if (count($results) > 0) {
            echo '<div id="search-results" class="search-results-container">';
            foreach ($results as $row) {
                echo "<h3>Avots: " . htmlspecialchars($row['source']) . " - " . htmlspecialchars($row['title']) . "</h3>";
                echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                echo "<small>Datums: " . htmlspecialchars($row['date']) . "</small><hr>";
            }
            echo '</div>';
        } else {
            echo '<div id="search-results" class="search-results-container">';
            echo "<p>Nekas nav atrasts.</p>";
            echo '</div>';
        }
    }

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

