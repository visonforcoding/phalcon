<?php

namespace Multiple\Frontend;

use Phalcon\Mvc\View\Engine\Volt as VoltEngine;

class Module {

    public function registerAutoloaders() {

        $loader = new \Phalcon\Loader();

        $loader->registerNamespaces(array(
            'Multiple\Frontend\Controllers' => '../apps/frontend/controllers/',
            'Multiple\Frontend\Models' => '../apps/frontend/models/',
        ));

        $loader->register();
    }

    /**
     * Register the services here to make them general or register in the ModuleDefinition to make them module-specific
     */
    public function registerServices($di) {

        //Registering a dispatcher
        $di->set('dispatcher', function () {
            $dispatcher = new \Phalcon\Mvc\Dispatcher();

            //Attach a event listener to the dispatcher
            $eventManager = new \Phalcon\Events\Manager();
            $eventManager->attach('dispatch', new \Acl('frontend'));

            $dispatcher->setEventsManager($eventManager);
            $dispatcher->setDefaultNamespace("Multiple\Frontend\Controllers\\");
            return $dispatcher;
        });

        //Registering the view component
        $di->set('view', function () {
            $view = new \Phalcon\Mvc\View();
            $view->setViewsDir('../apps/frontend/views/');

            $view->registerEngines(array(
                ".volt" => 'volt'
            ));
            return $view;
        });

        /**
         * Setting up volt
         */
        $di->set('volt', function($view, $di) {

            $volt = new VoltEngine($view, $di);

            $volt->setOptions(array(
                "compiledPath" => "../apps/frontend/cache/volt/"
            ));

            $compiler = $volt->getCompiler();
            $compiler->addFunction('is_a', 'is_a');

            return $volt;
        }, true);
    }

}
