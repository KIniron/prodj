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
    $adres = $_POST["adres"];
    $misto = $_POST["misto"];
    $description = $_POST["description"];
    $profession = $_POST["profession"];
    $user_id= $_POST['user_id'];

    // Отримання електронної пошти користувача з сесії (поточний користувач)
    $email = $_SESSION["login_user"];

    // Отримання ID користувача з бази даних
    $sql_user_id = "SELECT id FROM users WHERE email='$email'";
    $result_user_id = $conn->query($sql_user_id);

    if ($result_user_id->num_rows > 0) {
        $row = $result_user_id->fetch_assoc();
        $id_posl = $row["id"];

        // Вставка замовлення в базу даних
        $sql_insert_order = "INSERT INTO orders (id_posl, adres, misto, description, profession , user_id) VALUES ('$id_posl', '$adres', '$misto', '$description','$profession','$user_id')";

        if ($conn->query($sql_insert_order) === TRUE) {
            header('Location: ./orders.php');
        } else {
            echo "Помилка: " . $conn->error;
        }
    } else {
        echo "Помилка при отриманні ID користувача.";
    }
}

$conn->close();
?>