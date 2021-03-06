<?php

namespace MRS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Turismo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MRS\MainBundle\Entity\TurismoRepository")
 */
class Turismo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
