<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ChatBot;
use AppBundle\Entity\Question;
use AppBundle\Entity\Choice;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormError;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
/**
 * Chatbot controller.
 *
 * @Route("botmanager")
 */
class ChatBotController extends Controller
{
    /**
     * Lists all chatBot entities.
     *
     * @Route("/answers/export/csv/{botlink}", name="export_answers")
     * @Method({"GET", "POST"})
     */
    public function exportAction(Request $request, $botlink)
    {
        
        /*
        if(empty($chatbot)){
            throw new Exception("Error Processing Request", 1);
        }
        $spreadsheet = $this->get('phpspreadsheet')->createSpreadsheet();
        $writer = $this->get('phpspreadsheet')->createWriter($spreadsheet, 'Xlsx');
        $writer->save('file.xls');
        return $writer;*/


        $em = $this->getDoctrine()->getManager();
        $chatbot = $em->getRepository('AppBundle:ChatBot')->findOneBy(['botLink' => $botlink]);
        $questions =  $em->getRepository('AppBundle:Question')->findBy(['chatbot' => $chatbot->getId()]);
        $query = $em->createQueryBuilder();
        $query
            ->select('DISTINCT(c.people)')
            ->from('AppBundle:Choice', 'c')
            ->join('c.question', 'q')
            ->join('q.chatbot', 'cb')
            ->andwhere('cb.id = :chatbot')
            ->setParameter('chatbot', $chatbot->getId())
            ->orderBy('q.order', 'ASC')
        ;
        $peoples = $query->getQuery()->getResult();

        $spreadsheet = $this->get('phpspreadsheet')->createSpreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $header[] = "Participant";
        $header[] = "Horodate";
        foreach ($questions as $key => $question) {
            $header[] = $question->getTitle();
        }
        $sheet->fromArray($header, NULL, 'A1'); 
        $celIndex = 2;
        foreach ($peoples as $key => $people) {
            $query1 = $em->createQueryBuilder();
            $query1 = $em->createQueryBuilder();
            $p = isset($people[1]) ? $people[1] : null;
            $data = [];
            if(!empty($p)){
                $data[0] = $p;
                $data[1] = "";
                $query1
                    ->select('c1')
                    ->from('AppBundle:Choice', 'c1')
                    ->join('c1.question', 'q1')
                    ->join('q1.chatbot', 'cb1')
                    ->andwhere('c1.people = :people')
                    ->andwhere('cb1.id = :chatbot')
                    ->setParameter('people', $p)
                    ->setParameter('chatbot', $chatbot->getId())
                    ->orderBy('c1.createdAt', 'DESC')
                ;
                $allanswers = $query1->getQuery()->getResult();
                // dump($allanswers);
                foreach ($allanswers as $key => $oneAnswer) {
                    $data[] = empty($oneAnswer->getChoiceValue()) ? "" : $oneAnswer->getChoiceValue() ;
                    $data[1] = $oneAnswer->getCreatedAt()->format('d/m/Y H:i:s');
                }
                // dump($data);
                // exit;
                $sheet->fromArray($data, NULL, 'A'.$celIndex);   
                $celIndex++;
            }
        }




        // $em = $this->getDoctrine()->getManager();
        // $bots = $em->getRepository('AppBundle:ChatBot')->findAll();
        // $header = array("Customer Number", "Customer Name", "Address", "City", "State", "Zip");
        
        // $sheet->fromArray($question, NULL, 'A1');   
        // $sheet->fromArray($bots, NULL, 'A2');   


        // redirect output to client browser
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="data_'. $chatbot->getBotName() .'.xls"');
        header('Cache-Control: max-age=0');

        $writer = $this->get('phpspreadsheet')->createWriter($spreadsheet, 'Xls');
        $writer->save('data_'. $chatbot->getBotName() .'.xls');

        exit;
    }


