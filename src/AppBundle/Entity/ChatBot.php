<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChatBot
 *
 * @ORM\Table(name="chat_bot")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ChatBotRepository")
 */
class ChatBot
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
     * @ORM\Column(name="botName", type="string", length=255)
     */
    private $botName;

    /**
     * @var string
     *
     * @ORM\Column(name="starterMsg", type="text", nullable=true)
     */
    private $starterMsg;

    /**
     * @var string
     *
     * @ORM\Column(name="closingMsg", type="text", nullable=true)
     */
    private $closingMsg;

    /**
     * @var string
     *
     * @ORM\Column(name="bot_link", type="string",  length=255, nullable=false)
     */
    private $botLink;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Question", mappedBy="chatbot")
     */
    private $questions;

    /**
    * @var \UserBundle\Entity\User
    *
    * @ORM\ManyToOne(targetEntity="\UserBundle\Entity\User",  inversedBy="bots")
    * @ORM\JoinColumn(name="owner", referencedColumnName="id", nullable=false)
    */
    private $owner;



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
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set botName
     *
     * @param string $botName
     *
     * @return ChatBot
     */
    public function setBotName($botName)
    {
        $this->botName = $botName;

        return $this;
    }

    /**
     * Get botName
     *
     * @return string
     */
    public function getBotName()
    {
        return $this->botName;
    }

    /**
     * Set starterMsg
     *
     * @param string $starterMsg
     *
     * @return ChatBot
     */
    public function setStarterMsg($starterMsg)
    {
        $this->starterMsg = $starterMsg;

        return $this;
    }

    /**
     * Get starterMsg
     *
     * @return string
     */
    public function getStarterMsg()
    {
        return $this->starterMsg;
    }

    /**
     * Set closingMsg
     *
     * @param string $closingMsg
     *
     * @return ChatBot
     */
    public function setClosingMsg($closingMsg)
    {
        $this->closingMsg = $closingMsg;

        return $this;
    }

    /**
     * Get closingMsg
     *
     * @return string
     */
    public function getClosingMsg()
    {
        return $this->closingMsg;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ChatBot
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
     * Set email
     *
     * @param string $email
     *
     * @return ChatBot
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
     * Set description
     *
     * @param string $description
     *
     * @return ChatBot
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add question
     *
     * @param \AppBundle\Entity\Question $question
     *
     * @return ChatBot
     */
    public function addQuestion(\AppBundle\Entity\Question $question)
    {
        $this->questions[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \AppBundle\Entity\Question $question
     */
    public function removeQuestion(\AppBundle\Entity\Question $question)
    {
        $this->questions->removeElement($question);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Set owner
     *
     * @param \UserBundle\Entity\User $owner
     *
     * @return ChatBot
     */
    public function setOwner(\UserBundle\Entity\User $owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \UserBundle\Entity\User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set botLink
     *
     * @param string $botLink
     *
     * @return ChatBot
     */
    public function setBotLink($botLink)
    {
        $this->botLink = $botLink;

        return $this;
    }

    /**
     * Get botLink
     *
     * @return string
     */
    public function getBotLink()
    {
        return $this->botLink;
    }

    public function __toString()
    {
        return $this->botName;
    }
}
