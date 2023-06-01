version php >= 8.1
installation de php8.2:
```bash
apt install php-mysql php-curl
sudo apt install php-mysql php-curl
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt-install php8.2
sudo apt-get install php8.2
php --version
```

Installer composer 
```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/local/bin/composer
```

Installer symfony
```bash
curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | sudo -E bash

sudo apt install symfony-cli
```

Installer les dépendances
```bash
composer require symfony/orm-pack
```

Créer la base de données (apres avoir configurer le .env)
```bash
php bin/console doctrine:database:create
```

Créer les tables
```bash
php bin/console doctrine:migrations:migrate
```

Créer des données de test
```bash
php bin/console doctrine:fixtures:load
```
Installer php-xml
```bash
sudo apt install php8.2-xml
```

Lancer le serveur (il faut possiblement installer d'autres extensions php)
```bash
symfony server:start
```
Documentation sur les différentes routes:
get_all_codes
-------------

- Path: /api/codes
- Path Regex: {^/api/codes$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\CodeController::getAllCodeEval
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_codes_team_id
-----------------

- Path: /api/code/team/{id}
- Path Regex: {^/api/code/team/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\CodeController::getCodeEvalByTeamId
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_post_code_team_id
---------------------

- Path: /api/code/team
- Path Regex: {^/api/code/team$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: POST
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\CodeController::postCodeEvalByTeamId
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_code_id_team
--------------------

- Path: /api/code/team/{id}
- Path Regex: {^/api/code/team/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\CodeController::getCodeEvalByID
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_all_datachallenges
--------------------------

- Path: /api/challenges
- Path Regex: {^/api/challenges$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\DataChallengeController::getAllChallenge
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_datachallenge_by_id
---------------------------

- Path: /api/challenge/{id}
- Path Regex: {^/api/challenge/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\DataChallengeController::getChallengeById
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_data_challenge_post
-----------------------

- Path: /api/challenge
- Path Regex: {^/api/challenge$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: POST
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\DataChallengeController::postChallenge
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_data_challenge_delete
-------------------------

- Path: /api/challenge/{id}
- Path Regex: {^/api/challenge/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: DELETE
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\DataChallengeController::deleteChallenge
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_data_challenge_delete_by_name
---------------------------------

- Path: /api/challenge/name/{name}/delete
- Path Regex: {^/api/challenge/name/(?P<name>[^/]++)/delete$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: DELETE
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\DataChallengeController::deleteChallengeByName
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_by_type
---------------

- Path: /api/challenge/type/{type}
- Path Regex: {^/api/challenge/type/(?P<type>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\DataChallengeController::getChallengeByType
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_data_challenge_put
----------------------

- Path: /api/challenge/{id}
- Path Regex: {^/api/challenge/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: PUT
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\DataChallengeController::putChallenge
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


get_all_gestionnaires
---------------------

- Path: /api/gestionnaires
- Path Regex: {^/api/gestionnaires$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\GestionnaireController::getAllGestionnaire
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_all_gestion_current_user
--------------------------------

- Path: /api/gestionnairecurrentuser
- Path Regex: {^/api/gestionnairecurrentuser$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\GestionnaireController::getOneGestionnaire
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


gestionnaire_delete
-------------------

- Path: /api/gestionnaire/{id}
- Path Regex: {^/api/gestionnaire/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: DELETE
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\GestionnaireController::deleteGestionnaire
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


gestionnaire_post
-----------------

- Path: /api/gestionnaire
- Path Regex: {^/api/gestionnaire$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: POST
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\GestionnaireController::postGestionnaire
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_all_projects
--------------------

- Path: /api/projects
- Path Regex: {^/api/projects$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\ProjectController::getAllProject
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_project_by_id
---------------------

- Path: /api/project/{id}
- Path Regex: {^/api/project/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\ProjectController::getProjectById
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_project_post
----------------

- Path: /api/project
- Path Regex: {^/api/project$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: POST
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\ProjectController::postProject
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_all_projetcs_by_challenge_id
------------------------------------

- Path: /api/project/challenge/{id}
- Path Regex: {^/api/project/challenge/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\ProjectController::getProjectByChallengeId
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_project_delete
------------------

- Path: /api/project/{id}
- Path Regex: {^/api/project/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: DELETE
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\ProjectController::deleteProject
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_projet_by_name
----------------------

- Path: /api/project/{name}
- Path Regex: {^/api/project/(?P<name>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\ProjectController::getProjectByName
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_project_put
---------------

- Path: /api/project/{id}
- Path Regex: {^/api/project/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: PUT
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\ProjectController::putProject
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_all_quizanswers
-----------------------

- Path: /api/quizanswers
- Path Regex: {^/api/quizanswers$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\QuizAnswerController::getAllQuizAnswer
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_quizanswer_by_id
------------------------

- Path: /api/quizanswer/{id}
- Path Regex: {^/api/quizanswer/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\QuizAnswerController::getQuizAnswerById
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_all_quizzanswers_by_quiz_id
-----------------------------------

- Path: /api/quizanswer/quiz/{id}
- Path Regex: {^/api/quizanswer/quiz/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\QuizAnswerController::getQuizAnswerByQuizId
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_all_quizanswers_by_team_id
----------------------------------

- Path: /api/quizanswers/team/{id}
- Path Regex: {^/api/quizanswers/team/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\QuizAnswerController::getQuizAnswerByQuizIdAndTeamId
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_quizanswer_by_team_and_quiz_id
--------------------------------------

- Path: /api/quizanswers/quiz/{id}/team/{teamId}
- Path Regex: {^/api/quizanswers/quiz/(?P<id>[^/]++)/team/(?P<teamId>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\QuizAnswerController::getQuizAnswerByQuizIdAndTeamIdAndUserId
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_quiz_answer_create
----------------------

- Path: /api/quizanswer
- Path Regex: {^/api/quizanswer$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: POST
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\QuizAnswerController::addQuizAnswer
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_quiz_answer_delete
----------------------

- Path: /api/quizanswer/{id}
- Path Regex: {^/api/quizanswer/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: DELETE
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\QuizAnswerController::deleteQuizAnswer
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_all_quizs
-----------------

- Path: /api/quizs
- Path Regex: {^/api/quizs$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\QuizController::getAllQuiz
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_quiz_by_id
------------------

- Path: /api/quiz/project/{id}
- Path Regex: {^/api/quiz/project/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\QuizController::getQuizByProjectId
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_create_quiz
---------------

- Path: /api/quiz
- Path Regex: {^/api/quiz$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: POST
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\QuizController::addQuiz
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_delet_quiz_by_id
--------------------

- Path: /api/quiz/{id}
- Path Regex: {^/api/quiz/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: DELETE
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\QuizController::deleteQuiz
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_register
------------

- Path: /api/register
- Path Regex: {^/api/register$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: POST
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\RegistrationController::register
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_all_resources_challenge
-------------------------------

- Path: /api/resourceschallenges
- Path Regex: {^/api/resourceschallenges$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\ResourcesChallengeController::getAllResourcesChallenge
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_resources_challenge_id
--------------------------

- Path: /api/resourceschallenge/{id}
- Path Regex: {^/api/resourceschallenge/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\ResourcesChallengeController::getResourcesChallengeById
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_resources_challenge_challenge_id
------------------------------------

- Path: /api/resourceschallenge/challenge/{id}
- Path Regex: {^/api/resourceschallenge/challenge/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\ResourcesChallengeController::getResourcesChallengeByChallengeId
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_resources_challenge_post
----------------------------

- Path: /api/resourceschallenge
- Path Regex: {^/api/resourceschallenge$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: POST
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\ResourcesChallengeController::postResourcesChallenge
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_resources_challenge_delete
------------------------------

- Path: /api/resourceschallenge/{id}
- Path Regex: {^/api/resourceschallenge/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: DELETE
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\ResourcesChallengeController::deleteResourcesChallenge
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_all_resources
---------------------

- Path: /api/resources
- Path Regex: {^/api/resources$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\ResourcesController::getAllResources
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_resource_by_id
----------------------

- Path: /api/resource/{id}
- Path Regex: {^/api/resource/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\ResourcesController::getResourcesById
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_all_resources_by_idProject
----------------------------------

- Path: /api/resource/project/{projetId}
- Path Regex: {^/api/resource/project/(?P<projetId>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\ResourcesController::getResourcesByProjetId
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_resources_post
------------------

- Path: /api/resource
- Path Regex: {^/api/resource$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: POST
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\ResourcesController::postResources
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_resources_delete_by_id
--------------------------

- Path: /api/resource/{id}
- Path Regex: {^/api/resource/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: DELETE
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\ResourcesController::deleteResources
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_all_team
----------------

- Path: /api/teams
- Path Regex: {^/api/teams$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\TeamController::getAllTeam
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_eam_by_id
-----------------

- Path: /api/team/{id}
- Path Regex: {^/api/team/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\TeamController::getTeamById
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_team_members_by_id
--------------------------

- Path: /api/team/{id}/members
- Path Regex: {^/api/team/(?P<id>[^/]++)/members$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\TeamController::getTeamMembers
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_team_create
---------------

- Path: /api/team/create
- Path Regex: {^/api/team/create$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: POST
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\TeamController::createTeam
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_team_currentuser
--------------------

- Path: /api/team/currentuser
- Path Regex: {^/api/team/currentuser$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\TeamController::getTeamCurrentUser
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_team_add
------------

- Path: /api/team/{name}/{mail}/add
- Path Regex: {^/api/team/(?P<name>[^/]++)/(?P<mail>[^/]++)/add$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: POST
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\TeamController::addMemberTeam
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_team_delete
---------------

- Path: /api/team/{id}/delete
- Path Regex: {^/api/team/(?P<id>[^/]++)/delete$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: DELETE
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\TeamController::deleteTeam
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_all_admin
-----------------

- Path: /api/userType/admin/users
- Path Regex: {^/api/userType/admin/users$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\TypeUserController::getUsersByType
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_all_gestionnaires2
--------------------------

- Path: /api/userType/gestionnaire/users
- Path Regex: {^/api/userType/gestionnaire/users$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\TypeUserController::getUsersByTypeGestionnaire
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_all_student
-------------------

- Path: /api/userType/student/users
- Path Regex: {^/api/userType/student/users$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\TypeUserController::getUsersByTypeStudent
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_users
-------------

- Path: /api/users
- Path Regex: {^/api/users$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\UsersController::getAllUsers
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_current_user
----------------

- Path: /api/currentuser
- Path Regex: {^/api/currentuser$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\UsersController::getCurrentUser
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_create_user
---------------

- Path: /api/user
- Path Regex: {^/api/user$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: POST
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\UsersController::createUser
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_users_update
----------------

- Path: /api/user/{id}
- Path Regex: {^/api/user/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: PUT
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\UsersController::updateUser
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_users_delete
----------------

- Path: /api/user
- Path Regex: {^/api/user$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: DELETE
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\UsersController::deleteUser
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_current_user_teams
----------------------

- Path: /api/currentuser/team
- Path Regex: {^/api/currentuser/team$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\UsersController::getTeam
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_gestionnaires
---------------------

- Path: /api/user/gestionnaire
- Path Regex: {^/api/user/gestionnaire$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\UsersController::getAllGestionnaire
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


app_get_users_by_id
-------------------

- Path: /api/user/{id}
- Path Regex: {^/api/user/(?P<id>[^/]++)$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: GET
- Class: Symfony\Component\Routing\Route
- Defaults: 
    - `_controller`: App\Controller\UsersController::getOneUser
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


api_login_check
---------------

- Path: /api/login_check
- Path Regex: {^/api/login_check$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: ANY
- Class: Symfony\Component\Routing\Route
- Defaults: NONE
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true


api_register
------------

- Path: /api/register
- Path Regex: {^/api/register$}sDu
- Host: ANY
- Host Regex: 
- Scheme: ANY
- Method: ANY
- Class: Symfony\Component\Routing\Route
- Defaults: NONE
- Requirements: NO CUSTOM
- Options: 
    - `compiler_class`: Symfony\Component\Routing\RouteCompiler
    - `utf8`: true

