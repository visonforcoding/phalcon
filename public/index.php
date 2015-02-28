<?php

error_reporting(E_ALL);
use Phalcon\Config\Adapter\Ini as ConfigIni;
class Application extends \Phalcon\Mvc\Application {

    /**
     * Register the services here to make them general or register in the ModuleDefinition to make them module-specific
     */
    protected function _registerServices() {

        $di = new \Phalcon\DI\FactoryDefault();

        $loader = new \Phalcon\Loader();

        /**
         * We're a registering a set of directories taken from the configuration file
         */
        $loader->registerDirs(
                array(
                    __DIR__ . '/../apps/library/'
                )
        )->register();

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


        $this->setDI($di);
    }

    public function main() {

        $this->_registerServices();

        //Register the installed modules
        $this->registerModules(array(
            'frontend' => array(
                'className' => 'Multiple\Frontend\Module',
                'path' => '../apps/frontend/Module.php'
            ),
            'backend' => array(
                'className' => 'Multiple\Backend\Module',
                'path' => '../apps/backend/Module.php'
            )
        ));

        echo $this->handle()->getContent();
    }

}

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

$application = new Application();
$application->main();
