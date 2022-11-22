<!-- Employees -->
<template>
    <div class="component-wrap" :class="$vuetify.breakpoint.xsOnly?'pt-3':''">
        <view1 ref="designView"></view1>
<AcceptModelDEsignRequest ref="acceptenginneringoffice" @refreshTable="refreshTable"/>
 <PricePdf ref="pdfPrice" @refreshTable="refreshTable($event)" />
        <v-card class="mt-3">
            <v-card-title>
                <div>
                    <div class="headline">
                        {{ trans('data.contractor_requests') }}
                    </div>
                </div>
                <v-spacer></v-spacer>
            </v-card-title>
            <v-divider></v-divider>
            <!-- data table -->
            <v-data-table
                v-bind:headers="headers"
                v-bind:pagination.sync="pagination"
                ref="contractorData"
                :items="items"
                :total-items="totalItems"
                class="elevation-3"
            >
                <template slot="headerCell" slot-scope="props">
                    <span v-if="props.header.value == 'created_by'">
                        <v-icon small>person</v-icon> {{ props.header.text }}
                    </span>
                    <span v-else-if="props.header.value == 'email'">
                        <v-icon small>email</v-icon> {{ props.header.text }}
                    </span>
                    <span v-else-if="props.header.value == 'roles'">
                        <v-icon small>control_point</v-icon> {{ props.header.text }}
                    </span>
                    <span v-else-if="props.header.value == 'created_at'">
                        <v-icon small>av_timer</v-icon> {{ props.header.text }}
                    </span>
                    <span v-else>{{ props.header.text }}</span>
                </template>
                <template slot="items" slot-scope="props">
                     <tr>
                    <td class="flex juistify-center">
                        <div class="flex" align="center">
                            <v-btn small fab dark color="success" @click="viewDesign(props.item)">
                                <v-icon color="white">info</v-icon>
                            </v-btn>
                            <v-btn
                                v-if="props.item.status == 'new'"
                                :disabled="!checkActive()"
                                small
                                fab
                                color="success"
                                @click="edit(props.item)"
                            >
                                <v-icon color="white">edit</v-icon>
                            </v-btn>
                              <div>
                                <v-btn
                                    color="primary"
                                    small
                                    fab
                                     v-if="props.item.offices.find(val => val.pivot.office_id == getCurrentUser().id).pivot.office_status =='recieved'"
                                    :disabled="!checkActive()"
                                    @click="acceptProject(props.item)"
                                >
                                    <v-icon color="white">check</v-icon>
                                    <!--{{trans('data.accept')}}-->
                                </v-btn>
                            </div>
<div>
                                <v-btn
                                    color="primary"
                                    small
                                    fab
                                    v-if="props.item.offices.find(val => val.pivot.office_id == getCurrentUser().id).pivot.office_status =='accepted'"
                                    :disabled="!checkActive()"
                                    @click="viewPrice(props.item)"
                                >
                                    <v-icon color="white">visibility</v-icon>
                                    <!--{{trans('data.accept')}}-->
                                </v-btn>
                            </div>
                            <div>
                                <v-btn
                                    color="primary"
                                    small
                                    fab
                                    :disabled="!checkActive()"
                                    v-if="props.item.sent == 0 && props.item.status == 'new'"
                                    @click="sendRequest(props.item.id)"
                                >
                                    <v-icon color="white">mail</v-icon>
                                    <!--{{trans('data.accept')}}-->
                                </v-btn>
                            </div>

                            <v-btn
                                color="error"
                                :disabled="!checkActive()"
                                v-if="props.item.status == 'new' || props.item.status == 'rejected'"
                                small
                                fab
                                @click="trash(props.item.id)"
                            >
                                <v-icon color="white">delete</v-icon>
                                <!-- {{trans('messages.cancel')}}-->
                            </v-btn>
                        </div>
                    </td>

                    <td>
                        <div align="center">{{ props.item.id }}</div>
                    </td>

                    <td>
                        <div align="center">
                            <v-chip
                                class="ma-2"
                                :disabled="!checkActive()"
                                v-if="props.item.status != ''"
                                :color="getColor(props.item.status)"
                                text-color="white"
                            >
                                {{ props.item.status }}
                            </v-chip>
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            {{ props.item.customer.name }}
                        </div>
                    </td>
                      <td>
                       <div align="center">
                          {{ props.item.creator.name }}
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            <v-btn
                                small
                                fab
                                dark
                                color="teal"
                                @click="viewProject(props.item.project_id)"
                            >
                                {{ props.item.project.name }}
                                <!-- {{trans('messages.add')}}-->
                            </v-btn>
                        </div>
                    </td>

                    <td>
                        <div align="center">
                            {{ props.item.created_at ? createdDate(props.item.created_at) : '-' }}
                        </div>
                    </td>
                     </tr>
                </template>
           
            </v-data-table>
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
    </div>
</template>

