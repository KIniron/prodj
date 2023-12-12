<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat:wght@100&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style5.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>-----</title>
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
    <div class="login-container">
        <div class="login">
          <h2>Вхід</h2>
    
          <form method="post" action="">
          <label for="email">Електронна пошта:</label><br>
          <input type="text" id="email" name="email" required><br>
        
          <label for="pass">Пароль:</label><br>
          <input type="pass" id="pass" name="pass" required><br>
          <br>
          <div class="center-container">
             <input class="btn" type="submit" value="Увійти">
            </div>
             <br>
             <div class="center-container1">
             <a class="item" href="regmaster.php">Зареєструватися</a></div>
             <div class="center-container1">
             <a class="item" href="log.php">Увійти як користувач</a></div>
          </form>
       </div>
    </div>
</body>
</html>
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "register";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    // Перевірка в таблиці 'masters'
    $master_sql = "SELECT * FROM masters WHERE email='$email'";
    $master_result = $conn->query($master_sql);

    // Перевірка в таблиці 'masters'
    if ($master_result->num_rows > 0) {
        $row = $master_result->fetch_assoc();
        // Перевірка зашифрованого паролю
        if (password_verify($pass, $row['pass'])) {
            $_SESSION['login_master'] = $email;
            $_SESSION['master_profession'] = $row['profession'];
            header("location: orders.php");
            exit();
        } else {
            echo "Невірний пароль";
        }
    } else {
        echo "Користувача не знайдено";
    }
}

$conn->close();
?>