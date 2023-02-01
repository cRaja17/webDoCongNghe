<?php

$configs = scandir(__DIR__);

foreach ($configs as $config) {
    if (preg_match('/.php/', $config, $matches)) {
        if ($config != 'index.php') {
            require_once "config/$config";
        }
    }
}
