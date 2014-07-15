<?php

$locations[] = __DIR__ . "/../vendor/autoload.php";
$locations[] = __DIR__ . "/../../../autoload.php";

foreach ($locations as $location) {
    if (is_file($location)) {
        $loader = require $location;
        $loader->addPsr4('AndyTruong\\Yaml\\TestCases\\', __DIR__ . '/common');
        $loader->addPsr4('AndyTruong\\Yaml\\', __DIR__ . '/../src');
        break;
    }
}
