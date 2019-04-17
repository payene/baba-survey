<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

/**
 * Question controller.
 *
 * @Route("question")
 */
class QuestionController extends Controller
{
    /**
     * Lists all question entities.
     *
     * @Route("/", name="question_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $questions = $em->getRepository('AppBundle:Question')->findAll();

        return $this->render('question/index.html.twig', array(
            'questions' => $questions,
        ));
    }

    /**
     * Creates a new question entity.
     *
     * @Route("/new", name="question_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $question = new Question();
        $form = $this->createForm('AppBundle\Form\QuestionType', $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $question->setCreatedAt(new \DateTime());
            $em->persist($question);
            $em->flush();

            return $this->redirectToRoute('question_show', array('id' => $question->getId()));
        }

        return $this->render('question/new.html.twig', array(
            'question' => $question,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a question entity.
     *
     * @Route("/{id}", name="question_show")
     * @Method("GET")
     */
    public function showAction(Question $question)
    {
        $deleteForm = $this->createDeleteForm($question);

        return $this->render('question/show.html.twig', array(
            'question' => $question,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing question entity.
     *
     * @Route("/edit/question/{question}", name="question_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Question $question)
    {
        $deleteForm = $this->createDeleteForm($question);
        $editForm = $this->createForm('AppBundle\Form\QuestionType', $question);
        $em = $this->getDoctrine()->getManager();
        $chatBot = $question->getChatBot();
        $botid = $chatBot->getId();

        $query = $em->createQueryBuilder();
        // $previous = $query
        //     ->select('q')
        //     ->from('AppBundle:Question', 'q')
        //     ->where('q.order > :breakpoint')
        //     ->andwhere('q.chatbot = :botid')
        //     ->setParameter('botid' , $botid)
        //     ->setParameter('breakpoint' , $question->getOrder())
        //     ->orderBy('q.order', 'ASC')
        //     ->setMaxResults(1)
        //     ->getQuery()
        //     ->getOneOrNullResult()
        // ;
        // dump($previous);
        // $prev = NULL;
        // if(!empty($previous)){
        //     $prev = $previous->getId();
        // }

        // $editForm->add('before', EntityType::class, array( 'class' => 'AppBundle:Question',
        //     'label' => 'Choisir la question précedente', 'mapped'=> false, 'required' => false, 'data' => $this->container->get('doctrine.orm.entity_manager')->getReference("AppBundle:Question", $prev),
        //     'query_builder' => function (EntityRepository $er) use ($botid,$question) {
        //             return $er->createQueryBuilder('q')
        //                         ->where('q.chatbot = :botid')
        //                         ->andwhere('q.id != :qid')
        //                         ->setParameter('botid', $botid)
        //                         ->setParameter('qid', $question->getId())
        //                         ->orderBy('q.order','ASC')
        //                 ;
        //         },
        // ));
        $editForm->handleRequest($request);

        // $before = $editForm['before']->getData();        

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            
            // $index =  count($em->getRepository('AppBundle:Question')->findBy(['chatbot' => $chatBot->getId()]));
            // $index++;
            // if(empty($before)){
            //     $question->setOrder($index);
            // }
            // else{
            //     $beforeOrder = $before->getOrder();
            //     $query = $em->createQueryBuilder();
            //     $beforeArray = $query
            //         ->select('q')
            //         ->from('AppBundle:Question', 'q')
            //         ->where('q.order < :breakpoint')
            //         ->andwhere('q.chatbot = :botid')
            //         ->setParameter('botid' , $botid)
            //         ->setParameter('breakpoint' , $beforeOrder)
            //         ->getQuery()
            //         ->getResult()
            //     ;

            //     $query = $em->createQueryBuilder();
            //     $afterArray = $query
            //         ->select('q')
            //         ->from('AppBundle:Question', 'q')
            //         ->where('q.order > :breakpoint')
            //         ->andwhere('q.chatbot = :botid')
            //         ->setParameter('botid' , $botid)
            //         ->setParameter('breakpoint' , $beforeOrder)
            //         ->getQuery()
            //         ->getResult()
            //     ;
            //     $newOrder = 1;
            //     foreach ($beforeArray as $key => $q) {
            //         $q->setOrder($newOrder);
            //         $em->persist($q);
            //         $newOrder++;
            //     }
            //     $em->flush();
            //     $question->setOrder($newOrder);
            //     $newOrder++;
            //     $before->setOrder($newOrder);
            //     foreach ($afterArray as $key => $q) {
            //         $q->setOrder($newOrder);
            //         $em->persist($q);
            //         $newOrder++;
            //     }
            //     $em->flush();
            // }



            $this->getDoctrine()->getManager()->flush();

            $this->addFlash("success", "Question modifiee avec succes");
            
            if($question->getAnswerAsInput()){
                return $this->redirectToRoute('botmanager_show', array('id' => $chatBot->getId()));
            }
            else{
                return $this->redirectToRoute('answer_new', array('question' => $question->getId()));
            }
        }

        return $this->render('question/edit.html.twig', array(
            'question' => $question,
            'chatBot' => $chatBot,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a question entity.
     *
     * @Route("/{id}", name="question_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Question $question)
    {
        $form = $this->createDeleteForm($question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($question);
            $em->flush();
        }
        $this->addFlash("success", "Question supprimee avec succes");
        return $this->redirectToRoute('answer_new', array('question' => $answer->getQuestion()->getId()));
    }

    /**
     * Creates a form to delete a question entity.
     *
     * @param Question $question The question entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Question $question)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('question_delete', array('id' => $question->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
