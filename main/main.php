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

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <style type="text/css">
        .authorization {
            display: flex;
            width: 900px;
            margin: 100px auto;
        }

        .entrance_header {
            margin: 50px 20px;
        }

        h1 {
            font-family: tahoma;
            font-size: 30px;
            text-transform: uppercase;
            color: #494949;
            text-align: center
        }

        .entrance_field {
            display: block;
            text-align: center;
            margin-bottom: 25px;
        }

        .field_text {
            display: block;
            padding: 10px 20px;
            font-family: tahoma;
            font-size: 16px;
            text-transform: uppercase;
            color: #494949;
            text-align: center
        }

        .field {
            padding: 5px 20px;
            width: 400px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        .entrance_button {
            margin-top: 25px;
            text-align: center;
        }

        .button {
            width: 150px;
            text-transform: uppercase;
            font-size: 14px;
            padding: 10px 25px;
            cursor: pointer;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border-radius: 5px;
        }

        .button:nth-child(n+1) {
            margin-left: 25px;
        }

        .button-enter {
            width: 150px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border-radius: 5px;
            -webkit-appearance: none;
            -mozkit-appearance: none;
            background: linear-gradient(#2c9fe6, #0683d0);
            text-transform: uppercase;
            color: #ffffff;
            cursor: pointer;
        }
    </style>
</head>
<body>
<form action="main.php" method="post">
    <main class="authorization">
        <div class="entrance">
            <div class="entrance_header">
                <h1>для начала работы необходимо авторизоваться</h1>
            </div>
            <label class="entrance_field">
                <span class="field_text">введите ваш email</span>
                <input class="email field" name="email" type="email" placeholder="например: 12345@email.ru" required>
            </label>
            <label class="entrance_field">
                <span class="field_text">введите ваш пароль</span>
                <input class="password field" name="password" type="password" placeholder="используйте надежный пароль, не менее 6 символов" required>
            </label>
            <div class="entrance_button">
                <button class="button button-enter">войти</button>
            </div>
        </div>
    </main>
</form>
</body>
</html>
