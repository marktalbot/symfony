<?php

namespace Acme\TaskBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\OptionsResolverInterface;

class TaskType extends AbstractType
{
	
	public function buildForm(FormBuilderInterface $builder, array $optons)
	{
		$builder->add('title', null, [
			'label' => 'Task',
			'attr' => ['class' => 'form-control', 'style' => 'margin-bottom: 20px'],
		]);
	}

	public function setDefaults(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults([
			'data_class' => 'Acme\TaskBundle\Entity\Task',
		]);
	}

	public function getName()
	{
		return 'acme_taskbundle_task';
	}
}