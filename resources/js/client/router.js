import Vue from 'vue';
import Router from 'vue-router';
import store from '../common/Store';

Vue.use(Router);

const router = new Router({
    routes: [
        {
            path: '/',
            redirect: '/dashboard',
        },
        {
            name: 'dashboard',
            path: '/dashboard',
            component: require('./dashboard/Dashboard'),
        },
        {
            path: '/project',
            component: require('../common/projects/Projects'),
            children: [
                {
                    path: '/',
                    name: 'projects.list',
                    component: require('../common/projects/components/List'),
                },
                {
                    path: 'project-schedule',
                    name: 'project.schedule',
                    component: require('../common/projects/milestones/Lists'),
                },
                {
                    path: 'attachments',
                    name: 'project.attachments',
                    component: require('../common/projects/notes/Lists'),
                },
                {
                    path: ':id/show',
                    name: 'projects.project-tasks.list',
                    component: require('../common/projects/components/Show'),
                    props: route => ({ propProjectId: route.params.id }),
                },

                {
                    path: ':id/invoices/create',
                    name: 'invoices.create',
                    component: require('../common/projects/invoices/Add'),
                    props: route => ({ propProjectId: route.params.id }),
                },
                {
                    path: ':project_id/invoices/:id/edit',
                    name: 'invoices.edit',
                    component: require('../common/projects/invoices/Edit'),
                    props: route => ({
                        propInvoiceId: route.params.id,
                        propProjectId: route.params.project_id,
                    }),
                },
            ],
        },
        {
            path: '/profiles',
            component: require('../common/profile/Profile'),
            children: [
                {
                    path: '/',
                    name: 'profile.list',
                    component: require('../common/profile/List'),
                },
                {
                    path: 'edit/:id',
                    name: 'profile.edit',
                    component: require('../common/profile/Edit'),
                    props: route => ({ propUserId: route.params.id }),
                },
            ],
        },
        {
            path: '/visit-request',
            component: require('../common/tickets/Ticket'),
            children: [
                {
                    path: '/visit-request',
                    name: 'visit_request_list',
                    component: require('../common/tickets/List'),
                },
                {
                    path: '/create-visit-request',
                    name: 'create_visit_request_list',
                    component: require('../common/tickets/Create'),
                },
                {
                    path: '/edit-visit-request',
                    name: 'edit_visit_request_list',
                    component: require('../common/tickets/editVisitRequest'),
                },
                {
                    path: ':id/show',
                    name: 'visit_request_view',
                    component: require('../common/tickets/View'),
                    props: route => ({ propTicketId: route.params.id }),
                },
            ],
        },
        {
            path: '/to-do-list',
            component: require('./main/ToDoList'),
            name:'todolist'
        },
        {
            path: '/project-management',
            name: 'project-management',
            component: require('./main/components/ProjectManagement'),
        },
        {
            path: '/request-for-transfer-of-ownership',
            name: 'request_for_transfer_of_ownership',
            component: require('./main/components/RequestForTransferOfOwnership'),
        },
        {
            path: '/add-project',
            name: 'add-project',
            component: require('../common/projects/components/AddProject'),
        },
        {
            path: '/edit-project',
            name: 'edit-project',
            component: require('../common/projects/components/editPrjectRequest'),
        },
        {
            path: '/offices_types',
            name: 'offices_types',
            component: require('./main/components/OfficesTypes'),
        },
        {
            path: '/finished-projects',
            name: 'finished-projects',
            component: require('../common/projects/components/FinishedProjects'),
        },
    ],
});

router.beforeEach((to, from, next) => {
    store.commit('showLoader');
    next();
});

router.afterEach((to, from) => {
    setTimeout(() => {
        store.commit('hideLoader');
    }, 1000);
});

export default router;
