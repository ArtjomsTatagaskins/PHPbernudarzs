<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Konts</title>
    <link rel="stylesheet" href="/styles/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
<div class="wrapper">

    <?php
        session_start();
        $user_id = $_SESSION['user_id'];
        $is_admin = $_SESSION['is_admin'] ?? false;
        require_once "blocks/header.php";
    ?>

    <main class="user">
        <div class="button-container">
            <?php if ($is_admin): ?>
                <label for="popup-toggle1" class="open-btn">
                    <svg width="42" height="42" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19 13H13V19H11V13H5V11H11V5H13V11H19V13Z"/>
                    </svg>
                    Pievienot pasākumu
                </label>
            <?php endif; ?>
            <?php if ($is_admin): ?>
                <label for="popup-toggle2" class="open-btn">
                    <svg width="42" height="42" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19 13H13V19H11V13H5V11H11V5H13V11H19V13Z"/>
                    </svg>
                    Pievienot ziņū
                </label>
            <?php endif; ?>
            <?php if ($is_admin): ?>
                <label for="popup-toggle3" class="open-btn">
                    <svg width="42" height="42" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19 13H13V19H11V13H5V11H11V5H13V11H19V13Z"/>
                    </svg>
                    <a href="/applications.php">Apskatīt iesniegumus</a>
                </label>
            <?php endif; ?>
            <label for="popup-toggle4" class="open-btn">
                <svg width="42" height="42" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19 13H13V19H11V13H5V11H11V5H13V11H19V13Z"/>
                </svg>
                Pieteikt bērnu
            </label>
            <label for="popup-toggle5" class="open-btn">
                <svg width="42" height="42" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.59 8.59003L12 13.17L7.41 8.59003L6 10L12 16L18 10L16.59 8.59003Z"/>
                </svg>
                Apskatīt bērnus
            </label>
        </div>

        <input type="checkbox" id="popup-toggle1" class="popup-toggle">
        <input type="checkbox" id="popup-toggle2" class="popup-toggle">
        <input type="checkbox" id="popup-toggle3" class="popup-toggle">
        <input type="checkbox" id="popup-toggle4" class="popup-toggle">
        <input type="checkbox" id="popup-toggle5" class="popup-toggle">

        <div class="popup" id="popup1">
            <div class="popup-content">
                <label for="popup-toggle1" class="close-btn">&times;</label>
                <form action="lib/addevents.php" method="post" class="user-form">
                    <label for="events-title">Virsraksts</label>
                    <input type="text" id="events-title" name="events-title" required><br>

                    <label for="events-text">Pasākuma apraksts</label>
                    <textarea name="events-text" id="events-text" cols="30" rows="10"></textarea>

                    <label for="events-image">Bilde</label>
                    <input type="text" id="events-image" name="events-image" required><br>

                    <label for="events-date">Datums</label>
                    <input type="date" id="events-date" name="events-date" required><br>

                    <button type="submit">Sūtīt</button>
                </form>
            </div>
        </div>

        <div class="popup" id="popup2">
            <div class="popup-content">
                <label for="popup-toggle2" class="close-btn">&times;</label>
                <form action="/lib/addnews.php" method="post" class="user-form">
                    <label for="news-title">Virsraksts</label>
                    <input type="text" id="news-title" name="news-title" required><br>

                    <label for="news-text">Ziņas teksts</label>
                    <textarea name="news-text" id="news-text" cols="30" rows="10"></textarea>

                    <label for="news-date">Datums</label>
                    <input type="date" id="news-date" name="news-date" required><br>

                    <button type="submit">Sūtīt</button>
                </form>
            </div>
        </div>

        <div class="popup" id="popup4">
            <div class="popup-content">
                <label for="popup-toggle4" class="close-btn">&times;</label>
                <form action="/lib/addchild.php" method="post" class="user-form">
                    <label for="child-name">Bērna vārds</label>
                    <input type="text" id="child-name" name="child-name" required><br>

                    <label for="child-surname">Bērna uzvārds</label>
                    <input type="text" id="child-surname" name="child-surname" required><br>

                    <label for="child-dob">Bērna dzimšanas datums</label>
                    <input type="date" id="child-dob" name="child-dob" required><br>

                    <label for="child-useful-info">Pārējā informācija</label>
                    <textarea name="child-useful-info" id="child-useful-info" cols="30" rows="10"></textarea>

                    <button type="submit">Sūtīt</button>
                </form>
            </div>
        </div>

        <div class="popup" id="popup5">
            <div class="popup-content">
                <label for="popup-toggle5" class="close-btn">&times;</label>
                <?php
                require_once 'lib/db.php';
                $sql = "SELECT * FROM children WHERE parent_id = :user_id ORDER BY id DESC";
                $query = $pdo->prepare($sql);
                $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $query->execute();
                $children = $query->fetchAll(PDO::FETCH_OBJ);
                if ($children) {
                    foreach ($children as $child) {
                        echo '
                            <div class="child">
                                <p>Vārds: '.$child->child_name.' </p>
                                <p>Uzvārds: '.$child->child_surname.'</p>
                                <p>Dzimšanas datums: '.$child->dob.'</p>
                                <p>Pārēja informācija: '.$child->useful_info.'</p>
                        </div>';
                    }
                }
                else {
                    echo '
                    <p>Nav bērnu</p>';
                }
                ?>
            </div>
        </div>

    </main>

    <?php require_once "blocks/footer.php"; ?>

</div>
</body>
</html>
