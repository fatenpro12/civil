import Vue from 'vue';
import Router from 'vue-router';
import store from '../store';
import Home from './dashboard/Home';
import List from './dashboard/List';
import EstateOwnerHome from '../estate_owner/dashboard/Home';
import ContractorHome from '../contracing_company/dashboard/Home'
import SupportServiceHome from '../supportService/dashboard/Home';
import ToDoList from '../estate_owner/main/ToDoList';
import ToDoListContractor from '../contracing_company/main/ToDoList';
import ToDoListSupportService from '../supportService/main/ToDoList';
import UserLists from '../estate_owner/users/components/UserLists';
import UserFormAdd from '../estate_owner/users/components/UserFormAdd';
import EnginneringOfficeHome from '../enginnering_office/dashboard/Home'
import EnginneringOfficeList from '../enginnering_office/dashboard/List'
import EnginneringOfficeToDoList from '../enginnering_office/main/ToDoList'
import AddCustomer from '../enginnering_office/users/components/AddCustomer'
import EnginneringOfficeUserLists from '../enginnering_office/users/components/UserLists'
import EnginneringOfficeUserFormAdd from '../enginnering_office/users/components/UserFormAdd'
import ViewVisitRequest from '../common/visit-request/view_visit_request'
import ProjectManagement from '../estate_owner/main/components/ProjectManagement'
import TasksList from '../common/tasks/List'
import DesignRequestList from '../estate_owner/designRequest/List'
import ContractorRequestList from '../estate_owner/contractorRequest/List';
import ContractorRequestListEng from '../enginnering_office/contractorRequest/List';
import SupportServiceRequestList from '../estate_owner/supportServiceRequest/List'
import SupportServiceRequestListEng from '../enginnering_office/supportServiceRequest/List'
import ContractorRequestListReciving from '../contracing_company/contractorRequest/List';
import SupportServiceRequestListReciving from '../supportService/supportServiceRequests/List';
import ShowDesignRequestReport from '../common/design-request/showDesignRequestReport';
import UserFormEdit from '../estate_owner/users/components/UserFormEdit';
import TicketsList from '../estate_owner/tickets/List';
import TicketsCreate from '../common/visit-request/Create'
import EditVisitRequest from '../common/visit-request/editVisitRequest';
//import EnginneringOfficeProjectList from '../enginnering_office/projects/components/List';
import EnginneringOfficeProjectManagement from '../enginnering_office/main/components/ProjectManagement';
import EnginneringOfficeTasksList from '../enginnering_office/tasks/List';
import EnginneringOfficeTasks from '../enginnering_office/tasks/Tasks';
import EnginneringOfficeViewVisitRequest from '../common/tickets/view_visit_request';
import EnginneringOfficeTicketsCreate from '../enginnering_office/tickets/Create';
import EnginneringOfficeTicketsList from '../enginnering_office/tickets/List';
import EnginneringOfficeRoleEdit from '../enginnering_office/users/components/RoleEdit';
import EnginneringOfficeRoleCreate from '../enginnering_office/users/components/RoleCreate';
import EnginneringOfficeRoleLists from '../enginnering_office/users/components/RoleLists';
import UserView from '../common/users/ViewUser';
import EnginneringOfficeUserFormEdit from '../enginnering_office/users/components/UserFormEdit';
import CommonTasks from '../common/tasks/Tasks'
import EnginneringOfficeDesignRequestList from '../enginnering_office/designRequest/List'
import EnginneringOfficeCreatePriceDesignForENginner from '../common/design-request/CreatePriceDesignForENginner'
import Users_List from './users/components/UserLists'
import Users_FormAdd from './users/components/UserFormAdd'
import Users_FormEdit from './users/components/UserFormEdit'
import RolesList from './users/components/RoleLists'
//import EnginneringOfficeAddProject from '../enginnering_office/projects/components/AddProject'
//import EnginneringOfficeFinishedProjects from '../enginnering_office/projects/components/FinishedProjects'
//import EnginneringOfficeEditProject from '../enginnering_office/projects/components/Edit_Project'
//import EnginneringOfficeViewProject from '../enginnering_office/projects/components/view_project'
import SpecialtiesList from '../enginnering_office/specialities/List'
import Employees from './users/Users'
import Projects from '../common/projects/Projects'
import edit_report from '../common/reports/Edit'
import add_report from '../common/reports/Add'
import reportsList from '../common/reports/Lists'
import ServiceTypes from '../common/service_type/List'
import requestsCreatingProjects from './main/components/RequestsCreatingProjects'
import customersNotesList from './customers/components/notes/List'
import customersContactsList from './customers/components/contacts/List'
import CustomersShow from './customers/components/Show'
import CustomersList from './customers/components/List'
import Customers from './customers/Customers'
import EstateOwnerTicketsList from '../estate_owner/tickets/List'
import RoleEdit from './users/components/RoleEdit'
import RolesCreate from './users/components/RoleCreate'
import add_project from '../common/projects/components/AddProject'
import finished_projects from '../common/projects/components/FinishedProjects'
import projectSchedule from '../common/projects/milestones/Lists'
import projectAttachments from '../common/projects/components/Attachments'//'../common/projects/notes/Lists'
import view_project from '../common/projects/components/view_project'
import editProject from '../common/projects/components/Edit_Project'
import projectsList from '../common/projects/components/List'
import backups from './backup/Backup'
import backupsList from './backup/List'
import schedule from '../common/projects/components/schedule'
import invoices_edit from '../common/projects/invoices/Edit'
import settings from './settings/Settings'
import settings_create from './settings/Create'
import profiles from '../common/profile/Profile'
import profileList from '../common/profile/List'
import profileEdit from '../common/profile/Edit'
import Invoices from './invoices/Invoices'
import invoices_list from './invoices/List'
import salesInvoicesCreate from '../common/projects/invoices/Add'
import estimatesList from './invoices/estimates/List'
import estimatesCreate from '../common/projects/invoices/Add'
import invoiceSchemeList from '../admin/invoice_schemes/List'
import leadShow from './leads/Tab'
import leadsList from './leads/List'
import leads from './leads/Leads'
import expensesList from './expenses/List'
import expenses from './expenses/Expenses'
import knowledge_base from './knowledgebase/KnowledgeBase'
import KnowledgebaseList from './knowledgebase/List'
import KnowledgebaseCreate from './knowledgebase/Create'
import KnowledgebaseEdit from './knowledgebase/Edit'
import KnowledgebaseView from './knowledgebase/View'
import leaves from './leaves/Leaves'
import leavesList from './leaves/List'
import tickets from '../common/tickets/Ticket'
import tickets_list from '../common/tickets/List'
import edit_visit_request_list from '../common/tickets/editVisitRequest'
import constructionlicenses from './main/components/StructionLicenses'
import general_information from './main/components/GeneralInformation'
import offices_types from './main/components/OfficesTypes'
import create_visit_request_list from '../common/tickets/Create'
import view_visit_request_list from '../common/tickets/view_visit_request'
import home from  './main/Home'
import newAuthorizationRequests from './main/components/NewAuthorizationRequests'
import todolist from './main/ToDoList'
import project_management from './main/components/ProjectManagement'
import visit_request_list from '../common/tickets/List'
import surveydecisions from './main/components/SurveyDecisions'
import requests_role_view from './requests_role/View'
import create_project from '../common/tickets/CreateProjectRequest1'
//import create_project2 from './main/components/superadmin/CreateProject'
import requestsRole from './requests_role/RequestsRole'
import requestsRoleCommon from '../common/requests_role/RequestsRole'
import requests_role_list from './requests_role/List'
import requests_role_list_common from '../common/requests_role/List'
import EstateOwnerList from '../estate_owner/dashboard/List'
import SupportServiceList from '../supportService/dashboard/List'
import ContractingCompanyList from '../contracing_company/dashboard/List'
import EnginneringOfficeEditVisitRequest from '../enginnering_office/tickets/editVisitRequest'
import Archives from '../common/archives/ArchivesData'
//import { createRouter, createWebHistory } from 'vue-router'
Vue.use(Router);

