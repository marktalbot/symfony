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
		$form = $this->createNewTaskForm($task);

		// @TODO: Use respository instead of Task entity
		$em    = $this->getDoctrine()->getManager();
		$tasks = $em->getRepository('AcmeTaskBundle:Task')->findAll();

		return $this->render('AcmeTaskBundle:Tasks:index.html.twig', [
			'form'  => $form->createView(),
			'tasks' => $tasks,
		]);
	}

	public function storeAction(Request $request)
	{
		$task = new Task;
		$form = $this->createNewTaskForm($task);

		$form->handleRequest($request);
		
		if ($form->isValid()) {
			
			$em = $this->getDoctrine()->getManager();

			$em->persist($task);
			$em->flush();

			$this->get('session')->getFlashBag()->add('success', "The task '{$task->getTitle()}' has been created");

			return $this->redirect($this->generateUrl('acme_tasks'));
		}

		$this->get('session')->getFlashBag()->add('error', 'Error: something whent wrong');

		return $this->redirect($this->generateUrl('acme_tasks'));
	}

	public function destroyAction($id)
	{
		$em   = $this->getDoctrine()->getManager();
		$task = $em->getRepository('AcmeTaskBundle:Task')->find($id);

		$em->remove($task);
		$em->flush();
		
		$this->get('session')->getFlashBag()->add('success', "The task '{$task->getTitle()}' has been deleted");

		return $this->redirect($this->generateUrl('acme_tasks'));
	}

	/**
	 * @param Acme\TaskBundle\Entity\Task $task 
	 * @return Acme\TaskBundle\Form\TaskType $form
	 */
	public function createNewTaskForm($task)
	{
		$form = $this->createForm(new TaskType, $task, [
			'action' => $this->generateUrl('acme_store_task'),
			'method' => 'POST',
		]);

		$form->add('submit', 'submit', [
			'label' => 'Add Task',
			'attr'  => ['class' => 'btn btn-default'],
		]);

		return $form;
	}
}