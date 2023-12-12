<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "register";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Помилка з'єднання з базою даних: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $profession = $_POST["profession"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $work_experience = isset($_POST['work_experience']) ? $_POST['work_experience'] : null;

if (isset($_POST['no_experience']) && $_POST['no_experience'] == 'on') {
    $work_experience = null; 
} elseif ($work_experience !== null && !is_numeric($work_experience)) {
    echo "Помилка: Стаж роботи має бути числовим значенням.";
    exit;
}

$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

// SQL-запит для вставки даних у таблицю
$sql = "INSERT INTO masters (name, profession, email, pass, work_experience) VALUES ('$name', '$profession', '$email', '$hashed_password', ";

// Додайте значення для work_experience в залежності від його наявності
$sql .= $work_experience !== null ? "'$work_experience'" : 'NULL';

$sql .= ")";

if ($conn->query($sql) === TRUE) {
    header('Location: ./orders.php');
} else {
    echo "Помилка: " . $sql . "<br>" . $conn->error;
}
    
}

// Закриття з'єднання
$conn->close();
?>
