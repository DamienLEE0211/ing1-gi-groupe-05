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
import GestionnaireAnalyseView from "../views/analyseViews/GestionnaireAnalyseView.vue";
import CreaUserView from "../views/adminViews/userViews/CreaUserView.vue";
import ModifUserView from "../views/adminViews/userViews/ModifUserView.vue";


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
      path: '/admin/:id',
      component: AccueilAdmin
    },
    {
      path: '/admin/:id/modification-profil',
      component: ModifInfo
    },
    {
      path: '/admin/:id/nouveau-evenement',
      component: CreaChallengeView
    },
    {
      path: '/admin/:id/modification-utilisateur',
      component: ModifUserView
    },
    {
      path: '/admin/:id/nouveau-utilisateur',
      component: CreaUserView
    },
    {
      path: '/admin/:id/:event/modification-evenement',
      component: ModifChallengeView
    },
    {
      path: '/admin/:id/:event/evenement',
      component: RecapitulatifChallengeView
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
    },
    {
      path: '/gestionnaire/:id/:event/:projet/analyse',
      component: GestionnaireAnalyseView
    }
  ]
})

export default router
