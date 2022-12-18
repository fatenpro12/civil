
<!-- For customer -->
<template>
   <!-- <v-container grid-list-md :class="$vuetify.breakpoint.xsOnly?'':''">

<ViewVisitRequest ref="viewVisitRequest"></ViewVisitRequest>
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
                    v-if="$can('tickets.create')"
                    class="lighten-1"
                    :disabled="!checkActive()"
                    @click="
                        $router.push({
                            name: 'create_visit_enginner_office_request_list',
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
                class="elevation-3"
            >
                <template slot="items" slot-scope="props">
                    <td>
                        <div style="display: inline-flex; padding-left: 30%" align="center">
                            <v-btn small fab dark color="success" @click="viewRequest(props.item)">
                                <v-icon color="white">info</v-icon>
                            </v-btn>

                          
                            <div>
                                <v-btn
                                    color="primary"
                                    small
                                    fab
                                    v-if="props.item.status == 'sent'"
                                    :disabled="!checkActive()"
                                    @click="acceptProject(props.item)"
                                >
                                    <v-icon color="white">check</v-icon>
                                  
                                </v-btn>
                            </div>
                            <div>
                                <v-btn
                                    color="primary"
                                    small
                                    fab
                                    v-if="
                                        props.item.request_enginners != undefined
                                            ? props.item.request_enginners.filter(
                                                  (x) =>
                                                      x.user_id == currentUser && x.is_cheaked == 0
                                              ).length > 0
                                            : false
                                    "
                                    :disabled="!checkActive()"
                                    @click="acceptRequestByEnginner(props.item)"
                                >
                                    <v-icon color="white">check</v-icon>
                                   
                                </v-btn>
                            </div>

                      

                            <v-btn
                                color="error"
                                v-if="props.item.status == 'sent'"
                                small
                                fab
                                :disabled="!checkActive()"
                                @click="rejectProject(props.item.id)"
                            >
                                <v-icon color="white">cancel</v-icon>
                              
                            </v-btn>

                            <v-btn
                                color="primary"
                                v-if="
                                    props.item.request_enginners != undefined
                                        ? props.item.request_enginners.filter(
                                              (x) => x.user_id == currentUser && x.is_cheaked == 1
                                          ).length > 0
                                        : false
                                "
                                small
                                fab
                                :disabled="!checkActive()"
                                @click="createReport(props.item)"
                            >
                                <v-icon color="white"> list </v-icon>
                             
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
                                v-if="true"
                                fab
                                dark
                                color="teal"
                                @click="viewProject(props.item.projectId)"
                            >
                                {{ props.item.projectName }}

                             
                            </v-btn>
                            <span v-else> {{ props.item.projectName }}</span>
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            {{
                                props.item.specialties != null
                                    ? props.item.specialties.map((x) => x.name).join(',')
                                    : ''
                            }}
                        </div>
                    </td>

                    <td>
                        <div align="center">
                            {{ props.item.created_at ? createdDate(props.item.created_at) : '-' }}
                        </div>
                    </td>
                </template>
            </v-data-table>
        </v-card>
        <br />
        <div align="center">
            <v-btn style="background-color: #06706d; color: white" @click="$router.go(-1)">
                {{ trans('messages.back') }}
            </v-btn>
        </div>
        <br />
    </v-container>-->
    <div>
                <AcceptEnginneringOfficeModal
            ref="acceptenginneringoffice"
            @next="$refs.visitRequest.getAllProjectRequest($event)"
        />
        <AcceptingEnginnerModal ref="acceptenginner" @next="$refs.visitRequest.getAllProjectRequest($event)" />
<VisitRequest ref="visitRequest" url="enginner_office/get-office-requests" :params="{'projectId':id}">
<template #actions="{props}">
      <div>
                                <v-btn
                                    color="primary"
                                    small
                                    fab
                                    v-if="props.item.status == 'sent' &&
                                     props.item.offices[0].id == currentUser"
                                    :disabled="!checkActive()"
                                    @click="acceptProject(props.item)"
                                >
                                    <v-icon color="white">check</v-icon>
                                  
                                </v-btn>
                            </div>
                            <div>
                                <v-btn
                                    color="primary"
                                    small
                                    fab
                                    v-if="
                                        props.item.request_enginners != undefined
                                            ? props.item.request_enginners.filter(
                                                  (x) =>
                                                      x.user_id == currentUser && x.is_cheaked == 0
                                              ).length > 0
                                            : false
                                    "
                                    :disabled="!checkActive()"
                                    @click="acceptRequestByEnginner(props.item)"
                                >
                                    <v-icon color="white">check</v-icon>
                                   
                                </v-btn>
                            </div>

                      

                            <v-btn
                                color="error"
                                v-if="props.item.status == 'sent'&&
                                     props.item.offices[0].id == currentUser"
                                small
                                fab
                                :disabled="!checkActive()"
                                @click="rejectProject(props.item.id)"
                            >
                                <v-icon color="white">cancel</v-icon>
                              
                            </v-btn>

                            <v-btn
                                color="primary"
                                v-if="
                                    props.item.request_enginners != undefined
                                        ? props.item.request_enginners.filter(
                                              (x) => x.user_id == currentUser && x.is_cheaked == 1
                                          ).length > 0
                                        : false
                                "
                                small
                                fab
                                :disabled="!checkActive()"
                                @click="createReport(props.item)"
                            >
                                <v-icon color="white"> list </v-icon>
                             
                            </v-btn>
</template>
</VisitRequest>
    </div>
</template>
<script>
import AcceptEnginneringOfficeModal from '../../common/visit-request/AcceptEnginneringOfficeModal.vue';
import AcceptingEnginnerModal from '../../common/visit-request/AcceptingEnginnerModal.vue';
import VisitRequest from '../../common/visit-request/List'
export default {
    components: {
        AcceptEnginneringOfficeModal: AcceptEnginneringOfficeModal,
        AcceptingEnginnerModal: AcceptingEnginnerModal,
        VisitRequest
    },
    props: {
        id: {
            required: false,
        },
    },
    data() {
        const self = this;
        return {
            currentUser: '',
            projects: [],
            loading: false,
        };
    },
mounted(){
 this.currentUser= this.getCurrentUser().id
},
    methods: {
        rejectProject(request_id) {
            const self = this;
            self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                message: self.trans('messages.you_cant_restore_it'),
                okCb: () => {
                    axios
                        .post('/enginner_office/request-cancel', { request_id: request_id })
                        .then(function (response) {
                            if (!response.data.error_code) {
                                self.$store.commit('showSnackbar', {
                                    message: response.data.data,
                                    color: 'green',
                                });

                                self.projectRequest = [];
                                self.projects = [];
                                self.$refs.visitRequest.getAllProjectRequest();
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
        acceptRequestByEnginner(item) {
            const self = this;
            self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                message: self.trans('messages.are_you_sure'),
                okCb: () => {
                    self.$refs.acceptenginner.create(item);
                },
                cancelCb: () => {
                    console.log('CANCEL');
                },
            });
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
                        office_id: item.offices[0].id
                    };
                    self.$refs.acceptenginneringoffice.fillData(data);
                },
                cancelCb: () => {
                    console.log('CANCEL');
                },
            });
        },

        createReport(item) {
            const self = this;
            if(!item.report)
            self.$router.push({
                name: 'add_report',
                params: {
                    id: item.projectId,
                    visit_request_id: item.id
                },
            });
            else
            self.$router.push({name: 'edit_report', 
                                   params:{
                                   
                                    id: item.report

                                   }
        });
    }
    }
};
</script>