    /**
     * Lists all chatBot entities.
     *
     * @Route("/answers/preview/{botlink}", name="view_answers")
     * @Method({"GET", "POST"})
     */
    public function answersAction(Request $request, $botlink)
    {
        $em = $this->getDoctrine()->getManager();
        $chatbot = $em->getRepository('AppBundle:ChatBot')->findOneBy(['botLink' => $botlink]);
        if(empty($chatbot)){
            throw new Exception("Error Processing Request", 1);
        }
        $query = $em->createQueryBuilder();
        $query
            ->select('DISTINCT(c.people)')
            ->from('AppBundle:Choice', 'c')
            ->join('c.question', 'q')
            ->join('q.chatbot', 'cb')
            ->andwhere('cb.id = :chatbot')
            ->setParameter('chatbot', $chatbot->getId())
            ->orderBy('q.order', 'ASC')
        ;
        $peoples = $query->getQuery()->getResult();
        $allanswers = [];
        foreach ($peoples as $key => $people) {
            $query1 = $em->createQueryBuilder();
            $p = isset($people[1]) ? $people[1] : null;
            // dump($people);
            if(!empty($p)){
                $query1
                    ->select('c1')
                    ->from('AppBundle:Choice', 'c1')
                    ->join('c1.question', 'q1')
                    ->join('q1.chatbot', 'cb1')
                    ->andwhere('c1.people = :people')
                    ->andwhere('cb1.id = :chatbot')
                    ->setParameter('people', $p)
                    ->setParameter('chatbot', $chatbot->getId())
                    ->orderBy('q1.order', 'ASC')
                ;
                $allanswers[] = array('people' => $p, 'answers' => $query1->getQuery()->getResult());
            }
        }
        return $this->render('chatbot/answers-preview.html.twig', array(
            'allanswers' => $allanswers,
            'chatBot' => $chatbot,
        ));
        // dump($answers);
        // exit;
    }

    /**
     * Lists all chatBot entities.
     *
     * @Route("/", name="homepage")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $chatBots = $em->getRepository('AppBundle:ChatBot')->findBy(['owner' => $this->getUser()], ['id'=> 'desc']);

        $chatbot = new Chatbot();
        $form = $this->createForm('AppBundle\Form\ChatBotType', $chatbot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $chatbot->setOwner($this->getUser());
            $chatbot->setCreatedAt( new \DateTime());
            
            do {
                # code...
                $botLink = uniqid();
                $doublon = $em->getRepository('AppBundle:ChatBot')->findBy(['botLink' => $botLink]);
                if(empty($doublon)):
                    $chatbot->setBotLink($botLink);
                endif;
            } while (!empty($doublon));
            $this->addFlash("success", "Nouveau chatbot créé avec succes");
            $em->persist($chatbot);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('chatbot/index.html.twig', array(
            'chatBots' => $chatBots,
            'form' => $form->createView(),
        ));
    }


     /**
     * Creates a new chatBot entity.
     *
     * @Route("/save/bot/conversation", name="save_botconv")
     * @Method({"GET", "POST"})
     */
    public function saveChatAction(Request $request)
    {
        $data = $request->get('data');
        // $data = '[[15,""],[16,"AGOKOLI Chimene"],[17,21],[18,""]]';
        $array = json_decode($data);
        // dump($data);
        // dump($array);
        $em = $this->getDoctrine()->getManager();
        $people = uniqid();
        $now = new \DateTime();
        foreach ($array as $key => $msg) {
            $questionID = isset($msg[0]) ? $msg[0] : "";
            $answerValue = isset($msg[1]) ? $msg[1] : "";
            $question = $em->getRepository('AppBundle:Question')->findOneById($questionID);
            $answerToBot = new Choice();
            if($question->getAnswerAsInput()){
                $answerToBot->setChoiceValue($answerValue);                
            }
            else{
                // dump($answerValue);
                $choiceOption = $em->getRepository('AppBundle:Answer')->findOneById(intval($answerValue));
                if(!empty($choiceOption)){
                    $answerToBot->setChoiceValue($choiceOption->getOptionValue());                
                }
                else{
                    $answerToBot->setChoiceValue($answerValue);
                }
            }
            $answerToBot->setPeople($people);
            $answerToBot->setQuestion($question);
            $answerToBot->setCreatedAt($now);
            $em->persist($answerToBot);
            $em->flush();

        }
        exit;
    }

