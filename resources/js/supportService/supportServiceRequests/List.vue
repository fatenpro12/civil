<!-- Employees -->
<template>
    <div class="component-wrap" :class="$vuetify.breakpoint.xsOnly?'pt-3':''">
<AcceptModelDEsignRequest ref="acceptenginneringoffice" @refreshTable="refreshTable"/>
<PricePdf ref="pdfPrice" @refreshTable="refreshTable($event)" />
             <DesignRequest url="/support_service_office/request-support-service" :headers="headers" ref="requestList" :title="trans('data.support_service_requests')">
    <template #actions="{props}">

                                <v-btn
                                    color="primary"
                                    small
                                    fab
                                     v-if="props.item.offices.find(val => val.pivot.office_id == getCurrentUser().id).pivot.office_status =='recieved'"
                                    :disabled="!checkActive()"
                                    @click="acceptProject(props.item)"
                                >
                                    <v-icon color="white">check</v-icon>
                                
                                </v-btn>
                                <v-btn
                                    color="primary"
                                    small
                                    fab
                                    v-if="props.item.offices.find(val => val.pivot.office_id == getCurrentUser().id).pivot.office_status =='accepted'"
                                    :disabled="!checkActive()"
                                    @click="viewPrice(props.item)"
                                >
                                    <v-icon color="white">visibility</v-icon>
                                   
                                </v-btn>
                        
    </template>
<template #specialCols="{props}">
     <td>
                        <div align="center" v-if="props.item.service_type">
                            {{ props.item.service_type['name_'+getCurrentLang()] }}
                        </div>
                    </td>
        <td>
                       <div align="center">
                          {{ props.item.creator }}
                        </div>
                    </td>
</template>
    </DesignRequest>
    </div>
</template>

<script>

import _ from 'lodash';
import AcceptModelDEsignRequest from './AcceptModelDEsignRequest';
 import PricePdf from '../../common/PricePdf.vue'
import DesignRequest from '../../common/design-request/List'
export default {
    components: {
        PricePdf,
DesignRequest,
       AcceptModelDEsignRequest
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
                    text: self.trans('data.created_by'),
                    value: 'creator',
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
      
    },
};
</script>
<style scoped>
td{
    width: 30%;
}
</style>
