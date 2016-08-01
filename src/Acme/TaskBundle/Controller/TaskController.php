<?php

namespace Acme\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Acme\TaskBundle\Entity\Task;
use Acme\TaskBundle\Form\TaskType;

class TaskController extends Controller
{
	public function indexAction()
	{
		$task = new Task;

		$form = $this->createForm(new TaskType, $task, [
			'action' => $this->generateUrl('acme_store_task'),
			'method' => 'POST',
		]);

		$form->add('submit', 'submit', [
			'label' => 'Add Task',
			'attr'  => ['class' => 'btn btn-default'],
		]);

		return $this->render('AcmeTaskBundle:Tasks:index.html.twig', [
			'form' => $form->createView(),
		]);
	}

	public function storeAction(Request $request)
	{
		$task = new Task;

		$form = $this->createForm(new TaskType, $task, [
			'action' => $this->generateUrl('acme_store_task'),
			'method' => 'POST',
		]);

		$form->add('submit', 'submit', [
			'label' => 'Add Task',
			'attr'  => ['class' => 'btn btn-default'],
		]);

		$form->handleRequest($request);
		
		if ($form->isValid()) {
			
			$em = $this->getDoctrine()->getManager();

			$em->persist($task);
			$em->flush();

			$this->get('session')->getFlashBag()->add('success', 'The task has been created');

			return $this->redirect($this->generateUrl('acme_tasks'));

		}

		$this->get('session')->getFlashBag()->add('error', 'Error: something whent wrong');

		return $this->redirect($this->generateUrl('acme_tasks'));
	}

	public function destroyAction($id)
	{
		echo '<pre>';
		print_r('post here to delete a task from the DB');
		echo '</pre>';exit;		
	}
}