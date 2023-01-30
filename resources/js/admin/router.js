import Vue from 'vue';
import Router from 'vue-router';
import store from '../store';

Vue.use(Router);

const router = new Router({
    history:true,
    mode: 'history',
   
    routes: [
       /* {
            path: "/:catchAll(.*)",
          //  component: NotFound,
          },*/
        {
            path: '/',
            name: 'index',
            component: () => import('../common/layout/Index.vue'),
            meta: {requiresAuth: true},
        },
        {
            path: '/login',
            name: 'login',
            component: () => import('../auth/Login.vue'),
         //   meta: { guest: true },
        },
        {
            path: '/register',
            name: 'register',
            component: () => import('../auth/Register.vue'),
          //  meta: { guest: true },
        },
      
        {
            path: '/to-do"',
            
            // redirect: APP.USER_TYPE_LOG=='ESTATE_OWNER' ?  '/es/to-do-list' :'/to-do-list',
        },
        {
            name: 'dashboard',
            path: '/dashboard',
            component: () => import('./dashboard/Home'),
            meta: {requiresAuth: true},
            children: [
                {
                    path: '/',
                    name: 'dashboard.list',
                    component: ()=> import('./dashboard/List'),
                     meta: {requiresAuth: true},
                    
                },
                ,
            ],
        },


        //estate owner 
        {
            name: 'dashboard_estate',
            path: '/es',
            component: ()=>import('../estate_owner/dashboard/Home'),
            meta: {requiresAuth: true},
            children: [
                {
                    path: '/',
                    name: 'dashboard_estate.list',
                    component: () => import('../estate_owner/dashboard/List'),
                },
                {
                    path: 'to-do-list',
                    name: 'to-do-list_estate.list',
                    component: ()=>import('../estate_owner/main/ToDoList'),
                },


                //employee

                {
                    path: 'employees',
                    name: 'users_estate.list',
                    component: () =>import('../estate_owner/users/components/UserLists'),
                },
                {
                    path: 'employees/create',
                    name: 'users_estate.create',
                    component: () => import('../estate_owner/users/components/UserFormAdd'),
                },
                {
                    path: 'employees/edit/:id',
                    name: 'users_estate.edit',
                    component: () => import('../estate_owner/users/components/UserFormEdit'),
                    props: route => ({ propUserId: route.params.id }),
                },
              
               {
                    path: 'employees/:id/show',
                    name: 'users.view',
                    component: () => import('../common/users/ViewUser'),
                    props: route => ({ propUserId: route.params.id }),
                },
                {
                    path: 'visit-requests',
                    name: 'visit_request_estate_list',
                    component: () => import('../estate_owner/tickets/List'),


                },

                {
                    path: 'create-visit-request',
                    name: 'create_visit_estate_request_list',
                    component: () => import('../common/visit-request/Create'),
                },
                {
                    path: 'edit-visit-request/:id',
                    name: 'edit_visit_request_estate_list',
                    component: () => import('../common/visit-request/editVisitRequest'),
                    props: route => ({ propRequestId: route.params.id }),
                },

                {
                    path: 'view_visit_request/:id',
                    name: 'view_visit_request_estate_list',
                    component: () => import('../common/visit-request/view_visit_request'),
                    props: route => ({ propRequestId: route.params.id }),
                },

                {
                    path: 'project-management',
                    name: 'project_management_estate_owner',
                    component: () => import ('../estate_owner/main/components/ProjectManagement'),
                },
                {
                    path: '/tasks',
                    component: () => import('../common/tasks/Tasks'),
                    children: [
                        {
                            path: '/',
                            name: 'tasks.list',
                            component: () => import('../common/tasks/List'),
                        },
                    ],
                },
///////////////////////request design
                {
                    path: 'design-request',
                    name: 'design_request_estate_list',
                    component: () => import('../estate_owner/designRequest/List'),
                    meta: {requiresAuth: true},
                },
{
    path: 'contractor-request',
    name: 'contractor_request_estate_list',
    component: () => import('../estate_owner/contractorRequest/List'),
    meta: {requiresAuth: true},
},
{
    path: 'support-service-request',
    name: 'support-service_estate_list',
    component: () => import('../estate_owner/supportServiceRequest/List'),
    meta: {requiresAuth: true},
},


                {
                    path: 'show-design-price/:id',
                    name: 'show_design_request_price_estate_list',
                    component: () => import('../common/design-request/showDesignRequestReport'),
                    meta: {requiresAuth: true},
                    props: route => ({ design_id: route.params.id }),
                }


            ],
        },

        //end estate owner 
        //contractor
        {
            name: 'dashboard_contractor',
            path: '/en',
            component: ()=>import('../contracing_company/dashboard/Home'),
            meta: {requiresAuth: true},
            children: [
                {
                    path: '/',
                    name: 'dashboard_contractor.list',
                    component: () => import('../contracing_company/dashboard/List'),
                },
                {
                    path: 'to-do-list_contractor',
                    name: 'to-do-list_contractor.list',
                    component: () => import('../contracing_company/main/ToDoList'),
                },
                {
                    path: 'contractor-request',
                    name: 'contractor_request_list',
                    component: () => import('../contracing_company/contractorRequest/List'),
                },
            ]
            },
        //end contractor

          //support service
          {
            name: 'support_service_office',
            path: '/en',
            component: ()=>import('../supportService/dashboard/Home'),
            meta: {requiresAuth: true},
            children: [
                {
                    path: '/',
                    name: 'dashboard_support_service.list',
                    component: () => import('../supportService/dashboard/List'),
                },
                {
                    path: 'to-do-list-support-service',
                    name: 'to-do-list_support_service.list',
                    component: ()=> import('../supportService/main/ToDoList'),
                },
                {
                    path: 'support_service-request',
                    name: 'support_service_request_list',
                    component: () => import('../supportService/supportServiceRequests/List'),
                },
            ]
            },
        ///enginner office
        {
            name: 'dashboard_enginner_office',
            path: '/en',
            component: () => import('../enginnering_office/dashboard/Home'),
            meta: {requiresAuth: true},
            children: [
                {
                    path: '/',
                    name: 'dashboard_enginner_office.list',
                    component: () => import('../enginnering_office/dashboard/List'),
                },
                {
                    path: 'to-do-list',
                    name: 'to-do-list_enginner_office.list',
                    component: () => import('../enginnering_office/main/ToDoList'),
                },


                //employee
                {
                    path: 'AddCustomer/',
                    name: 'customer_office.create',
                    component: () => import('../enginnering_office/users/components/AddCustomer'),
                },
                {
                    path: 'employees',
                    name: 'users_enginner_office.list',
                    component: () => import('../enginnering_office/users/components/UserLists'),
                },
                {
                    path: 'employees/create',
                    name: 'users_enginner_office.create',
                    component: ()=> import('../enginnering_office/users/components/UserFormAdd'),
                },
                {
                    path: 'employees/edit/:id',
                    name: 'users_enginner_office.edit',
                    component: () => import('../enginnering_office/users/components/UserFormEdit'),
                    props: route => ({ propUserId: route.params.id }),
                },
                {
                    path: 'employees/:id/show',
                    name: 'users.view',
                    component: () => import('../common/users/ViewUser'),
                    props: route => ({ propUserId: route.params.id }),
                },
                {
                    path: 'roles',
                    name: 'roles_enginner_office.list',
                    component: () => import('../enginnering_office/users/components/RoleLists'),
                },
                {
                    path: 'roles/create',
                    name: 'roles_enginner_office.create',
                    component: () => import('../enginnering_office/users/components/RoleCreate'),
                },
                {
                    path: 'roles/edit/:id',
                    name: 'roles_enginner_office.edit',
                    component: () =>import('../enginnering_office/users/components/RoleEdit'),
                    props: route => ({ propRoleId: route.params.id }),
                },


                {
                    path: 'visit-requests',
                    name: 'visit_request_enginner_office_list',
                    component: () => import('../enginnering_office/tickets/List'),
                },
                {
                    path: 'create-visit-request',
                    name: 'create_visit_enginner_office_request_list',
                    component: () => import('../enginnering_office/tickets/Create'),
                },
                {
                    path: 'edit-visit-request/:id',
                    name: 'edit_visit_request_enginner_office_list',
                    component: ()=> import('../enginnering_office/tickets/editVisitRequest'),
                    props: route => ({ propRequestId: route.params.id }),
                },
                {
                    path: 'view_visit_request/:id',
                    name: 'view_visit_enginner_office_request_list',
                    component: () => import('../common/tickets/view_visit_request'),
                    meta: {requiresAuth: true},
                    props: route => ({ propRequestId: route.params.id }),
                },
                {
                    path: 'tasks',
                    component: () => import('../enginnering_office/tasks/Tasks'),
                    meta: {requiresAuth: true},
                    children: [
                        {
                            path: '/',
                            name: 'tasks_enginnering_office.list',
                            component: () => import('../enginnering_office/tasks/List'),
                        },
                    ],
                },
                {
                    path: 'project-management',
                    name: 'project_management_enginnering_office',
                    component: () => import('../enginnering_office/main/components/ProjectManagement'),
                },
           
                {
                    path: 'specialties',
                    name: 'specialties.list',
                    component: () => import('../enginnering_office/specialities/List'),

                },
                {
                    path: 'design-request',
                    name: 'design_request_enginnering_office_list',
                    component: () => import('../enginnering_office/designRequest/List'),
                },

                {
                    path: 'create-design-price/:id',
                    name: 'create_design_request_price__enginnering_office',
                    component: () => import('../common/design-request/CreatePriceDesignForENginner'),
                    props: route => ({ design_enginner_id: route.params.id }),
                }
                
            ],
        },
        //end enginner  office 
        {
            path: '/employees',
            component: () => import('./users/Users'),
            children: [
                {
                    path: '/',
                    name: 'users.list',
                    component: () => import('./users/components/UserLists'),
                },
                {
                    path: 'create',
                    name: 'users.create',
                    component: () => import('./users/components/UserFormAdd'),
                },
                {
                    path: 'edit/:id',
                    name: 'users.edit',
                    component: () => import('./users/components/UserFormEdit'),
                    props: route => ({ propUserId: route.params.id }),
                },
                {
                    path: ':id/show',
                    name: 'users.view',
                    component: () => import('../common/users/ViewUser'),
                    props: route => ({ propUserId: route.params.id }),
                },
                {
                    path: '/roles',
                    name: 'roles.list',
                    component: () => import('./users/components/RoleLists'),
                },
                {
                    path: '/roles/create',
                    name: 'roles.create',
                    component: () => import('./users/components/RoleCreate'),
                },
                {
                    path: '/roles/edit/:id',
                    name: 'roles.edit',
                    component: () => import('./users/components/RoleEdit'),
                    props: route => ({ propRoleId: route.params.id }),
                },
                {
                    path: '/visit-requests',
                    name: 'visit_request_estate_list',
                    component: () => import('../estate_owner/tickets/List'),
                },
            ],
        },
        {
            path: '/customers',
            component: () => import('./customers/Customers'),
            children: [
                {
                    path: '/',
                    name: 'customers.list',
                    component: () => import('./customers/components/List'),
                },
                {
                    path: ':id/show',
                    name: 'customers.show',
                    component: () => import('./customers/components/Show'),
                },
                {
                    path: ':id/contacts',
                    name: 'customers.contacts.list',
                    component: () => import('./customers/components/contacts/List'),
                    props: route => ({ propCustomerId: route.params.id }),
                },
                {
                    path: ':id/notes',
                    name: 'customers.notes.list',
                    component: () => import('./customers/components/notes/List'),
                    props: route => ({ propCustomerId: route.params.id }),
                },
            ],
        },
        {
            path: '/requests-creating-projects',
            name: 'requests_creating_projects',
            component: () => import('./main/components/RequestsCreatingProjects'),
        },
        {
            path: '/contractor-request',
            name: 'contractor_request_engineering_list',
            component: () => import('../enginnering_office/contractorRequest/List'),
        },
        {
            path: '/support-service-request',
            name: 'support-service_engineer_list',
            component: () => import('../enginnering_office/supportServiceRequest/List'),
        },
        {
            path: '/reports/:id?',
            name: 'reports_list',
            component: () => import('../common/reports/Lists'),
        },
        {
            path: '/service_type',
            name: 'service_types_list',
            component: () => import('../common/service_type/List'),
        },
        {
            path: '/add_report/:id?/:visit_request_id?',
            name: 'add_report',
            component: ()=>import('../common/reports/Add'),
            props: route => ({ project: route.params.project }),
        },
        {
            path: '/edit_report/:id',
            name: 'edit_report',
            component: () => import('../common/reports/Edit'),
            props: route => ({ report: route.params.report }),
        },

        {
            path: '/project',
            component: () => import('../common/projects/Projects'),
            children: [
                {
                    path: '/',
                    name: 'projects.list',
                    component: () => import('../common/projects/components/List'),
                },
                {
                    path: 'edit/:id',
                    name: 'edit-project',
                    component: () => import('../common/projects/components/Edit_Project'),
                    props: route => ({ propProjectId: route.params.id }),
                },
                {
                    path: 'view/:id',
                    name: 'view_project',
                    component: () =>import('../common/projects/components/view_project'),
                    props: route => ({ propProjectId: route.params.id }),
                },
                {
                    path: 'attachments',
                    name: 'project.attachments',
                    component: () => import('../common/projects/components/Attachments')
                },
                {
                    path: 'project-schedule',
                    name: 'project.schedule',
                    component: () => import('../common/projects/milestones/Lists'),
                },
                {
                    path: '/add-project',
                    name: 'add-project',
                    component: () => import('../common/projects/components/AddProject'),
                },
             
                {
                    path: '/finished-projects',
                    name: 'finished-projects',
                    component: () => import('../common/projects/components/FinishedProjects'),
                },
              
                {
                    path: ':project_id/invoices/:id/edit',
                    name: 'invoices.edit',
                    component: () => import('../common/projects/invoices/Edit'),
                    props: route => ({
                        propInvoiceId: route.params.id,
                        propProjectId: route.params.project_id,
                    }),
                },
            ],
        },
        {
            path: '/settings',
            component: () => import('./settings/Settings'),
            children: [
                {
                    path: '/',
                    name: 'settings.create',
                    component: () => import('./settings/Create'),
                },
            ],
        },

        {
            path: '/backups',
            component: () => import('./backup/Backup'),
            children: [
                {
                    path: '/',
                    name: 'backups.list',
                    component: () => import('./backup/List'),
                },
            ],
        },
        {
            path: '/profiles',
            component: () => import('../common/profile/Profile'),
            meta: {requiresAuth: true},
            children: [
                {
                    path: '/',
                    name: 'profile.list',
                    component: () => import('../common/profile/List'),
                },
                {
                    path: 'edit/:id',
                    name: 'profile.edit',
                    component: () => import('../common/profile/Edit'),
                    props: route => ({ propUserId: route.params.id }),
                },
            ],
        },
        {
            path: '/projects',
            component: ()=>import('./invoices/Invoices'),
            meta: {requiresAuth: true},
            children: [
                {
                    path: '/invoice/:project_id?',
                    name: 'invoices.list',
                    component: () => import('./invoices/List'),
                },
                {
                    path: '/invoices/create',
                    name: 'sales.invoices.create',
                    component: ()=>import('../common/projects/invoices/Add'),
                },
                {
                    path: '/estimates',
                    name: 'estimates.list',
                    component: () => import('./invoices/estimates/List'),
                },
                {
                    path: '/estimates/create',
                    name: 'estimates.create',
                    component: () => import('../common/projects/invoices/Add'),
                },

                {
                    path: '/invoice-scheme',
                    name: 'invoice_scheme.list',
                    component: () => import('../admin/invoice_schemes/List'),
                },
            ],
        },
        {
            path: '/knowledge-base',
            component: () => import('./knowledgebase/KnowledgeBase'),
            meta: {requiresAuth: true},
            children: [
                {
                    path: '/knowledge-base',
                    name: 'Knowledgebase.list',
                    component: () => import('./knowledgebase/List'),
                },
                {
                    path: '/knowledge-base/create',
                    name: 'Knowledgebase.create',
                    component: () => import('./knowledgebase/Create'),
                },
                {
                    path: '/knowledge-base/:id/edit',
                    name: 'Knowledgebase.edit',
                    component: () => import('./knowledgebase/Edit'),
                    props: route => ({ propKnowladgebaseId: route.params.id }),
                },
                {
                    path: '/knowledge-base/:id/view',
                    name: 'Knowledgebase.view',
                    component: () => import('./knowledgebase/View'),
                    props: route => ({ propKnowladgebaseId: route.params.id }),
                },
            ],
        },
        {
            path: '/expenses',
            component: ()=>import('./expenses/Expenses'),
            children: [
                {
                    path: '/expenses',
                    name: 'expenses.list',
                    component: () => import('./expenses/List'),
                },
            ],
        },
        {
            path: '/leaves',
            component: () => import('./leaves/Leaves'),
            children: [
                {
                    path: '/leaves',
                    name: 'leaves.list',
                    component: ()=> import('./leaves/List'),
                },
            ],
        },
        {
            path: '/leads',
            component: () => import('./leads/Leads'),
            children: [
                {
                    path: '/leads',
                    name: 'leads.list',
                    component: () => import('./leads/List'),
                },
                {
                    path: ':id/view',
                    name: 'lead.show',
                    component: () => import('./leads/Tab'),
                },
            ],
        },
        {
            path: '/tickets',
            component: () => import('../common/tickets/Ticket'),
            children: [
                {
                    path: '/tickets',
                    name: 'tickets.list',
                    component: () => import('../common/tickets/List'),
                },
               
            ],
        },
    
        {
            path: '/construction-licenses',
            name: 'constructionlicenses',
            component: () => import('./main/components/StructionLicenses'),
        },
        {
            path: '/survey-decisions',
            name: 'surveydecisions',
            component: () => import('./main/components/SurveyDecisions'),
        },
        {
            path: '/visit-requests',
            name: 'visit_request_list',
            component: () => import('../common/tickets/List'),


        },
        {
            path: '/create-visit-request',
            name: 'create_visit_request_list',
            component: () => import('../common/tickets/Create'),
        },
        {
            path: '/edit-visit-request/:id',
            name: 'edit_visit_request_list',
            component: () => import('../common/tickets/editVisitRequest'),
            props: route => ({ propRequestId: route.params.id }),
        },
        {
            path: '/view_visit_request_list/:id',
            name: 'view_visit_request_list',
            component: () => import('../common/tickets/view_visit_request'),
            props: route => ({ propRequestId: route.params.id }),
        },
        {
            path: '/project-management',
            name: 'project-management',
            component: () => import('./main/components/ProjectManagement'),
            meta: {requiresAuth: true},
        },
        {
            path: '/to-do-list',
            component: () => import('./main/ToDoList'),
            name: 'todolist',
            meta: {requiresAuth: true},
        },
        {
            path: '/new_authorization_requests',
            component: () => import('./main/components/NewAuthorizationRequests'),
            name: 'newAuthorizationRequests'
        },
        {
            path: '/home',
            component: () => import('./main/Home'),
            name: 'home'
        },
        {
            path: '/create-project',
            name: 'create_project',
            component: ()=> import('../common/tickets/CreateProjectRequest1'),
        },
       
        //request role
        {
            path: '/requests-role',
            component: () => import('./requests_role/RequestsRole'),
            meta: {requiresAuth: true},
            children: [
                {
                    path: '/',
                    name: 'requests_role.list',
                    component: () => import('./requests_role/List'),
                },
            ],
        },
         //request role common
         {
            path: '/requests-role-common',
            component: () => import('../common/requests_role/RequestsRole'),
            meta: {requiresAuth: true},
            children: [
                {
                    path: '/',
                    name: 'requests_role_common.list',
                    component: () => import('../common/requests_role/List'),
                },
          
            
            ],
        },
        {
            path: '/archives',
            name: 'archives',
            component: () =>import('../common/archives/ArchivesData'),
        },
    ],
});

