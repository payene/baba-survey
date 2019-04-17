<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Answer
 *
 * @ORM\Table(name="answer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnswerRepository")
 */
class Answer
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
     * @ORM\Column(name="optionValue", type="string", length=255, nullable=true)
     */
    private $optionValue;

    /**
     * @var int
     *
     * @ORM\Column(name="nextQuestion", type="integer")
     */
    private $nextQuestion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
    * @var \AppBundle\Entity\Question
    *
    * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Question",  inversedBy="answers")
    * @ORM\JoinColumn(name="question", referencedColumnName="id", nullable=false)
    */
    private $question;



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
     * Set optionValue
     *
     * @param string $optionValue
     *
     * @return Answer
     */
    public function setOptionValue($optionValue)
    {
        $this->optionValue = $optionValue;

        return $this;
    }

    /**
     * Get optionValue
     *
     * @return string
     */
    public function getOptionValue()
    {
        return $this->optionValue;
    }

    /**
     * Set nextQuestion
     *
     * @param integer $nextQuestion
     *
     * @return Answer
     */
    public function setNextQuestion($nextQuestion)
    {
        $this->nextQuestion = $nextQuestion;

        return $this;
    }

    /**
     * Get nextQuestion
     *
     * @return integer
     */
    public function getNextQuestion()
    {
        return $this->nextQuestion;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Answer
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
     * Set question
     *
     * @param \AppBundle\Entity\Question $question
     *
     * @return Answer
     */
    public function setQuestion(\AppBundle\Entity\Question $question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \AppBundle\Entity\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
