<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir
    ]
)->registerNamespaces([
    'app\models'      => $config->application->modelsDir,
    'app\controllers' => $config->application->controllersDir,
])->register();
