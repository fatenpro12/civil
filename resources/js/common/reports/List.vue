<template>
  <div>
            <v-card-title>
                <div>
                    <div class="headline">
                        {{ trans('data.reports') }}
                    </div>
                </div>
                       <v-btn style="color: #06706d" 
                       v-if="$can('report.create')"
                                                                    :disabled="!checkActive()"
                                                                    @click="
                                                                        $router.push({
                                                                            name: 'add_report',
                                                                        })
                                                                    ">
                {{ trans('data.create_a_report') }}
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
                class="elevation-3"
            >
                <template slot="items" slot-scope="props">
                    <td align="center">
                        <v-menu>
                            <v-btn icon slot="activator"> <v-icon>more_vert</v-icon> </v-btn>
                            <v-list>
                                 <v-list-tile
                                    v-if="$can('report.view')"
                                   @click="$router.push({name: 'edit_report', 
                                   params:{
                                    id: props.item.id,//media?props.item.media[0].full_url?props.item.media[0].full_url:props.item.media[0].original_url:props.item.id,
                                    item: props.item
                                   }
                                                                        })">
                                    <v-list-tile-title>
                                        <v-icon small class="mr-2"> visibility </v-icon>
                                        {{ trans('data.report_review') }}
                                    </v-list-tile-title>
                                </v-list-tile>
                                <v-list-tile
                                    v-if="$can('report.delete')"
                                    @click="deleteReport(props.item)"
                                >
                                    <v-list-tile-title>
                                        <v-icon small class="mr-2"> delete_forever </v-icon>
                                        {{ trans('messages.delete') }}
                                    </v-list-tile-title>
                                </v-list-tile>
                            </v-list>
                        </v-menu>
                    </td>
                    <td align="center">{{props.item.id}}</td>
                    <td align="center">{{ props.item.project.customer.name }}</td>
                    <td align="center">{{ props.item.type?props.item.type.name:null }}</td>
                    <td align="center" >
                        <span v-if="props.item.report_status === 'Acceptable'">{{ trans('data.Acceptable') }}</span>
                        <span v-if="props.item.report_status === 'withComments'">{{ trans('data.Accepted comments') }}</span>
                        <span v-if="props.item.report_status === 'unacceptable'">{{ trans('data.unacceptable') }}</span>
                    </td>
                    <td align="center">{{props.item.office.roles.find(val=>val.id === 7)?props.item.office.parent.name:props.item.office.name}}</td>
                     <td align="center">
                        <span v-for="contractor in props.item.project.members.filter(val => val.user_type_log === 'CONTRACTING_COMPANY')" :key="contractor.id">
                        {{ contractor.name }}
                        </span>
                        </td>
                    <td align="center">{{ props.item.project.name }}</td>
                      <td align="center">{{ props.item.created_at | formatDate }}</td>
                </template>
        
            </v-data-table>
             <EditReportType :report_type="report_type" :externalDialog="externalDialog" @close="externalDialog = event" @store="externalDialog = event" />
        </div>
        
</template>

<script>
import EditReportType from '../report_types/Edit.vue'

export default {
    components:{
        EditReportType
    },
    data() {
        const self = this;
        return {
            externalDialog: false,
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
                    text: self.trans('data.owner'),
                    value: 'project.customer.name',
                    align: 'center',
                    sortable: true,
                },
                     {
                    text: self.trans('data.report_type'),
                    value: 'type.name',
                    align: 'center',
                    sortable: true,
                },
                     {
                    text: self.trans('data.status'),
                    value: 'status',
                    align: 'center',
                    sortable: false,
                },
                  {
                    text: self.trans('data.enginnering_office_name'),
                    value: 'office.name',
                    align: 'center',
                    sortable: true,
                },
                  {
                    text: self.trans('data.contractor'),
                    value: 'contractor.name',
                    align: 'center',
                    sortable: true,
                },
                     {
                    text: self.trans('data.project'),
                    value: 'project.name',
                    align: 'center',
                    sortable: true,
                },
                      {
                    text: self.trans('data.created_at'),
                    value: 'created_at',
                    align: 'center',
                    sortable: true,
                },
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
        openReport(report){
            if(report.media.length>0)
        window.open(report.media[report.media.length-1].full_url, '_blank') //.replace('upload','public/upload')
        },
        getDataFromApi() {
            this.loading = true;

            const { sortBy, descending, page, rowsPerPage } = this.pagination;
            const self = this;
            var params = {
              //  sort_by: sortBy,
              //  descending: descending,
                page: page,
                rowsPerPage: rowsPerPage,
            };
            if (self.search) {
                params['term'] = self.search;
            }

            axios
                .get('/reports', {
                    params: params,
                })
                .then(function(response) {
                    self.total_items = response.data.total;
                    self.items = response.data.data;
                    if(self.$route.params.id)
                    self.items = self.items.filter(x => x.project_id === self.$route.params.id)
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
                .get('/reports/' + id +'/edit' )
                .then(function(response) {
                    console.log(response.data);
                    self.report_type = response.data;
                   
                })
                .catch(function(error) {
                    console.log(error);
                });
                 this.externalDialog = true
        },
        deleteReport(item) {
            const self = this;
            self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                message: self.trans('messages.you_cant_restore_it'),
                okCb: () => {
                    axios
                        .delete('/reports/' + item.id )
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

<style scoped>

</style>