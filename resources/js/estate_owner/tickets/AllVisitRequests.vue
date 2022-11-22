<!-- For Admin -->
<template>
    <div class="page_wrap_vue pa-3">
       <v-card class="mt-3">
            <ticket-create ref="ticketCreate"></ticket-create>
            <ticket-edit ref="ticketEdit"></ticket-edit>
            <v-card-title primary-title xs8 sm8>
                <div>
                    <div class="headline">
                        {{ trans('data.visit_requests') }}
                    </div>
                </div>
                <v-spacer></v-spacer>
                <v-btn style="background-color:#06706d;color:white;" v-if="$can('tickets.create')"  class="lighten-1" @click="create">
                    {{ trans('data.create_visit_request') }}
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
                        <div style="display:flex;">
                            <v-btn  small fab dark color="teal"  v-if="props.item.status=='accepted'" @click="$router.push({name: 'create_project',params: { project: props.item }})">
                                <v-icon color="white">add</v-icon>
                                <!-- {{trans('messages.add')}}-->
                            </v-btn>
                            <v-btn color="primary" small fab v-if="props.item.status=='pending' || props.item.status=='new'" dark @click="acceptProject(props.item.status,props.item.id)">
                                <v-icon color="white">check</v-icon>
                                <!--{{trans('data.accept')}}-->
                            </v-btn>
                            <v-btn color="error" small fab dark @click="removeProject(props.item.id)">
                                <v-icon color="white">cancel</v-icon>
                                <!-- {{trans('messages.cancel')}}-->
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
                            <v-chip class="ma-2" :color="props.item.status=='pending'?'red':'success'" text-color="white">
                                {{ props.item.status }}
                            </v-chip>
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            {{ getCustomer(props.item.customer_id) }}
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            {{ props.item.name? props.item.name:props.item.title}}
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            {{props.item.start_date? createdDate(props.item.start_date):'-' }}
                        </div>
                    </td>                  
                </template>
            </v-data-table>
        </v-card>
        <br>
            <div align="right">
                <v-btn style="background-color:#06706d;color:white;" @click="$router.go(-1)">
                    {{ trans('messages.back') }}
                </v-btn>
           </div>
        <br>
    </div>
</template>
<script>
import TicketCreate from './Create';
import TicketEdit from './Edit';
import StatusLabel from '../../admin/status/StatusLabel';
export default {
    components: {
        TicketCreate,
        TicketEdit,
        StatusLabel,
    },
    data() {
        const self = this;
        return {
            projects:[],
            total_items: 0,
            loading: false,
            pagination: { totalItems: 0 },
            projectRequests:[],
            headers: [
                {
                    text: self.trans('messages.action'),
                    value: false,
                    align: 'center',
                    sortable: false,
                },
                 {
                    text: self.trans('data.id'),
                    value: 'id',
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
                    text: self.trans('data.request_type'),
                    value: 'request_type',
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
                    text: self.trans('messages.created_at'),
                    value: 'created_at',
                    align: 'center',
                    sortable: true,
                },
            ],
            customername:'',
            items: [],
            employees: [],
            ticket_types: [],
            statuses: [],
            filters: [],
            customers: [],
            priorities: [],
            tabs: 'tab-1',
            ticket_stats: [],
            type:'',
        };
    },
    watch: {
        pagination: {
            handler() {
                this.getTicketFromApi();
            },
        },
    },
    beforeDestroy() {
        const self = this;
        self.$eventBus.$off('updateTicketsTable');
    },
    created(){
        const self = this;
        self.projectRequests=[];
        this.getAllProjectRequest();
    },
    methods: {
        getVisitRequestType(id){
             const self = this;
            axios.get('/visit-request-type/'+id).then(function(response) { 
                self.type= response.data.data;
            }).catch(function(error) {
                self.type= '-';
            });
            return self.type;
        },
        createdDate(date){
        const current_datetime = new Date(date);
        return current_datetime.toLocaleDateString('en-US');
        },
        acceptProject(id){
            const self = this;
             self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                message: self.trans('messages.are_you_sure'),
                okCb: () => {
                    axios.get('/accept-project/' +id).then(function(response) {
                        self.projectRequest=[];
                        self.projects=[];
                        self.getProjectRequest();
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
                },
                cancelCb: () => {
                    console.log('CANCEL');
                },
            });     
        },
        removeProject(id){
            const self = this;
             self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                message: self.trans('messages.you_cant_restore_it'),
                okCb: () => {
                    axios.delete('/sent-requests/' +id).then(function(response) {
                        self.projectRequest=[];
                        self.projects=[];
                        self.getProjectRequest();
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
                },
                cancelCb: () => {
                    console.log('CANCEL');
                },
            });          
        },
        getCustomer(id){
            const self = this;
            axios.get('/get-Customer-name/'+id).then(function(response) { 
                self.customername= response.data.data;
            }).catch(function(error) {
                self.customername= '-';
            });
            return self.customername;
        },
        getAllProjectRequest(){ 
            const self = this;          
            self.loading = true;
             axios.get('/sent-requests').then(function(response) { 
                self.total_items = response.data.total;
                self.projectRequests = response.data.data;
                self.loading = false;
                
                for (let k = 0; k < response.data.data.length; k++) {
                    const element = response.data.data[k];

                    element.visit_requests.forEach(el => {
                        self.projects.push(el);                
                    });
                    
                    element.projectrequest.forEach(el => {
                        self.projects.push(el);
                    });
                    console.log(999);
                    console.log(self.projects);
                }
            })
            .catch(function(error) {
                console.log(error);
            });
        },
        create() {
            this.$refs.ticketCreate.create();
        },
        removeVisitRequest(id){

        },
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
                .then(function(response) {
                    self.total_items = response.data.total;
                    self.items = response.data.data;
                    self.loading = false; 
                })
                .catch(function(error) {
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
                        .then(function(response) {
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
                        .catch(function(error) {
                            console.log(error);
                        });
                },
                cancelCb: () => {
                    console.log('CANCEL');
                },
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
