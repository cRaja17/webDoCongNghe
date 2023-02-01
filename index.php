<?php

/**
 * DO NOT MODIFY ANYTHING HERE
 */
session_start();

$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']).'Controller' : 'DefaultController';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

/**
 * Require necessary base file
 */
$phpFile = preg_replace('/index.php/','',$_SERVER['PHP_SELF']);

$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';

define('BASE_PATH', $protocol."://".$_SERVER['HTTP_HOST'].$phpFile);

/**
 * Require necessary base file
 */

require('helpers/index.php');

require('config/index.php');

/**
 * Load controller tương ứng
 */

$controllerPath = "app/Controllers/$controllerName.php";

if ($_GET['module'] != 'errors') {
    $module = ucfirst($_GET['module']);
    $controllerPath = "app/Controllers/$module/$controllerName.php";
}  
/**
 * Require controller
 */

try {

    if (file_exists($controllerPath)) {
        require $controllerPath;
        $controllerInstance = new $controllerName();
        if (!method_exists($controllerInstance, $action)) {
            if (APP_DEBUG) {
                throw new Exception("Cannot find method $action inside $controllerPath");
            }
        }
        else {
            echo $controllerInstance->$action();
            return;
        }
    }

    if (APP_DEBUG) {
        throw new Exception("Cannot find path $controllerPath");
    }

    if (!APP_DEBUG) {
        //redirect to error page
        header("location: ".BASE_PATH.'errors/notFound', true, 301);
        return;
    }
} catch (Exception $e) {
    echo("Error: ".$e->getMessage());
    echo "<br/>";
    echo("Trace: ".json_encode($e->getTrace()));
}

