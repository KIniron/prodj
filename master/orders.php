<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style8.css">
    <title>Замовлення</title>
</head>
<body>

<header class="header header--fixed">
    <div class="container">
        <div class="header__inner">
            <div class="header__logo"><a class="gf" href="index.php">Кльовий Майстер</a></div>
            <div class="center-container"></div>
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
                    <a class="nav__link" href="poslug.php">Створити замовлення</a>
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

                echo '<a class="reg-button" href="regmaster.php">Стати фахівцем</a>';
                ?>
            </div>
        </div>
    </div>
</header>

<div class="reg-container">
    <div class="reg">
        <?php
        // Підключення до бази даних
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "register";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Отримання всіх замовлень
        $profession = $_SESSION['master_profession'];
        $get_orders_sql = "SELECT * FROM orders WHERE profession='$profession'";
        $result = $conn->query($get_orders_sql);

        if ($result->num_rows > 0) {
            echo '<div class="order-container">';
            echo '<h2 class="order-header">Рекомендації для майстра:</h2>';
            while ($row = $result->fetch_assoc()) {
                echo '<div class="divider"></div>';
                echo '<div class="order">';
                echo '<p><strong>Адреса:</strong> ' . $row['adres'] . '</p>';
                echo '<p><strong>Місто:</strong> ' . $row['misto'] . '</p>';
                echo '<p><strong>Опис замовлення:</strong> ' . $row['description'] . '</p>';
                echo '<p><strong>Потрібен майстер:</strong> ' . $row['profession'] . '</p>';
                echo '<button class="btn" onclick="acceptOrder(' . $row['id'] . ')">Прийняти замовлення</button>';
                echo '</div>';
                echo '<div class="divider"></div>';
            }
            echo '</div>';
        } else {
            echo '<p></p>';
        }

        function getUsername($username, $conn)
        {
            $sql = "SELECT * FROM users WHERE id = $username";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                return $user['username'];
            } else {
                return "Невідомий користувач";
            }
        }

        $get_other_orders_sql = "SELECT * FROM orders WHERE profession<>'$profession'";
        $other_result = $conn->query($get_other_orders_sql);

        if ($other_result->num_rows > 0) {
            echo '<div class="order-container">';
            echo '<h2 class="other-order-header">Замовлення:</h2>';

            while ($other_row = $other_result->fetch_assoc()) {
                echo '<div class="divider"></div>';
                echo '<div class="order">';
                echo '<p><strong>Адреса:</strong> ' . $other_row['adres'] . '</p>';
                echo '<p><strong>Місто:</strong> ' . $other_row['misto'] . '</p>';
                echo '<p><strong>Опис замовлення:</strong> ' . $other_row['description'] . '</p>';
                echo '<p><strong>Потрібен майстер:</strong> ' . $other_row['profession'] . '</p>';
                echo '<button class="btn" onclick="acceptOrder(' . $other_row['id_posl'] . ')">Прийняти замовлення</button>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo '<p></p>';
        }

        $conn->close();
        ?>
    </div>
</div>

<script>
    function acceptOrder(orderId) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                alert('Замовлення прийняте!');
                // Отримання елементу замовлення
                var orderElement = document.getElementById('order_' + orderId);
                // Приховання елементу замовлення
                orderElement.style.display = 'none';
            }
        };
        xhttp.open("GET", "accept_order.php?id_posl=" + orderId, true);
        xhttp.send();
    }
</script>

</body>
</html>

