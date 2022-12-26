<!-- Employees -->
<template>
    <div>
        <Create ref="designAdd"></Create>
        <Edit ref="designEdit"></Edit>
        <PricePdf ref="pdfPrice" @refreshTable="refreshTable($event)" />
     <DesignRequest url="/estate_owner/request-contractor" :headers="headers" ref="requestList" :title="trans('data.contractor_requests')">
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
                    {{ trans('data.create_contractor_request') }}
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
        DesignRequest,
        Create,
        Edit,
       PricePdf
    },
    data() {
        const self = this;
        return {
            expand: true,
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
            let  pdf_data=[
            item,item.media[0],
            office_id,'owner',
            'estate_owner/acceptContractorRequestOffer',
            'estate_owner/rejectContractorRequestOffer'
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
                        .delete('/estate_owner/request-contractor/' + id)
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
