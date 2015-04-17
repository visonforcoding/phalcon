<?php
error_reporting(E_ALL);

use Phalcon\Mvc\Application;
use Phalcon\Config\Adapter\Ini as ConfigIni;

try {

    define('APP_PATH', realpath('..') . '/');

    /**
     * Read the configuration
     */
    $config = new ConfigIni(APP_PATH . 'apps/config/config.ini');

    /**
     * Auto-loader configuration
     */
    require APP_PATH . 'apps/config/loader.php';

    /**
     * Load application services
     */
    require APP_PATH . 'apps/config/services.php';

    $application = new Application($di);
    $di['app'] = $application; // 将应用实例保存到$di的app服务中

    $application->registerModules(array(
        'frontend' => array(
            'className' => 'Multiple\Frontend\Module',
            'path' => '../apps/frontend/Module.php'
        ),
        'backend' => array(
            'className' => 'Multiple\Backend\Module',
            'path' => '../apps/backend/Module.php'
        )
    ));

    
    //启动phalcon-debugbar
    require APP_PATH.'vendor/autoload.php';
    // $provider = new Snowair\Debugbar\ServiceProvider(APP_PATH.'apps/config/debugbar.php');
//    (new Snowair\Debugbar\ServiceProvider())->start();
    // $provider->register();
    // $provider->boot();
    echo $application->handle()->getContent();
} catch (Exception $e) {
    echo get_class($e), ": ", $e->getMessage(), "</br>";
    echo " File=", $e->getFile(), "</br>";
    echo " Line=", $e->getLine(), "</br>";
    echo $e->getTraceAsString();
}