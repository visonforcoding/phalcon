<?php
namespace Multiple\Frontend\Controllers;
class ErrorsController extends \Phalcon\Mvc\Controller
{

    public function show404Action()
    {
          echo '404 not found';
          exit();
    }

    public function show401Action()
    {
          echo 'access deny';
          exit();
    }

    public function show500Action()
    {

    }
}
