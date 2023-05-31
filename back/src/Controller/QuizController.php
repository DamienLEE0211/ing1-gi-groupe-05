<?php

namespace App\Controller;

use App\Entity\Quiz;
use App\Repository\QuizRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;



class QuizController extends AbstractController
{
    #[Route('api/quizs', name: 'app_quizz', methods: ['GET'])]
    public function getAllQuiz(QuizRepository $quiz): JsonResponse
    {
        // on verifie si l'utilisateur a le role gestionnaire ou admin
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

         
        $quizList = $quiz->findAll();
        $data = [];
        for ($i=0; $i < count($quizList); $i++) { 
            $data[$i] = $quizList[$i]->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
        
    }

    #[Route('api/quiz/project/{id}', name: 'app_quizz_id', methods: ['GET'])]
    public function getQuizByProjectId(QuizRepository $quiz, $id): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_GESTIONNAIRE');
        $quizList = $quiz->findBy(['id_projet' => $id]);
        $data = [];
        for ($i=0; $i < count($quizList); $i++) { 
            $data[$i] = $quizList[$i]->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
        
    }

    #[Route('api/quiz' , name: 'app_quizzz', methods: ['POST'])]
    public function addQuiz(QuizRepository $quiz,  Request $request, EntityManagerInterface $entitymanager): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_GESTIONNAIRE');
        $data = json_decode($request->getContent(), true);
        $quiz = new Quiz();
        $quiz->setStartDate($data['startDate']);
        $quiz->setEndDate($data['endDate']);
        $quiz->setQuestion1($data['question1']);
        $quiz->setQuestion2($data['question2']);
        $quiz->setQuestion3($data['question3']);
        $quiz->setQuestion4($data['question4']);
        $quiz->setQuestion5($data['question5']);
        $entitymanager->persist($quiz);
        $entitymanager->flush();
        return new JsonResponse("Quiz ajouté", 200, [], true);
        

    }

    #[Route('api/quiz/{id}' , name: 'app_quizzz_id', methods: ['DELETE'])]
    public function deleteQuiz(QuizRepository $quiz, $id, EntityManagerInterface $entitymanager, Security $security): JsonResponse
    {
        $user = $security->getUser();
        if($user->hasRole('ROLE_STUDENT')){
            return new JsonResponse("Vous n'avez pas accès à cette ressource", 403, [], true);
        }
        $quiz = $quiz->find($id);
        $entitymanager->remove($quiz);
        $entitymanager->flush();
        return new JsonResponse("Quiz supprimé", 200, [], true);

    }

}
