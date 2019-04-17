<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionRepository")
 */
class Question
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Answer", mappedBy="question")
     */
    private $answers;

    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Choice", mappedBy="question")
     */
    private $choices;

    /**
     * @var int
     *
     * @ORM\Column(name="index_key", type="integer")
     */
    private $order;

    /**
     * @var boolean
     *
     * @ORM\Column(name="answerAsInput", type="boolean" )
     */
    private $answerAsInput;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

     /**
    * @var \AppBundle\Entity\ChatBot
    *
    * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\ChatBot",  inversedBy="questions")
    * @ORM\JoinColumn(name="chatbot", referencedColumnName="id", nullable=false)
    */
    private $chatbot;


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
     * Set title
     *
     * @param string $title
     *
     * @return Question
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Question
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
     * Set answers
     *
     * @param \AppBundle\Entity\Answer $answers
     *
     * @return Question
     */
    public function setAnswers(\AppBundle\Entity\Answer $answers = null)
    {
        $this->answers = $answers;

        return $this;
    }

    /**
     * Get answers
     *
     * @return \AppBundle\Entity\Answer
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * Set choices
     *
     * @param \AppBundle\Entity\Choice $choices
     *
     * @return Question
     */
    public function setChoices(\AppBundle\Entity\Choice $choices = null)
    {
        $this->choices = $choices;

        return $this;
    }

    /**
     * Get choices
     *
     * @return \AppBundle\Entity\Choice
     */
    public function getChoices()
    {
        return $this->choices;
    }

    public function __toString(){
        return $this->title;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->answers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->choices = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set answerAsInput
     *
     * @param boolean $answerAsInput
     *
     * @return Question
     */
    public function setAnswerAsInput($answerAsInput)
    {
        $this->answerAsInput = $answerAsInput;

        return $this;
    }

    /**
     * Get answerAsInput
     *
     * @return boolean
     */
    public function getAnswerAsInput()
    {
        return $this->answerAsInput;
    }

    /**
     * Add answer
     *
     * @param \AppBundle\Entity\Answer $answer
     *
     * @return Question
     */
    public function addAnswer(\AppBundle\Entity\Answer $answer)
    {
        $this->answers[] = $answer;

        return $this;
    }

    /**
     * Remove answer
     *
     * @param \AppBundle\Entity\Answer $answer
     */
    public function removeAnswer(\AppBundle\Entity\Answer $answer)
    {
        $this->answers->removeElement($answer);
    }

    /**
     * Add choice
     *
     * @param \AppBundle\Entity\Choice $choice
     *
     * @return Question
     */
    public function addChoice(\AppBundle\Entity\Choice $choice)
    {
        $this->choices[] = $choice;

        return $this;
    }

    /**
     * Remove choice
     *
     * @param \AppBundle\Entity\Choice $choice
     */
    public function removeChoice(\AppBundle\Entity\Choice $choice)
    {
        $this->choices->removeElement($choice);
    }

    /**
     * Set chatbot
     *
     * @param \AppBundle\Entity\ChatBot $chatbot
     *
     * @return Question
     */
    public function setChatbot(\AppBundle\Entity\ChatBot $chatbot)
    {
        $this->chatbot = $chatbot;

        return $this;
    }

    /**
     * Get chatbot
     *
     * @return \AppBundle\Entity\ChatBot
     */
    public function getChatbot()
    {
        return $this->chatbot;
    }

    /**
     * Set order
     *
     * @param integer $order
     *
     * @return Question
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return integer
     */
    public function getOrder()
    {
        return $this->order;
    }
}
