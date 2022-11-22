<template>
  <div>
        <v-container grid-list-md>
            <v-layout row pt-3>
                <v-flex xs12 sm12>
                    <v-card class="elevation-3 w-full">
            <v-card-title style="width: 100%;display: flex;justify-content: space-between;">
                    <div class="headline">
                        {{ trans('data.all_service_types') }}
                    </div>
                         <v-btn style="color: #06706d" @click="AddService">
                {{ trans('data.serviceTypeAdd') }}
            </v-btn>
            </v-card-title>
              <v-divider></v-divider>
                        <v-card-text>
            <!-- Data table -->
          
            <v-data-table
                :headers="headers"
                :pagination.sync="pagination"
                :total-items="total_items"
                :loading="loading"
                :items="items"
                
    :expanded.sync="expanded"
    show-expand
                class="elevation-3"
            >
                <template slot="items" slot-scope="props">
                    <td align="center">
                        <v-menu>
                            <v-btn icon slot="activator"> <v-icon>more_vert</v-icon> </v-btn>
                            <v-list>

                                <v-list-tile
                                    v-if="$can('serviceType.edit')"
                                    @click="edit(props.item.id)"
                                >
                                    <v-list-tile-title>
                                        <v-icon small class="mr-2"> edit </v-icon>
                                        {{ trans('messages.edit') }}
                                    </v-list-tile-title>
                                </v-list-tile>

                                <v-list-tile
                                    v-if="$can('serviceType.delete')"
                                    @click="deleteCustomer(props.item)"
                                >
                                    <v-list-tile-title>
                                        <v-icon small class="mr-2"> delete_forever </v-icon>
                                        {{ trans('messages.delete') }}
                                    </v-list-tile-title>
                                </v-list-tile>
                            </v-list>
                        </v-menu>
                    </td>
                    <td align="center">{{ props.item.id }}</td>
                    <td align="center">{{ props.item.name_ar }}</td>
                    <td align="center">{{ props.item.name_en }}</td>
                 
                </template>
       
            </v-data-table>
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
             <AddServiceType :externalDialogAdd="externalDialogAdd" @close="externalDialogAdd = $event" @store="externalDialogAdd = $event;getDataFromApi()" />
             <EditServiceType :service_type="service_type" :externalDialogEdit="externalDialog" @close="externalDialogEdit = $event" @update="externalDialogEdit = $event;getDataFromApi()" />
        </div>
        
</template>

<script>
import AddServiceType from '../service_type/Add.vue'
import EditServiceType from '../service_type/Edit.vue'
export default {
    components:{
        AddServiceType,
        EditServiceType
    },
    data() {
        const self = this;
        return {
            externalDialog: false,
            externalDialogAdd:  false,
            service_type: {},
            total_items: 0,
            loading: true,
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
                    text: self.trans('data.name_ar'),
                    value: 'name_ar',
                    align: 'center',
                    sortable: true,
                },
                    {
                    text: self.trans('data.name_en'),
                    value: 'name_en',
                    align: 'center',
                    sortable: true,
                },
                { text: '', value: 'data-table-expand' }
          
            ],
            items: [],
            search: '',
            expanded: false,
        };
    },
    watch: {
        pagination: {
            handler() {
                this.getDataFromApi();
            },
        },
    },
    mounted() {
        const self = this;
        self.$eventBus.$on('updateCustomerTable', data => {
            self.getDataFromApi();
        });
    },
    beforeDestroy() {
        const self = this;
        self.$eventBus.$off('updateCustomerTable');
    },
    methods: {
        AddService(){
          this.externalDialogAdd = true
        },
        getDataFromApi() {
            this.loading = true;

            const { sortBy, descending, page, rowsPerPage } = this.pagination;
            const self = this;
            var params = {
                sort_by: sortBy,
                descending: descending,
                page: page,
                rowsPerPage: rowsPerPage,
            };
            if (self.search) {
                params['term'] = self.search;
            }

            axios
                .get('/serviceTypes', {
                    params: params,
                })
                .then(function(response) {
                    self.total_items = response.data.total;
                    self.items = response.data;
                    self.loading = false;
                    self.$forceUpdate()
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        create() {
            const self = this;
            var templateType = { template: 'customer' };
            self.$refs.customerAdd.create(templateType);
        },
        edit(id) {
           const self = this;
            axios
                .get('/serviceTypes/' + id +'/edit' )
                .then(function(response) {
                    self.service_type = response.data;
                    self.externalDialog = true
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        deleteCustomer(item) {
            const self = this;
            self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                message: self.trans('messages.you_cant_restore_it'),
                okCb: () => {
                    axios
                        .delete('/serviceTypes/' + item.id )
                        .then(function(response) {
                            self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });

                            if (response.data.success === true) {
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
        customerContact(item) {
            const self = this;
            self.$router.push({ name: 'customers.contacts.list', params: { id: item.id } });
        },
        searchCustomer() {
            const self = this;
            self.getDataFromApi();
        },
    },
}
</script>