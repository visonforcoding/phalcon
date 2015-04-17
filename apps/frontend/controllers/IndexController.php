<?php

namespace Multiple\Frontend\Controllers;
//use Phalcon\Logger\Adapter\File as FileAdapter;

class IndexController extends \Phalcon\Mvc\Controller {

    public function indexAction() {
        $this->session->set('name', 'cwp');
        $products = \Multiple\Frontend\Models\Products::findFirst();
        $this->flash->success('恭喜你，安装成功！');
//        $this->response->redirect('http://www.baidu.com');
//        exit();
//        $this->log->log("日志注入测试");
//        $log = \Phalcon\DI::getDefault()->getLogger();
//         $log->log('日志注入测试');
//        $logger = new FileAdapter("../apps/log/test.log");
//        $logger->log("This is a message");
//        $logger->log("This is an error", \Phalcon\Logger::ERROR);
//        $logger->error("This is another error");

        $this->view->setVars(array(
            'title' => 'test'
        ));
    }

}
