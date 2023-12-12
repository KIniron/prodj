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

if (isset($_GET['id_posl'])) {
    $orderId = $_GET['id_posl'];
    $id_posl = $_GET['id_posl'];
    $update_sql = "UPDATE orders SET accepted = 1 WHERE id = $id_posl";
    $conn->query($update_sql);
}

$conn->close();
?>
