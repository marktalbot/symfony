<?php

namespace Acme\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	public function indexAction()
	{
		return $this->render('AcmeTaskBundle:Tasks:index.html.twig');
	}

	public function storeAction()
	{
		echo '<pre>';
		print_r('post here to store task in db');
		echo '</pre>';exit;	
	}

	public function destroyAction($id)
	{
		echo '<pre>';
		print_r('post here to delete a task from the DB');
		echo '</pre>';exit;		
	}
}
