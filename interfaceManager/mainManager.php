<?php
$translator = $_POST['translator'];
$client = $_POST['client'];
$originalLanguageForm = $_POST['originalLanguage'];
$translateLanguageForm = $_POST['translateLanguage'];
$textForTranslate = $_POST['text'];
$deadline = $_POST['deadline'];

$language = [
    'русский' => 'RU',
    'английский' => 'EN',
    'немецкий' => 'GR',
    'французский' => 'FR',
    'итальянский' => 'IT',
    'испанский' => 'SP'
];

/**
 * Функция выводит язык оргинила текста на основную страницу в ЛК Менеджера
 * @param $languageFromForm Принимает язык из формы NewTask
 */
function languageForMain($languageFromForm) {
    global $language;

    if (array_key_exists($languageFromForm, $language)) {
        $languageFromForm = mb_strtoupper($language[$languageFromForm]);
        echo $languageFromForm;
    }
}

function deleteTask() {

}

function editTask() {

}

$tasks = ['status' => 'new',
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
    <title>Регистрация</title>
    <style type="text/css">
        .fixed-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
        }

        .header {
            width: 1280px;
            height: 50px;
            display: flex;
            justify-content: space-between;
            margin: 0 auto;
            padding: 10px;
            border: 2px outset #aeaeae;
            background-color: #ffffff;
        }

        .header-menu {
            display: flex;
        }

        .menu-button {
            -webkit-appearance: none;
            -mozkit-appearance: none;
            background-color: none;
            background: none;
            width: 100px;
            display: inline-block;
            text-transform: uppercase;
            text-decoration: none;
            color: #0683d0;
            padding: 1em;
            outline: none;
            border: none;
            border-radius: 1px;
            cursor: pointer;
        }
        .menu-button:nth-child(n+1) {
            margin-left: 5px;
        }

        .menu-button:hover {
            background-image:
                radial-gradient(1px 45% at 0% 50%, rgba(0,0,0,.6), transparent),
                radial-gradient(1px 45% at 100% 50%, rgba(0,0,0,.6), transparent);
        }

        .menu-button:active {
            background-image:
                radial-gradient(45% 45% at 50% 100%, rgba(255,255,255,.9), rgba(255,255,255,0)),
                linear-gradient(rgba(255,255,255,.4), rgba(255,255,255,.3));
            box-shadow:
                inset rgba(162,95,42,.4) 0 0 0 1px,
                inset rgba(255,255,255,.9) 0 0 1px 3px;
        }

        .new-button {
            width: 120px;
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

        .new-button:focus {
            outline: none;
        }

        .main-menu {
            display: flex;
        }

        .working-area {
            border: 2px solid blue;
            width: 1280px;
            display: flex;
            flex-direction: column;
            margin: 80px auto 0 auto;
            justify-content: space-between;
            padding: 10px;
            border: 2px outset #aeaeae;
        }

        .task-item:nth-child(n+2) {
            margin-top: 10px;
        }

        .task {
            height: 100px;
            display: flex;

            border: 1px outset #aeaeae;
        }

        .task-status-color {
            width: 20px;
            background-color: green;
        }

        .task-text {
            padding-left: 10px;
            padding-right: 10px;
            box-sizing: border-box;
            width: 1000px;
        }

        .task-edit {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        .task-button {
            height: 40px;
            width: 135px;
        }

        .task-edit-info {
            display: flex;
        }

        .task-time {
            width: 140px;
        }

        .language-time {
            padding-left: 10px;
            text-transform: uppercase;
            font-weight: 600;
            font-size: 25px;
        }

        div.language-info {
            width: 140px;
            display: flex;
            justify-content: space-around;
        }

        span.language-info {
            text-transform: uppercase;
            font-weight: 600;
            font-size: 25px;
        }
    </style>
</head>
<body>
<header class="fixed-header">
    <div class="header">
        <div class="header-menu">
            <button class="menu-button" type="submit">new</button>
            <button class="menu-button" type="submit">resolved</button>
            <button class="menu-button" type="submit">rejected</button>
            <button class="menu-button" type="submit">done</button>
        </div>
        <div class="main-menu">
            <a class="new-button" href="newTask.php?new=true">create new</a>
            <button class="menu-button" type="submit">exit</button>
        </div>
    </div>
</header>
<main class="working-area">
    <article class="task-item">
        <div class="task">
            <div class="task-status-color">
            </div>
            <div class="task-text">
                <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей...</p>
            </div>
            <div class="task-edit">
                <div class="task-edit-button">
                    <button type="submit" class="new-button task-button">edit</button>
                    <button type="submit" class="new-button task-button">delete</button>
                </div>
                <div class="task-edit-info">
                    <div class="task-time">
                        <span class="language-time">21/02/2019</span>
                    </div>
                    <div class="language-info">
                        <span class="language-info">en</span>
                        <span class="language-info">it</span>
                    </div>
                </div>
            </div>
        </div>
    </article>
</main>
</body>
</html>
