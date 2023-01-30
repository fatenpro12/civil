<!-- Employees -->
<template>
    <div>
           <AcceptModelDEsignRequest ref="acceptenginneringoffice" />
        <PricePdf ref="pdfPrice" />
 <DesignRequest url="enginner_office/request-design" :headers="headers">
 <template #actions="{props}">
        <div v-if="$hasRole('Engineer') && props.item.offices.find(val => val.pivot.office_id == getCurrentUser().parent_id)" >
                                 <v-btn
                                    color="primary"
                                    small
                                    fab
                                    v-if="props.item.offices.find(val => val.pivot.office_id == getCurrentUser().parent_id).pivot.office_status =='recieved'"
                                    :disabled="!checkActive()"
                                    @click="acceptProject(props.item)"
                                >
                                    <v-icon color="white">check</v-icon>
                                
                                </v-btn>
                                  <v-btn
                                    color="primary"
                                    small
                                    fab
                                    v-if="props.item.offices.find(val => val.pivot.office_id == getCurrentUser().parent_id).pivot.office_status =='finished'"
                                    :disabled="!checkActive()"
                                    @click="viewPrice(props.item)"
                                >
                                    <v-icon color="white">visibility</v-icon>
                                   
                                </v-btn>
                                </div>
                            <div v-else class="flex justify-center">
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
                                    color="secondary"
                                    small
                                    fab
                                    v-if="props.item.offices.find(val => val.pivot.office_id == getCurrentUser().id).pivot.office_status =='recieved'"
                                    :disabled="!checkActive()"
                                    @click="rejectProject(props.item)"
                                >
                                    <v-icon color="white">close</v-icon>
                                   
                                </v-btn>
                                   <v-btn
                                    color="primary"
                                    small
                                    fab
                                    v-if="props.item.offices.find(val => val.pivot.office_id == getCurrentUser().id).pivot.office_status =='finished'"
                                    :disabled="!checkActive()"
                                    @click="viewPrice(props.item)"
                                >
                                    <v-icon color="white">visibility</v-icon>
                               
                                </v-btn>
                            </div>

                            <v-btn
                                color="primary"
                                v-if="
                                    props.item.design_enginners != undefined
                                        ? props.item.design_enginners.filter(
                                              (x) =>
                                                  x.is_active == 1 &&
                                                  x.is_sent==0 &&
                                                  x.is_agreed == 0 &&
                                                  x.is_rejected == 0 &&
                                                  x.enginner_id == getCurrentUser().id
                                          ).length > 0
                                        : false
                                "
                                small
                                fab
                                :disabled="!checkActive() "
                                @click="createReport(props.item.design_enginners)"
                            >
                                <v-icon color="white"> list </v-icon>
                       
                            </v-btn>
                        
 </template>
 <template #office="{props}">
      <td v-if="$hasRole('Engineer')">
                        <div align="center">
                            <v-chip
                                class="ma-2"
                                :disabled="!checkActive()"
                                :color="getColor(props.item.offices.find(val => val.pivot.office_id == getCurrentUser().parent_id).pivot.office_status)"
                                text-color="white"
                            >
                                {{ props.item.offices.find(val => val.pivot.office_id == getCurrentUser().parent_id).pivot.office_status }}
                            </v-chip>
                        </div>
                    </td>
                    <td v-else>
                          <div align="center">
                            <v-chip
                                class="ma-2"
                                :disabled="!checkActive()"
                                :color="getColor(props.item.offices.find(val => val.pivot.office_id == getCurrentUser().id).pivot.office_status)"
                                text-color="white"
                            >
                                {{ props.item.offices.find(val => val.pivot.office_id == getCurrentUser().id).pivot.office_status }}
                            </v-chip>
                        </div>
                    </td>
 </template>
 </DesignRequest>
    </div>
</template>

<script>

import AcceptModelDEsignRequest from '../../common/design-request/AcceptModelDEsignRequest';
import DesignRequest from '../../common/design-request/List'
import _ from 'lodash';
import PricePdf from '../../common/PricePdf.vue'
import store from '../../store'

export default {
    components: {
      DesignRequest,
        AcceptModelDEsignRequest,
        PricePdf
    },
data(){
    const self =this
return {
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
                    text: self.trans('data.office_status'),
                    value: 'office_status',
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
                    value: 'project.projectId',
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
}
},

    methods: {
    
        viewPrice(item){
         const self = this;
         
          let pdf_data=[
            item,item.design_enginners[0].media[0],
            self.getCurrentUser().parent_id?self.getCurrentUser().parent_id:self.getCurrentUser().id,'office_eng',
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
                    self.$refs.acceptenginneringoffice.create(data)
                     axios.post('/enginner_office/accept-design-request', data).then(function (response) {
                 /*   if (response.data.success) {
                        self.loading = false;
                        self.dialog = false;
                        self.$store.commit('hideLoader');
                        self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });
                        self.inputs = [];
                       self.$eventBus.$emit('DESIGN_ADDED', response.data);

                    } else {
                        self.$store.commit('hideLoader');
                        self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });
                    }*/
                });
                },
                cancelCb: () => {
                    console.log('CANCEL');
                },
            });
        },
   rejectProject(item) {
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
                          axios.post('/enginner_office/reject-design-request', data).then(function (response) {
                    if (response.data.success) {
                        self.loading = false;
                
                        self.$emit('next');
                        self.$store.commit('hideLoader');
                        self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });
                                          self.$eventBus.$emit('DESIGN_ADDED', response.data);

                    } else {
                        self.$store.commit('hideLoader');
                        self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });
                    }
                });
                },
                cancelCb: () => {
                    console.log('CANCEL');
                },
            });
        },

        createReport(design_enginners) {
            const self = this;
             var data=design_enginners.length > 0
                                        ? design_enginners.find(
                                              (x) =>
                                                  x.is_active == 1 &&
                                                  x.enginner_id == self.getCurrentUser().id
                                          ): null;
            self.$router.push({
                name: 'create_design_request_price__enginnering_office',
                params: {
                    id: data != undefined ? data.id : null
                },
            });
        },
    },
};
</script>
