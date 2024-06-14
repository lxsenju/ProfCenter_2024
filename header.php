<header class="header">
    <div class="hamburger">
        <div class="hamburger_lines" id="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>

    <nav class="popup" id="popup">
        <ul class="header_nav-popup">
            <li><a href="index.php#about">О нас</a></li>
            <li><a href="index.php#service">Услуги</a></li>
            <li><a href="index.php#cta">Оформить заказ</a></li>
            <li><a href="index.php#comment">Отзывы</a></li>
            <?php
            if (isset($_SESSION["auth"])) {
                if ($_SESSION["userStatus"] = "2") {
                    echo "<li class='red'>" . $_SESSION["login"] . "</li>";
                } else {
                    echo "<li class='white'>" . $_SESSION["login"] . "</li>";
                }
                echo "<li><a href='php/logoutLogic.php'>Выход</a></li>";
            } else {
                echo "<li><a href='login.php'>Вход</a></li>";
            }
            ?>
        </ul>
    </nav>

    <a href="index.php"><img src="img/logo.png" alt="logo"></a>
    <div class="burger-menu" id="burger-menu">
        <div class="burger-menu__line"></div>
        <div class="burger-menu__line"></div>
        <div class="burger-menu__line"></div>
    </div>
    <nav class="header__nav">
        <ul>
            <li><a href="index.php#about">О нас</a></li>
            <li><a href="index.php#service">Услуги</a></li>
            <li><a href="index.php#cta">Оформить заказ</a></li>
            <li><a href="index.php#comment">Отзывы</a></li>
            <?php
            if (isset($_SESSION["auth"])) {
                if ($_SESSION["userStatus"] = "2") {
                    echo "<li class='red'>" . $_SESSION["login"] . "</li>";
                } else {
                    echo "<li class='white'>" . $_SESSION["login"] . "</li>";
                }
                echo "<li><a href='php/logoutLogic.php'>Выход</a></li>";
            } else {
                echo "<li><a href='login.php'>Вход</a></li>";
            }
            ?>
        </ul>
    </nav>
</header>