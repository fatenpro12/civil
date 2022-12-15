
<!-- For customer -->
<template>
    <v-container grid-list-md :class="$vuetify.breakpoint.xsOnly?'':''">
        <AcceptEnginneringOfficeModal
            ref="acceptenginneringoffice"
            @next="getAllProjectRequest($event)"
        />
        <AcceptingEnginnerModal ref="acceptenginner" @next="getAllProjectRequest($event)" />
<ViewVisitRequest ref="viewVisitRequest"></ViewVisitRequest>
        <v-card class="mt-3">
            <v-card-title primary-title xs8 sm8>
                <div>
                    <div class="headline">
                        {{ trans('data.visit_requests') }}
                    </div>
                </div>
                <v-spacer></v-spacer>
                <v-btn
                    style="background-color: #06706d; color: white"
                    v-if="$can('tickets.create')"
                    class="lighten-1"
                    :disabled="!checkActive()"
                    @click="
                        $router.push({
                            name: 'create_visit_enginner_office_request_list',
                            params: { request_type: 'visit_request' },
                        })
                    "
                >
                    {{ trans('messages.add') }}
                    <v-icon right dark>add</v-icon>
                </v-btn>
            </v-card-title>
            <v-divider></v-divider>
            <v-data-table
                :headers="headers"
                :pagination.sync="pagination"
                :total-items="total_items"
                :loading="loading"
                :items="projects"
                class="elevation-3"
            >
                <template slot="items" slot-scope="props">
                    <td>
                        <div style="display: inline-flex; padding-left: 30%" align="center">
                            <v-btn small fab dark color="success" @click="viewRequest(props.item)">
                                <v-icon color="white">info</v-icon>
                            </v-btn>

                            <!-- v-if="$can('superadmin')" -->
                            <div>
                                <v-btn
                                    color="primary"
                                    small
                                    fab
                                    v-if="props.item.status == 'sent'"
                                    :disabled="!checkActive()"
                                    @click="acceptProject(props.item)"
                                >
                                    <v-icon color="white">check</v-icon>
                                    <!--{{trans('data.accept')}}-->
                                </v-btn>
                            </div>
                            <div>
                                <v-btn
                                    color="primary"
                                    small
                                    fab
                                    v-if="
                                        props.item.request_enginners != undefined
                                            ? props.item.request_enginners.filter(
                                                  (x) =>
                                                      x.user_id == currentUser && x.is_cheaked == 0
                                              ).length > 0
                                            : false
                                    "
                                    :disabled="!checkActive()"
                                    @click="acceptRequestByEnginner(props.item)"
                                >
                                    <v-icon color="white">check</v-icon>
                                    <!--{{trans('data.accept')}}-->
                                </v-btn>
                            </div>

                            <!-- v-if="!$can('superadmin')" -->

                            <v-btn
                                color="error"
                                v-if="props.item.status == 'sent'"
                                small
                                fab
                                :disabled="!checkActive()"
                                @click="rejectProject(props.item.id)"
                            >
                                <v-icon color="white">cancel</v-icon>
                                <!-- {{trans('messages.cancel')}}-->
                            </v-btn>

                            <v-btn
                                color="primary"
                                v-if="
                                    props.item.request_enginners != undefined
                                        ? props.item.request_enginners.filter(
                                              (x) => x.user_id == currentUser && x.is_cheaked == 1
                                          ).length > 0
                                        : false
                                "
                                small
                                fab
                                :disabled="!checkActive()"
                                @click="createReport(props.item)"
                            >
                                <v-icon color="white"> list </v-icon>
                                <!-- {{trans('messages.cancel')}}-->
                            </v-btn>
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            {{ props.item.id }}
                        </div>
                    </td>

                    <!-- <td>
                        <div align="center">
                            {{
                                props.item.is_cheaked != undefined
                                    ? props.item.is_cheaked
                                    : 'undefined'
                            }}
                        </div>
                    </td> -->
                    <td>
                        <div align="center">
                            <v-chip
                                class="ma-2"
                                v-if="props.item.status != ''"
                                :color="getColor(props.item.status)"
                                text-color="white"
                            >
                                {{
                                    props.item.office_id == currentUser
                                        ? props.item.office_status
                                        : props.item.status
                                }}
                            </v-chip>
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            {{ props.item.customer }}
                        </div>
                    </td>
                

                    <td>
                        <div align="center">
                            <v-btn
                                small
                                v-if="true"
                                fab
                                dark
                                color="teal"
                                @click="viewProject(props.item.projectId)"
                            >
                                {{ props.item.projectName }}

                                <!-- {{trans('messages.add')}}-->
                            </v-btn>
                            <span v-else> {{ props.item.projectName }}</span>
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            {{
                                props.item.specialties != null
                                    ? props.item.specialties.map((x) => x.name).join(',')
                                    : ''
                            }}
                        </div>
                    </td>

                    <td>
                        <div align="center">
                            {{ props.item.created_at ? createdDate(props.item.created_at) : '-' }}
                        </div>
                    </td>
                </template>
            </v-data-table>
        </v-card>
        <br />
        <div align="center">
            <v-btn style="background-color: #06706d; color: white" @click="$router.go(-1)">
                {{ trans('messages.back') }}
            </v-btn>
        </div>
        <br />
    </v-container>
