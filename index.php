<?php
//Start the Session
session_start();

// Defines
define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
define('APP_DIR', ROOT_DIR .'app/');

// Includes
require(APP_DIR .'config/config.php');
require(ROOT_DIR .'system/model.php');
require(ROOT_DIR .'system/view.php');
require(ROOT_DIR .'system/controller.php');
require(ROOT_DIR .'system/feo.php');

// Define base URL
global $config;
define('BASE_URL', $config['base_url']);
setrawcookie("BASE_URL", BASE_URL, 0, '/');

feo();
