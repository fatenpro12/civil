<template>
    <div class="component-wrap" :class="$vuetify.breakpoint.xsOnly?'pt-4':''">
        <v-card class="mb-3">
            <v-layout row wrap>
                <v-flex xs12 sm6 md6>
                    <v-text-field key=""
                        prepend-icon="search"
                        :label="trans('messages.filter_by_name')"
                        v-model="filters.name"
                        @keyup="searchRole"
                    ></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md6 class="text-xs-right pt-1">
                    <v-btn
                         v-if="$can('role.view')"
                         :disabled="!checkActive()"
                        @click="$router.push({ name: 'roles_enginner_office.create' })"
                        class="primary lighten-1"
                        
                    >
                        {{ trans('messages.new_role') }}
                        <v-icon right>add</v-icon>
                    </v-btn>
                </v-flex>
            </v-layout>
        </v-card>
        <v-card>
            <v-card-title>
                <div>
                    <div class="headline">
                        {{ trans('data.all_roles') }}
                    </div>
                </div>
            </v-card-title>
            <v-divider></v-divider>
            <v-data-table
                v-bind:headers="headers"
                v-bind:pagination.sync="pagination"
                :items="items"
                :total-items="total_items"
                class="elevation-3"
            >
                <template slot="headerCell" slot-scope="props">
                    <span v-if="props.header.value == 'name'">
                        <v-icon>person</v-icon> {{ props.header.text }}
                    </span>
                    <span v-else-if="props.header.value == 'created_at'">
                        <v-icon>date_range</v-icon> {{ props.header.text }}
                    </span>
                    <span v-else>{{ props.header.text }}</span>
                </template>
                <template slot="items" slot-scope="props">
                     <td>
                         <div  align="center" >
                        <v-menu>
                            <v-btn icon slot="activator"> <v-icon>more_vert</v-icon> </v-btn>
                            <v-list>
                                <v-list-tile
                                 :disabled="!checkActive()"
                                v-if="$can('role.edit')"
                                    @click="
                                        $router.push({
                                            name: 'roles_enginner_office.edit',
                                            params: { id: props.item.id },
                                        })
                                    "
                                >
                                    <v-list-tile-title>
                                        <v-icon small class="mr-2"> edit </v-icon>
                                        {{ trans('messages.edit') }}
                                    </v-list-tile-title>
                                </v-list-tile>
                                <v-list-tile 
                                 :disabled="!checkActive()"
                                v-if="$can('role.delete')"
                                 @click="deleteRole(props.item)">
                                    <v-list-tile-title>
                                        <v-icon small class="mr-2"> delete_forever </v-icon>
                                        {{ trans('messages.delete') }}
                                    </v-list-tile-title>
                                </v-list-tile>
                            </v-list>
                        </v-menu>
                    </div></td>
                    <td><div  align="center"> {{ props.item.id }} </div> </td>
                    <td><div  align="center"> {{ props.item.name }} </div> </td>
                     <td><div  align="center">{{ props.item.created_at | formatDate }} </div> </td>
                </template>
            </v-data-table>
        </v-card>
               <br>
            <div align="center">
                <v-btn style="background-color:#06706d;color:white;" @click="$router.go(-1)" :loading="loading" :disabled="loading">
                    {{ trans('messages.back') }}
                </v-btn>
           </div>
        <br>
    </div>
</template>
<script>
export default {
    data() {
        const self = this;
        return {
            total_items: 0,
            loading: false,
            pagination: { totalItems: 0, sortBy: 'created_at', descending: true },
            items: [],
            headers: [
                {
                    text: self.trans('messages.action'),
                    value: false,
                    align: 'center',
                    sortable: false,
                },
                 { text: self.trans('data.id'), value: 'id', align: 'center', sortable: true },
                { text: self.trans('messages.name'), value: 'name', align: 'center', sortable: true },
                {
                    text: self.trans('messages.created_at'),
                    value: 'created_at',
                    align: 'center',
                    sortable: true,
                },
            ],
            filters: {
                name: '',
            },
        };
    },
    watch: {
        pagination: {
            handler() {
                const self = this;
                self.getRolesFromApi();
            },
        },
    },
    methods: {
        getRolesFromApi() {
            const self = this;

            self.loading = true;

            const { sortBy, descending, page, rowsPerPage } = self.pagination;

            axios
                .get('/enginner_office/roles', {
                    params: {
                        sort_by: sortBy,
                        descending: descending,
                        page: page,
                        rowsPerPage: rowsPerPage,
                        name: self.filters.name,
                    },
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
        searchRole() {
            const self = this;
            self.getRolesFromApi();
        },
        deleteRole(item) {
            const self = this;
            self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                message: self.trans('messages.you_cant_restore_it'),
                okCb: () => {
                    axios
                        .delete('/enginner_office/roles/' + item.id)
                        .then(function(response) {
                            self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });

                            if (response.data.success === true) {
                                self.getRolesFromApi();
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
    },
};
</script>
