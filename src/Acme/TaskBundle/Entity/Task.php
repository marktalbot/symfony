<?php

namespace Acme\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="tasks")
 */
class Task
{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="string", length=255)
	 * 
	 * @Assert\NotBlank()
	 */
	protected $title;

	/**
	 * @ORM\Column(type="boolean")
	 */
	protected $is_complete = false;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Task
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set is_complete
     *
     * @param boolean $isComplete
     * @return Task
     */
    public function setIsComplete($isComplete)
    {
        $this->is_complete = $isComplete;

        return $this;
    }

    /**
     * Get is_complete
     *
     * @return boolean 
     */
    public function getIsComplete()
    {
        return $this->is_complete;
    }
}
