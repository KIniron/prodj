<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style7.css">
    <title>User Profile</title>
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
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "register";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Функція для отримання інформації про користувача
    function getUserInfo($email, $conn) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    // Перевірка, чи користувач увійшов в систему
    if (isset($_SESSION['login_user'])) {
        $email = $_SESSION['login_user'];
        $user_info = getUserInfo($email, $conn);
    }else {
        header("location: log.php");
        exit();
    }
    ?>

    <div class="user-profile">
        <div class="user-details">
            <img  src="img/user.jpg" alt="User Image" class="user-image">
            </div><br>
            <div class="user-info" >
                <p class="user-info"><?php echo $user_info['username']; ?></p>
            </div>
        <div class="actions">
            <div class="user-actions">
            <a class="btn"  href="orders.php">Наші послуги</a>
            <a class="btn"  href="Contacts.php">Контакти</a>
            <a class="btn" href="poslug.php">Форма замовлень</a>
            <a  class="btn" onclick="toggleOrders()">Мої замовлення</a><br>
        </div>
        </div>
        <div id="orders-container" class="orders-container" style="display: none;">
        <?php
        $orders_sql = "SELECT * FROM orders WHERE user_id='$user_id'";
        $orders_result = $conn->query($orders_sql);

        if ($orders_result->num_rows > 0) {
            while ($order = $orders_result->fetch_assoc()) {
                echo '<div class="order-item">';
                echo '<p>ID замовлення: ' . $order['id_posl'] . '</p>';
                echo '<p>Адреса: ' . $order['adres'] . '</p>';
                echo '<p>Місто: ' . $order['misto'] . '</p>';
                echo '<p>Опис: ' . $order['description'] . '</p>';
                echo '<p>Майстер: ' . $order['profession'] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>Немає замовлень.</p>';
        }

        $conn->close();
        ?>
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



