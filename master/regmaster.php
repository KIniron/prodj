<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat:wght@100&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="style6.css">
      <title>----</title>
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
          <h2>зареєструватись як фахівець</h2>
          <br>
          <form action="master.php" method="post">
           <label for="name">Прізвище та ім'я:</label><br>
           <input type="text" name="name" required><br>
            <label for="profession">Професія:</label><br>
            <select name="profession">
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
           <label for="email">Пошта:</label><br>
           <input type="email" name="email" required><br>
           <label for="pass">Пароль:</label><br>
           <input type="pass" name="pass" required><br>
           <label for="confirm_pass">Підтвердження паролю:</label><br>
           <input type="pass" name="confirm_pass" required><br>
           <label for="work_experience">Стаж роботи за професією (роки):</label><br>
           <input type="number" name="work_experience" id="work_experience_input" required ><br>
           <label>
           <input type="checkbox" name="no_experience" onchange="handleNoExperience()"> Немає досвіду
           </label>
           <br>
           <script>
           function handleNoExperience() {
           var noExperienceCheckbox = document.querySelector('input[name="no_experience"]');
           var workExperienceInput = document.getElementById('work_experience_input'); // Змінено ID тут

          if (noExperienceCheckbox.checked) {
            workExperienceInput.value = 0;
              } else {
                workExperienceInput.value = "";
              }
            }
          </script>
           <div class="center-container">
            <input class="btn" type="submit" value="Зареєструватися" ></div>
            </div>
            <div class="center-container1">
                <a class="item" href="log2.php">Увійти в аккаунт зараз</a></div>
          </form>
       </div>
    </div>
  </body>
</html>