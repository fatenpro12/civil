
<!-- For customer -->
<template>
    <div>
    <VisitRequest url="get-requests">
        <template #expandIcon="{props}">
             <v-icon  v-if="props.item.offices.length>0" @click="props.expanded = !props.expanded">arrow_drop_down</v-icon>
        </template>
        <template #offices="{props}">
              <v-card flat>
            <v-card-text v-if="props.item.offices.length>0">
                    <table>
                        <tr>
                             <td width="30%"><span>{{ props.item.offices[0].name }}</span></td>
                             <td width="30%"> <v-chip
                                :disabled="!checkActive()"
                                :color="getColor(props.item.offices[0].pivot.office_status)"
                                text-color="white"
                            >
                                 {{trans('data.office_status')+' '+ props.item.offices[0].pivot.office_status}}
                            </v-chip></td>
                             <td width="30%"> <v-btn dark color="success" v-if="props.item.report && props.item.offices[0].pivot.office_status =='accepted'" 
                                @click="viewReport(props.item)">
                                {{trans('data.report')}}
                            </v-btn></td></tr>
                            </table>
                    
            </v-card-text>
          </v-card>
        </template>
    </VisitRequest>
    </div>
</template>
<script>

import VisitRequest from '../../common/visit-request/List'
export default {
    components: {VisitRequest},
methods:{
 
}

};
</script>
