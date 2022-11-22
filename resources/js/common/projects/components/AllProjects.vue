<template>
    <div>
    <!-- create project -->
        <ProjectFormAdd ref="projectAdd"></ProjectFormAdd>
        <!-- Edit project -->
        <ProjectFormEdit ref="projectEdit"></ProjectFormEdit>

        <!-- tab -->
        <div v-if="$can('superadmin')">
            <v-tabs v-model="tabs" fixed-tabs height="47" class="elevation-3">
                <v-tab :href="'#tab-1'" @click="getStatistics">
                    <v-icon>bar_chart</v-icon>
                    {{ trans('messages.statistics') }}
                </v-tab>
                <v-tab :href="'#tab-2'">
                    <v-icon>filter_list</v-icon>
                    {{ trans('messages.filters') }}
                </v-tab>
            </v-tabs>

            <v-tabs-items v-model="tabs">
                <v-divider></v-divider>
                <v-tab-item :value="'tab-1'">
                    <v-card flat class="elevation-2">
                        <v-card-text>
                            <v-container grid-list-md>
                                <v-layout row-wrap>
                                    <v-flex xs12 sm3 md3 v-if="statistics.not_started > 0">
                                        <span class="subheading font-weight-medium primary--text">
                                            {{ trans('messages.not_started') }}:
                                            {{ statistics.not_started }}
                                        </span>
                                    </v-flex>
                                    <v-flex xs12 sm3 md3 v-if="statistics.in_progress > 0">
                                        <span class="subheading font-weight-medium info--text">
                                            {{ trans('messages.in_progress') }}:
                                            {{ statistics.in_progress }}
                                        </span>
                                    </v-flex>
                                    <v-flex xs12 sm3 md3 v-if="statistics.cancelled > 0">
                                        <span class="subheading font-weight-medium error--text">
                                            {{ trans('messages.cancelled') }}:
                                            {{ statistics.cancelled }}
                                        </span>
                                    </v-flex>

                                    <v-flex xs12 sm3 md3 v-if="statistics.on_hold > 0">
                                        <span class="subheading font-weight-medium warning--text">
                                            {{ trans('messages.on_hold') }}:
                                            {{ statistics.on_hold }}
                                        </span>
                                    </v-flex>
                                    <v-flex xs12 sm3 md3 v-if="statistics.completed > 0">
                                        <span class="subheading font-weight-medium success--text">
                                            {{ trans('messages.completed') }}:
                                            {{ statistics.completed }}
                                        </span>
                                    </v-flex>
                                    <v-flex xs12 sm3 md3>
                                        <span class="subheading font-weight-medium cyan--text">
                                            {{ trans('messages.total') }}: {{ statistics.total }}
                                        </span>
                                    </v-flex>
                                </v-layout>
                            </v-container>
                        </v-card-text>
                    </v-card>
                </v-tab-item>
                <v-tab-item :value="'tab-2'">
                    <v-card flat class="elevation-2">
                        <v-card-text>
                            <v-layout>
                                <v-flex xs12 sm12>
                                    <v-container grid-list-md>
                                        <v-layout row wrap>
                                            <v-flex xs12 md4>
                                                <v-autocomplete
                                                    item-text="value"
                                                    item-value="key"
                                                    :items="status"
                                                    v-model="filters.status"
                                                    :label="trans('messages.status')"
                                                    @change="filterChanged"
                                                ></v-autocomplete>
                                            </v-flex>
                                            <v-flex xs12 md4>
                                                <v-autocomplete
                                                    item-text="name"
                                                    item-value="id"
                                                    :items="categories"
                                                    v-model="filters.category_id"
                                                    :label="trans('messages.category')"
                                                    @change="filterChanged"
                                                ></v-autocomplete>
                                            </v-flex>
                                            <v-flex xs12 md4>
                                                <v-autocomplete
                                                    item-text="company"
                                                    item-value="id"
                                                    :items="customers"
                                                    v-model="filters.customer_id"
                                                    :label="trans('messages.customer')"
                                                    @change="filterChanged"
                                                ></v-autocomplete>
                                            </v-flex>
                                            <v-flex xs12 md4>
                                                <v-autocomplete
                                                        item-text="name"
                                                        item-value="id"
                                                        :items="users"
                                                        v-model="filters.user_id"
                                                        :label="trans('messages.employee')"
                                                        @change="filterChanged"
                                                ></v-autocomplete>
                                            </v-flex>
                                        </v-layout>
                                    </v-container>
                                </v-flex>
                            </v-layout>
                        </v-card-text>
                    </v-card>
                </v-tab-item>
            </v-tabs-items>
        </div>

        <!-- /tab -->
        <v-layout row pt-3>
            <v-flex xs12 sm12>
                <v-card class="elevation-3 w-full">
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
                                                    <div style="display: flex;">
                                                        <v-btn color="success" small v-if=" $can('project.' + props.item.id + '.status') ||
                                                                $can('project.' + props.item.id + '.edit') ||
                                                                $can('project.' + props.item.id + '.delete')
                                                        " slot="activator"  @click="$router.push({name: 'projects.project-tasks.list',params: { id: props.item.id }})">
                                                            <v-icon small>visibility</v-icon>&nbsp;
                                                            {{ trans('messages.view') }}
                                                        </v-btn>
                                                         <v-btn color="primary" small slot="activator" v-if="$can('project.' + props.item.id + '.edit')"  @click="$router.push({name: 'projects.project-tasks.list',params: { id: props.item.id }})">
                                                            <v-icon small>edit</v-icon>&nbsp;
                                                            {{ trans('messages.edit') }}
                                                        </v-btn>
                                                         <v-btn color="error" small slot="activator"  v-if="$can('project.' + props.item.id + '.delete')"
                                                                @click="deleteProject(props.item.id)">
                                                            <v-icon small>delete_outline</v-icon>&nbsp;
                                                            {{ trans('messages.delete') }}
                                                        </v-btn> 
                                                    </div>  
                                                </td>
                                                <td>{{ props.item.id }}</td>
                                                <td>{{ props.item.name }}</td>
                                                <td> {{ props.item.customer.company }}</td>
                                                <td>
                                                    <v-chip class="ma-2" color="red" text-color="white">{{trans('messages.' + props.item.status)}}
                                                    </v-chip>
                                                </td>
                                                <td>
                                                    <v-btn icon @click="markAsFavorite(props.item)">
                                                        <v-icon :color="toggleFavorite(props.item)"> star </v-icon>
                                                    </v-btn>
                                                </td>
                                                <td><avatar :members="props.item.members" class="mr-2"></avatar></td>
                                                <td>{{ projectProgress(
                                                                props.item.tasks_count,
                                                                props.item.completed_task
                                                            )}}</td>
                                            </template>
                                        </v-data-table>
                                    </v-flex>
                                </v-layout>
                        </v-container>
                    </v-card-text>
                </v-card>
            </v-flex>
        </v-layout>
    </div>
