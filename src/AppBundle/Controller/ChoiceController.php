<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Choice;
use AppBundle\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Choice controller.
 *
 * @Route("choice")
 */
class ChoiceController extends Controller
{
    /**
     * Lists all choice entities.
     *
     * @Route("/", name="choice_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $choices = $em->getRepository('AppBundle:Choice')->findAll();

        return $this->render('choice/index.html.twig', array(
            'choices' => $choices,
        ));
    }

    /**
     * Creates a new choice entity.
     *
     * @Route("/new/choice/{question}", name="choice_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, Question $question )
    {
        $choice = new Choice();
        $form = $this->createForm('AppBundle\Form\ChoiceType', $choice);
        $form->handleRequest($request);

        $chatBot = $question->getChatbot();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $choice->setCreatedAt(new \DateTime());
            $choice->setQuestion($question);
            $em->persist($choice);
            $em->flush();

            return $this->redirectToRoute('choice_new', array('question' => $question->getId()));
        }

        return $this->render('choice/new.html.twig', array(
            'choice' => $choice,
            'question' => $question,
            'chatBot' => $chatBot,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a choice entity.
     *
     * @Route("/{id}", name="choice_show")
     * @Method("GET")
     */
    public function showAction(Choice $choice)
    {
        $deleteForm = $this->createDeleteForm($choice);

        return $this->render('choice/show.html.twig', array(
            'choice' => $choice,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing choice entity.
     *
     * @Route("/{id}/edit", name="choice_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Choice $choice)
    {
        $deleteForm = $this->createDeleteForm($choice);
        $editForm = $this->createForm('AppBundle\Form\ChoiceType', $choice);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('choice_edit', array('id' => $choice->getId()));
        }

        return $this->render('choice/edit.html.twig', array(
            'choice' => $choice,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a choice entity.
     *
     * @Route("/{id}", name="choice_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Choice $choice)
    {
        $form = $this->createDeleteForm($choice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($choice);
            $em->flush();
        }

        return $this->redirectToRoute('choice_index');
    }

    /**
     * Creates a form to delete a choice entity.
     *
     * @param Choice $choice The choice entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Choice $choice)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('choice_delete', array('id' => $choice->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
