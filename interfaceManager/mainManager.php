<?php
require_once('mainManager.html');

$translator = $_POST['translator'];
$client = $_POST['client'];
$originalLanguage = $_POST['originalLanguage'];
$translateLanguage = $_POST['translateLanguage'];
$textForTranslate = $_POST['text'];
$deadline = $_POST['deadline'];

echo 'Привет, Manager!';