<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Answer;
use AppBundle\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Answer controller.
 *
 * @Route("answer")
 */
class AnswerController extends Controller
{
    /**
     * Lists all answer entities.
     *
     * @Route("/", name="answer_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $answers = $em->getRepository('AppBundle:Answer')->findAll();

        return $this->render('answer/index.html.twig', array(
            'answers' => $answers,
        ));
    }

    /**
     * Creates a new answer entity.
     *
     * @Route("/new/answer/{question}", name="answer_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, Question $question)
    {
        $answer = new Answer();
        $answer->setNextQuestion(($question->getOrder()) + 10);
        $form = $this->createForm('AppBundle\Form\AnswerType', $answer);
        $form->handleRequest($request);
        $chatBot = $question->getChatBot();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $answer->setCreatedAt(new \DateTime());
            $answer->setQuestion($question);
            $em->persist($answer);
            $em->flush();

            return $this->redirectToRoute('answer_new', array('question' => $question->getId()));
        }

        return $this->render('answer/new.html.twig', array(
            'answer' => $answer,
            'question' => $question,
            'chatBot' => $chatBot,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a answer entity.
     *
     * @Route("/{id}", name="answer_show")
     * @Method("GET")
     */
    public function showAction(Answer $answer)
    {
        $deleteForm = $this->createDeleteForm($answer);

        return $this->render('answer/show.html.twig', array(
            'answer' => $answer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing answer entity.
     *
     * @Route("/edit/answer/{id}", name="answer_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Answer $answer)
    {
        $deleteForm = $this->createDeleteForm($answer);
        $editForm = $this->createForm('AppBundle\Form\AnswerType', $answer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash("success", "Option de reponse modifiee avec succes");
            return $this->redirectToRoute('answer_new', array('question' => $answer->getQuestion()->getId()));
        }

        $chatBot = $answer->getQuestion()->getChatBot();

        return $this->render('answer/edit.html.twig', array(
            'answer' => $answer,
            'question' => $answer->getQuestion(),
            'chatBot' => $chatBot,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a answer entity.
     *
     * @Route("/{id}", name="answer_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Answer $answer)
    {
        $form = $this->createDeleteForm($answer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($answer);
            $em->flush();
            return $this->redirectToRoute('answer_new', array('question' => $answer->getQuestion()->getId()));
        }

        return $this->redirectToRoute('answer_new', array('question' => $answer->getQuestion()->getId()));
    }

    /**
     * Creates a form to delete a answer entity.
     *
     * @param Answer $answer The answer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Answer $answer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('answer_delete', array('id' => $answer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
