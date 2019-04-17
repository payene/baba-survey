<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Suscriber;
use AppBundle\Entity\ChatBot;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormError;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Config\Definition\Exception\Exception;


class DefaultController extends Controller
{
    /**
     * @Route("/dynamicforms/{botlink}", name="chat_whith_bot")
    **/
    public function indexAction(Request $request, $botlink)
    {

        $em = $this->getDoctrine()->getManager();
        $chatbot = $em->getRepository('AppBundle:ChatBot')->findOneBy(['botLink' => $botlink]);
        if(empty($chatbot)){
            throw new Exception("Error Processing Request", 1);
        }

       
        // dump($session);
        $em = $this->getDoctrine()->getManager();
        
        $starterMsg = $chatbot->getStarterMsg();
        $lastMsg = $chatbot->getClosingMsg();

        $query = $em->createQueryBuilder();
        $query
            ->select('q')
            ->from('AppBundle:Question', 'q')
            ->andwhere('q.chatbot = :cId')
            ->setParameter('cId', $chatbot->getId())
            ->orderBy('q.order', 'ASC')
        ;
        $questions = $query->getQuery()->getResult();
        $firstQuestion = $questions[0];
        $lastQuestion =  $questions[count($questions) - 1];
        foreach ($questions as $key => $question) {
            $answersArray = [];
            $answers = $question->getAnswers();
            foreach ($answers as $key => $answer) {
                $answersArray[] = ["option" => $answer->getOptionValue(), "next" => $answer->getNextQuestion()];
            }

            $questArray[] = array(
                "question" => $question->getTitle(),
                "idQuest" => $question->getId(),
                "isInput" => $question->getAnswerAsInput(),
                "answers" => $answersArray
            );
        }

        return $this->render('default/chatbot.html.twig', 
            array(
                'questions' => $questions,
                "starterMsg" => $starterMsg,
                "lastMsg" => $lastMsg,
                "chatbot" => $chatbot,
                "firstQuestion" => $firstQuestion,
                "lastQuestion" => $lastQuestion
            )
        );
    }

    /**
     * @Route("/json/chatbot/{botlink}", name="chatbot_json")
    **/
    public function jsonAction(Request $request, $botlink)
    {
        
        $em = $this->getDoctrine()->getManager();
        $chatbot = $em->getRepository('AppBundle:ChatBot')->findOneBy(['botLink' => $botlink]);
        if(empty($chatbot)){
            throw new Exception("Error Processing Request", 1);
        }

        $query = $em->createQueryBuilder();

        $questArray = [];
        $query
            ->select('q')
            ->from('AppBundle:Question', 'q')
            ->andwhere('q.chatbot = :cId')
            ->setParameter('cId', $chatbot->getId())
            ->orderBy('q.order', 'ASC')
        ;

        $questions = $query->getQuery()->getResult();
        // dump($botid);
        foreach ($questions as $key => $question) {
            $answersArray = [];
            $answers = $question->getAnswers();
            foreach ($answers as $key => $answer) {
                $answersArray[] = ["id" => $answer->getId(), "option" => $answer->getOptionValue(), "next" => $answer->getNextQuestion()];
            }

            $questArray[$question->getOrder()] = array(
                "question" => $question->getTitle(),
                "idQuest" => $question->getId(),
                "isInput" => $question->getAnswerAsInput(),
                "answers" => $answersArray
            );
        }
        
        return new JsonResponse($questArray, 200, array('Access-Control-Allow-Origin'=> '*'));

    }

    /**
     * @Route("/chatbot/{bot}", name="preview_chatbot")
    **/
    public function chatbotAction(Request $request, ChatBot $bot)
    {
        $chatbot = $bot;
        $em = $this->getDoctrine()->getManager();
        
        $starterMsg = $chatbot->getStarterMsg();
        $lastMsg = $chatbot->getClosingMsg();

        $query = $em->createQueryBuilder();
        $query
            ->select('q')
            ->from('AppBundle:Question', 'q')
            ->andwhere('q.chatbot = :cId')
            ->setParameter('cId', $chatbot->getId())
            ->orderBy('q.id', 'ASC')
        ;
        $questions = $query->getQuery()->getResult();

        foreach ($questions as $key => $question) {
            $answersArray = [];
            $answers = $question->getAnswers();
            foreach ($answers as $key => $answer) {
                $answersArray[] = ["option" => $answer->getOptionValue(), "next" => $answer->getNextQuestion()];
            }

            $questArray[] = array(
                "question" => $question->getTitle(),
                "idQuest" => $question->getId(),
                "isInput" => $question->getAnswerAsInput(),
                "answers" => $answersArray
            );
        }

        return $this->render('default/chatbot.html.twig', 
            array(
                'questions' => $questions,
                "starterMsg" => $starterMsg,
                "lastMsg" => $lastMsg
            )
        );
    }
}
