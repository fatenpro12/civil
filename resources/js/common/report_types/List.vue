<template>
  <div>
            <v-card-title style="width: 100%;display: flex;justify-content: space-between;">
                    <div class="headline">
                        {{ trans('data.all_report_types') }}
                    </div>
                         <v-btn v-if="getCurrentUser().user_type_log === 'ENGINEERING_OFFICE_MANAGER' || getCurrentUser().user_type_log === 'SITE_MANAGENMENT'" 
                         style="color: #06706d" @click="externalDialogAdd = true">
                {{ trans('data.reportTypeAdd') }}
            </v-btn>
            </v-card-title>
            <v-divider></v-divider>
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
                                    v-if="$can('report.edit')"
                                    @click="edit(props.item.id)"
                                >
                                    <v-list-tile-title>
                                        <v-icon small class="mr-2"> edit </v-icon>
                                        {{ trans('messages.edit') }}
                                    </v-list-tile-title>
                                </v-list-tile>

                                <v-list-tile
                                    v-if="$can('report.delete')"
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
                    <td align="center">{{ props.item.type_name_ar }}</td>
                    <td align="center">{{ props.item.type_name_en }}</td>
                    <td @click="props.expanded = !props.expanded" align="center">
                        <v-icon>arrow_drop_down</v-icon>
                        </td>
                </template>
                  <template v-slot:expand="props">
                         <td :colspan="headers.length">
        <div v-for="(data,index) in props.item.type_list_ar" :key="data">
       {{(index+1)+'-' +  data }}
       </div>
      </td>
      <td :colspan="headers.length">
        <div v-for="data in props.item.type_list_en" :key="data">
       {{ data }}
       </div>
      </td>
    
    </template>
            </v-data-table>
             <AddReportType :externalDialog="externalDialogAdd" @close="externalDialog = event" @store="externalDialog = event" />
             <EditReportType :report_type="report_type" :externalDialog="externalDialog" @close="externalDialog = event" @store="externalDialog = event" />
        </div>
        
</template>

<script>
import EditReportType from '../report_types/Edit.vue'
import AddReportType from '../report_types/Add.vue'
export default {
    components:{
        AddReportType,
        EditReportType
    },
    data() {
        const self = this;
        return {
            externalDialog: false,
            externalDialogAdd:  false,
            report_type: {},
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
                    text: self.trans('data.type_name_ar'),
                    value: 'type_name_ar',
                    align: 'center',
                    sortable: true,
                },
                    {
                    text: self.trans('data.type_name_en'),
                    value: 'type_name_en',
                    align: 'center',
                    sortable: true,
                },
                { text: '', value: 'data-table-expand' }
              /*  {
                    text: self.trans('data.type_list_en'),
                    value: 'type_list_en',
                    align: 'left',
                    sortable: true,
                },
                {
                    text: self.trans('data.type_list_ar'),
                    value: 'type_list_ar',
                    align: 'left',
                    sortable: true,
                },*/
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
                .get('/reportTypes', {
                    params: params,
                })
                .then(function(response) {
                    self.total_items = response.data.total;
                    self.items = response.data;
                    self.loading = false;
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
                .get('/reportTypes/' + id +'/edit' )
                .then(function(response) {
                    console.log(response.data);
                    self.report_type = response.data;
                })
                .catch(function(error) {
                    console.log(error);
                });
                 this.externalDialog = true
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
                        .delete('/reportTypes/' + item.id )
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

<style>

</style>