<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;


/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
    * @var \AppBundle\Entity\Suscriber
    *
    * @ORM\OneToOne(targetEntity="\AppBundle\Entity\Suscriber",  inversedBy="account")
    * @ORM\JoinColumn(name="suscriber", referencedColumnName="id", nullable=true)
    */
    private $suscriber;

    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\ChatBot", mappedBy="owner")
     */
    private $bots;



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    

    /**
     * Set suscriber
     *
     * @param \AppBundle\Entity\Suscriber $suscriber
     *
     * @return User
     */
    public function setSuscriber(\AppBundle\Entity\Suscriber $suscriber = null)
    {
        $this->suscriber = $suscriber;

        return $this;
    }

    /**
     * Get suscriber
     *
     * @return \AppBundle\Entity\Suscriber
     */
    public function getSuscriber()
    {
        return $this->suscriber;
    }
}
