<?php
session_start();

$errors = $_SESSION['errors'] ?? [];
$oldData = $_SESSION['old_data'] ?? [];

unset($_SESSION['errors']);
unset($_SESSION['old_data']);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reģistrācija</title>
    <link rel="stylesheet" href="/styles/styles.css">
</head>
<body>
<div class="wrapper">
    <?php require_once "blocks/header.php"; ?>

    <!-- main -->
    <main class="registration">
        <div class="create-account-container">
            <h2>Izveidot kontu</h2>
            <p id="get-started">Sāciet strādāt ar kontu</p>
            <p id="required-message"><span id="symbol-required">*</span> norāda obligāto lauku.</p>
            <form action="lib/reg.php" id="registration-form" method="post">
                <label for="name">Vārds <span id="symbol-required">*</span></label>
                <input type="text" name="name" id="name" value="<?php echo $oldData['name'] ?? ''; ?>" required>
                <?php if (isset($errors['name'])): ?>
                    <div class="error-message"><img src="/styles/icons/icon=error.svg" alt="error"><?php echo $errors['name']; ?></div>
                <?php endif; ?>

                <label for="surname">Uzvārds <span id="symbol-required">*</span></label>
                <input type="text" name="surname" id="surname" value="<?php echo $oldData['surname'] ?? ''; ?>" required>
                <?php if (isset($errors['surname'])): ?>
                    <div class="error-message"><img src="/styles/icons/icon=error.svg" alt="error"><?php echo $errors['surname']; ?></div>
                <?php endif; ?>

                <label for="email">E-pasta adrese <span id="symbol-required">*</span></label>
                <input type="email" name="email" id="email" value="<?php echo $oldData['email'] ?? ''; ?>" required>

                <label for="password">Izveidojiet paroli <span id="symbol-required">*</span></label>
                <input type="password" name="password" id="password" required>
                <?php if (isset($errors['password'])): ?>
                    <div class="error-message"><img src="/styles/icons/icon=error.svg" alt="error"><?php echo $errors['password']; ?></div>
                <?php endif; ?>

                <label for="retype-password">Atkārtoti ievadiet paroli <span id="symbol-required">*</span></label>
                <input type="password" name="retype-password" id="retype-password" required>
                <?php if (isset($errors['retype-password'])): ?>
                    <div class="error-message"><img src="/styles/icons/icon=error.svg" alt="error"><?php echo $errors['retype-password']; ?></div>
                <?php endif; ?>

                <button type="submit">Izveidot kontu</button>
            </form>
        </div>
        <div class="benefits">
            <h3>Konta izveides priekšrocības</h3>
            <div class="point-container">
                <img src="/styles/icons/icon=access.svg" alt="elipse">
                <p>Ērtums un ātra piekļuve pakalpojumiem Vecākiem ir iespēja ērti un ātri iesniegt pieteikumu bērna uzņemšanai bērnudārzā.</p>
            </div>
            <div class="point-container">
                <img src="/styles/icons/icon=notifications.svg" alt="elipse">
                <p>Aktuālās informācijas pieejamība Izveidojot kontu, vecāki var sekot līdzi jaunumiem un gaidāmajiem pasākumiem.</p>
            </div>
            <div class="point-container">
                <img src="/styles/icons/icons=communication.svg" alt="elipse">
                <p>Personalizēta saziņa ar bērnudārzu Vecāki var saņemt svarīgus paziņojumus, informāciju par bērna aktivitātēm.</p>
            </div>
        </div>
    </main>

    <?php require_once "blocks/footer.php"; ?>

</div>

</body>
</html>
