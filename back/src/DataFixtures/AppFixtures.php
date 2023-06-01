<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Users;
use App\Entity\DataChallenge;
use App\Entity\DataProject;
use App\Entity\Team;
use App\Entity\Quiz;
use App\Entity\QuizAnswer;
use App\Entity\Resources;
use App\Entity\Gestion;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\CodeEval;



class AppFixtures extends Fixture
{
    private $userPasswordHasher;
    
    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {   
        $team = new Team();
        $team->setName('team1');

 
        // $product = new Product();
        // $manager->persist($product);

        $user = new Users();
        $user->setEmail('corentin@gmail.com');
        $user->setPassword($this->userPasswordHasher->hashPassword($user, "password"));
        $user ->setLastname('lastname' );
        $user->setFirstname('firstname' );
        $user->setRoles(['ROLE_STUDENT']);
        $user->setSchoolCompany('school');
        // creation du compte: date d'aujourdhuui
        $user->setCreationDate(new \DateTime('now'));
        $gestion = new Gestion();
        
        $manager->persist($user);
        $team ->addIdUser($user);
        $team->addIdUser($user);


        $user = new Users();
        $user->setEmail('corentinucalmels@gmail.com');
        $user->setPassword($this->userPasswordHasher->hashPassword($user, "password"));
        $user ->setLastname('lastname' );
        $user->setSchoolCompany('school');
        // creation du compte: date d'aujourdhuui
        $user->setCreationDate(new \DateTime('now'));
        $user->setFirstname('firstname' );
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);
        $team->setIdLeader($user);
        $team->addIdUser($user);
        
        $user = new Users();
        $user->setEmail('corentin.calmels@gmail.com');
        $user->setPassword($this->userPasswordHasher->hashPassword($user, "password"));
        $user->setSchoolCompany('school');
        // creation du compte: date d'aujourdhuui
        $user->setCreationDate(new \DateTime('now'));
        $user ->setLastname('lastname' );
        $user->setFirstname('firstname' );
        $user->setRoles(['ROLE_GESTIONNAIRE']);
        $gestion->setIdUser($user);
        $manager->persist($user);
        $team->addIdUser($user);
        
        $challenge = new DataChallenge();
        $challenge->setName('challenge1');
        $challenge->setDescription('description1');
        $challenge->setImage('image1');
        $challenge->setType('challenge');
        $challenge->setStartDate(new \DateTime('2021-01-01'));
        $challenge->setEndDate(new \DateTime('2021-01-01'));
        $manager->persist($challenge);
        $gestion->setIdChallenge($challenge);
        $manager->persist($gestion);

        $project = new DataProject();
        $project->setName('project1');
        $project->setDescription('description1');
        $project->setImage('image1');
        $project->setContact('contact1');
        $project->setIdChallenge($challenge);
        $manager->persist($project);
        $team->setIdProject($project);
        $manager->persist($team);

        $quiz = new Quiz();
        $quiz->setQuestion1('question1');
        $quiz->setQuestion2('question2');
        $quiz->setQuestion3('question3');
        $quiz->setQuestion4('question4');
        $quiz->setQuestion5('question5');
        $quiz->setStartDate(new \DateTime('2021-01-01'));
        $quiz->setEndDate(new \DateTime('2021-01-01'));
        $quiz->setIdProject($project);
        $manager->persist($quiz);

        $quizAnswer = new QuizAnswer();
        $quizAnswer->setAnswer1('answer1');
        $quizAnswer->setAnswer2('answer2');
        $quizAnswer->setAnswer3('answer3');
        $quizAnswer->setAnswer4('answer4');
        $quizAnswer->setAnswer5('answer5');
        $quizAnswer->setIdQuizz($quiz);
        $quizAnswer->setIdTeam($team);
        $manager->persist($quizAnswer);

        $resource = new Resources();
        $resource->setURL('link1');
        $resource->setIdProject($project);
        $manager->persist($resource);

        $codeEval = new CodeEval();
        $codeEval->setCode('code1');
        $codeEval->setIdTeam($team);
        $manager->persist($codeEval);
        $manager->flush();
    }
}
