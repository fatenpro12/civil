
<!-- For customer -->
<template>
    <div class="component-wrap">
        <TaskShow ref="taskShow"></TaskShow>
         <TaskFormAdd ref="taskAdd"></TaskFormAdd>
         <TaskFormEdit ref="taskEdit"></TaskFormEdit>
        <v-flex xs12 sm8>
            <v-card>
                <v-list>
                    <v-list-group prepend-icon="filter_list">
                        <v-list-tile slot="activator">
                            <v-list-tile-content>
                                <v-list-tile-title>
                                    {{ trans('messages.filters') }}
                                </v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                        <v-list-tile-content>
                            <v-layout>
                                <v-flex xs12 sm12>
                                    <v-container grid-list-md>
                                        <v-layout>
                                            <v-flex xs12 sm12>
                                                <v-container grid-list-md>
                                                    <v-layout row wrap>
                                                        <v-flex xs12 md6>
                                                            <v-select
                                                                item-text="name"
                                                                item-value="id"
                                                                :clear="true"
                                                                :items="projects"
                                                                v-model="filters.project_id"
                                                                :label="trans('data.project_name')"
                                                                @change="filterChanged"
                                                            ></v-select>
                                                        </v-flex>
                                                        <v-flex xs12 md6>
                                                            <v-select
                                                                item-text="name"
                                                                item-value="value"
                                                                :items="statuses"
                                                                v-model="filters.status"
                                                                :label="trans('messages.status')"
                                                                @change="filterChanged"
                                                            ></v-select>
                                                        </v-flex>
                                                    </v-layout>
                                                </v-container>
                                            </v-flex>
                                        </v-layout>
                                    </v-container>
                                </v-flex>
                            </v-layout>
                        </v-list-tile-content>
                    </v-list-group>
                </v-list>
            </v-card>
        </v-flex>

        <v-card class="mt-3">
            <v-card-title>
                    <div>
                        {{ trans('data.tasks') }}
                    </div>
                    <v-spacer></v-spacer>
                                <v-btn style="color: #06706d" 
                       v-if="$can('task.create')"
                                                            
                                                                    @click="createTask">
                {{ trans('data.add_task') }}
            </v-btn>
            </v-card-title>
            <v-divider></v-divider>
            <v-data-table
                v-bind:headers="headers"
                v-bind:pagination.sync="pagination"
                :total-items="total_items"
                :loading="loading"
                :items="items"
                class="elevation-3"
            >
                <template slot="items" slot-scope="props">
                    <td>
                        <div align="center">
                            <v-menu>
                                <v-btn icon slot="activator"> <v-icon>more_vert</v-icon> </v-btn>
                                <v-list>
                                    <v-list-tile @click="view(props.item)">
                                        <v-list-tile-title>
                                            <v-icon small class="mr-2"> visibility </v-icon>
                                            {{ trans('messages.view') }}
                                        </v-list-tile-title>
                                    </v-list-tile>
                                      <v-list-tile @click="editTask(props.item)">
                                        <v-list-tile-title>
                                            <v-icon small class="mr-2"> edit </v-icon>
                                            {{ trans('messages.edit') }}
                                        </v-list-tile-title>
                                    </v-list-tile>
                                    <v-list-tile @click="deleteTask(props.item.id)">
                                        <v-list-tile-title>
                                            <v-icon small class="mr-2"> delete </v-icon>
                                            {{ trans('messages.delete') }}
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
                            {{ props.item.subject }}
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            {{ props.item.project != undefined ? props.item.project.name : '' }}
                        </div>
                    </td>

                    <td>
                        <div align="center">
                            {{ props.item.due_date ? createdDate(props.item.due_date) : '-' }}
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
        <div align="center">
            <v-btn
                style="background-color: #06706d; color: white"
                v-if="backBtn"
                @click="$router.go(-1)"
            >
                {{ trans('messages.back') }}
            </v-btn>
        </div>
        <br />
    </div>
</template>
<script>
import TaskShow from './Show';
import _ from 'lodash';
import TaskFormAdd from '../tasks/Add';
import TaskFormEdit from '../tasks/Edit';