</template>

<script>
import ProjectFormAdd from '../components/Add';
import ProjectFormEdit from '../components/Edit';
import avatar from '../components/Avatar';
export default {
    components: {
        ProjectFormAdd,
        ProjectFormEdit,
        avatar,
    },
    data() {
        const self = this;
        return {
            total_items: 0,
            items: [],
            pagination: { totalItems: 0 },
            headers: [
                {
                    text: self.trans('messages.action'),
                    value: false,
                    align: 'left',
                    sortable: false,
                },
                {
                    text: self.trans('data.id'),
                    value: 'id',
                    align: 'left',
                    sortable: true,
                },
                {
                    text: self.trans('messages.name'),
                    value: 'name',
                    align: 'left',
                    sortable: true,
                },
                {
                    text: self.trans('messages.company'),
                    value: 'company',
                    align: 'left',
                    sortable: true,
                },
                {
                    text: self.trans('messages.status'),
                    value: 'status',
                    align: 'left',
                    sortable: true,
                },
                {
                    text: self.trans('messages.favorited'),
                    value: 'favorited',
                    align: 'left',
                    sortable: true,
                },
                {
                    text: self.trans('messages.members'),
                    value: 'members',
                    align: 'left',
                    sortable: true,
                },
                {
                    text: self.trans('messages.project_progress'),
                    value: 'project_progress',
                    align: 'left',
                    sortable: true,
                }
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
        self.$eventBus.$on('updateProjectTable', data => {
            self.url = '/projects';
            self.projectData = [];
            self.getDataFromApi();
        });
    },
    beforeDestroy() {
        const self = this;
        self.$eventBus.$off('updateProjectTable');
    },
    methods: {
        create() {
            const self = this;
            self.$refs.projectAdd.create();
        },
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
            console.log(self.filters.status);
            axios
                .get(self.url, {
                    params: params,
                })
                .then(function(response) {
                    self.loading = false;
                    self.projectData = _.concat(self.projectData, response.data.projects.data);
                    self.statuses = response.data.status;
                    self.url = _.get(response, 'data.projects.next_page_url', null);
                    self.getStatistics();
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        edit(id) {
            const self = this;
            self.$refs.projectEdit.edit(id);
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
                        .then(function(response) {
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
                        .catch(function(error) {
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
                .then(function(response) {
                    self.$store.commit('showSnackbar', {
                        message: response.data.msg,
                        color: response.data.success,
                    });
                    project.is_favorited = response.data.favorite;
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        updateStatus(status, project) {
            const self = this;
            axios
                .get('/projects/update-status', {
                    params: { id: project.id, status: status },
                })
                .then(function(response) {
                    self.$store.commit('showSnackbar', {
                        message: response.data.msg,
                        color: response.data.success,
                    });

                    if (response.data.success === true) {
                        project.status = status;
                        self.getStatistics();
                    }
                })
                .catch(function(error) {
                    console.log(error);
                });
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
                    .then(function(response) {
                        self.users = _.concat(self.users, response.data.users);
                        self.customers = _.concat(self.customers, response.data.customers);
                        self.status = _.concat(self.status, response.data.status);
                        self.categories = _.concat(self.categories, response.data.categories);
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            }
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
                    .then(function(response) {
                        self.statistics = response.data;
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            }
        },
    },
};
</script>