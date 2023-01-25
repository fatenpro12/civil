<template>
    <div class="component-wrap">
        <AskPermissionModal ref="permissionref" />

        <v-container grid-list-md>
            <v-flex pb-5>
                <h1 style="color: #0000008a" class="text-md-center">
                    {{ trans('data.Engineering_offices_system') }}
                </h1>
            </v-flex>
            <v-card pt-3>
                <v-card-text>
                    <v-container grid-list-lg>
                        <v-layout wrap>
                            
                            <v-flex xs12 sm12 md4>
                                    <v-hover
                                        v-slot:default="{ hover }"
                                        open-delay="100"
                                        close-delay="100"
                                    >
                                        <v-card
                                            @click="$router.push({ name: 'project_management_estate_owner' })"
                                            :elevation="hover ? 16 : 2"
                                        >
                                            <v-card-text>
                                                <div class="text-md-center mt-2">
                                                    <p
                                                        x-large
                                                        style="font-size: 18px; color: #06706d"
                                                    >
                                                        {{
                                                            trans('data.project_management')
                                                        }}&nbsp;&nbsp;
                                                        <v-icon :color="'#06706d'">settings</v-icon>
                                                    </p>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-hover>
                            </v-flex>
                                <v-flex xs12 sm12 md4 >
                                    <v-hover
                                        v-slot:default="{ hover }"
                                        open-delay="100"
                                        close-delay="100"
                                    >
                                        <v-card 
                                            @click="$router.push({ name: 'design_request_estate_list' })"
                                        :elevation="hover ? 16 : 2">
                                            <v-card-text>
                                                <div class="text-md-center mt-2">
                                                    <p
                                                        x-large
                                                        style="font-size: 18px; color: #06706d"
                                                    >
                                                        {{
                                                            trans('data.design_requests')+' ('+$store.state.Store.countDedignRequest+')'
                                                        }}&nbsp;&nbsp;
                                                        <v-icon :color="'#06706d'">settings</v-icon>
                                                    </p>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-hover>
                            </v-flex>
                            <v-flex xs12 sm12 md4>
                                    <v-hover
                                        v-slot:default="{ hover }"
                                        open-delay="100"
                                        close-delay="100"
                                    >
                                        <v-card
                                            @click="
                                                $router.push({ name: 'visit_request_estate_list' })
                                            "
                                            :elevation="hover ? 16 : 2"
                                        >
                                            <v-card-text>
                                                <div class="text-md-center mt-2">
                                                    <p
                                                        x-large
                                                        style="font-size: 18px; color: #06706d"
                                                    >
                                                        {{
                                                            trans('data.supervision_requests') +' ('+$store.state.Store.countVisitRequest+')'
                                                        }}&nbsp;&nbsp;
                                                        <v-icon :color="'#06706d'">settings</v-icon>
                                                    </p>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-hover>
                            </v-flex>

                            <!--add after edititng -->
                            
                            <!-- @click="$router.push({name: 'visit_request_list'})" -->
                        

                            <v-flex xs12 sm12 md4 v-if="$can('tickets.view')">
                                    <v-hover
                                        v-slot:default="{ hover }"
                                        open-delay="100"
                                        close-delay="100"
                                    >
                                        <v-card 
                                        class="not_working" 
                                         @click="$router.push({ name: 'contractor_request_estate_list' })"
                                        :elevation="hover ? 16 : 2">
                                            <v-card-text>
                                                <div class="text-md-center mt-2">
                                                    <p
                                                        x-large
                                                        style="font-size: 18px; color: #06706d"
                                                    >
                                                        {{
                                                            trans('data.contractor_request')+' ('+$store.state.Store.countContractorRequest+')'
                                                        }}&nbsp;&nbsp;
                                                        <v-icon :color="'#06706d'">settings</v-icon>
                                                    </p>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-hover>
                         
                            </v-flex>

                               <v-flex xs12 sm12 md4 v-if="$can('tickets.view')">
                                    <v-hover
                                        v-slot:default="{ hover }"
                                        open-delay="100"
                                        close-delay="100"
                                    >
                                        <v-card
                                         @click="$router.push({ name: 'support-service_estate_list' })"
                                            :elevation="hover ? 16 : 2"
                                        >
                                            <v-card-text>
                                                <div class="text-md-center mt-2">
                                                    <p
                                                        x-large
                                                        style="font-size: 18px; color: #06706d"
                                                    >
                                                        {{
                                                            trans('data.support_service_requests')+' ('+$store.state.Store.countServiceRequest+')'
                                                        }}&nbsp;&nbsp;
                                                        <v-icon :color="'#06706d'">settings</v-icon>
                                                    </p>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-hover>
                            </v-flex>