<script>
import Create from './Create';
import Edit from './Edit';
import view1 from './view1';
import _ from 'lodash';
import AcceptModelDEsignRequest from './AcceptModelDEsignRequest';
import PricePdf from '../../common/PricePdf.vue'
 
export default {
    components: {
        view1,
        Create,
        Edit,
       AcceptModelDEsignRequest,
       PricePdf
    },
    data() {
        const self = this;
        return {
            expand: true,
            dialog: false,
            loading: false,
            headers: [
                {
                    text: self.trans('messages.action'),
                    value: false,
                    align: 'center',
                    sortable: false,
                },
                {
                    text: self.trans('messages.id'),
                    value: 'id',
                    align: 'center',
                    sortable: true,
                },
                {
                    text: self.trans('messages.status'),
                    value: 'status',
                    align: 'center',
                    sortable: true,
                },
                {
                    text: self.trans('messages.customer'),
                    value: 'customer',
                    align: 'center',
                    sortable: true,
                },
                    {
                    text: self.trans('data.created_by'),
                    value: 'creator.name',
                    align: 'center',
                    sortable: true,
                },
                {
                    text: self.trans('data.project_name'),
                    value: 'project_name',
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
            items: [],
            totalItems: 0,
            pagination: {
                rowsPerPage: 10,
            },

            tabs: 'tab-1',
            filters: {
                name: '',
            },
        };
    },
    mounted() {
        const self = this;
        self.$eventBus.$on(
            ['DESIGN_ADDED', 'DESIGN__UPDATED', 'DESIGN__DELETED', 'DESIGN__ADDED'],
            () => {
                self.loadRequests(() => {});
            }
        );
    },
    watch: {
        'pagination.page': function () {
            this.loadRequests(() => {});
        },
        'pagination.rowsPerPage': function () {
            this.loadRequests(() => {});
        },
        'filters.name': _.debounce(() => {
            const self = this;
            self.loadRequests(() => {});
        }, 700),
    },
    methods: {
        refreshTable(){
            this.loadRequests();
        },
        
        viewPrice(item){
         const self = this;
         let pdf_data=[
            item,item.media[0],
            self.getCurrentUser().id,'office_eng',
            null,null
           ]
            self.$refs.pdfPrice.openDialog(pdf_data)
        },
           acceptProject(item) {
            const self = this;
          //  console.log(item)
            self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                message: self.trans('messages.are_you_sure'),
                okCb: () => {
                    let data = {
                        status: item.status,
                        id: item.id,
                        project: item.project,
                        office_id: self.getCurrentUser(),
                    };
                    self.$refs.acceptenginneringoffice.create(data);
                },
                cancelCb: () => {
                    console.log('CANCEL');
                },
            });
        },
        sendRequest(id) {
            const self = this;
            self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                okCb: () => {
                    axios
                        .post('/estate_owner/confirm-design', { design_id: id })
                        .then(function (response) {
                            if (response.data.success === true) {
                                self.$eventBus.$emit('DESIGN__UPDATED');
                                self.$store.commit('showSnackbar', {
                                    message: response.data.msg,
                                    color: response.data.success,
                                });
                            } else {
                                self.$store.commit('showSnackbar', {
                                    message: response.data.msg,
                                    color: response.data.success,
                                });
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
        createdDate(date) {
            const current_datetime = new Date(date);
            return current_datetime.toLocaleDateString('en-US');
        },
        create() {
            const self = this;
            self.$refs.designAdd.create();
        },
        edit(item) {
            const self = this;
            self.$refs.designEdit.create(item);
        },
        viewDesign(item) {
            const self = this;
             self.$refs.designView.create(item);
        },
        createdDate(date) {
            const current_datetime = new Date(date);
            return current_datetime.toLocaleDateString('en-US');
        },
        trash(id) {
            const self = this;
            self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                message: self.trans('messages.you_cant_restore_it'),
                okCb: () => {
                    axios
                        .delete('/estate_owner/request-design/' + id)
                        .then(function (response) {
                            if (response.data.success === true) {
                                self.$eventBus.$emit('DESIGN__DELETED');
                                self.$store.commit('showSnackbar', {
                                    message: response.data.msg,
                                    color: response.data.success,
                                });
                            } else {
                                self.$store.commit('showSnackbar', {
                                    message: response.data.msg,
                                    color: response.data.success,
                                });
                            }
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

        loadRequests() {
            const self = this;
            let params = {
                page: self.pagination.page,
                rowsPerPage: self.pagination.rowsPerPage,
            };

            axios.get('/contracting_company/request-contractor', { params: params }).then(function (response) {
                if (response.data.success === true) {
                    self.items = response.data.msg.data;
                    self.totalItems = response.data.msg.total;
                    self.pagination.totalItems = response.data.msg.total;
                    self.$forceUpdate()
                } else {
                    self.$store.commit('showSnackbar', {
                        message: response.data.msg,
                        color: response.data.success,
                    });

                    self.$store.commit('hideLoader');
                }
            });
        },

    },
};
</script>
<style scoped>
td{
    width: 30%;
}
</style>
