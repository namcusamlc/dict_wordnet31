<?php
session_start();

require('config.php');

require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');
require('classes/Messages.php');

require('controllers/home.php');
require('controllers/shares.php');
require('controllers/users.php');
require('controllers/dictionaries.php');
require('controllers/history.php');

require('models/home.php');
require('models/share.php');
require('models/user.php');
require('models/dictionary.php');
require('models/history.php');

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();

if ($controller) {
    $controller->executeAction();
}