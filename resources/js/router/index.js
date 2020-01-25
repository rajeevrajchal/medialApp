import Vue from 'vue';
import Router from 'vue-router';

window.eventBus = new Vue();

Vue.use(Router);

import Login from "../components/auth/login";
import Dashboard from "../components/Dashboard/Dashboard";
import Dindex from "../views/Dashboard/index";
import User from "../views/User/index";
import PatientList from '../views/Patient/PatientList'
import PatientForm from '../views/Patient/Form'
import CreateReport from "../views/Patient/CreateReport";
import ViewReport from "../views/Patient/ViewReport";


export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            redirect: '/login',
        },
        {
            path: '/login',
            name: 'Login',
            component: Login
        },
        {
            path: '/dashboard',
            name: 'Dashboard',
            component: Dashboard,
            meta: {
                requiresAuth: true,
            },
            redirect: '/dashboard',
            children: [
                {
                    path: '/dashboard',
                    name: 'DIndex',
                    component: Dindex,
                },
                {
                    path: 'user',
                    name: 'User',
                    component: User,
                },
                {
                    path: 'patient',
                    name: 'Patient',
                    component: PatientList,

                },
                {
                    path: '/dashboard/patient/create',
                    name: 'PatientForm',
                    component: PatientForm

                },
                {
                    path: '/dashboard/patient/create/report/:id/:tn',
                    name: 'PatientReportCreate',
                    component: CreateReport,
                    props: true
                },
                {
                    path: '/dashboard/patient/:id/view/report/:tn',
                    name: 'PatientReportView',
                    component: ViewReport,
                    props: true
                },
            ]
        },

    ]

})
