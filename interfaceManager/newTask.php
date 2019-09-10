<?php
$translator = $_POST['translator'];
$client = $_POST['client'];
$originalLanguage = $_POST['originalLanguage'];
$translateLanguage = $_POST['translateLanguage'];
$textForTranslate = $_POST['text'];
$deadline = $_POST['deadline'];

if ($_GET["new"] === true) {
    header('Location: /interfaceManager/newTask.php', true);
    exit();
}

$task = ['status' => 'new',
    'translator' => $translator,
    'client' => $client,
    'originalLanguage' => $originalLanguageForm,
    'translateLanguage' => $translateLanguageForm,
    'text' => $textForTranslate,
    'deadline' => $deadline
];

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Создать новое задание</title>
    <style type="text/css">
        .form {
            border: 1px solid gray;
            display: flex;
            flex-direction: column;
            width: 1280px;
            margin: 70px auto 0 auto;
            padding: 10px;

        }

        .close {
            display: flex;
            justify-content: flex-end;
            height: 24px;
        }

        .close-link {
            width: 24px;
            background-image: url("/picture/close.png");
            background-repeat: no-repeat;
            background-position: center center;
            background-size: 20px;
        }

        .close-link:hover {
            border: 1px solid #0683d0;
        }

        .close-link-text {
            position: absolute;
            display: none;
        }

        .form-group {
            padding: 10px;
        }

        .select-form {
            display: flex;
            justify-content: space-between;
        }

        span {
            font-family: tahoma;
            color: #3d3d3d;
            font-weight: 550;
            text-transform: uppercase;
        }

        .select-group {
            width: 600px;
            display: flex;
            justify-content: space-between;
            align-items: baseline;
        }

        .select {
            width: 400px;
            height: 30px;
            cursor: pointer;
            border: 2px outset #aeaeae;
            border-radius: 5px;
        }

        .select-customer {
            width: 460px;
        }

        .select-language {
            padding-right: 10px;
            padding-left: 10px;
        }

        .language-original {
            display: flex;
            justify-content: space-between;
            margin: 5px 0 10px 0;
        }

        .language-original-radio {
            display: flex;
            align-items: baseline;
            cursor: pointer;
        }

        .original-radio {
            font-weight: 400;
            text-transform: capitalize;
            margin-left: 5px;
        }

        .field-group {
            display: flex;
            flex-direction: column;
        }

        .field-label {
            margin-bottom: 10px;
        }

        .field {
            min-height: 200px;
            max-height: 300px;
            font-size: 16px;
            color: #000000;
        }

        .form-actions {
            padding-left: 150px;
            padding-right: 150px;
            display: flex;
            justify-content: space-between;
            align-items: baseline;
        }

        .button {
            -webkit-appearance: none;
            -mozkit-appearance: none;
            background-color: none;
            background: none;
            width: 150px;
            display: inline-block;
            text-transform: uppercase;
            text-decoration: none;
            text-align: center;
            font-family: tahoma;
            color: #0683d0;
            padding: 1em;
            outline: none;
            border: none;
            border-radius: 1px;
            cursor: pointer;
        }

        .button:nth-child(n+1) {
            margin-left: 5px;
        }

        .button:hover {
            background-image:
                    radial-gradient(1px 45% at 0% 50%, rgba(0,0,0,.6), transparent),
                    radial-gradient(1px 45% at 100% 50%, rgba(0,0,0,.6), transparent);
        }

        .button:active {
            background-image:
                    radial-gradient(45% 45% at 50% 100%, rgba(255,255,255,.9), rgba(255,255,255,0)),
                    linear-gradient(rgba(255,255,255,.4), rgba(255,255,255,.3));
            box-shadow:
                    inset rgba(162,95,42,.4) 0 0 0 1px,
                    inset rgba(255,255,255,.9) 0 0 1px 3px;
        }

        .new-button {
            width: 150px;
            height: 40px;
            padding-top: 10px;
            padding-bottom: 10px;
            box-sizing: border-box;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border-radius: 5px;
            -webkit-appearance: none;
            -mozkit-appearance: none;
            background: linear-gradient(#2c9fe6, #0683d0);
            text-transform: uppercase;
            text-decoration: none;
            text-align: center;
            font-family: tahoma;
            color: #ffffff;
            cursor: pointer;
        }

        .new-button:hover {
            border: 2px outset gray;
            width: 150px;
            height: 40px;
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .date-calendar{
            display: flex;
            justufy-content: space-between;
            align-items: baseline;
        }

        .calendar {
            margin-left: 50px;
            cursor: pointer;
            border: 2px outset #0683d0;
            border-radius: 5px;
            text-align: center;
        }

        .date {
            font-weight: 100;
            font-size: 14px;
            color: #0683d0;
        }
    </style>
</head>
<body>
<form action="./newTask.php" method="post" class="form">
    <div class="close">
        <a href="" class="close-link">
            <span class="close-link-text">X</span>
        </a>
    </div>
    <div class="form-group select-form">
        <label class="select-group" name="translator">
            <span class="select-label">Ответственный:</span>
            <select class="select">
                <option value="undefined" selected>Не назначать</option>
                <option value="sidorov-s">Сидорова Сидора</option>
                <option value="petrovich-p">Петрович Петр</option>
                <option value="ivanov-i">Иванов Иван</option>
            </select>
        </label>
        <label class="select-group">
            <span class="select-label">Клиент:</span>
            <select class="select select-customer">
                <option value="roman-co" selected>ООО "Роман и командные практики"</option>
                <option value="sokolov">ИП Соколов А.И.</option>
                <option value="perishko">ООО "Перышко"</option>
                <option value="chainik">ИП Чайник П.С.</option>
            </select>
        </label>
    </div>
    <div class="select-language">
        <span class="language-note">язык оригинала</span>
        <div class="language-original">
            <label class="language-original-radio">
                <input type="radio" name="radio-group-original">
                <span class="original-radio">Русский</span>
            </label>
            <label class="language-original-radio">
                <input type="radio" name="radio-group-original">
                <span class="original-radio">Английский</span>
            </label>
            <label class="language-original-radio">
                <input type="radio" name="radio-group-original">
                <span class="original-radio">Немецкий</span>
            </label>
            <label class="language-original-radio">
                <input type="radio" name="radio-group-original">
                <span class="original-radio">Французский</span>
            </label>
            <label class="language-original-radio">
                <input type="radio" name="radio-group-original">
                <span class="original-radio">Итальянский</span>
            </label>
            <label class="language-original-radio">
                <input type="radio" name="radio-group-original">
                <span class="original-radio">Испанский</span>
            </label>
        </div>
        <span class="language-note">язык перевода</span>
        <div class="language-original">
            <label class="language-original-radio">
                <input type="radio" name="radio-group-translate">
                <span class="original-radio">Русский</span>
            </label>
            <label class="language-original-radio">
                <input type="radio" name="radio-group-translate">
                <span class="original-radio">Английский</span>
            </label>
            <label class="language-original-radio">
                <input type="radio" name="radio-group-translate">
                <span class="original-radio">Немецкий</span>
            </label>
            <label class="language-original-radio">
                <input type="radio" name="radio-group-translate">
                <span class="original-radio">Французский</span>
            </label>
            <label class="language-original-radio">
                <input type="radio" name="radio-group-translate">
                <span class="original-radio">Итальянский</span>
            </label>
            <label class="language-original-radio">
                <input type="radio" name="radio-group-translate">
                <span class="original-radio">Испанский</span>
            </label>
        </div>
    </div>
    <div class="form-group">
        <label class="field-group">
            <span class="field-label">Напишите текст вашего сообщения</span>
            <textarea class="field textarea" placeholder="Текст для перевода" required></textarea>
        </label>
    </div>
    <div class="form-group form-actions">
        <a type="button" class="new-button" href="newTask.php?new=true">done</a>
        <a type="button" class="button" href="newTask.php?new=true">Reject</a>
        <label class="date-calendar">
            <span class="date">крайний срок:</span>
            <input type="date" class="calendar">
        </label>
        <a type="button" class="new-button" href="newTask.php?new=true">save</a>
    </div>
</form>
</body>
</html>