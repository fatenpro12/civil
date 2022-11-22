<!-- Employees -->
<template>
    <div class="component-wrap"  :class="$vuetify.breakpoint.xsOnly?'pt-4':''">
        <v-tabs v-model="tabs" fixed-tabs height="47" class="elevation-3">
            <v-tab :href="'#tab-1'" @click="getStatistics" >
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
            <v-tab-item :value="'tab-1'" >
                <v-card flat class="elevation-2">
                    <v-card-text>
                        <v-container grid-list-md>
                            <v-layout row wrap>
                                <v-flex xs12 sm3 md3  v-if="statistics.users > 0">
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
                        {{ trans('data.all_users') }}
                    </div>
                </div>
                <v-spacer></v-spacer>
                <v-btn
                   :disabled="!checkActive()"
                    @click="$router.push({ name: 'users_estate.create' })"
                      style="background-color: #06706d; color: white"
                    class="lighten-1"
                  
                >
                    {{ trans('data.new_employee') }}
                    <v-icon right dark>add</v-icon>
                </v-btn>
            </v-card-title>
            <v-divider></v-divider>
            <!-- data table -->
                <UsersList
         @page="$refs.usersData.loadUsers('/estate_owner/users',filters.name,filters.email)" 
         @rowsPerPage="$refs.usersData.loadUsers('/estate_owner/users',filters.name,filters.email)"
         :headers="headers"
         edit_url="users_estate.edit"
         @trash="trash($event)"
          ref="usersData" />
        </v-card>
        <br>
            <div align="center">
                <v-btn style="background-color:#06706d;color:white;" @click="$router.go(-1)">
                    {{ trans('messages.back') }}
                </v-btn>
           </div>
        <br>
    </div>
</template>
<style scoped>
.theme--dark.v-btn.v-btn--disabled:not(.v-btn--icon):not(.v-btn--flat):not(.v-btn--outline) {
    background-color:rgb(37 86 85);
}
</style>
<script>
import _ from 'lodash';
import UsersList from '../../../common/users/UserList'
export default {
    components:
    {
        UsersList
    },
    data() {
        const self = this;
        return {
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
                // {
                //     text: self.trans('messages.roles'),
                //     value: 'roles',
                //     align: 'center',
                //     sortable: false,
                // },
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
      //  self.$refs.usersData.loadUsers('/estate_owner/users',self.filters.name,self.filters.email)
        self.$eventBus.$on(['USER_ADDED', 'USER_UPDATED', 'USER_DELETED', 'GROUP_ADDED'], () => {
           self.$refs.usersData.loadUsers('/estate_owner/users',self.filters.name,self.filters.email)
        });
    },
    watch: {
       'filters.name':  {
            handler(){
           const self = this;
           self.$refs.usersData.loadUsers('/estate_owner/users',self.filters.name,self.filters.email)
            }
        },
        'filters.email':{
            handler(){
          //   _.debounce(() => {
            const self = this;
        self.$refs.usersData.loadUsers('/estate_owner/users',self.filters.name,self.filters.email)
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
                        .delete('/estate_owner/users/' + user.id)
                        .then(function(response) {

                            self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });

                            self.getStatistics();
                            self.$eventBus.$emit('USER_DELETED');
                        })
                        .catch(function(error) {
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
        getStatistics() {
            const self = this;
            axios
                .get('/estate_owner/user-statistics')
                .then(function(response) {
                    self.statistics['active'] = response.data.active;
                    self.statistics['in_active'] = response.data.in_active;
                    self.statistics['users'] = response.data.users;
                   // alert(self.statistics.users > 0)
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
    },
};
</script>
