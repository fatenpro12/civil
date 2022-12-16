
<!-- For customer -->
<template>
    <div>
        <!--<ViewVisitRequest ref="viewVisitRequest"></ViewVisitRequest>
        <v-card class="mt-3">
            <v-card-title primary-title xs8 sm8>
                <div>
                    <div class="headline">
                        {{ trans('data.visit_requests') }}
                    </div>
                </div>
                <v-spacer></v-spacer>
                <v-btn
                    style="background-color: #06706d; color: white"
                    class="lighten-1"
                    :disabled="!checkActive()"
                    @click="
                        $router.push({
                            name: 'create_visit_estate_request_list',
                            params: { request_type: 'visit_request' },
                        })
                    "
                >
                    {{ trans('messages.add') }}
                    <v-icon right dark>add</v-icon>
                </v-btn>
            </v-card-title>
            <v-divider></v-divider>
            <v-data-table
                :headers="headers"
                :pagination.sync="pagination"
                :total-items="total_items"
                :loading="loading"
                :items="projects"
                :expand="expand"
                class="elevation-3"
            >
                <template slot="items" slot-scope="props">
                     <tr>
                    <td>
                        <div style="display: inline-flex; padding-left: 30%" align="center">
                             <v-icon  v-if="props.item.offices.length>0" @click="props.expanded = !props.expanded">arrow_drop_down</v-icon>
                            <v-btn small fab dark color="success" @click="viewRequest(props.item)">
                               
                                <v-icon color="white">info</v-icon>
                            </v-btn>
                            <v-btn
                                v-if="props.item.status == 'new'"
                                :disabled="!checkActive()"
                                small
                                fab
                                color="success"
                                @click="editRequest(props.item)"
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
                                    @click="sendRequest(props.item)"
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
                                @click="removeProject(props.item.id)"
                            >
                                <v-icon color="white">delete</v-icon>
                      
                            </v-btn>
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            {{ props.item.id }}
                        </div>
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
                                {{
                                    props.item.office_id == currentUser
                                        ? props.item.office_status
                                        : props.item.status
                                }}
                            </v-chip>
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            {{ props.item.customer }}
                        </div>
                    </td>

                    <td>
                        <div align="center">
                            <v-btn
                                small
                                fab
                                dark
                                color="teal"
                                @click="viewProject(props.item.projectId)"
                            >
                                {{ props.item.projectName }}
                          
                            </v-btn>
                        </div>
                    </td>
                        <td>
                        <div align="center">
                            {{
                                props.item.specialties != null ?
                                props.item.specialties.map(x=>x.name).join(',') :''
                                   
                            }}
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
            </v-data-table>
        </v-card>
        <br />
        <div align="center">
            <v-btn style="background-color: #06706d; color: white" @click="$router.go(-1)">
                {{ trans('messages.back') }}
            </v-btn>
        </div>
    </v-container>-->
    <VisitRequest url="get-requests">
        <template #expandIcon="{props}">
             <v-icon  v-if="props.item.offices.length>0" @click="props.expanded = !props.expanded">arrow_drop_down</v-icon>
        </template>
        <template #actions="{props}">
              <v-btn
                                v-if="props.item.status == 'new'"
                                :disabled="!checkActive()"
                                small
                                fab
                                color="success"
                                @click="editRequest(props.item)"
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
                                    @click="sendRequest(props.item)"
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
                                @click="removeProject(props.item.id)"
                            >
                                <v-icon color="white">delete</v-icon>
                                <!-- {{trans('messages.cancel')}}-->
                            </v-btn>
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
    data() {
        const self = this;
        return {

            headers: [
                {
                    text: self.trans('messages.action'),
                    value: false,
                    align: 'center',
                    sortable: false,
                },
                {
                    text: self.trans('data.id'),
                    value: false,
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
                    text: self.trans('data.enginnering_type'),
                    value: 'enginnering_type',
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

};
</script>
