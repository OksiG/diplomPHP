<?php
$users = [
    'admin' => 'admin1234',
    'manager' => 'manager1234',
    'translator' => 'translator1234'
];

$email = $_POST['email'];
$password = $_POST['password'];

function checkLogin($users)
{
    global $email;
    global $password;

    if (array_key_exists($email, $users)) {
        if ($users[$email] == $password) {
            echo 'Вы успешно вошли в систему!';
            return true;
        } else {
            echo 'Неверно введен пароль!';
            return false;
        }
    }
    echo 'У вас нет доступак к системе! Вы неавторизованный пользователь!';
    return false;
}

checkLogin($users);
