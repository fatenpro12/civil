<template>
    <v-container grid-list-md>
         <AskPermissionModal ref="permissionref" @saveRolePermission="getRequestsRole()" />
         <AskPermissionModalEstate ref="permissionrefestate" @saveRolePermission="getRequestsRole()" />
        <v-card>
            <v-card-title>
                <div>
                    <div class="headline">
                        {{ trans('data.request_role') }}
                    </div>
                </div>
                 <v-spacer></v-spacer>
                <v-btn style="background-color:#06706d;color:white;" class="lighten-1" dark 
                 @click="askforpermission() ">
                    {{ trans('messages.add') }}
                    <v-icon right dark>add</v-icon>
                </v-btn>
            </v-card-title>
            <v-divider></v-divider>
            <!-- v-datatable -->
            <v-data-table
                :headers="headers"
                :pagination.sync="pagination"
                :total-items="total_items"
                :loading="loading"
                :items="items"
                class="elevation-3"
            >
                <template slot="items" slot-scope="props">
                      <td>
                        <div align="center">
                            {{ props.item.id }}
                        </div>
                    </td>
                
                    <td class="mx-auto flex justify-center">
                        <v-btn flat v-if="$can('employee.view')"
                                    @click="
                                        $router.push({
                                            name: 'users.view',
                                            params: { id: props.item.user.id },
                                        })
                                    " align="center">
                            {{ props.item.user.name }}
                        </v-btn>
                    </td>
                
                    <td>
                        <div align="center">
                            {{ getType(props.item.role_id) }}
                        </div>
                    </td>
                        <td>
                        <div align="center">
                            {{ props.item.status }}
                        </div>
                    </td>
                    <td>
                        <div align="center" v-if="props.item.document && props.item.document.media[0]">
                            <a :href="props.item.document.media[0].full_url" download>
                                <v-icon>download</v-icon>
                            </a>
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            {{ props.item.note }}
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            {{ props.item.created_at | formatDate }}
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
    </v-container>
</template>
<script>
import AskPermissionModal from '../../enginnering_office/main/components/AskPermissionModal.vue';
import AskPermissionModalEstate from '../../estate_owner/main/components/AskPermissionModal.vue';
export default {
    components: {
        AskPermissionModal: AskPermissionModal,
        AskPermissionModalEstate
    },
    data() {
        const self = this;
        return {
            total_items: 0,
            loading: true,
            roles: [],
            
            pagination: { totalItems: 0, sortBy: 'created_at', descending: true },
            items: [],
            headers: [
                 {
                    text: self.trans('data.id'),
                    value: 'id',
                    align: 'center',
                    sortable: true,
                },
                {
                    text: self.trans('data.requester'),
                    value: 'requester',
                    align: 'center',
                    sortable: true,
                },
                {
                    text: self.trans('data.role_name'),
                    value: 'role_name',
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
                    text: self.trans('data.document'),
                    value: 'document',
                    align: 'center',
                    sortable: false,
                },
                {
                    text: self.trans('data.note'),
                    value: 'note',
                    align: 'center',
                    sortable: false,
                },
                {
                    text: self.trans('data.created_at'),
                    value: 'created_at',
                    align: 'center',
                    sortable: true,
                },
            ],
        };
    },
    watch: {
        pagination: {
            handler() {
                const self = this;
                self.getRequestsRole();
            },
        },
    },
    created() {
        const self = this;
        self.getRequestsRole();
        self.loadRoles();

    },
    methods: {
        askforpermission() {
            const self = this;
            if(self.getCurrentUser().user_type_log='ENGINEERING_OFFICE_MANAGER')
            this.$refs.permissionref.create();
            else if(self.getCurrentUser().user_type_log='ESTATE_OWNER')
             this.$refs.permissionrefestate.create();
            
        },
        getRequestsRole() {
            const self = this;
            self.loading = true;
            const { sortBy, descending, page, rowsPerPage } = self.pagination;
            axios
                .get('/requests-role', {
                    params: {
                        sort_by: sortBy,
                        descending: descending,
                        page: page,
                        rowsPerPage: rowsPerPage,
                    },
                })
                .then(function (response) {
                    self.total_items = response.data.total;
                    self.items = response.data.data.filter(x => x.user_id == self.getCurrentUser().id);
                    self.loading = false;
              
                })
                  .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });;
        },
        loadRoles() {
            const self = this;
            axios
                //.get('/admin/users/create')
                .get('/create-user')
                .then(function (response) {
                    self.roles = response.data.roles;
                })
                  .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });;
        },
        getType(role_id) {
            const self = this;
            return self.roles.find((o) => o.id == role_id) != null
                ? self.roles.find((o) => o.id == role_id).name
                : null;
        },
     
    },
};
</script>
