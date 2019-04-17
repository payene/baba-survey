<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Suscriber
 *
 * @ORM\Table(name="suscriber")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SuscriberRepository")
 */
class Suscriber
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=20, unique=true, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, unique=true, nullable=true)
     */
    private $email;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=25, unique=false, nullable=true)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=25, unique=false, nullable=true)
     */
    private $pays;



    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToOne(targetEntity="\UserBundle\Entity\User", mappedBy="suscriber")
     */
    private $account;



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
     * Set phone
     *
     * @param string $phone
     *
     * @return Suscriber
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Suscriber
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Suscriber
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return Suscriber
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Suscriber
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set account
     *
     * @param \UserBundle\Entity\User $account
     *
     * @return Suscriber
     */
    public function setAccount(\UserBundle\Entity\User $account = null)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return \UserBundle\Entity\User
     */
    public function getAccount()
    {
        return $this->account;
    }
}
