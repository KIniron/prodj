<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style7.css">
    <title>master Profile</title>
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
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "register";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    function getUserInfo($email, $conn) {
        $sql = "SELECT * FROM masters WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    if (isset($_SESSION['login_master'])) {
        $email = $_SESSION['login_master'];
        $user_info = getUserInfo($email, $conn);
        $user_type = $_SESSION['user_type'];
    } else {
        header("location: log.php");
        exit();
    }
    $conn->close();
    ?>
        <div class="user-profile">
        <div class="user-details">
        <img src="img/user.jpg" alt="User Image" class="user-image">
        </div><br>
        <div class="user-info">
        <p class="user-info"><?php echo $user_info['name']; ?></p>
        <p class="user-info">Професія:  <?php echo $user_info['profession']; ?></p>
        <p><strong>Стаж роботи в роках:</strong> <?php echo $user_info['work_experience']; ?> </p>
        </div>

      
        <div class="actions">
    <div class="user-actions">
        <a class="btn" href="orders.php">ВакансіЇ</a>
        <a class="btn" href="Contacts.php">Контакти</a>
        <a class="btn" onclick="toggleOrders()">Прийняті замовлення</a><br>
    </div>
    </div>
</div>

<div id="orders-container" class="orders-container" style="display: none;">
    <?php
    $accepted_orders_sql = "SELECT * FROM orders WHERE profession = '$profession' AND accepted = 1";
    $accepted_result = $conn->query($accepted_orders_sql);
    
    // Виведення прийнятих замовлень
    if ($accepted_result->num_rows > 0) {
        echo '<h2>Прийняті замовлення:</h2>';
        echo '<div class ="divider"></div>';
        while ($accepted_row = $accepted_result->fetch_assoc()) {
            echo '<div class="order">';
            echo '<p><strong>Адреса:</strong> ' . $accepted_row['adres'] . '</p>';
            echo '<p><strong>Місто:</strong> ' . $accepted_row['misto'] . '</p>';
            echo '<p><strong>Опис замовлення:</strong> ' . $accepted_row['description'] . '</p>';
            echo '<p><strong>Потрібен майстер:</strong> ' . $accepted_row['profession'] . '</p>';
            echo '</div>';
        }
    } else {
        echo '<p>На даний момент немає прийнятих замовлень.</p>';
    }
    
    
    $conn->close();
    ?>
   
    </div>
      </div>
   </div>
 </div>
 <script>
    function toggleOrders() {
    var ordersContainer = document.getElementById('orders-container');
    ordersContainer.style.display = (ordersContainer.style.display === 'none' || ordersContainer.style.display === '') ? 'block' : 'none';

  }
</script> 
</body>
</html>
