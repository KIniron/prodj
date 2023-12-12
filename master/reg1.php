<?php

// Підключення до бази даних
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "register";

$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка підключення
if ($conn->connect_error) {
    die("Помилка підключення до бази даних: " . $conn->connect_error);
}

// Обробка POST-запиту
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $confirmPass = $_POST["confirmPass"];

    // Перевірка, чи паролі співпадають
    if ($pass !== $confirmPass) {
        echo "Паролі не співпадають!";
        exit;
    }

    // Хешування паролю перед збереженням у базі даних (додайте ваші власні механізми безпеки)
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    // Вставка даних у базу даних
    $sql = "INSERT INTO users (username, email, pass) VALUES ('$username', '$email', '$hashedPass')";

    if ($conn->query($sql) === TRUE) {
        header("location: ./log.php");
        echo "";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
}

// Закриття з'єднання з базою даних
$conn->close();

?>



