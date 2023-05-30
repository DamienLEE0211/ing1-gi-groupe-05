import {createRouter,createWebHistory } from 'vue-router'

import AccueilVue from '../components/pages/AccueilVue.vue'
import ContactVue from '../components/pages/ContactVue.vue'
import DataChallenges from '../components/pages/DataChallenges.vue'
import FormulaireU from '../components/pages/FormulaireU.vue'
import FormulaireDC from '../components/pages/FormulaireDC.vue'
import FormulaireProj from '../components/pages/FormulaireProj.vue'
import UtilisateursVue from '../components/pages/UtilisateursVue.vue'
import FAQVue from '../components/pages/FAQVue.vue'


const routes = [
    {
        path: '/',
        component: AccueilVue
    },
    {
        path: '/contact',
        component: ContactVue
    },
    {
        path: '/datachallenges',
        component: DataChallenges
    },
    {
        path: '/utilisateurs',
        component: UtilisateursVue
    },
    {
        path: '/utilisateurs/formulaire_u',
        component: FormulaireU
    },
    {
        path: '/datachallenges/formulaire_dc',
        component: FormulaireDC
    },
    {
        path: '/datachallenges/formulaire_dc/formulaire_proj',
        component: FormulaireProj
    },
    {
        path: '/faq',
        component: FAQVue
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
})

export default router 