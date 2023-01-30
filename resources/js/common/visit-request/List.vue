
<!-- For customer -->
<template>
    <v-container grid-list-md :class="$vuetify.breakpoint.xsOnly?'pt-4':''">
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
                    class="lighten-1"
                    :disabled="!checkActive()"
                    @click="
                        $router.push({
                            name: 'create_visit_estate_request_list',
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
                :expand="expand"
                class="elevation-3"
            >
                <template slot="items" slot-scope="props">
                     <tr>
                    <td>
                        <div style="display: inline-flex; padding-left: 30%" align="center">
                            <slot name="expandIcon" :props="props" />
                            <v-btn small fab dark color="success" @click="viewRequest(props.item)">
                               
                                <v-icon color="white">info</v-icon>
                            </v-btn>
                            <slot name="actions" :props="props" />
                              <v-btn
                                v-if="props.item.status == 'new'"
                                :disabled="!checkActive()"
                                small
                                fab
                                color="success"
                                @click="editRequest(props.item)"
                            >
                                <v-icon color="white">edit</v-icon>
                            </v-btn>
                     
                            <div>
                                <v-btn
                                    color="primary"
                                    small
                                    fab
                                    :disabled="!checkActive()"
                                    v-if="props.item.sent == 0 && props.item.status == 'new'"
                                    @click="sendRequest(props.item)"
                                >
                                    <v-icon color="white">mail</v-icon>
                                    <!--{{trans('data.accept')}}-->
                                </v-btn>
                            </div>

                            <v-btn
                                color="error"
                                :disabled="!checkActive()"
                                v-if="props.item.status == 'new' || props.item.status == 'rejected'"
                                small
                                fab
                                @click="removeProject(props.item.id)"
                            >
                                <v-icon color="white">delete</v-icon>
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
                            <v-chip
                                class="ma-2"
                                :disabled="!checkActive()"
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
                                fab
                                dark
                                color="teal"
                                @click="viewProject(props.item.projectId)"
                            >
                                {{ props.item.projectName }}
                                <!-- {{trans('messages.add')}}-->
                            </v-btn>
                        </div>
                    </td>
                        <td>
                        <div align="center">
                            {{
                                props.item.specialties != null ?
                                props.item.specialties.map(x=>x.name).join(',') :''
                                   
                            }}
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            {{ props.item.created_at ? createdDate(props.item.created_at) : '-' }}
                        </div>
                    </td>
                    </tr>
                </template>
                     <template v-slot:expand="props">
        <slot name="offices" :props="props" />
        </template>
            </v-data-table>
        </v-card>
        <div align="center">
            <v-btn style="background-color: #06706d; color: white" @click="$router.go(-1)">
                {{ trans('messages.back') }}
            </v-btn>
        </div>
    </v-container>
</template>
<script>
import ViewVisitRequest from './view_visit_request';
export default {
    components: {ViewVisitRequest},
    props:{
        url:{
            type:String
        },
        params:{
            type: Object,
default: null
        }
    },
    data() {
        const self = this;
        return {
            expand: true,
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
            items: [],
            type: '',
            project_name: '',
        };
    },
    watch: {
        pagination: {
            handler() {
                 this.getAllProjectRequest();
            },
        },
    },
    mounted() {
        const self = this;
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
    methods: {
        viewReport(item){
            this.$router.push({name: 'edit_report', 
                                   params:{
                                    id: item.id
                                  //  id: item.report.media[item.report.media.length-1].full_url?item.report.media[item.report.media.length-1].full_url:item.report.media[item.report.media.length-1].original_url

                                   }
        });
        },
              editRequest(request) {
            this.$router.push({
                name: 'edit_visit_request_estate_list',
                params: { id: request.id },
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

        viewRequest(request) {
     
            this.$refs.viewVisitRequest.create(request.id)
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
     

        getAllProjectRequest() {
            const self = this;
            self.loading = true;
            axios
                .get(self.url, { params: self.params })
                .then(function (response) {
                    self.total_items = response.data.length;
                    self.projectRequests = response.data.data;
                    self.projects = response.data;
                    self.loading = false;
                })
                  .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });;
        },

        viewProject(id) {
            const self = this;
            self.$router.push({
                name: 'view_project',
                params: { id: id },
            });
        },
    },
};
</script>
