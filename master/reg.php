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
    <script>
        function validateForm() {
            var password = document.getElementById("pass").value;
            var confirmPassword = document.getElementById("confirmPass").value;

            if (password !== confirmPassword) {
                alert("Паролі не співпадають!");
                return false;
            }

            return true;
        }
    </script>
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
                     echo '<a class="nav__link" href="user_prof.php">Профіль</a>';
                         } elseif (isset($_SESSION['login_master'])) {
                      echo '<a class="nav__link" href="master_profile.php">Профіль</a>';
                       }
                           ?>
                        <a class="nav__link" href="poslug.php">створити замовлення</a>
                        <a class="nav__link" href="Contacts.php">Контакти</a>
                        <a class="nav__link" href="product.php">Наші послуги</a>
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
     <div class="reg">
     <h2>Реєстрація</h2>
    
      <form action="reg1.php" method="post" onsubmit="return validateForm();">
        <label for="username">Ім'я користувача:</label><br>
        <input type="text" id="username" name="username" required><br>
        
        <label for="email">Електронна пошта:</label><br>
        <input type="email" id="email" name="email" required><br>
        
        <label for="pass">Пароль:</label><br>
        <input type="pass" id="pass" name="pass" required><br>

        <label for="confirmPass">Підтвердження паролю:</label><br>
        <input type="pass" id="confirmPass" name="confirmPass" required><br>
        <br>
        <div class="center-container">
        <input class="btn" type="submit"  name="button-reg" value="Зареєструватися" ></div>
        <br>
        <div class="center-container1">
          <a class="item" href="log.php">Увійти в аккаунт зараз</a></div>
      </form>
      </div>
    </div>
 </body>
</html>