<v-flex xs12 sm12 md4 v-if="$can('report.view')">
                                    <v-hover
                                        v-slot:default="{ hover }"
                                        open-delay="100"
                                        close-delay="100"
                                    >
                                        <v-card
                                            class="not_working"
                                            :elevation="hover ? 16 : 2"
                                            @click="$router.push({ name: 'reports_list' })"
                                        >
                                            <v-card-text>
                                                <div class="text-md-center mt-2">
                                                    <p
                                                        x-large
                                                        style="font-size: 18px; color: #06706d"
                                                    >
                                                        {{ trans('data.reports') }}&nbsp;&nbsp;
                                                        <v-icon :color="'#06706d'">settings</v-icon>
                                                    </p>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-hover>
                            </v-flex>
                               <v-flex xs12 sm12 md4 v-if="$can('archive')">
                          
                                    <v-hover
                                        v-slot:default="{ hover }"
                                        open-delay="100"
                                        close-delay="100"
                                    >
                                        <v-card class="not_working" 
                                         @click="$router.push({ name: 'archives' })"
                                        :elevation="hover ? 16 : 2">
                                            <v-card-text>
                                                <div class="text-md-center mt-2">
                                                    <p
                                                        x-large
                                                        style="font-size: 18px; color: #06706d"
                                                    >
                                                        {{ trans('data.archive') }}&nbsp;&nbsp;
                                                        <v-icon :color="'#06706d'">settings</v-icon>
                                                    </p>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-hover>
                            </v-flex>
                            <v-flex xs12 sm12 md4>
                                    <v-hover
                                        v-slot:default="{ hover }"
                                        open-delay="100"
                                        close-delay="100"
                                    >
                                        <v-card class="not_working" :elevation="hover ? 16 : 2">
                                            <v-card-text>
                                                <div class="text-md-center mt-2">
                                                    <p
                                                        x-large
                                                        style="font-size: 18px; color: #06706d"
                                                    >
                                                        {{ trans('data.accounting') }}&nbsp;&nbsp;
                                                        <v-icon :color="'#06706d'">settings</v-icon>
                                                    </p>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-hover>
                            </v-flex>

                            

                            <v-flex xs12 sm12 md4 v-if="false">
                                    <v-hover
                                        v-slot:default="{ hover }"
                                        open-delay="100"
                                        close-delay="100"
                                    >
                                        <v-card
                                            @click="$router.push({ name: 'users.create' })"
                                            :elevation="hover ? 16 : 2"
                                        >
                                            <v-card-text>
                                                <div class="text-md-center mt-2">
                                                    <p
                                                        x-large
                                                        style="font-size: 18px; color: #06706d"
                                                    >
                                                        {{ trans('data.add_customer') }}&nbsp;&nbsp;
                                                        <v-icon :color="'#06706d'">settings</v-icon>
                                                    </p>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-hover>
                            </v-flex>

                            <!--add after edititng -->
                          


                            <v-flex xs12 sm12 md4>
                                    <v-hover
                                        v-slot:default="{ hover }"
                                        open-delay="100"
                                        close-delay="100"
                                    >
                                        <v-card
                                            @click="$router.push({})"
                                            :elevation="hover ? 16 : 2"
                                        >
                                            <v-card-text>
                                                <div class="text-md-center mt-2">
                                                    <p
                                                        x-large
                                                        style="font-size: 18px; color: #06706d"
                                                    >
                                                        {{ trans('data.public_bills') }}&nbsp;&nbsp;
                                                        <v-icon :color="'#06706d'">settings</v-icon>
                                                    </p>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-hover>
                            </v-flex>

                            <v-flex xs12 sm12 md4>
                                    <v-hover
                                        v-slot:default="{ hover }"
                                        open-delay="100"
                                        close-delay="100"
                                    >
                                        <v-card
                                            @click="$router.push({})"
                                            :elevation="hover ? 16 : 2"
                                        >
                                            <v-card-text>
                                                <div class="text-md-center mt-2">
                                                    <p
                                                        x-large
                                                        style="font-size: 18px; color: #06706d"
                                                    >
                                                        {{ trans('data.statistics') }}&nbsp;&nbsp;
                                                        <v-icon :color="'#06706d'">settings</v-icon>
                                                    </p>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-hover>
                            </v-flex>

                            <v-flex xs12 sm12 md4 v-if="$can('employee.view')">
                                    <v-hover
                                        v-slot:default="{ hover }"
                                        open-delay="100"
                                        close-delay="100"
                                    >
                                        <v-card
                                            @click="$router.push({ name: 'users_estate.list' })"
                                            :elevation="hover ? 16 : 2"
                                        >
                                            <v-card-text>
                                                <div class="text-md-center mt-2">
                                                    <p
                                                        x-large
                                                        style="font-size: 18px; color: #06706d"
                                                    >
                                                        {{ trans('data.users') }}&nbsp;&nbsp;
                                                        <v-icon :color="'#06706d'">settings</v-icon>
                                                    </p>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-hover>
                            </v-flex>


                            <v-flex xs12 sm12 md4>
                                    <v-hover
                                        v-slot:default="{ hover }"
                                        open-delay="100"
                                        close-delay="100"
                                    >
                                        <v-card
                                            @click="$router.push({ name: 'requests_role_common.list' })"
                                            :elevation="hover ? 16 : 2"
                                        >
                                            <v-card-text>
                                                <div class="text-md-center mt-2">
                                                    <p
                                                        x-large
                                                        style="font-size: 18px; color: #06706d"
                                                    >
                                                        {{
                                                            trans('data.ask_for_permission')  +' ('+$store.state.Store.countRoleRequest+')'
                                                        }}&nbsp;&nbsp;
                                                        <v-icon :color="'#06706d'">settings</v-icon>
                                                    </p>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-hover>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-text>
            </v-card>

            <br />
            <div align="center">
                <v-btn style="background-color: #06706d; color: white" @click="$router.go(-1)">
                    {{ trans('messages.back') }}
                </v-btn>
            </div>
            <br />
        </v-container>
    </div>
</template>
<script>
import AskPermissionModal from './components/AskPermissionModal.vue';
export default {
    components: {
        AskPermissionModal: AskPermissionModal,
    },
    data() {
        return {
            loading: false,
        };
    },
    mounted() {
           let user = this.$store.getters['auth/user']
 this.$store.commit('setRequests',user.id)
    },
    methods: {
        askforpermission() {
            const self = this;
            this.$refs.permissionref.create();
        },
    },
};
</script>
  <style scoped>
 .v-card{
    @apply w-full;
 }
 </style>