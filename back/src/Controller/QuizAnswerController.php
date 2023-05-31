<?php

namespace App\Controller;

use App\Repository\QuizAnswerRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\QuizAnswer;
use Symfony\Bundle\SecurityBundle\Security as Security;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class QuizAnswerController extends AbstractController
{
    #[Route('api/quizanswers', name: 'app_quizz_answer', methods: ['GET'])]
    public function getAllQuizAnswer(QuizAnswerRepository $quizAnswer): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_GESTIONNAIRE');
        $quizAnswerList = $quizAnswer->findAll();
        $data = [];
        for ($i=0; $i < count($quizAnswerList); $i++) { 
            $data[$i] = $quizAnswerList[$i]->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
        
    }

    #[Route('api/quizanswer/{id}', name: 'app_quiz_answer_id', methods: ['GET'])]
    public function getQuizAnswerById(QuizAnswerRepository $quizAnswer, $id): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_GESTIONNAIRE');
        $quizAnswerList = $quizAnswer->findBy(['id' => $id]);
        $data = [];
        for ($i=0; $i < count($quizAnswerList); $i++) { 
            $data[$i] = $quizAnswerList[$i]->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
        
    }

    #[Route('api/quizanswer/quiz/{id}', name: 'app_quiz_answer_id_quiz', methods: ['GET'])]
    public function getQuizAnswerByQuizId(QuizAnswerRepository $quizAnswer, $id): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_GESTIONNAIRE');
        $quizAnswerList = $quizAnswer->findBy(['id_quizz' => $id]);
        $data = [];
        for ($i=0; $i < count($quizAnswerList); $i++) { 
            $data[$i] = $quizAnswerList[$i]->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
        
    }

    #[Route('api/quizanswers/team/{id}', name: 'app_quizz_answer_id', methods: ['GET'])]
    public function getQuizAnswerByQuizIdAndTeamId(QuizAnswerRepository $quizAnswer, $id, Security $security ): JsonResponse
    {
        $user = $security->getUser();
        if(!$user->isMember($id)){
            return new JsonResponse("Vous n'avez pas accès à cette ressource", 403, [], true);
        }
        $quizAnswerList = $quizAnswer->findBy(['id_team' => $id]);
        $data = [];
        for ($i=0; $i < count($quizAnswerList); $i++) { 
            $data[$i] = $quizAnswerList[$i]->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
        
    }

    #[Route('api/quizanswers/quiz/{id}/team/{teamId}', name: 'app_quiz_answ_id', methods: ['GET'])]
    public function getQuizAnswerByQuizIdAndTeamIdAndUserId(QuizAnswerRepository $quizAnswer, $id, $teamId, Security $security ): JsonResponse
    {
        $user = $security->getUser();
        if(!$user->isMember($teamId)){
            return new JsonResponse("Vous n'avez pas accès à cette ressource", 403, [], true);
        }
        $quizAnswerList = $quizAnswer->findBy(['id_quizz' => $id, 'id_team' => $teamId]);
        $data = [];
        for ($i=0; $i < count($quizAnswerList); $i++) { 
            $data[$i] = $quizAnswerList[$i]->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
        
    }

    #[Route('api/quizanswer', name: 'app_quiz_answer_create', methods: ['POST'])]
    public function addQuizAnswer(QuizAnswerRepository $quizAnswer, Security $security, Request $request, EntityManagerInterface $entityManger): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_TEAM');
        $data = json_decode($request->getContent(), true);
        $user = $security->getUser();
        if(!$user->isMember($data['id_team'])){
            return new JsonResponse("Vous n'avez pas accès à cette ressource", 403, [], true);
        }
        $quizAnswerList = $quizAnswer->findBy(['id_quizz' => $data['id_quizz'], 'id_team' => $data['id_team']]);
        if($quizAnswerList){
            return new JsonResponse("Vous avez déjà répondu à ce quiz", 403, [], true);
        }
        $quizAnswer = new QuizAnswer();
        $quizAnswer->setIdQuizz($data['id_quizz']);
        $quizAnswer->setIdTeam($data['id_team']);
        $quizAnswer->setAnswer1($data['answer1']);
        $quizAnswer->setAnswer2($data['answer2']);
        $quizAnswer->setAnswer3($data['answer3']);
        $quizAnswer->setAnswer4($data['answer4']);
        $quizAnswer->setAnswer5($data['answer5']);
        $entityManger->persist($quizAnswer);
        $entityManger->flush();
        return new JsonResponse("QuizAnswer créé", 200, [], true);

    }

    #[Route('api/quizanswer/{id}', name: 'app_quiz_answer_delete', methods: ['DELETE'])]
    public function deleteQuizAnswer(QuizAnswerRepository $quizAnswer, Security $security, $id, EntityManagerInterface $entityManager): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_STUDENT');
        // on verifie si l'utilisateur est dans l'equipe qui a répondu au quiz
        $user = $security->getUser();
        $quizAnswerList = $quizAnswer->findBy(['id' => $id]);
        if(!$user->isMember($quizAnswerList[0]->getIdTeam()->getId())){
            return new JsonResponse("Vous n'avez pas accès à cette ressource", 403, [], true);
        }
        if($quizAnswerList){
            $entityManager->remove($quizAnswerList[0]);
            $entityManager->flush();
            return new JsonResponse("QuizAnswer supprimé", 200, [], true);
        } else {
            return new JsonResponse("QuizAnswer non trouvé", 404, [], true);
        }
    }



}
