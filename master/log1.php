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

    // Перевірка в таблиці 'users'
    $user_sql = "SELECT * FROM users WHERE email='$email'";
    $user_result = $conn->query($user_sql);

    // Перевірка в таблиці 'masters'
    $master_sql = "SELECT * FROM masters WHERE email='$email'";
    $master_result = $conn->query($master_sql);

    // Перевірка в таблиці 'users'
    if ($user_result->num_rows > 0) {
        $row = $user_result->fetch_assoc();
        // Перевірка зашифрованого паролю
        if (password_verify($pass, $row['pass'])) {
            $_SESSION['login_user'] = $email;
            header("location: orders.php");
            exit();
        } else {
            echo "Невірний пароль";
        }
    }

    // Перевірка в таблиці 'masters'
    elseif ($master_result->num_rows > 0) {
        $row = $master_result->fetch_assoc();
        // Перевірка зашифрованого паролю
        if (password_verify($pass, $row['pass'])) {
            $_SESSION['login_master'] = $email;
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



