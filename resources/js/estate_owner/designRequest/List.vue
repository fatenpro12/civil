<!-- Employees -->
<template>

    <div>
     <Edit ref="designEdit"></Edit>
        <Create ref="designAdd"></Create>
        <PricePdf ref="pdfPrice" @refreshTable="refreshTable"/>
    <DesignRequest url="/estate_owner/request-design" :headers="headers" ref="requestList" :title="trans('data.design_requests') ">
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
                    {{ trans('data.create_design') }}
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
                                ||props.item.offices.find(val => val.pivot.office_id == office.id).pivot.office_status =='accepted'" @click="viewDesignPrice(props.item)">
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
import DesignRequest from '../../common/design-request/List'
import Create from '../../common/design-request/Create';
import Edit from '../../common/design-request/Edit';
import PricePdf from '../../common/PricePdf.vue'

export default {
    components: {
      DesignRequest,
      Edit,
      Create,
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
    methods:{
   refreshTable(){
     this.$refs.requestList.loadDesigns()
   },
             edit(item) {
            const self = this;
            self.$refs.designEdit.create(item);
        },
         create() {
            const self = this;
            self.$refs.designAdd.create();
        },
               viewDesignPrice(item){
           const self = this;
         let  pdf_data=[
            item,item.design_enginners[0].media[0],
            item.design_enginners[0].created_by,'owner',
            'estate_owner/acceptDesignRequestOffer',
            'estate_owner/rejectDesignRequestOffer'
           ]
           self.$refs.pdfPrice.openDialog(pdf_data)
        },
    }
};
</script>
<style scoped>
td{
    width: 30%;
}
</style>
