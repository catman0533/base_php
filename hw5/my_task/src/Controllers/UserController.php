<?php

class UserController {

    public function save($name, $birthday) {
        // Логика для сохранения пользователя
        echo "Пользователь $name с датой рождения $birthday сохранён.";
    }
}

// Разбор GET-параметров
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['name']) && isset($_GET['birthday'])) {
    $controller = new UserController();
    $controller->save($_GET['name'], $_GET['birthday']);
}
