<?php
$users = [
    'admin@gmail.com' => 'admin1234',
    'manager@gmail.com' => 'manager1234',
    'translator@gmail.com' => 'translator1234'
];

$email = $_POST['email'];
$password = $_POST['password'];

function checkLogin($users)
{
    global $email;
    global $password;
    global $users;

    if (array_key_exists($email, $users)) {
        if ($users[$email] == $password) {
            if ($email == 'manager@gmail.com') {
                header('Location: /interfaceManager/mainManager.php', true);
                exit();
            }
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
