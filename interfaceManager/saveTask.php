<?php
include 'classes/JsonFileAccessModel.php';

$fileJSON = new JsonFileAccessModel(1, 'ru');
$fileJSON->write();

header('Location: mainManager.php');