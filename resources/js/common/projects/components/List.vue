<template>
    <div>
        <!-- create project -->
        <!--<ProjectFormAdd ref="projectAdd"></ProjectFormAdd>-->
        <!-- Edit project -->
        <!--<ProjectFormEdit ref="projectEdit"></ProjectFormEdit>-->
        <TaskFormAdd ref="taskAdd"></TaskFormAdd>
        <v-container grid-list-md>
            <v-layout row pt-3>
                <v-flex xs12 sm12>
                    <v-card class="elevation-3 w-full">
                        <v-card-title primary-title xs8 sm8>
                            <div>
                                <div class="headline">
                                    {{ trans('data.current_projects') }}
                                </div>
                            </div>
                            <v-spacer></v-spacer>
                            <v-btn
                                style="background-color: #06706d; color: white"
                                class="lighten-1"
                                v-if="projectData.length==0 || isshow"
                                @click="
                                    $router.push({
                                        name: 'add-project',
                                       
                                    })
                                "
                            >
                                {{ trans('data.add_project') }}
                                <v-icon right dark>add</v-icon>
                            </v-btn>
                        </v-card-title>
                        <v-divider></v-divider>
                        <v-card-text>
                            <v-container grid-list-md>
                                <v-layout wrap>
                                    <v-flex xs12 sm12 md12>
                                        <v-data-table
                                            :headers="headers"
                                            :pagination.sync="pagination"
                                            :total-items="total_items"
                                            :loading="loading"
                                            :items="projectData"
                                            class="elevation-3 w-full"
                                        >
                                            <template slot="items" slot-scope="props">
                                                <td>
                                                    <div align="center">
                                                        <v-menu>
                                                            <v-btn icon slot="activator">
                                                                <v-icon>more_vert</v-icon>
                                                            </v-btn>
                                                            <v-list>
                                                                  <v-list-tile
                                                                  v-if="getCurrentUser().user_type_log === 'ESTATE_OWNER' 
                                                                  && props.item.owners.find(x=>x.id == getCurrentUser().id)
                                                                  && props.item.owners.find(x=>x.id == getCurrentUser().id).pivot.status != 'accepted'"
                                                                    :disabled="!checkActive()"
                                                                    @click="
                                                                        acceptProject(props.item.id)
                                                                    "
                                                                  
                                                                >
                                                                    <v-list-tile-title>
                                                                        {{
                                                                            trans('messages.accept_project')
                                                                        }}
                                                                    </v-list-tile-title>
                                                                </v-list-tile>
                                                                 <v-list-tile
                                                                  v-if="getCurrentUser().user_type_log === 'ESTATE_OWNER'
                                                                  && props.item.owners.find(x=>x.id == getCurrentUser().id)
                                                                    && props.item.owners.find(x=>x.id == getCurrentUser().id).pivot.status != 'rejected'"
                                                                    :disabled="!checkActive()"
                                                                    @click="
                                                                        rejectProject(props.item.id)
                                                                    "
                                                                  
                                                                >
                                                                    <v-list-tile-title>
                                                                        {{
                                                                            trans('messages.reject_project')
                                                                        }}
                                                                    </v-list-tile-title>
                                                                </v-list-tile>
                                                                   <v-list-tile
                                                                  
                                                                    :disabled="!checkActive()"
                                                                    @click="createTask(props.item.id)"
                                                                >
                                                                    <v-list-tile-title>
                                                                        {{
                                                                            trans(
                                                                                'data.add_task'
                                                                            )
                                                                        }}
                                                                    </v-list-tile-title>
                                                                </v-list-tile>
                                                                <v-list-tile
                                                                    v-if="$can('tickets.create')"
                                                                    :disabled="!checkActive()"
                                                                    @click="
                                                                        $router.push({
                                                                            name: 'create_visit_request_list',
                                                                            params: {
                                                                                project_id: props.item.id,
                                                                                customer_id: props.item.customer_id,
                                                                                request_type:
                                                                                    'visit_request',
                                                                            },
                                                                        })
                                                                    "
                                                                >
                                                                    <v-list-tile-title>
                                                                        {{
                                                                            trans(
                                                                                'data.create_a_visit_request'
                                                                            )
                                                                        }}
                                                                    </v-list-tile-title>
                                                                </v-list-tile>

                                                                <v-list-tile
                                                                    :disabled="!checkActive()"
                                                                    @click="
                                                                        deleteProject(props.item.id)
                                                                    "
                                                                    v-if="$can('project.delete')"
                                                                >
                                                                    <v-list-tile-title>
                                                                        {{
                                                                            trans('messages.delete')
                                                                        }}
                                                                    </v-list-tile-title>
                                                                </v-list-tile>
                                                                <v-list-tile
                                                                    :disabled="!checkActive()"
                                                                    @click="edit(props.item.id)"
                                                                    v-if="$can('project.edit')"
                                                                >
                                                                    <v-list-tile-title>
                                                                        {{ trans('messages.edit') }}
                                                                    </v-list-tile-title>
                                                                </v-list-tile>
                                                                <v-list-tile
                                                                    @click="view(props.item.id)"
                                                                    v-if="$can('project.list')"
                                                                >
                                                                    <v-list-tile-title>
                                                                        {{ trans('data.view') }}
                                                                    </v-list-tile-title>
                                                                </v-list-tile>

                                                                <v-list-tile
                                                                 v-if="$can('report.create')"
                                                                    :disabled="!checkActive()"
                                                                    @click="
                                                                      $router.push({
                name: 'add_report',
                params: { id: props.item.id },
            });"
                                                                >
                                                                    <v-list-tile-title>
                                                                        {{
                                                                            trans(
                                                                                'data.create_a_report'
                                                                            )
                                                                        }}
                                                                    </v-list-tile-title>
                                                                </v-list-tile>

                                                                <v-list-tile
                                                                  v-if="$can('report.view')"
                                                                    :disabled="!checkActive()"
                                                                    @click="
                                                                      $router.push({
                name: 'reports_list',
                params: { id: props.item.id },
            });">
                                                                    <v-list-tile-title>
                                                                        {{
                                                                            trans(
                                                                                'data.reports_review'
                                                                            )
                                                                        }}
                                                                    </v-list-tile-title>
                                                                </v-list-tile>

                                                                <v-list-tile
                                                                    :disabled="!checkActive()"
                                                                    @click="
                                                                        $router.push({
                                                                            name: 'project.schedule',
                                                                            params: {
                                                                                project_id:
                                                                                    props.item.id,
                                                                            },
                                                                        })
                                                                    "
                                                                >
                                                                    <v-list-tile-title>
                                                                        {{ trans('data.schedule') }}
                                                                    </v-list-tile-title>
                                                                </v-list-tile>

                                                                <v-list-tile
                                                                    :disabled="!checkActive()"
                                                                    @click="
                                                                        $router.push({
                                                                            name: 'project.attachments',
                                                                            params: {
                                                                                //project_id: props.item.id,
                                                                                media: props.item.media
                                                                            },
                                                                        })
                                                                    "
                                                                >
                                                                    <v-list-tile-title>
                                                                        {{
                                                                            trans(
                                                                                'data.attachments'
                                                                            )
                                                                        }}
                                                                    </v-list-tile-title>
                                                                </v-list-tile>

                                                                <v-list-tile
                                                                    :disabled="!checkActive()"
                                                                    @click="$router.push({
                                                                        name: 'invoices.list',
                                                                        params: {
                                                                        project_id: props.item.id
                                                                        }
                                                                    })"
                                                                >
                                                                    <v-list-tile-title>
                                                                        {{
                                                                            trans(
                                                                                'messages.invoices'
                                                                            )
                                                                        }}
                                                                    </v-list-tile-title>
                                                                </v-list-tile>
                                                            </v-list>
                                                        </v-menu>
                                           
                                                    </div>
                                                </td>
   <td>
                                                    <div align="center">
                                                        {{ props.item.id }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div align="center">
                                                        {{ props.item.name }}
                                                    </div>
                                                </td>
                                                <!-- <td> {{ props.item.customer.company }}</td> -->
                                                <td>
                                                    <div align="center">
                                                        <v-chip
                                                            class="ma-2"
                                                            :color="getColor(props.item.status)"
                                                            text-color="white"
                                                        >
                                                            {{
                                                                trans(
                                                                    'messages.' + props.item.status
                                                                )
                                                            }}
                                                        </v-chip>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div align="center">
                                                        <v-btn
                                                            icon
                                                            @click="markAsFavorite(props.item)"
                                                        >
                                                            <v-icon
                                                                :color="toggleFavorite(props.item)"
                                                            >
                                                                star
                                                            </v-icon>
                                                        </v-btn>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div align="center">
                                                        <avatar
                                                            :members="props.item.owners"
                                                            class="mr-2"
                                                            :backGround ="backGround"
:status="status"
                                                        ></avatar>
                                                    </div>
                                                </td>
                                                  <td>
                                                    <div align="center">
                                                        <avatar
                                                            :members="props.item.members"
                                                            class="mr-2"
                                                        ></avatar>
                                                    </div>
                                                </td>
                                                <td>
                                                    <v-progress-linear
                                                        striped
                                                        :value="getprogress(props.item.status)"
                                                    ></v-progress-linear>
                                                </td>
                                            </template>
                                        </v-data-table>
                                    </v-flex>
                                </v-layout>
                            </v-container>
                        </v-card-text>
                    </v-card>
                </v-flex>
            </v-layout>
            <br />
            <div align="center">
                <v-btn style="background-color: #06706d; color: white" @click="$router.go(-1)">
                    {{ trans('messages.back') }}
                </v-btn>
            </div>
            <br />
        </v-container>
    </div>
</template>

<script>
import avatar from '../components/Avatar';
import TaskFormAdd from '../tasks/Add';
import store from '../../../store'

export default {
    components: {
        avatar,
        TaskFormAdd
    },
    data() {
        const self = this;
        return {
            total_items: 0,
            isshow:false,
            progress: 80,
            items: [],
            backGround:'',
            status: '',
            pagination: { totalItems: 0 },
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
                    text: self.trans('messages.name'),
                    value: 'name',
                    align: 'center',
                    sortable: true,
                },
                // {
                //     text: self.trans('messages.company'),
                //     value: 'company',
                //     align: 'left',
                //     sortable: true,
                // },
                {
                    text: self.trans('messages.status'),
                    value: 'status',
                    align: 'center',
                    sortable: true,
                },
                {
                    text: self.trans('messages.favorited'),
                    value: 'favorited',
                    align: 'center',
                    sortable: false,
                },
               {
                    text: self.trans('data.owners'),
                    value: 'owners',
                    align: 'center',
                    sortable: true,
                },
                {
                    text: self.trans('messages.members'),
                    value: 'members',
                    align: 'center',
                    sortable: true,
                },
                {
                    text: self.trans('messages.project_progress'),
                    value: 'project_progress',
                    align: 'center',
                    sortable: false,
                },
            ],
            projectData: [],
            statuses: [],
            url: null,
            users: [{ id: 0, name: self.trans('messages.all') }],
            customers: [{ id: 0, company: self.trans('messages.all') }],
            status: [{ key: '', value: self.trans('messages.all') }],
            categories: [{ id: 0, name: self.trans('messages.all') }],
            filters: [],
            tabs: 'tab-1',
            statistics: [],
            loading: false,
        };
    },
    created() {
        const self = this;
        self.url = '/projects';
        self.getDataFromApi();
        self.getFilterData();
        self.$eventBus.$on('updateProjectTable', (data) => {
            self.url = '/projects';
            self.projectData = [];
            this.getDataFromApi();
        });
    },
    beforeDestroy() {
        const self = this;
        self.$eventBus.$off('updateProjectTable');
    },
    methods: {
            createTask(projectId) {
            this.$refs.taskAdd.create(projectId);
        },
        acceptProject(id){
        axios.post('accept-project',{project_id: id})
        .then((response=>{  
             this.$store.commit('showSnackbar', {
                        message: response.data.msg,
                        color: response.data.success,
                    });
                this.backGround = '368e0b'
                this.status = 'accepted'
              
                this.getDataFromApi();
                this.$forceUpdate()
        }))
        },
          rejectProject(id){
 axios.post('reject-project',{project_id: id})
        .then((response=>{
             this.$store.commit('showSnackbar', {
                        message: response.data.msg,
                        color: response.data.success,
                    });
               this.backGround = '8d0303'
                this.status = 'rejected'
              
         this.getDataFromApi();
         this.$forceUpdate()
        }))
        },
        /*create() {
            const self = this;
            self.$refs.projectAdd.create();
        },*/
        getDataFromApi() {
            const self = this;
            self.loading = true;
            var params = {};
            if (self.filters.status) {
                params['status'] = self.filters.status;
            }
            if (self.filters.category_id) {
                params['category_id'] = self.filters.category_id;
            }
            if (self.filters.customer_id) {
                params['customer_id'] = self.filters.customer_id;
            }
            if (self.filters.user_id) {
                params['user_id'] = self.filters.user_id;
            }
            axios
                .get(self.url, {
                    params: params,
                })
                .then(function (response) {
                    self.loading = false;
                 
                    self.projectData = response.data.projects//_.concat(self.projectData, response.data.projects.data);
                    self.statuses = response.data.status;
                //    self.url = _.get(response, 'data.projects.next_page_url', null);
                    self.getStatistics();
                })
                  .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });;
        },
        edit(id) {
            const self = this;
            self.$router.push({
                name: 'edit-project',
                params: { id: id },
            });

            // self.$refs.projectEdit.edit(id);
        },
        view(id) {
    
               const self = this;
            self.$router.push({
                name: 'view_project',
                params: { id: id },
            });

            // self.$refs.projectEdit.edit(id);
        },
        deleteProject(id) {
            const self = this;

            self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                message: self.trans('messages.you_cant_restore_it'),
                okCb: () => {
                    axios
                        .delete('/projects/' + id)
                        .then(function (response) {
                            self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });

                            if (response.data.success === true) {
                                self.url = '/projects';
                                self.projectData = [];
                                self.getDataFromApi();
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
        markAsFavorite(project) {
            const self = this;
            axios
                .get('/projects/mark-favorite', {
                    params: { id: project.id, favorite: project.is_favorited },
                })
                .then(function (response) {
                    self.$store.commit('showSnackbar', {
                        message: response.data.msg,
                        color: response.data.success,
                    });
                    project.is_favorited = response.data.favorite;
                })
                  .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });;
        },
        updateStatus(status, project) {
            const self = this;
            axios
                .get('/projects/update-status', {
                    params: { id: project.id, status: status },
                })
                .then(function (response) {
                    self.$store.commit('showSnackbar', {
                        message: response.data.msg,
                        color: response.data.success,
                    });

                    if (response.data.success === true) {
                        project.status = status;
                        self.getStatistics();
                    }
                })
                  .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });;
        },
        toggleFavorite(project) {
            if (project.is_favorited) {
                return 'yellow darken-2';
            } else {
                return 'grey lighten-1';
            }
        },
        getFilterData() {
            const self = this;
            if (self.$can('superadmin')) {
                axios
                    .get('/projects/create')
                    .then(function (response) {
                        self.users = _.concat(self.users, response.data.users);
                        self.customers = _.concat(self.customers, response.data.customers);
                        self.status = _.concat(self.status, response.data.status);
                        self.categories = _.concat(self.categories, response.data.categories);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
   

        getEnginneringTypes() {
            const self = this;
            axios
                .get('/get-enginnering-types')
                .then(function (response) {
                    self.enginnering_types = response.data;
                    //alert(JSON.stringify(self.employee_data))
                    //alert(JSON.stringify(response.data.find(x=>x.key==self.employee_data.enginnering_type)))
                    self.enginnering_type =
                        response.data.find((x) => x.key == employee_data.enginnering_type) !=
                        undefined
                            ? response.data.find((x) => x.key == employee_data.enginnering_type)
                                  .value
                            : '';
                })
                  .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });;
        },
        filterChanged() {
            const self = this;
            self.url = '/projects';
            self.projectData = [];
            self.getDataFromApi();
        },
        getStatistics() {
            const self = this;
            if (self.$can('superadmin')) {
                axios
                    .get('/projects-statistics')
                    .then(function (response) {
                        self.statistics = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
    },
};
</script>