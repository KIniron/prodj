<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="style8.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пошук майстра</title>
</head>
<body>
<header class="header header--fixed">
      <div class="container">
          <div class="header__inner">
              <div class="header__logo"><a class="gf" href="index.php">Кльовий Майстер</a></div>
              <div class="center-container">
                  <div class="search-container">
                      
                  </div>
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
  <div class="search-results-container">
<h1>Пошук майстра</h1>
<form id="searchForm" class="search-form">
    <label for="profession">Професія:</label>
    <input type="text" id="profession" placeholder="Введіть професію">
    <input type="button" value="Знайти" onclick="searchMaster()">
</form>
<div id="result" class="search-results"></div>
                </div>
<script>
    function searchMaster() {
        var professionInput = document.getElementById('profession').value;

        
        fetch('http://localhost:5000//predict_experience', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ 'profession': professionInput })
        })
        .then(response => response.json())
        .then(data => {
            
            if (data.success) {
                var bestMaster = data.bestMaster;
                var worstMaster = data.worstMaster;

                var resultHtml = '<p>Перший майстер по рейтингу:</p>' +
                                 '<p>Ім\'я: ' + bestMaster.name + '</p>' +
                                 '<p>Email: ' + bestMaster.email + '</p>' +
                                 '<p>Професія: ' + bestMaster.profession + '</p>' +
                                '<p>Прогнозований досвід: ' + bestMaster.predicted_experience + '</p>';

                resultHtml += '<p>Другий майстер по рейтингу:</p>' +
                              '<p>Ім\'я: ' + worstMaster.name + '</p>' +
                              '<p>Email: ' + worstMaster.email + '</p>' +
                              '<p>Професія: ' + worstMaster.profession + '</p>' +
                             '<p>Прогнозований досвід: ' + worstMaster.predicted_experience + '</p>';

                document.getElementById('result').innerHTML = resultHtml;
            } else {
                document.getElementById('result').innerHTML = '<p>Майстерів не знайдено</p>';
            }
        })
        .catch(error => console.error('Помилка:', error));
    }
</script>

</body>
</html>
