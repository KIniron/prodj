<?php
// Начинаем сессию, чтобы иметь доступ к данным сессии
session_start();

// Разрушаем все сессионные данные
session_destroy();

// Перенаправляем пользователя на страницу входа или другую необходимую страницу
header("Location: log.php");
exit();
?>