const router = new Router({
    //mode: 'history',
    //hash: false,
    routes: [
        {
            path: '/',
            redirect:  APP.USER_TYPE_LOG == 'ESTATE_OWNER' ? '/es' :
             APP.USER_TYPE_LOG == 'ENGINEERING_OFFICE_MANAGER' ? '/en' : 
             APP.USER_TYPE_LOG == 'CONTRACTING_COMPANY' ? '/en' : 
             APP.USER_TYPE_LOG == 'SUPPORT_SERVICES_OFFICE' ? '/en' : 
             '/dashboard',
        },
        {
            path: '/to-do"',
            
            // redirect: APP.USER_TYPE_LOG=='ESTATE_OWNER' ?  '/es/to-do-list' :'/to-do-list',
        },
        {
            name: 'dashboard',
            path: '/dashboard',
            component: Home,
            children: [
                {
                    path: '/',
                    name: 'dashboard.list',
                    component: List,
                },
                ,
            ],
        },


        //estate owner 
        {
            name: 'dashboard_estate',
            path: '/es',
            component: EstateOwnerHome,
            children: [
                {
                    path: '/',
                    name: 'dashboard_estate.list',
                    component: EstateOwnerList,
                },
                {
                    path: 'to-do-list',
                    name: 'to-do-list_estate.list',
                    component: ToDoList,
                    name: 'todolistEstate'
                },


                //employee

                {
                    path: 'employees',
                    name: 'users_estate.list',
                    component: UserLists,
                },
                {
                    path: 'employees/create',
                    name: 'users_estate.create',
                    component: UserFormAdd,
                },
                {
                    path: 'employees/edit/:id',
                    name: 'users_estate.edit',
                    component: UserFormEdit,
                    props: route => ({ propUserId: route.params.id }),
                },
              
               {
                    path: 'employees/:id/show',
                    name: 'users.view',
                    component: UserView,
                    props: route => ({ propUserId: route.params.id }),
                },
                {
                    path: 'visit-requests',
                    name: 'visit_request_estate_list',
                    component: TicketsList,


                },

                {
                    path: 'create-visit-request',
                    name: 'create_visit_estate_request_list',
                    component: TicketsCreate,
                },
                {
                    path: 'edit-visit-request/:id',
                    name: 'edit_visit_request_estate_list',
                    component: EditVisitRequest,
                    props: route => ({ propRequestId: route.params.id }),
                },

                {
                    path: 'view_visit_request/:id',
                    name: 'view_visit_request_estate_list',
                    component: ViewVisitRequest,
                    props: route => ({ propRequestId: route.params.id }),
                },

                {
                    path: 'project-management',
                    name: 'project_management_estate_owner',
                    component: ProjectManagement,
                },
                {
                    path: '/tasks',
                    component: CommonTasks,
                    children: [
                        {
                            path: '/',
                            name: 'tasks.list',
                            component: TasksList,
                        },
                    ],
                },
///////////////////////request design
                {
                    path: 'design-request',
                    name: 'design_request_estate_list',
                    component: DesignRequestList,
                },
{
    path: 'contractor-request',
    name: 'contractor_request_estate_list',
    component: ContractorRequestList,
},
{
    path: 'support-service-request',
    name: 'support-service_estate_list',
    component: SupportServiceRequestList,
},


                {
                    path: 'show-design-price/:id',
                    name: 'show_design_request_price_estate_list',
                    component: ShowDesignRequestReport,
                    props: route => ({ design_id: route.params.id }),
                }


            ],
        },

        //end estate owner 
        //contractor
        {
            name: 'dashboard_contractor',
            path: '/en',
            component: ContractorHome,
            children: [
                {
                    path: '/',
                    name: 'dashboard_contractor.list',
                    component: ContractingCompanyList,
                },
                {
                    path: 'to-do-list_contractor',
                    name: 'to-do-list_contractor.list',
                    component: ToDoListContractor,
                    name: 'toDoListContractor'
                },
                {
                    path: 'contractor-request',
                    name: 'contractor_request_list',
                    component: ContractorRequestListReciving,
                },
            ]
            },
        //end contractor

          //support service
          {
            name: 'support_service_office',
            path: '/en',
            component: SupportServiceHome,
            children: [
                {
                    path: '/',
                    name: 'dashboard_support_service.list',
                    component: SupportServiceList,
                },
                {
                    path: 'to-do-list-support-service',
                    name: 'to-do-list_support_service.list',
                    component: ToDoListSupportService,
                    name: 'toDoListSupportService'
                },
                {
                    path: 'support_service-request',
                    name: 'support_service_request_list',
                    component: SupportServiceRequestListReciving,
                },
            ]
            },
        ///enginner office
        {
            name: 'dashboard_enginner_office',
            path: '/en',
            component: EnginneringOfficeHome,
            children: [
                {
                    path: '/',
                    name: 'dashboard_enginner_office.list',
                    component: EnginneringOfficeList,
                },
                {
                    path: 'to-do-list',
                    name: 'to-do-list_enginner_office.list',
                    component: EnginneringOfficeToDoList,
                    name: 'enginneringOfficeToDoList'
                },


                //employee
                {
                    path: 'AddCustomer/',
                    name: 'customer_office.create',
                    component: AddCustomer,
                },
                {
                    path: 'employees',
                    name: 'users_enginner_office.list',
                    component: EnginneringOfficeUserLists,
                },
                {
                    path: 'employees/create',
                    name: 'users_enginner_office.create',
                    component: EnginneringOfficeUserFormAdd,
                },
                {
                    path: 'employees/edit/:id',
                    name: 'users_enginner_office.edit',
                    component: EnginneringOfficeUserFormEdit,
                    props: route => ({ propUserId: route.params.id }),
                },
                {
                    path: 'employees/:id/show',
                    name: 'users.view',
                    component: UserView,
                    props: route => ({ propUserId: route.params.id }),
                },
                {
                    path: 'roles',
                    name: 'roles_enginner_office.list',
                    component: EnginneringOfficeRoleLists,
                },
                {
                    path: 'roles/create',
                    name: 'roles_enginner_office.create',
                    component: EnginneringOfficeRoleCreate,
                },
                {
                    path: 'roles/edit/:id',
                    name: 'roles_enginner_office.edit',
                    component: EnginneringOfficeRoleEdit,
                    props: route => ({ propRoleId: route.params.id }),
                },


                {
                    path: 'visit-requests',
                    name: 'visit_request_enginner_office_list',
                    component: EnginneringOfficeTicketsList,
                },
                {
                    path: 'create-visit-request',
                    name: 'create_visit_enginner_office_request_list',
                    component: EnginneringOfficeTicketsCreate,
                },
                {
                    path: 'edit-visit-request/:id',
                    name: 'edit_visit_request_enginner_office_list',
                    component: EnginneringOfficeEditVisitRequest,
                    props: route => ({ propRequestId: route.params.id }),
                },
                {
                    path: 'view_visit_request/:id',
                    name: 'view_visit_enginner_office_request_list',
                    component: EnginneringOfficeViewVisitRequest,
                    props: route => ({ propRequestId: route.params.id }),
                },
                {
                    path: 'tasks',
                    component: EnginneringOfficeTasks,
                    children: [
                        {
                            path: '/',
                            name: 'tasks_enginnering_office.list',
                            component: EnginneringOfficeTasksList,
                        },
                    ],
                },
                {
                    path: 'project-management',
                    name: 'project_management_enginnering_office',
                    component: EnginneringOfficeProjectManagement,
                },
                ////////////////////////projects
               /* {
                    path: 'projects',
                    name: 'projects_enginnering_office.list',
                    component: EnginneringOfficeProjectList //EnginneringOfficeProjectList,
                },*/
               /* {
                    path: 'addProject',
                    name: 'add_project_enginnering_office',//AddProject
                    component: EnginneringOfficeAddProject,
                },
                /*{
                    path: 'finished-projects',
                    name: 'finished_projects_enginnering_office',
                    component: EnginneringOfficeFinishedProjects,
                },*/
               /* {
                    path: 'edit/:id',
                    name: 'edit_project_enginnering_office',
                    component: EnginneringOfficeEditProject,
                    props: route => ({ propProjectId: route.params.id }),
                },
              /*  {
                    path: 'view/:id',
                    name: 'view_project_enginnering_office',
                    component: EnginneringOfficeViewProject,
                    props: route => ({ propProjectId: route.params.id }),
                },*/
                {
                    path: 'specialties',
                    name: 'specialties.list',
                    component: SpecialtiesList,

                },
                {
                    path: 'design-request',
                    name: 'design_request_enginnering_office_list',
                    component: EnginneringOfficeDesignRequestList,
                },

                {
                    path: 'create-design-price/:id',
                    name: 'create_design_request_price__enginnering_office',
                    component: EnginneringOfficeCreatePriceDesignForENginner,
                    props: route => ({ design_enginner_id: route.params.id }),
                }
                
            ],
        },
        //end enginner  office 
        {
            path: '/employees',
            component: Employees,
            children: [
                {
                    path: '/',
                    name: 'users.list',
                    component: Users_List,
                },
                {
                    path: 'create',
                    name: 'users.create',
                    component: Users_FormAdd,
                },
                {
                    path: 'edit/:id',
                    name: 'users.edit',
                    component: Users_FormEdit,
                    props: route => ({ propUserId: route.params.id }),
                },
                {
                    path: ':id/show',
                    name: 'users.view',
                    component: UserView,
                    props: route => ({ propUserId: route.params.id }),
                },
                {
                    path: '/roles',
                    name: 'roles.list',
                    component: RolesList,
                },
                {
                    path: '/roles/create',
                    name: 'roles.create',
                    component: RolesCreate,
                },
                {
                    path: '/roles/edit/:id',
                    name: 'roles.edit',
                    component: RoleEdit,
                    props: route => ({ propRoleId: route.params.id }),
                },
                {
                    path: '/visit-requests',
                    name: 'visit_request_estate_list',
                    component: EstateOwnerTicketsList,
                },
            ],
        },
        {
            path: '/customers',
            component: Customers,
            children: [
                {
                    path: '/',
                    name: 'customers.list',
                    component: CustomersList,
                },
                {
                    path: ':id/show',
                    name: 'customers.show',
                    component: CustomersShow,
                },
                {
                    path: ':id/contacts',
                    name: 'customers.contacts.list',
                    component: customersContactsList,
                    props: route => ({ propCustomerId: route.params.id }),
                },
                {
                    path: ':id/notes',
                    name: 'customers.notes.list',
                    component: customersNotesList,
                    props: route => ({ propCustomerId: route.params.id }),
                },
            ],
        },
        {
            path: '/requests-creating-projects',
            name: 'requests_creating_projects',
            component: requestsCreatingProjects,
        },
        {
            path: '/contractor-request',
            name: 'contractor_request_engineering_list',
            component: ContractorRequestListEng,
        },
        {
            path: '/support-service-request',
            name: 'support-service_engineer_list',
            component: SupportServiceRequestListEng,
        },
        {
            path: '/reports/:id?',
            name: 'reports_list',
            component: reportsList,
        },
        {
            path: '/service_type',
            name: 'service_types_list',
            component: ServiceTypes,
        },
        {
            path: '/add_report/:id?/:visit_request_id?',
            name: 'add_report',
            component: add_report,
            props: route => ({ project: route.params.project }),
        },
        {
            path: '/edit_report/:id',
            name: 'edit_report',
            component: edit_report,
            props: route => ({ report: route.params.report }),
        },

        {
            path: '/project',
            component: Projects,
            children: [
                {
                    path: '/',
                    name: 'projects.list',
                    component: projectsList,
                },
                {
                    path: 'edit/:id',
                    name: 'edit-project',
                    component: editProject,
                    props: route => ({ propProjectId: route.params.id }),
                },
                {
                    path: 'view/:id',
                    name: 'view_project',
                    component: view_project,
                    props: route => ({ propProjectId: route.params.id }),
                },
                {
                    path: 'attachments',
                    name: 'project.attachments',
                    component: projectAttachments
                },
                {
                    path: 'project-schedule',
                    name: 'project.schedule',
                    component: projectSchedule,
                },
                {
                    path: '/add-project',
                    name: 'add-project',//AddProject
                    component: add_project,
                },
                // {
                //     path: '/edit-project',
                //     name: 'edit-project',
                //     component: ('../common/projects/components/Edit_Project'),
                // },
                // {
                //     path: '/edit-project',
                //     name: 'edit-project',
                //     component: ('../common/projects/components/editPrjectRequest'),
                // },
                {
                    path: '/finished-projects',
                    name: 'finished-projects',
                    component: finished_projects,
                },
                {
                    path: '/schedule',
                    name: 'schedule',
                    component: schedule,
                },
                {
                    path: ':project_id/invoices/:id/edit',
                    name: 'invoices.edit',
                    component: invoices_edit,
                    props: route => ({
                        propInvoiceId: route.params.id,
                        propProjectId: route.params.project_id,
                    }),
                },
            ],
        },
        {
            path: '/settings',
            component: settings,
            children: [
                {
                    path: '/',
                    name: 'settings.create',
                    component: settings_create,
                },
            ],
        },

        {
            path: '/backups',
            component: backups,
            children: [
                {
                    path: '/',
                    name: 'backups.list',
                    component: backupsList,
                },
            ],
        },
        {
            path: '/profiles',
            component: profiles,
            children: [
                {
                    path: '/',
                    name: 'profile.list',
                    component: profileList,
                },
                {
                    path: 'edit/:id',
                    name: 'profile.edit',
                    component: profileEdit,
                    props: route => ({ propUserId: route.params.id }),
                },
            ],
        },
        {
            path: '/projects',
            component: Invoices,
            children: [
                {
                    path: '/invoice/:project_id?',
                    name: 'invoices.list',
                    component: invoices_list,
                },
                {
                    path: '/invoices/create',
                    name: 'sales.invoices.create',
                    component:salesInvoicesCreate,
                },
                {
                    path: '/estimates',
                    name: 'estimates.list',
                    component: estimatesList,
                },
                {
                    path: '/estimates/create',
                    name: 'estimates.create',
                    component: estimatesCreate,
                },

                {
                    path: '/invoice-scheme',
                    name: 'invoice_scheme.list',
                    component: invoiceSchemeList,
                },
            ],
        },
        {
            path: '/knowledge-base',
            component: knowledge_base,
            children: [
                {
                    path: '/knowledge-base',
                    name: 'Knowledgebase.list',
                    component: KnowledgebaseList,
                },
                {
                    path: '/knowledge-base/create',
                    name: 'Knowledgebase.create',
                    component: KnowledgebaseCreate,
                },
                {
                    path: '/knowledge-base/:id/edit',
                    name: 'Knowledgebase.edit',
                    component: KnowledgebaseEdit,
                    props: route => ({ propKnowladgebaseId: route.params.id }),
                },
                {
                    path: '/knowledge-base/:id/view',
                    name: 'Knowledgebase.view',
                    component: KnowledgebaseView,
                    props: route => ({ propKnowladgebaseId: route.params.id }),
                },
            ],
        },
        {
            path: '/expenses',
            component: expenses,
            children: [
                {
                    path: '/expenses',
                    name: 'expenses.list',
                    component: expensesList,
                },
            ],
        },
        {
            path: '/leaves',
            component: leaves,
            children: [
                {
                    path: '/leaves',
                    name: 'leaves.list',
                    component: leavesList,
                },
            ],
        },
        {
            path: '/leads',
            component: leads,
            children: [
                {
                    path: '/leads',
                    name: 'leads.list',
                    component: leadsList,
                },
                {
                    path: ':id/view',
                    name: 'lead.show',
                    component: leadShow,
                },
            ],
        },
        {
            path: '/tickets',
            component: tickets,
            children: [
                {
                    path: '/tickets',
                    name: 'tickets.list',
                    component: tickets_list,
                },
                // {
                //     path: ':id/show',
                //     name: 'tickets.view',
                //     component: ('../common/tickets/View'),
                //     props: route => ({ propTicketId: route.params.id }),
                // },
            ],
        },
        {
            path: '/offices_types',
            name: 'offices_types',
            component: offices_types,
        },
        {
            path: '/general_information',
            name: 'general_information     ',
            component: general_information,
        },
        {
            path: '/construction-licenses',
            name: 'constructionlicenses',
            component: constructionlicenses,
        },
        {
            path: '/survey-decisions',
            name: 'surveydecisions',
            component: surveydecisions,
        },
        {
            path: '/visit-requests',
            name: 'visit_request_list',
            component: visit_request_list,


        },
        {
            path: '/create-visit-request',
            name: 'create_visit_request_list',
            component: create_visit_request_list,
        },
        {
            path: '/edit-visit-request/:id',
            name: 'edit_visit_request_list',
            component: edit_visit_request_list,
            props: route => ({ propRequestId: route.params.id }),
        },
        {
            path: '/view_visit_request_list/:id',
            name: 'view_visit_request_list',
            component: view_visit_request_list,
            props: route => ({ propRequestId: route.params.id }),
        },
        {
            path: '/project-management',
            name: 'project-management',
            component: project_management,
        },
        {
            path: '/to-do-list',
            component: todolist,
            name: 'todolist'
        },
        {
            path: '/new_authorization_requests',
            component: newAuthorizationRequests,
            name: 'newAuthorizationRequests'
        },
        {
            path: '/home',
            component: home,
            name: 'home'
        },
        {
            path: '/create-project',
            name: 'create_project',
            component: create_project,
        },
        /*{
            path: '/test',
            name: 'create_project',
            component: create_project2,
        },*/
        //request role
        {
            path: '/requests-role',
            component: requestsRole,
            children: [
                {
                    path: '/',
                    name: 'requests_role.list',
                    component: requests_role_list,
                },
          
                {
                    path: 'view/:id',
                    name: 'requests_role.view',
                    component:  requests_role_view,
                }
            ],
        },
         //request role common
         {
            path: '/requests-role-common',
            component: requestsRoleCommon,
            children: [
                {
                    path: '/',
                    name: 'requests_role_common.list',
                    component: requests_role_list_common,
                },
          
                {
                    path: 'view/:id',
                    name: 'requests_role.view',
                    component:  requests_role_view,
                }
            ],
        },
        {
            path: '/archives',
            name: 'archives',
            component: Archives,
        },
    ],
});


router.beforeEach((to, from, next) => {
    store.commit('showLoader');
    if (to.path == '/to-do') {
        //  alert(to.path)
        if ( APP.USER_TYPE_LOG == 'ESTATE_OWNER') {
            if (from.path != '/es/to-do-list')
                next('/es/to-do-list')
            else
             window.location.reload()
        }
        else if (APP.USER_TYPE_LOG == 'ENGINEERING_OFFICE_MANAGER') {
            if (from.path != '/en/to-do-list')
                next('/en/to-do-list')
            else
               window.location.reload()
               //next('/')
        }
        else if ( APP.USER_TYPE_LOG == 'CONTRACTING_COMPANY') {
            if (from.path != '/en/to-do-list_contractor')
                next('/en/to-do-list_contractor')
            else
            window.location.reload()
            //    next('/')
        }
        else if ( APP.USER_TYPE_LOG == 'SUPPORT_SERVICES_OFFICE') {
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

router.afterEach((to, from) => {
    //   alert(JSON.stringify(to.path))
    localStorage.setItem("currenpath", to.path);
    setTimeout(() => {
        store.commit('hideLoader');
    }, 1000);
});
export default router;
