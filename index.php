<?php

require 'autoload.php';
session_start();
$user = new User($_SESSION);