export default {
    components: {
        TaskShow,
        TaskFormAdd,
        TaskFormEdit
    },
    props:{
backBtn: true
    },
    data() {
        const self = this;
        return {
            items: [],
            total_items: 0,
            loading: false,
            pagination: {
                rowsPerPage: 10,
            },
            headers: [
                {
                    text: self.trans('messages.action'),
                    value: false,
                    align: 'center',
                    sortable: true,
                },
                {
                    text: self.trans('data.id'),
                    value: 'id',
                    align: 'center',
                    sortable: false,
                },
                {
                    text: self.trans('messages.subject'),
                    value: 'subject',
                    align: 'center',
                    sortable: true,
                },
                {
                    text: self.trans('data.project_name'),
                    value: 'project_id',
                    align: 'center',
                    sortable: true,
                },

                {
                    text: self.trans('messages.due_date'),
                    value: 'due_date',
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
            projectId: null,
            taskLists: [],
          //  url: null,
            filters: [],
            user_filter_type: null,
            usersList: [{ id: 0, name: self.trans('messages.all') }],
            statuses: [
                {
                    name: self.trans('messages.all'),
                    value: '',
                },
                {
                    name: self.trans('messages.completed'),
                    value: 'completed',
                },
                {
                    name: self.trans('messages.incompleted'),
                    value: 'incompleted',
                },
                {
                    name: self.trans('messages.over_due'),
                    value: 'over_due',
                },
            ],
            view_style: 'grid',
            currentHover: null,
            projectCategories: [],
            project_list: [{ id: 0, name: self.trans('messages.all') }],
            projects: [],
            filters: {
                project_id: '',
                status: '',
            },
            statistics: [],
        };
    },
    watch: {
        'pagination.page': function () {
            const self = this;
          //  self.url = 'project-tasks';
            self.getTaskList(self.projectId);
        },
        'pagination.rowsPerPage': function () {
            const self = this;
            self.getTaskList(self.projectId);
        },
        'filters.project_id': function () {
              const self = this;
            self.getTaskList(self.projectId);
        },
        'filters.status': function() {
      const self = this;
            self.getTaskList(self.projectId);
        },
    },
    created() {
        const self = this;
        self.filters.status = '';
       self.projectId = self.$route.params.id;
      //  self.url = 'project-tasks';
        self.getProjects();
        self.$eventBus.$on('updateTaskTable', (data) => {
           // self.url = 'project-tasks';
            self.taskLists = [];
            self.projects=self.projects.filter(x=>x.id==data);
            self.getTaskList(self.projectId);
        });
    },
    beforeDestroy() {
        const self = this;
        self.$eventBus.$off('updateTaskTable');
    },

    methods: {
   createTask() {
            this.$refs.taskAdd.create(this.projectId);
            
        },
   editTask(task) {
            this.$refs.taskEdit.edit({project_id:this.projectId,task_id:task.id});
        },
           deleteTask(id) {
            const self = this;
           
            self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                message: self.trans('messages.you_cant_restore_it'),
                okCb: () => {
                    axios
                        .delete('project-tasks/' + id)
                        .then(function (response) {
                            self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });

                            if (response.data.success === true) {
                             // self.getTaskList(self.projectId)
                               self.$eventBus.$emit('updateTaskTable', response.data.task);
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
        getTaskList(projectId) {
            const self = this;
 self.projectId = projectId

            let params = {
                page: self.pagination.page,
                per_page: self.pagination.rowsPerPage,
            };

            /*   if (self.filters.project_id) {
                params['project_id'] = self.filters.project_id;
            }*/
            if (self.filters.status) {
                params['status'] = self.filters.status;
            }
            if (projectId) {
                params['project_id'] = projectId;
            }
            else{
                params['project_id'] = self.filters.project_id;
            } 
                  console.log(params)
            axios
                .get('project-tasks', { params: params })
                .then(function (response) {
                    var tasks = [];
                    tasks = response.data.tasks;
           console.log(response.data.tasks)
                    self.items = response.data.tasks.data;
                    self.totalItems = response.data.tasks.total;
                    self.pagination.totalItems = response.data.tasks.total;

                    self.taskLists = _.concat(self.taskLists, tasks);

                  //  self.url = _.get(response, 'data.next_page_url', null);
                    self.projectCategories = response.data.project_categories;
                    self.projectCategories.push({ id: '' });
                })
                  .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });;
            //  }
        },

        view(task) {
            const self = this;
            self.$refs.taskShow.view(task);
        },
        dueDateColor(task) {
            var date_passed = moment().isAfter(task.due_date);

            if (date_passed && task.is_completed == 0) {
                return 'red';
            } else {
                return 'primary grey--text text--lighten-1';
            }
        },
        createdDate(date) {
            const current_datetime = new Date(date);
            return current_datetime.toLocaleDateString('en-US');
        },
        getFilterData() {
            const self = this;
            axios
                .get('project-tasks/filter-data/' + self.projectId)
                .then(function (response) {
                    if (response.data.members) {
                        self.user_filter_type = 'dropdown';
                        self.usersList = _.concat(self.usersList, response.data.members);
                    } else {
                        self.user_filter_type = 'checkbox';
                    }

                    if (response.data.projects) {
                        self.project_list = _.concat(self.project_list, response.data.projects);
                    }
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
          //  self.url = 'project-tasks';
            self.taskLists = [];
            self.getTaskList(self.projectId);
        },

        getListBg(is_completed, task_id = null) {
            const self = this;
            var bg_class = '';
            if (task_id !== null && task_id == self.currentHover) {
                bg_class += 'elevation-15 ';
            }

            if (is_completed) {
                bg_class += 'list-faded';
            }

            return bg_class;
        },

        getProjects() {
            const self = this;
            axios
                .get('get-project-customer')
                .then(function (response) {
                    if (!response.data.error_code) {
                        self.projects = response.data.data;
                    }
                })
                  .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });;
        },
    },
};
</script>
