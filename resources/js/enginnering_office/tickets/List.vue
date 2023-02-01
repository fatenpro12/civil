
<!-- For customer -->
<template>

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
                                    props.item.offices.length>0 &&
                                     props.item.offices[0].id == currentUser.id"
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
                                                      x.user_id == currentUser.id && x.is_cheaked == 0
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
                                props.item.offices.length>0 &&
                                     props.item.offices[0].id == currentUser.id"
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
                                              (x) => x.user_id == currentUser.id && x.is_cheaked == 1
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
 this.currentUser= this.getCurrentUser()
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
