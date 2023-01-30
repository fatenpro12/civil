<!-- Employees -->
<template>
    <div class="component-wrap" :class="$vuetify.breakpoint.xsOnly?'pt-4':''">
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
                            <v-layout row wrap>
                                <v-flex xs12 sm3 md3 v-if="statistics.users > 0">
                                    <span class="subheading font-weight-medium info--text">
                                        {{ trans('messages.total') }}: {{ statistics.users }}
                                    </span>
                                </v-flex>
                                <v-flex xs12 sm3 md3 v-if="statistics.active > 0">
                                    <span class="subheading font-weight-medium success--text">
                                        {{ trans('messages.active') }}: {{ statistics.active }}
                                    </span>
                                </v-flex>
                                <v-flex xs12 sm3 md3 v-if="statistics.in_active > 0">
                                    <span class="subheading font-weight-medium warning--text">
                                        {{ trans('messages.in_active') }}:
                                        {{ statistics.in_active }}
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
                                        <v-flex xs12 sm6 md6>
                                            <v-text-field
                                                prepend-icon="search"
                                                :label="trans('messages.filter_by_name')"
                                                v-model="filters.name"
                                            ></v-text-field>
                                        </v-flex>
                                        <v-flex xs12 sm6 md6>
                                            <v-text-field
                                                prepend-icon="search"
                                                :label="trans('messages.filter_by_email')"
                                                v-model="filters.email"
                                            ></v-text-field>
                                        </v-flex>
                                    </v-layout>
                                </v-container>
                            </v-flex>
                        </v-layout>
                    </v-card-text>
                </v-card>
            </v-tab-item>
        </v-tabs-items>
        <v-card class="mt-3">
            <v-card-title>
                <div>
                    <div class="headline">
                        {{ trans('data.all_employees') }}
                    </div>
                </div>
                <v-spacer></v-spacer>
                <v-btn
                    v-if="$can('employee.create')"
                    :disabled="!checkActive()"
                    @click="$router.push({ name: 'users_enginner_office.create' })"
                    style="background-color: #06706d; color: white"
                    class="lighten-1"
                >
                    {{ trans('data.new_employee_off') }}
                    <v-icon right dark>add</v-icon>
                </v-btn>
                  <v-btn
                    v-if="$can('employee.create')"
                    :disabled="!checkActive()"
                    @click="addEmployee"
                    style="background-color: #06706d; color: white"
                    class="lighten-1"
                >
                    {{ trans('data.add_employee_off') }}
                    <v-icon right dark>add</v-icon>
                </v-btn>
            </v-card-title>
            <v-divider></v-divider>
          
            <UsersList
            ref="usersData"
         @page="$refs.usersData.loadUsers('/enginner_office/users',filters.name,filters.email)" 
         @rowsPerPage="$refs.usersData.loadUsers('/enginner_office/users',filters.name,filters.email)"
         edit_url="users_enginner_office.edit"
         :headers="headers"
         @trash="trash($event)"
           />
        </v-card>
        <br />
        <div align="center">
            <v-btn
                style="background-color: #06706d; color: white"
                @click="$router.go(-1)"
                :loading="loading"
                :disabled="loading"
            >
                {{ trans('messages.back') }}
            </v-btn>
        </div>
        <br />
        <AddEmployeeById ref="addEmployeeById" @addUser="$refs.usersData.loadUsers('/enginner_office/users',filters.name,filters.email)"/>
    </div>
</template>

<script>
import AddEmployeeById from './AddEmployeeById.vue'
import UsersList from '../../../common/users/UserList'
import _ from 'lodash';
import store from '../../../store'
export default {
    components:{
     AddEmployeeById,
     UsersList
    },
    data() {
        const self = this;
        return {
            loading: false,
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
                {
                    text: self.trans('messages.email'),
                    value: 'email',
                    align: 'center',
                    sortable: true,
                },
                {
                    text: self.trans('messages.roles'),
                    value: 'roles',
                    align: 'center',
                    sortable: true,
                },
                      {
                    text: self.trans('data.enginnering_office_name'),
                    value: 'parent',
                    align: 'center',
                    sortable: true,
                },
                {
                    text: self.trans('data.enginnering_type'),
                    value: 'specialty_id',
                    align: 'center',
                    sortable: true,
                },
                {
                    text: self.trans('messages.last_login'),
                    value: 'last_login',
                    align: 'center',
                    sortable: true,
                },
                {
                    text: self.trans('messages.active'),
                    value: 'active',
                    align: 'center',
                    sortable: false,
                },
            ],
            enginnering_types: [],
            filters: {
                name: '',
                email: '',
            },
            tabs: 'tab-1',
            statistics: [],
        };
    },
    mounted() {
        const self = this;
        self.getStatistics();
        self.getEnginneringTypes();
       // self.$refs.usersData.loadUsers('/enginner_office/users',self.filters.name,self.filters.email)
        self.$eventBus.$on(['USER_ADDED', 'USER_UPDATED', 'USER_DELETED', 'GROUP_ADDED'], () => {
            self.$refs.usersData.loadUsers('/enginner_office/users',self.filters.name,self.filters.email)
        });
    },
    watch: {
        'filters.name':  {
            handler(){
           const self = this;
           self.$refs.usersData.loadUsers('/enginner_office/users',self.filters.name,self.filters.email)
            }
        },
        'filters.email':{
            handler(){
          //   _.debounce(() => {
            const self = this;
        self.$refs.usersData.loadUsers('/enginner_office/users',self.filters.name,self.filters.email)
       // }, 700)
            }
    },
    },
    methods: {
        trash(user) {
            const self = this;

            self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                message: self.trans('messages.you_cant_restore_it'),
                okCb: () => {
                    axios
                        .delete('/enginner_office/users/' + user.id)
                        .then(function (response) {
                            self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });

                            self.getStatistics();
                            self.$eventBus.$emit('USER_DELETED');
                        })
                        .catch(function (error) {
                            self.$store.commit('hideLoader');

                            if (error.response) {
                                self.$store.commit('showSnackbar', {
                                    message: error.response.data.msg,
                                    color: response.data.success,
                                });
                            } else if (error.request) {
                                console.log(error.request);
                            } else {
                                console.log('Error', error.message);
                            }
                        });
                },
                cancelCb: () => {
                    console.log('CANCEL');
                },
            });
        },
        addEmployee(){
this.$refs.addEmployeeById.create()

        },
        getEnginneringTypes() {
            const self = this;
            axios
                .get('/get-enginnering-types')
                .then(function (response) {
                    self.enginnering_types = response.data;
                })
                  .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });;
        },
        getTypeEnginner(type) {
            const self = this;
            return self.enginnering_types.find((x) => x.key == type).value;
        },
       /* loadUsers(cb) {
            const self = this;

            let params = {
                name: self.filters.name,
                email: self.filters.email,
                page: self.pagination.page,
                per_page: self.pagination.rowsPerPage,
            };

            axios.get('/enginner_office/users', { params: params }).then(function (response) {
                self.items = response.data.data;
                self.totalItems = response.data.total;
                self.pagination.totalItems = response.data.total;
            });
        },*/

        getStatistics() {
            const self = this;
            axios
                .get('/enginner_office/user-statistics')
                .then(function (response) {
                    self.statistics['active'] = response.data.active;
                    self.statistics['in_active'] = response.data.in_active;
                    self.statistics['users'] = response.data.users;
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
