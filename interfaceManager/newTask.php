<?php

if ($_GET['new'] === true) {
    header('Location: /interfaceManager/newTask.php', true);
    exit();
}

if (isset($_GET['save'])) {
    //$task = $tasksList->getTask($_GET['save']);
    include 'saveTask.php';
} elseif (isset($_GET['delete'])) {
    include 'delete_task.php';
} elseif (isset($_GET['edit'])) {
    include 'edit_task.php';
}

$jsonFileAccessModel = new JsonFileAccessModel('tasks');
$tasks = json_decode($jsonFileAccessModel->read(), true);
$idList = array();
foreach ($tasks as $value) {
    if (array_key_exists('id', $value)) $idList[] = $value['id'];
}
$next_id = max($idList) + 1;
$translation_lang = array();
$original_text_preview = mb_substr($_POST['text'], 0, 420);
if (isset($_POST['translateLanguage'])) {
    $translation_lang = $_POST['translateLanguage'];
}
$task = array(
    'id' => $next_id,
    'status' => 'new',
    'client' => $_POST['client'],
    'translator' => $_POST['translator'],
    'originalLanguage' => $_POST['originalLanguage'],
    'translateLanguage' => $_POST['translateLanguage'],
    'deadline' => $_POST['deadline'],
    'original_text_preview' => $original_text_preview,
    'text' => $next_id . '.json'
);

$tasks[] = $task;
$json_tasks = json_encode($tasks, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
$jsonFileAccessModel->write($json_tasks);
/* Создаем файл с оригиналом текста задания */
$jsonFileAccessModel2 = new JsonFileAccessModel($next_id, $_POST['originalLanguage']);
$jsonFileAccessModel2->write($_POST['text']);

header('Location: index.php');

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
            <span class="select-label" name="client">Клиент:</span>
            <select class="select select-customer">
                <option value="roman-co" selected>ООО "Роман и командные практики"</option>
                <option value="sokolov">ИП Соколов А.И.</option>
                <option value="perishko">ООО "Перышко"</option>
                <option value="chainik">ИП Чайник П.С.</option>
            </select>
        </label>
    </div>
    <div class="select-language">
        <span class="language-note" name="originalLanguage">язык оригинала</span>
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
        <span class="language-note" name="translateLanguage">язык перевода</span>
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
        <label class="field-group" name="text">
            <span class="field-label">Напишите текст вашего сообщения</span>
            <textarea class="field textarea" placeholder="Текст для перевода" required></textarea>
        </label>
    </div>
    <div class="form-group form-actions">
        <?php echo '<a class="new-button" href="newTask.php?done=' . $value . '">done</a>'; ?>
        <?php echo '<a class="button" href="newTask.php?reject=' . $value . '">Reject</a>'; ?>
        <label class="date-calendar">
            <span class="date">крайний срок:</span>
            <input type="date" class="calendar">
        </label>
        <?php echo '<a class="new-button" href="newTask.php?save=' . $value . '">Сохранить</a>'; ?>
    </div>
</form>
</body>
</html>