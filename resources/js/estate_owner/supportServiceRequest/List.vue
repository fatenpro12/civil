<!-- Employees -->
<template>
    <div>
        <Create ref="designAdd"></Create>
        <Edit ref="designEdit"></Edit>
        <PricePdf ref="pdfPrice" @refreshTable="refreshTable($event)" />

        <!--<v-card class="mt-3">
            <v-card-title>
                <div>
                    <div class="headline">
                        {{ trans('data.support_service_requests') }}
                    </div>
                </div>
                <v-spacer></v-spacer>
                <v-btn
                    :disabled="!checkActive()"
                    @click="create()"
                    style="background-color: #06706d; color: white"
                    class="lighten-1"
                >
                    {{ trans('data.create_support_service_request') }}
                    <v-icon right dark>add</v-icon>
                </v-btn>
            </v-card-title>
            <v-divider></v-divider>

            <v-data-table
                v-bind:headers="headers"
                v-bind:pagination.sync="pagination"
                ref="contractorData"
                :items="items"
                :total-items="totalItems"
                :expand="expand"
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
                    <td>
                        <div align="center">
                            <v-icon @click="props.expanded = !props.expanded">arrow_drop_down</v-icon>
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
                                    :disabled="!checkActive()"
                                    v-if="props.item.sent == 0 && props.item.status == 'new'"
                                    @click="sendRequest(props.item.id)"
                                >
                                    <v-icon color="white">mail</v-icon>
                                 
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
                        <div align="center" v-if="props.item.service_type">
                            {{ props.item.service_type['name_'+getCurrentLang()] }}
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
                 <template v-slot:expand="props">
          <v-card flat>
            <v-card-text>
                <div align="center" v-for="(office) in props.item.offices" :key="office.id">
                    <table>
                        <tr>
                             <td><span>{{ office.name }}</span></td>
                             <td> <v-chip
                                :disabled="!checkActive()"
                                :color="getColor(props.item.offices.find(val => val.pivot.office_id == office.id).pivot.office_status)"
                                text-color="white"
                            >
                                 {{trans('data.office_status')+' '+ props.item.offices.find(val => val.pivot.office_id == office.id).pivot.office_status}}
                            </v-chip></td>
                             <td> <v-btn dark color="success" v-if="props.item.offices.find(val => val.pivot.office_id == office.id).pivot.office_status =='finished'
                                ||props.item.offices.find(val => val.pivot.office_id == office.id).pivot.office_status =='accepted'" @click="viewDesignPrice(props.item,office.id)">
                                {{trans('data.viewPrice')}}
                            </v-btn></td></tr>
                            </table>
                        </div>
            </v-card-text>
          </v-card>
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
        <br />-->
           <DesignRequest url="/estate_owner/request-support-service" :headers="headers" ref="requestList" :title="trans('data.support_service_requests')">
    <template #arrow="{props}">
        <v-icon @click="props.expanded = !props.expanded">arrow_drop_down</v-icon>
    </template>
    <template #addRequest>
         <v-btn
                    :disabled="!checkActive()"
                    @click="create()"
                    style="background-color: #06706d; color: white"
                    class="lighten-1"
                >
                    {{ trans('data.create_support_service_request') }}
                    <v-icon right dark>add</v-icon>
                </v-btn>
    </template>
    <template #actions="{props}">
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
                                @click="$refs.requestList.trash(props.item.id)"
                            >
                                <v-icon color="white">delete</v-icon>
                                <!-- {{trans('messages.cancel')}}-->
                            </v-btn>
                        
    </template>
      <template #expand="{props}">
                              <v-card flat>
            <v-card-text>
                <div align="center" v-for="(office,index) in props.item.offices" :key="office.id">
                    <table>
                        <tr>
                             <td><span>{{ office.name }}</span></td>
                             <td> <v-chip
                                :disabled="!checkActive()"
                                :color="getColor(props.item.offices.find(val => val.pivot.office_id == office.id).pivot.office_status)"
                                text-color="white"
                            >
                                 {{trans('data.office_status')+' '+ props.item.offices.find(val => val.pivot.office_id == office.id).pivot.office_status}}
                            </v-chip></td>
                             <td> <v-btn dark color="success" v-if="props.item.offices.find(val => val.pivot.office_id == office.id).pivot.office_status =='finished'
                                ||props.item.offices.find(val => val.pivot.office_id == office.id).pivot.office_status =='accepted'" @click="viewDesignPrice(props.item,office.id)">
                                {{trans('data.viewPrice')}}
                            </v-btn></td></tr>
                            </table>
                        </div>
            </v-card-text>
          </v-card>
                            </template>
                            <template #specialCols="{props}">
     <td>
                        <div align="center" v-if="props.item.service_type">
                            {{ props.item.service_type['name_'+getCurrentLang()] }}
                        </div>
                    </td>
            </template>
    </DesignRequest>
    </div>
</template>

<script>
import Create from './Create';
import Edit from './Edit';
import _ from 'lodash';
import PricePdf from '../../common/PricePdf.vue'
import DesignRequest from '../../common/design-request/List'

export default {
    components: {
        Create,
        Edit,
       PricePdf,
       DesignRequest
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
                    text: self.trans('data.service_types_list'),
                    value: 'name',
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
    methods: {
      refreshTable(){
             this.$refs.requestList.loadDesigns()
        },

        viewProject(id) {
            const self = this;
            self.$router.push({
                name: 'view_project',
                params: { id: id },
            });
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
        viewDesignPrice(item,office_id){
           const self = this;
           let pdf_data=[
            item,item.media[0],
            office_id,'owner',
            'estate_owner/acceptSupportServiceRequestOffer',
            'estate_owner/rejectSupoortServiceRequestOffer'
           ]
            self.$refs.pdfPrice.openDialog(pdf_data)
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
                        .delete('/estate_owner/request-support-service/' + id)
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

       

      
    },
};
</script>
<style scoped>
td{
    width: 30%;
}
</style>
