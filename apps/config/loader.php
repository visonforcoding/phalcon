<?php

$loader = new \Phalcon\Loader();


//Register some namespaces
$loader->registerNamespaces(
        array(
            "Plugins" => APP_PATH . 'apps/plugins',
            "Models" => APP_PATH . 'apps/models',
        )
);

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
        array(
            APP_PATH . $config->application->pluginsDir,
            APP_PATH . $config->application->libraryDir,
            APP_PATH . $config->application->formsDir,
        )
)->register();

