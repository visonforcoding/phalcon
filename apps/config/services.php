<?php

use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Mvc\Model\Metadata\Memory as MetaData;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Session as FlashSession;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Logger\Adapter\File as FileAdapter;

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();
/**
 * We register the events manager
 */
$di->set('dispatcher', function() use ($di) {

    $eventsManager = new EventsManager;

    /**
     * Check if the user is allowed to access certain action using the SecurityPlugin
     */
//    $eventsManager->attach('dispatch:beforeDispatch', new SecurityPlugin);

    /**
     * Handle exceptions and not-found exceptions using NotFoundPlugin
     */
    
//    $eventsManager->attach('dispatch:beforeException', new NotFoundPlugin());

    $dispatcher = new Dispatcher;
    $dispatcher->setEventsManager($eventsManager);

    return $dispatcher;
});


/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function() use ($config) {
    $url = new UrlProvider();
    $url->setBaseUri($config->application->baseUri);
    return $url;
});


/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function() use ($config) {
    $dbclass = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
    return new $dbclass(array(
        "host" => $config->database->host,
        "username" => $config->database->username,
        "password" => $config->database->password,
        "dbname" => $config->database->name
    ));
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function() {
    return new MetaData();
});

/**
 * Start the session the first time some component request the session service
 */
$di->set('session', function() {
    $session = new SessionAdapter();
    $session->start();
    return $session;
});

/**
 * Register the flash service with custom CSS classes
 */
$di->set('flash', function() {
    return new FlashSession(array(
        'error' => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice' => 'alert alert-info',
    ));
});

/**
 * Register a user component
 */
$di->set('elements', function() {
    return new Elements();
});

//Registering a router
$di->set('router', function() {

    $router = new \Phalcon\Mvc\Router();

    $router->setDefaultModule("frontend");

    $router->add('/:controller/:action', array(
        'module' => 'frontend',
        'controller' => 1,
        'action' => 2,
    ));

    $router->add("/login", array(
        'module' => 'backend',
        'controller' => 'login',
        'action' => 'index',
    ));

    $router->add("/admin/products/:action", array(
        'module' => 'backend',
        'controller' => 'products',
        'action' => 1,
    ));

    $router->add('/admin/:controller/:action', array(
        'module' => 'backend',
        'controller' => 1,
        'action' => 2,
    ));

    $router->add("/products/:action", array(
        'module' => 'frontend',
        'controller' => 'products',
        'action' => 1,
    ));

    


    return $router;
});

/**
 * 注册日志服务
 */
$di->set('logger', function() {
    $log_name = '../apps/logs/' . date('Y_m_d') . '.log';
    if (!file_exists($log_name)) {
        fopen($log_name, 'w+');
    }
    return new FileAdapter($log_name);
});
