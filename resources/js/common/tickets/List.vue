
<!-- For customer -->
<template>
    <v-container grid-list-md :class="$vuetify.breakpoint.xsOnly?'':''">
        <AcceptEnginneringOfficeModal
            ref="acceptenginneringoffice"
            @next="getAllProjectRequest($event)"
        />
        <v-card class="mt-3">
            <ticket-edit ref="ticketEdit"></ticket-edit>
            <v-card-title primary-title xs8 sm8>
                <div>
                    <div class="headline">
                        {{ trans('data.visit_requests') }}
                    </div>
                </div>
                <v-spacer></v-spacer>
                <v-btn
                    style="background-color: #06706d; color: white"
                    v-if="$can('tickets.create') && false"
                    class="lighten-1"
                    @click="
                        $router.push({
                            name: 'create_visit_request_list',
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
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            {{ props.item.id }}
                        </div>
                    </td>
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
                            {{ props.item.customer.name }}
                        </div>
                    </td>
                    <!-- <td>
                        <div align="center">
                            {{ getType(props.item.request_type) }}
                           <{{ props.item.name?props.item.type_of_request:getVisitRequestType(props.item.id) }}-->
                    <!-- </div>
                    </td> -->

                    <td>
                        <div align="center">
                            <v-btn
                                small
                                fab
                                dark
                                color="teal"
                                @click="viewProject(props.item.project_id)"
                            >
                                {{ props.item.project.name }}
                                <!-- {{trans('messages.add')}}-->
                            </v-btn>
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
            <v-btn v-if="backBtn" style="background-color: #06706d; color: white" @click="$router.go(-1)">
                {{ trans('messages.back') }}
            </v-btn>
        </div>
        <br />
    </v-container>
</template>
<script>
import TicketEdit from './Edit';
import StatusLabel from '../../admin/status/StatusLabel';
import AcceptEnginneringOfficeModal from './AcceptEnginneringOfficeModal.vue';
export default {
    components: {
        TicketEdit,
        StatusLabel,
        AcceptEnginneringOfficeModal: AcceptEnginneringOfficeModal,
    },
    props: {
        id: {
            required: false,
        },
        backBtn: true
    },
    data() {
        const self = this;

        return {
            currentUser: '',
            projects: [],
            total_items: 0,
            loading: false,
            pagination: { totalItems: 0 },
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
                    sortable: false,
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
                // {
                //     text: self.trans('data.request_type'),
                //     value: 'request_type',
                //     align: 'center',
                //     sortable: true,
                // },
                {
                    text: self.trans('data.project_name'),
                    value: 'project_name',
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
        //self.getFilters();
        // self.getStatistics();
        self.$eventBus.$on('updateTicketsTable', (data) => {
            self.projectRequest = [];
            self.projects = [];
            self.getAllProjectRequest();
            //  self.getTicketFromApi();
            // self.getStatistics();
            //self.getFilters();
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
                name: 'edit_visit_request_list',
                params: { id: request.id },
            });
        },
        viewRequest(request) {
            this.$router.push({
                name: 'view_visit_request_list',
                params: { id: request.id },
            });
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
        createdDate(date) {
            const current_datetime = new Date(date);
            return current_datetime.toLocaleDateString('en-US');
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
                        .post('request-cancel', { request_id: request_id })
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
        acceptProject(item) {
            const self = this;
            self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                message: self.trans('messages.are_you_sure'),
                okCb: () => {
                    self.$refs.acceptenginneringoffice.create(item.project_id);
                    let data = {
                        status: item.status,
                        id: item.id,
                        office_id: item.office_id,
                    };
                    self.$refs.acceptenginneringoffice.fillData(data);
                    // let info = {
                    //     status: status,
                    //     id: id,
                    // };
                    // axios
                    //     .post('/accept-project', info)
                    //     .then(function (response) {
                    //         self.projectRequest = [];
                    //         self.projects = [];
                    //         self.getAllProjectRequest();
                    //     })
                    //     .catch(function (error) {
                    //         console.log(error);
                    //     });
                },
                cancelCb: () => {
                    console.log('CANCEL');
                },
            });
        },
        removeProject(id) {
            const self = this;
            self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                message: self.trans('messages.you_cant_restore_it'),
                okCb: () => {
                    axios
                        .delete('request/' + id)
                        .then(function (response) {
                            self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });

                            self.projectRequest = [];
                            self.projects = [];
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
            //  {'projectId':self.id}
            axios
                .get('get-requests', { params: params })
                .then(function (response) {
                    self.total_items = response.data.length;
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
        edit(ticket_id) {
            this.$refs.ticketEdit.edit(ticket_id);
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

        viewProject(id) {
            const self = this;
            self.$router.push({
                name: 'view_project',
                params: { id: id },
            });
        },
        /*    getFilters() {
            const self = this;
            axios
                .get('/tickets/get-filters')
                .then(function(response) {
                    self.employees = response.data.employees;
                    self.ticket_types = response.data.ticket_types;
                    self.statuses = response.data.statuses;
                    self.customers = response.data.customers;
                    self.priorities = response.data.priorities;
                })
                .catch(function(error) {
                    console.log(error);
                });
        },*/
        /*      getStatistics() {
            const self = this;
            axios
                .get('/tickets-statistics')
                .then(function(response) {
                    self.ticket_stats = response.data;
                })
                .catch(function(error) {
                    console.log(error);
                });
        },*/
    },
};
</script>