    /**
     * Creates a new chatBot entity.
     *
     * @Route("/new", name="botmanager_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $chatBot = new ChatBot();
        $form = $this->createForm('AppBundle\Form\ChatBotType', $chatBot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $chatbot->setOwner($this->getUser());
            $em->persist($chatBot);
            $em->flush();

            return $this->redirectToRoute('botmanager_show', array('id' => $chatBot->getId()));
        }

        return $this->render('chatbot/new.html.twig', array(
            'chatBot' => $chatBot,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a chatBot entity.
     *
     * @Route("/manage/{id}", name="botmanager_show")
     * @Method({"GET", "POST"})
     */
    public function showAction(Request $request,ChatBot $chatBot)
    {
        $deleteForm = $this->createDeleteForm($chatBot);
        
        $em = $this->getDoctrine()->getManager();

        $questions = $em->getRepository('AppBundle:Question')->findBy(['chatbot' => $chatBot->getId()], ['order' => 'ASC']);


        $botid = $chatBot->getId();
        $question = new Question();

        $query = $em->createQueryBuilder();
        $max = $query
            ->select('MAX(q.order)')
            ->from('AppBundle:Question', 'q')
            ->andwhere('q.chatbot = :botid')
            ->setParameter('botid' , $botid)
            ->getQuery()
            ->getOneOrNullResult()
        ;
        $question->setOrder($max[1] + 10);

        $form = $this->createForm('AppBundle\Form\QuestionType', $question);
        // $form->add('before', EntityType::class, array( 'class' => 'AppBundle:Question',
        //     'label' => 'Choisir la question précedente', 'mapped'=> false, 'required' => false,
        //     'query_builder' => function (EntityRepository $er) use ($botid) {
        //             return $er->createQueryBuilder('q')
        //                         ->where('q.chatbot = :botid')
        //                         ->setParameter('botid', $botid)
        //                         ->orderBy('q.order','ASC')
        //                 ;
        //         },
        // ));
        $form->handleRequest($request);
        $data = $form->getData();

        if ($form->isSubmitted()){

            if($question->getAnswerAsInput() != true && $question->getAnswerAsInput() != false ){
                $error = new FormError("Champ obligatoire");
                $form->get('answerAsInput')->addError($error);
            }

            // $before = $form['before']->getData();            

            // dump($question->getAnswerAsInput()); exit;

            if($form->isValid()){
                $question->setCreatedAt(new \DateTime());
                $index =  count($em->getRepository('AppBundle:Question')->findBy(['chatbot' => $chatBot->getId()]));
                $index++;
                $question->setChatbot($chatBot);
                $question->setCreatedAt(new \DateTime());
                
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
                //     $question->setOrder($newOrder);
                //     $newOrder++;
                //     $before->setOrder($newOrder);
                //     foreach ($afterArray as $key => $q) {
                //         $q->setOrder($newOrder);
                //         $em->persist($q);
                //         $newOrder++;
                //     }
                // }

                $em->persist($question);
                $em->flush();
                if($question->getAnswerAsInput()){
                    return $this->redirectToRoute('botmanager_show', array('id' => $chatBot->getId()));
                }
                else{
                    return $this->redirectToRoute('answer_new', array('question' => $question->getId()));
                }
            }
        } 

        return $this->render('chatbot/show.html.twig', array(
            'chatBot' => $chatBot,
            'questions' => $questions,
            'form' => $form->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing chatBot entity.
     *
     * @Route("/{id}/edit", name="botmanager_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ChatBot $chatBot)
    {
        $deleteForm = $this->createDeleteForm($chatBot);
        $editForm = $this->createForm('AppBundle\Form\ChatBotType', $chatBot);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('botmanager_edit', array('id' => $chatBot->getId()));
        }

        return $this->render('chatbot/edit.html.twig', array(
            'chatBot' => $chatBot,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a chatBot entity.
     *
     * @Route("/{id}", name="botmanager_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ChatBot $chatBot)
    {
        $form = $this->createDeleteForm($chatBot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($chatBot);
            $em->flush();
        }

        return $this->redirectToRoute('botmanager_index');
    }

    /**
     * Creates a form to delete a chatBot entity.
     *
     * @param ChatBot $chatBot The chatBot entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ChatBot $chatBot)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('botmanager_delete', array('id' => $chatBot->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
