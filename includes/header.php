<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo $pageTitle ?? 'DARIA ROZENVASSER'; ?></title>
    <link rel="icon" type="image/png" href="images/logos.png">
    
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600&family=Cormorant+Garamond:ital,wght@0,300;0,400;1,300&family=Plus+Jakarta+Sans:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- НАВИГАЦИЯ -->
<header>
    <a href="index.php" class="logo"><span>DARIA ROZENVASSER</span></a>
    <nav>
        <a href="index.php#elements" data-i18n="nav_elements">Стихии</a>
        <a href="fire.php" data-i18n="nav_fire">Огонь</a>
        <a href="aqua.php" data-i18n="nav_water">Вода</a>
        <a href="land.php" data-i18n="nav_earth">Земля</a>
        <a href="air.php" data-i18n="nav_air">Воздух</a>
        <a href="game.php" data-i18n="nav_game">Игра</a>
<a href="#contacts" data-i18n="nav_contacts">Контакты</a> 

 <!-- ИКОНКА КОРЗИНЫ -->
    <a href="cart.php" class="cart-icon" title="Шкатулка сокровищ">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2L2 7v10l10 5 10-5V7L12 2zm0 2.18l7 3.5v7.64l-7 3.5-7-3.5V7.68l7-3.5z"/>
            <path d="M12 6L6 9v6l6 3 6-3V9l-6-3zm0 1.5l4 2v3l-4 2-4-2v-3l4-2z"/>
        </svg>
        <span class="cart-count" id="cartCount" style="display: none;">0</span>
    </a>
       
        <!-- КНОПКА ПЕРЕВОДА -->
        <button class="lang-switch" id="langSwitch" title="Switch language">
            <span class="lang-current">RU</span>
            <span class="lang-separator">/</span>
            <span class="lang-other">EN</span>
        </button>
    </nav>
</header>