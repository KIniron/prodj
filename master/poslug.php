<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style6.css">
    <title>Замовлення</title>
</head>
<body>

<header class="header header--fixed">
    <div class="container">
        <div class="header__inner">
            <div class="header__logo"><a class="gf" href="index.php">Кльовий Майстер</a></div>
            <div class="center-container">
            </div>
            <div class="right-container">
                <nav class="nav">
                <?php
                      session_start();
                  if (isset($_SESSION['login_user'])) {
                     echo '<a class="nav__link" href="prof.php">Профіль</a>';
                         } elseif (isset($_SESSION['login_master'])) {
                      echo '<a class="nav__link" href="master_profile.php">Профіль</a>';
                       }
                           ?>
                    <a class="nav__link" href="poslug.php">створити замовлення</a>
                    <a class="nav__link" href="Contacts.php">Контакти</a>
                    <a class="nav__link" href="orders.php">Наші послуги</a>
                    <a class="nav__link" href="mastersp.php">Знайти майстра </a>
                </nav>
                <?php
                 session_start();
                  if (isset($_SESSION['login_user']) || isset($_SESSION['login_master'])) {
                echo '<a class="login-button" href="logout.php">Вийти</a>';
                  } else {
                echo '<a class="login-button" href="log.php">Увійти</a>';
                 }


              echo '<a class="reg-button" href="regmaster.php">стати фахівцем</a>';
               ?>
            </div>
        </div>
    </div>
</header>

<div class="reg-container">
    <form action="posluga.php" method="post">
        <h1 >Опис замовлення:</h1><br>
        <label for="adres">Адреса:</label><br>
          <input type="text" id="adres" name="adres" required><br>
          <label for="misto">Міста:</label><br>
        <select name="misto" required>
            <option value="Kharkiv">Харків</option>
            <option value="Chernihiv">Чернігів</option>
            <option value="Odesa">Одеса</option>
            <option value="Lviv">Львів</option>
           </select><br>
           <label for="description">Замовлення:</label><br>
        <textarea id="description" name="description" rows="6" cols="50" required></textarea><br>
        <label for="profession">Вибрати майстра:</label><br>
           <select name="profession" required>
            <option value="Репетитор з Математики">Репетитор з Математики</option>
            <option value="Сантехнік">Сантехнік</option>
            <option value="Електрик">Електрик</option>
            <option value="комп'ютерний майстер">комп'ютерний майстер</option>
            <option value="Репетитор з Англійської">Репетитор з Англійської </option>
            <option value="Сантехнік/Електрик">Сантехнік/Електрик</option>
            <option value="Фотограф">Фотограф</option>
            <option value="Відео монтажер">Відео монтажер</option>
            <option value="Репетитор">Електрик/Столяр</option>
            <option value="Сантехнік">Столяр</option>
            <option value="Електрик">Електрик/Укладчик плитки</option>
            <option value="комп'ютерний майстер">комп'ютерний майстер</option>
           </select><br>
        <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_info['user_id']; ?>"><br>
        <div class="center-container">
        <button class="btn" type="submit">Замовити</button></div>
    </form>
</div>

</body>


</html>
