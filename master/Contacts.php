<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style4.css">
    <title>------</title>
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
    <br>
    <br>
    <br>
    <div class="container2">
      <section class="osnov">
        <div class="section__osnov">
            <h1 class="name">Засновники сайту:</h1>
        </div>
        <div class="osnov_img">
            <div class="osnov_person">
                <img src="img/инк1.jpg" alt="Image 1">
                <p>Ім'я Фамілія 1</p>
            </div>
            <div class="osnov_person">
                <img src="img/инк1.jpg" alt="Image 2">
                <p>Ім'я Фамілія 2</p>
            </div>
            <div class="osnov_person">
                <img src="img/инк1.jpg" alt="Image 3">
                <p>Ім'я Фамілія 3</p>
            </div>
            <div class="osnov_person">
                <img src="img/инк1.jpg" alt="Image 4">
                <p >Ім'я Фамілія 4</p>
            </div>
            <div class="osnov_person">
                <img src="img/инк1.jpg" alt="Image 5">
                <p>Ім'я Фамілія 5</p>
            </div>
            <div class="osnov_person">
                <img src="img/инк1.jpg" alt="Image 6">
                <p>Ім'я Фамілія 6</p>
            </div>
        </div>
       </section>
    </div>
    <br>
    <div class="container4">
        <h1 class="name3">Контакти:</h1>
        <div class="icons">
            <a href="#">
                <div class="layer">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span class="fa-brands fa-telegram"></span>
                </div>
                <div class="text">Telegram</div>
            </a>
        </div>  
        <div class="icons">
            <a href="#">
                <div class="layer">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span class="fa-brands fa-facebook"></span>
                </div>
                <div class="text">Facebook</div>
            </a>
        </div>  
        <div class="icons">
            <a href="#">
                <div class="layer">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span class="fa-brands fa-instagram"></span>
                </div>
                <div class="text">Instagram</div>
            </a>
        </div>  
     </div>
</body>
</html>

