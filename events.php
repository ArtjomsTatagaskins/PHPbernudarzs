<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Events</title>
    <link rel="stylesheet" href="/styles/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">

        <?php require_once 'blocks/header.php';?>

        <main class="events">
            <div class="grid-container-events">
                <?php
                    require_once 'lib/db.php';
                    $sql = "SELECT * FROM events ORDER BY id DESC LIMIT 3";
                    $query = $pdo->prepare($sql);
                    $query->execute();
                    $events = $query->fetchAll(PDO::FETCH_OBJ);
                    foreach ($events as $event) {
                        echo '
                            <div class="card">
                                <img src="/styles/images-news/'.$event->img.'" alt="card-img">
                                <h3>'.$event->title.'</h3>
                                <p>'.$event->description.'</p>
                                <div class="card-footer">
                                    <button class="card-button">Saglabāt</button>
                                    <p>'.$event->date.'</p>
                                </div>
                            </div>';
                    }
                ?>
            </div>
        </main>

        <?php require_once 'blocks/footer.php';?>

    </div>
</body>
</html>
