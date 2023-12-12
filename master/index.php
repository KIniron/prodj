<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat:wght@100&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>----</title>
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
          <div class="container1">
            <div class="intro" >
              <div class="intro__inner">
                  <br>
                  <br>
                  <h2 class="intro__suptitle">Кльовий Майстер</h2>
                   <h1 class="intro__title">Найкращі спеціалісти по всі Україні</h1>
                   <a class="btn" href="Contacts.php">Зв'язатись з нами</a>
                  </div>
                </div>
          </div>
          <h3 class="section__poslug" >Інформаційний блок:</h3>
        <div class="container3">
                <div class="slider-container">
                  <div class="slide">
                      <img src="img/мета.jpg" alt="Image 1"  >
                      <div class="slide-text">
                      </div>
                  </div>
                  <div class="slide">
                      <img src="img/принцип.JPG" alt="Image 2">
                      <div class="slide-text">
                      </div>
                  </div>
                  <div class="slide">
                    <img src="img/авдит.JPG" alt="Image 3">
                    <div class="slide-text">
                    </div>
                </div>
                  <div class="button-container">
                    <button onclick="prevSlide()"></button>
                    <button onclick="changeSlide(0)"></button>
                    <button onclick="changeSlide(1)"></button>
                    
                  </div>
              </div>
              <script src="main.js">

              </script>              
           </div>
          </div>
          <h3 class="section__osnov" >Всі послуги які ми можемо надати вам:</h3>
          <div class="container4">
            <div class="osnov">
              <div class="osnov_img">
                <div>
                  <img src="img/1.1.jpg" alt="Картинка 1">
                  <p class="name"><a class="text__prod"  href="orders.php">Домашні послуги</a></p>
                  <p class="name2"><a class="text__prod"  href="orders.php">Ремонт квартир</a></p>
                  <p class="name2"><a class="text__prod"  href="orders.php">Укладання плитки</a></p>
                  <p class="name2"><a class="text__prod"  href="orders.php">Утеплення приміщень</a></p>
                </div>
                <div>
                  <img src="img/2.2.jpg" alt="Картинка 2">
                  <p class="name"><a class="text__prod" href="orders.php">Ремонт техніки</a></p>
                  <p class="name2"><a class="text__prod"  href="orders.php">Комп'ютерна допомога</a></p>
                  <p class="name2"><a class="text__prod"  href="orders.php">Ремонт мобільних телефонів</a></p>
                  <p class="name2"><a class="text__prod"  href="orders.php">Ремонт великої побутової техніки</a></p>
                </div>
                <div>
                  <img src="img/3.3.jpg" alt="Картинка 3">
                  <p class="name"><a class="text__prod"  href="orders.php">Оздоблювальні роботи</a></p>
                  <p class="name2"><a class="text__prod"  href="orders.php">Установка і ремонт дверей</a></p>
                  <p class="name2"><a class="text__prod"  href="orders.php">Укладання плитки</a></p>
                  <p class="name2"><a class="text__prod"  href="orders.html">Утеплення приміщень</a></p>
                </div>
                <div>
                  <img src="img/4.4.jpg" alt="Картинка 4">
                  <p class="name"><a class="text__prod"  href="orders.php">Послуги репетиторів</a></p>
                  <p class="name2"><a class="text__prod"  href="orders.php">Викладачі з предметів</a></p>
                  <p class="name2"><a class="text__prod"  href="orders.php">Репетитори з іноземних мов</a></p>
                  <p class="name2"><a class="text__prod"  href="orders.php">Написання робіт</a></p>
                </div>
                <div>
                  <img src="img/5.5.jpg" alt="Картинка 5">
                  <p class="name"><a class="text__prod"  href="orders.php">Послуги Фотографа</a></p>
                  <p class="name2"><a class="text__prod"  href="orders.php">Фотограф</a></p>
                  <p class="name2"><a class="text__prod"  href="orders.php">Відеооператор</a></p>
                  <p class="name2"><a class="text__prod"  href="orders.php">Обробка фотографій</a></p>
                </div>
              </div>
            </div>
          </div>
          <h3 class="section__stat" >Статистика:</h3>
         <div class="container2">
      <div class="statistics">
          <div class="stat" >
            <div class="stat__item"> 
                <div class="stat__count">101</div>
                <div class="stat__text">Число відвідувачів</div>
              </div>
            <div class="stat__item">
              <div class="stat__count">5</div>
                <div class="stat__text">Рейтинг сайту</div>
              </div>
              <div class="stat__item">
                <div class="stat__count">450</div>
                  <div class="stat__text">число замовлень </div>
              </div>
              <div class="stat__item">
                <div class="stat__count">254</div>
                  <div class="stat__text">кількість виконаних замовлень</div>
              </div>
              <div class="stat__item">
                <div class="stat__count">18</div>
                  <div class="stat__text">число майстрів онлайн</div>
              </div>
          </div>
      </div>
    </body>
</html>