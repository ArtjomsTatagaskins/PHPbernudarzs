<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bērnudārzs</title>
    <link rel="stylesheet" href="/styles/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <?php  require_once "blocks/header.php"; ?>

        <main class="welcome">
            <div class="image-container">
                <img src="/styles/images/eka.png" alt="bulding">
            </div>
            <div class="description">
                <h2>Par mājaslapu</h2>
                <p>Šī lapa nav īsta bērnudārza lapa, bet gan projekts kursa “PHP valoda interaktīvo Web-lietojumu izstrādei” ietvaros. Visas sakritības ir nejaušas. Visas tehniskās kļūdas ir arī nejaušas.</p>
                <div class="scroll-container">
                    <img src="/styles/images/eka2.png" alt="">
                    <img src="/styles/images/eka2.png" alt="">
                    <img src="/styles/images/eka2.png" alt="">
                    <img src="/styles/images/eka2.png" alt="">
                </div>
            </div>
        </main>

        <?php require_once "blocks/footer.php"; ?>

    </div>
</body>
</html>