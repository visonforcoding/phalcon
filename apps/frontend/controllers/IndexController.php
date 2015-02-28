<?php

namespace Multiple\Frontend\Controllers;

class IndexController extends \Phalcon\Mvc\Controller
{

	public function indexAction()
	{
               $products = \Multiple\Frontend\Models\Products::find();
               $this->view->setVars(array(
                   'title'=>$products
               ));
	}

}