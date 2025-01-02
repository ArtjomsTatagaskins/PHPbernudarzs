<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pieteikumi</title>
    <link rel="stylesheet" href="/styles/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <?php
    session_start();
    $is_admin = $_SESSION['is_admin'] ?? false;
    require_once "blocks/header.php";
    ?>

    <main class="applications">
        <?php
        require_once 'lib/db.php';

        try {
            $sql = "SELECT * FROM children_applications WHERE application_status = 'pending' ORDER BY id DESC LIMIT 3";
            $query = $pdo->prepare($sql);
            $query->execute();
            $applications = $query->fetchAll(PDO::FETCH_OBJ);

            if (!$applications) {
                echo '<p id="no-applications">Nav pieteikumu</p>';
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        ?>

        <div class="grid-container-applications">
            <?php
            if ($applications) {
                foreach ($applications as $application) {
                    echo '
                    <div class="application-container">
                        <h3>Pieteikuma numurs: '.$application->id.' </h3>
                        <p>Vecāka ID: '.$application->parent_id.'</p>
                        <p>Bērnа vārds: '.$application->child_name.'</p>
                        <p>Bērna uzvārds: '.$application->child_surname.'</p>
                        <p>Bērna dzimšanas datums: '.$application->dob.'</p>
                        <p>Pārējā informācija: '.$application->useful_info.'</p>
                        <p>Pieteikuma datums un laiks: '.$application->application_date.'</p>

                        <form method="POST" action="">
                            <input type="hidden" name="application_id" value="'.$application->id.'">
                            <input type="hidden" name="child_name" value="'.$application->child_name.'">
                            <input type="hidden" name="child_surname" value="'.$application->child_surname.'">
                            <input type="hidden" name="dob" value="'.$application->dob.'">
                            <input type="hidden" name="parent_id" value="'.$application->parent_id.'">
                            <input type="hidden" name="useful_info" value="'.$application->useful_info.'">
                            <button type="submit" name="action" value="accept" id="accept-application">Apstriprināt</button>
                            <button type="submit" name="action" value="reject" id="cancel-application">Noraidīt</button>
                        </form>
                    </div>
                    ';
                }
            }
            ?>
        </div>
    </main>

    <?php
        $application_id = $_POST['application_id'];
        $action = $_POST['action'];

        if ($action === 'accept') {
            $sql = "UPDATE children_applications SET application_status = 'approved' WHERE id = :id";
            $query = $pdo->prepare($sql);
            $query->execute(['id' => $application_id]);

            $child_name = $_POST['child_name'];
            $child_surname = $_POST['child_surname'];
            $dob = $_POST['dob'];
            $parent_id = $_POST['parent_id'];
            $useful_info = $_POST['useful_info'];

            $sql = "INSERT INTO children (parent_id, child_name, child_surname, dob, useful_info) VALUES (?, ?, ?, ?, ?)";
            $query = $pdo->prepare($sql);
            $query->execute([$parent_id, $child_name, $child_surname, $dob, $useful_info]);

            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        } elseif ($action === 'reject') {
            $sql = "UPDATE children_applications SET application_status = 'rejected' WHERE id = :id";
            $query = $pdo->prepare($sql);
            $query->execute(['id' => $application_id]);

            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        }
    ?>

    <?php require_once "blocks/footer.php" ?>
</div>
</body>
</html>
