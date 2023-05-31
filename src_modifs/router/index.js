import { createRouter, createWebHistory } from 'vue-router'
import AccueilSite from '../views/accueilViews/AccueilSite.vue'
import DataBattlesList from '../views/accueilViews/DataBattlesList.vue'
import DataChallengesList from '../views/accueilViews/DataChallengesList.vue'
import EventsList from '../views/accueilViews/EventsList.vue'
import NextEvents from '../views/accueilViews/NextEvents.vue'
import RegleDataBattle from '../views/accueilViews/RegleDataBattle.vue'
import RegleDataChallenges from '../views/accueilViews/RegleDataChallenges.vue'
import EventView from '../views/eventViews/EventView.vue'
import ConnexionView from '../views/connexionViews/ConnexionView.vue'
import InscriptionView from '../views/connexionViews/InscriptionView.vue'
import AccueilAdmin from '../views/adminViews/AccueilAdmin.vue'
import CreaChallengeView from '../views/adminViews/challengeViews/CreaChallengeView.vue'
import ModifChallengeView from '../views/adminViews/challengeViews/ModifChallengeView.vue'
import ModifInfo from '../views/userViews/ModifInfo.vue'
import RecapitulatifChallengeView from '../views/adminViews/challengeViews/RecapitulatifChallengeView.vue'
import CreaUserView from '../views/adminViews/userViews/CreaUserView.vue'
import ModifUserView from '../views/adminViews/userViews/ModifUserView.vue'
import AccueilGestionnaire from '../views/gestionnaireViews/AccueilGestionnaire.vue'
import ChallengeView from '../views/gestionnaireViews/challengeViews/ChallengeView.vue'
import MessagerieChallengeView from '../views/gestionnaireViews/challengeViews/MessagerieChallengeView.vue'
import FormulaireQCM from '../views/participantViews/projetViews/FormulaireQCM.vue'
import RecapitulatifProjetView from '../views/gestionnaireViews/challengeViews/projetViews/RecapitulatifProjetView.vue'
import MessagerieProjetView from '../views/gestionnaireViews/challengeViews/projetViews/MessagerieProjetView.vue'
import AccueilParticipant from '../views/participantViews/AccueilParticipant.vue'
import AccueilProjet from '../views/participantViews/projetViews/AccueilProjet.vue'
import ClassementQCM from '../views/participantViews/projetViews/ClassementQCM.vue'
import MessageProjet from '../views/participantViews/projetViews/MessageProjet.vue'
import AnalyseView from '../views/analyseViews/AnalyseView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Accueil',
      component: AccueilSite
    },
    {
      path: '/data-battles',
      component: DataBattlesList
    },
    {
      path: '/data-challenges',
      component: DataChallengesList
    },
    {
      path: '/evenements',
      component: EventsList
    },
    {
      path: '/prochains-evenements',
      component: NextEvents
    },
    {
      path: '/reglement-data-battle',
      component: RegleDataBattle
    },
    {
      path: '/reglement-data-challenge',
      component: RegleDataChallenges
    },
    {
      path: '/event/:event',
      component: EventView
    },
    {
      path: '/connexion',
      component: ConnexionView
    },
    {
      path: '/inscription',
      component: InscriptionView
    },
    {
      path: '/admin/:id(\\d+)', //l'id est un nombre
      component: AccueilAdmin,
      props:true,
    },
    {
      path: '/admin/:id(\\d+)/modification-profil',  //l'id est un nombre
      component: ModifInfo,
      props:true,
    },
    {
      path: '/admin/:id(\\d+)/nouvel-evenement',  //l'id est un nombre
      component: CreaChallengeView,
      props:true,
    },
    {
      path: '/admin/:id(\\d+)/:event/modification-evenement', //l'id est un nombre
      component: ModifChallengeView,
      props:true,
    },
    {
      path: '/admin/:id(\\d+)/:event/evenement',  //l'id est un nombre
      component: RecapitulatifChallengeView,
      props:true,
    },
    {
      path: '/admin/:id(\\d+)/:user/modification-utilisateur', //l'id est un nombre
      component: ModifUserView,
      props:true,
    },
    {
      path: '/admin/:id(\\d+)/nouvel-utilisateur',  //l'id est un nombre
      component: CreaUserView,
      props:true
    },
    {
      path: '/gestionnaire/:id',
      component: AccueilGestionnaire
    },
    {
      path: '/gestionnaire/:id/modification-profil',
      component: ModifInfo
    },
    {
      path: '/gestionnaire/:id/:event',
      component: ChallengeView
    },
    {
      path: '/gestionnaire/:id/:event/messagerie',
      component: MessagerieChallengeView
    },
    {
      path: '/gestionnaire/:id/:event/creation-qcm',
      component: FormulaireQCM
    },
    {
      path: '/gestionnaire/:id/:event/:projet',
      component: RecapitulatifProjetView
    },
    {
      path: '/gestionnaire/:id/:event/:projet/messagerie',
      component: MessagerieProjetView
    },
    {
      path: '/participant/:id',
      component: AccueilParticipant
    },
    {
      path: '/participant/:id/modification-profil',
      component: ModifInfo
    },
    {
      path: '/participant/:id/:projet',
      component: AccueilProjet
    },
    {
      path: '/participant/:id/:projet/classement',
      component: ClassementQCM
    },
    {
      path: '/participant/:id/:projet/formulaire',
      component: FormulaireQCM
    },
    {
      path: '/participant/:id/:projet/messagerie',
      component: MessageProjet
    },
    {
      path: '/:projet/analyse',
      component: AnalyseView
    }
  ]
})

export default router