</template>
<script>
import AcceptEnginneringOfficeModal from './AcceptEnginneringOfficeModal.vue';
import AcceptingEnginnerModal from './AcceptingEnginnerModal.vue';
import ViewVisitRequest from './view_visit_request';
export default {
    components: {
        AcceptEnginneringOfficeModal: AcceptEnginneringOfficeModal,
        AcceptingEnginnerModal: AcceptingEnginnerModal,
        ViewVisitRequest
    },
    props: {
        id: {
            required: false,
        },
    },
    data() {
        const self = this;
        return {
            currentUser: '',
            projects: [],
            total_items: 0,
            loading: false,
            pagination: { totalItems: 0 },
            enginnering_types: [],
            projectRequests: [],
            request_types: [],
            headers: [
                {
                    text: self.trans('messages.action'),
                    value: false,
                    align: 'center',
                    sortable: false,
                },
                {
                    text: self.trans('data.id'),
                    value: false,
                    align: 'center',
                    sortable: true,
                },
                {
                    text: self.trans('messages.status'),
                    value: 'status',
                    align: 'center',
                    sortable: true,
                },
                {
                    text: self.trans('messages.customer'),
                    value: 'customer',
                    align: 'center',
                    sortable: true,
                },
           
                {
                    text: self.trans('data.project_name'),
                    value: 'project_name',
                    align: 'center',
                    sortable: true,
                },
                {
                    text: self.trans('data.enginnering_type'),
                    value: 'enginnering_type',
                    align: 'center',
                    sortable: true,
                },

                {
                    text: self.trans('messages.created_at'),
                    value: 'created_at',
                    align: 'center',
                    sortable: true,
                },
            ],
            customername: '',
            items: [],
            employees: [],
            ticket_types: [],
            statuses: [],
            filters: [],
            customers: [],
            priorities: [],
            tabs: 'tab-1',
            ticket_stats: [],
            type: '',
            project_name: '',
        };
    },
    watch: {
        pagination: {
            handler() {
                // this.getTicketFromApi();
                //  this.getAllProjectRequest();
            },
        },
    },
    mounted() {
        const self = this;
        self.getCurrentUser();
    
        self.$eventBus.$on('updateTicketsTable', (data) => {
            self.projectRequest = [];
            self.projects = [];
            self.getAllProjectRequest();
        });
    },
    beforeDestroy() {
        const self = this;
        self.$eventBus.$off('updateTicketsTable');
    },
    created() {
        const self = this;
        self.projectRequests = [];
        self.projects = [];
        self.getRequestTypes();
        this.getAllProjectRequest();
    },
    methods: {

        getRequestTypes() {
            const self = this;
            axios
                .get('/get-request-types')
                .then(function (response) {
                    self.request_types = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        sendRequest(request) {
            const self = this;
            self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                okCb: () => {
                    axios
                        .post('confirm-send', { request_id: request.id })
                        .then(function (response) {
                            self.projectRequest = [];
                            self.projects = [];
                            self.$store.commit('showSnackbar', {
                                message: response.data.data,
                                color: 'green',
                            });
                            self.getAllProjectRequest();
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                cancelCb: () => {
                    console.log('CANCEL');
                },
            });
        },
        editRequest(request) {
            this.$router.push({
                name: 'edit_visit_request_enginner_office_list',
                params: { id: request.id },
            });
        },
        viewRequest(request) {
          /*  this.$router.push({
                name: 'view_visit_enginner_office_request_list',
                params: { id: request.id },
            });*/
             this.$refs.viewVisitRequest.create(request.id)
        },

        getType(visit) {
            const self = this;
            return self.request_types.find((o) => o.key == visit).value;
        },
        getProject(project_id) {
            const self = this;
            axios
                .get('/get-project/' + project_id)
                .then(function (response) {
                    self.project_name = response.data.name;
                    console.log(self.project_name);
                })
                .catch(function (error) {
                    // self.project_name= '-';
                });
            return self.project_name;
        },
        getVisitRequestType(id) {
            const self = this;
            axios
                .get('/visit-request-type/' + id)
                .then(function (response) {
                    self.type = response.data.data;
                })
                .catch(function (error) {
                    self.type = '-';
                });
            return self.type;
        },
  
        rejectProject(request_id) {
            const self = this;
            self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                message: self.trans('messages.you_cant_restore_it'),
                okCb: () => {
                    axios
                        .post('/enginner_office/request-cancel', { request_id: request_id })
                        .then(function (response) {
                            if (!response.data.error_code) {
                                self.$store.commit('showSnackbar', {
                                    message: response.data.data,
                                    color: 'green',
                                });

                                self.projectRequest = [];
                                self.projects = [];
                                self.getAllProjectRequest();
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                cancelCb: () => {
                    console.log('CANCEL');
                },
            });
        },
        acceptRequestByEnginner(item) {
            const self = this;
            self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                message: self.trans('messages.are_you_sure'),
                okCb: () => {
                    self.$refs.acceptenginner.create(item);
                },
                cancelCb: () => {
                    console.log('CANCEL');
                },
            });
        },
        acceptProject(item) {
            const self = this;
            self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                message: self.trans('messages.are_you_sure'),
                okCb: () => {
              
                    let data = {
                        status: item.status,
                        id: item.id,
                        project: item.project,
                        office_id: item.offices[0].id
                    };
                    self.$refs.acceptenginneringoffice.fillData(data);
                },
                cancelCb: () => {
                    console.log('CANCEL');
                },
            });
        },

        getCustomer(id) {
            const self = this;
            axios
                .get('/get-Customer-name/' + id)
                .then(function (response) {
                    self.customername = response.data.data;
                })
                .catch(function (error) {
                    self.customername = '-';
                });
            return self.customername;
        },
        getAllProjectRequest() {
            const self = this;
            self.loading = true;
                 let params = {};
            params['projectId'] = self.id;
         
            axios
                .get('enginner_office/get-office-requests', { params: params })
                .then(function (response) {
                 //   self.total_items = response.data.data.length;
                    //   self.projectRequests = response.data.data;
                    self.projects = response.data;
                    self.loading = false;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        removeVisitRequest(id) {},
        getTicketFromApi() {
            const self = this;
            self.loading = true;
            const { sortBy, descending, page, rowsPerPage } = self.pagination;
            var params = {
                sort_by: sortBy,
                descending: descending,
                page: page,
                rowsPerPage: rowsPerPage,
            };

            if (self.filters.assigned_to) {
                params['assigned_to'] = self.filters.assigned_to;
            }

            if (self.filters.category_id) {
                params['category_id'] = self.filters.category_id;
            }

            if (self.filters.priority) {
                params['priority'] = self.filters.priority;
            }

            if (self.filters.status) {
                params['status'] = self.filters.status;
            }

            if (self.filters.customer_id) {
                params['customer_id'] = self.filters.customer_id;
            }

            axios
                .get('/tickets', {
                    params: params,
                })
                .then(function (response) {
                    self.total_items = response.data.total;
                    self.items = response.data.data;
                    self.loading = false;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        deleteTicket(ticket) {
            const self = this;
            self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                message: self.trans('messages.you_cant_restore_it'),
                okCb: () => {
                    axios
                        .delete('/tickets/' + ticket.id)
                        .then(function (response) {
                            self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });
                            if (response.data.success === true) {
                                //   self.getTicketFromApi();
                                // self.getStatistics();
                                //self.getFilters();
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                cancelCb: () => {
                    console.log('CANCEL');
                },
            });
        },

        getCurrentUser() {
            const self = this;
            axios.get('/get-current-user', {}).then(function (response) {
                if (!response.data.error_code) {
                    self.currentUser = response.data.data.original.id;
                } else {
                    self.$store.commit('hideLoader');
                    self.$store.commit('showSnackbar', {
                        message: response.data.error_description,
                        color: 'red',
                    });
                }
            });
        },

        createReport(item) {
            const self = this;
            if(!item.report)
            self.$router.push({
                name: 'add_report',
                params: {
                    id: item.projectId,
                    visit_request_id: item.id
                },
            });
            else
            self.$router.push({name: 'edit_report', 
                                   params:{
                                   
                                    id: item.report

                                   }
        });
    }
    }
};
</script>