const originalPush = Router.prototype.push;
Router.prototype.push = function push(location) {
  return originalPush.call(this, location).catch(err => {
    console.log(location,err.type)
   // if (err.name !== 'NavigationDuplicated') throw err
  });
}
router.beforeEach((to, from, next) => {
   // store.commit('showLoader');
    let user = store.getters['auth/user']
    if (to.path == '/to-do') {
        if ( user.user_type_log == 'ESTATE_OWNER') {
            if (from.path != '/es/to-do-list')
                next('/es/to-do-list')
            else
             window.location.reload()
        }
        else if (user.user_type_log == 'ENGINEERING_OFFICE_MANAGER') {
            if (from.path != '/en/to-do-list')
                next('/en/to-do-list')
            else
               window.location.reload()
               //next('/')
        }
        else if ( user.user_type_log == 'CONTRACTING_COMPANY') {
            if (from.path != '/en/to-do-list_contractor')
                next('/en/to-do-list_contractor')
            else
            window.location.reload()
            //    next('/')
        }
        else if ( user.user_type_log == 'SUPPORT_SERVICES_OFFICE') {
            if (from.path != '/en/to-do-list-support-service')
                next('/en/to-do-list-support-service')
            else
            window.location.reload()
         //       next('/')
        }
        else {
            next('/to-do-list')
        }
    }
    if (localStorage.getItem("currenpathaftercjange") != null) {
        var path = localStorage.getItem("currenpathaftercjange");
        
        localStorage.removeItem("currenpathaftercjange");
      
        next(path)
    }
    else {
        next();
    }


});
router.beforeEach((to, from, next) => {
   if (to.matched.some((record) => record.meta.requiresAuth)) {
      if (store.getters['auth/isAuthenticated']) {
        store.commit('showLoader')
        let user = store.getters['auth/user']
        if (to.path == '/' || to.path == '/dashboard') {
            if ( user.user_type_log == 'ESTATE_OWNER') {
                    next('/es')
                 //   console.log(user.user_type_log)
            }
            else if (user.user_type_log == 'ENGINEERING_OFFICE_MANAGER') {
                    next('/en')
            }
            else if (user.user_type_log == 'CONTRACTING_COMPANY') {
                next('/en')
        }
        else if (user.user_type_log == 'SUPPORT_SERVICES_OFFICE') {
            next('/en')
    }
            else {
                next('/dashboard')
            }
        }

        }
        if (!store.getters['auth/isAuthenticated']) {
            next({ name: 'login' })
          } else {
            next() // go to wherever I'm going
          }
        } 
        else {
          next() // does not require auth, make sure to always call next()!
        }
  });
 /* router.beforeEach((to, from, next) => {
    const loggedIn = localStorage.getItem("auth");
    const isAuth = to.matched.some((record) => record.meta.guest);
    const isHide = to.matched.some((record) => record.meta.requiresAuth);
  
    if (isAuth && !loggedIn) {
      return next({ path: "/login" });
    } else if (isHide && loggedIn) {
      return next({ path: "/" });
    }
    next();
  });
/*router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.guest)) {
      if (store.getters['auth/isAuthenticated']) {
        next("/dashboard");
        return;
      }
      next();
    } else {
      next();
    }
  });*/
router.afterEach((to, from) => {
    localStorage.setItem("currenpath", to.path);
    setTimeout(() => {
        store.commit('hideLoader');
    }, 1000);
});
export default router;
