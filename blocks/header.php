<header>
    <div class="web-name"><a href="/mainpage.php"><h3>Bērnudārzs</h3></a></div>
    <div class="dropdown-list">

        <?php
        if(isset($_COOKIE['login'])) {
            echo '<a href="/user.php">Personīgais konts</a>';
            if (basename($_SERVER['PHP_SELF']) == 'user.php') {
                echo '
                    <form action="/lib/logout.php" method="post">
                        <button type="submit" class="logout-button">Iziet no sistēmas</button>
                    </form>';
            }
        } else {
            echo '<a href="/authorization.php">Reģistrācija/Ieiešana</a>';
        }
        ?>

        <div class="dropdown-first">
            <p>Kategorijas</p>
            <img src="/styles/icons/icon=expand_more.svg" alt="expand-more" class="expand-more">
            <img src="/styles/icons/icon=expand_less.svg" alt="expand-less" class="expand-less">
            <div class="dropdown-content">
                <a href="/events.php" id="news">Pasākumi</a><br>
                <a href="/news.php" id="events">Ziņas</a>
            </div>
        </div>
<!--        <div class="dropdown-second">-->
<!--            <p>Section</p>-->
<!--            <img src="/styles/icons/icon=expand_more.svg" alt="expand-more" class="expand-more">-->
<!--            <img src="/styles/icons/icon=expand_less.svg" alt="expand-less" class="expand-less">-->
<!--            <div class="dropdown-content">-->
<!--                <p>Section</p>-->
<!--            </div>-->
<!--        </div>-->
        <form method="GET" action="/lib/search.php" id="search-bar">
            <div class="search-container">
                <input type="text" name="query" class="search" placeholder="Ievadiet...">
                <button class="submit-search" type="submit">
                    <img src="/styles/icons/icon=search.svg" alt="search-icon" class="search-icon">
                </button>
            </div>
        </form>

    </div>
</header>
