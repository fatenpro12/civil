<template>
    <div class="component-wrap">
        <v-container grid-list-md>
            <v-stepper v-model="e1" alt-labels>
                <v-stepper-header>
                    <v-stepper-step :complete="e1 > 1" step="1" color="teal">
                        <!-- {{ trans('data.identity_check_choose_the_type_of_building') }}-->
                    </v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step step="2" :complete="e1 > 2" color="teal">
                        <!-- {{ trans('data.widget_data') }}-->
                    </v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step step="3" :complete="e1 > 3" color="teal">
                        <!-- {{ trans('data.complete_the_application_data') }}-->
                    </v-stepper-step>
                    <v-divider></v-divider>

                    <v-stepper-step step="4" :complete="e1 > 4" color="teal">
                        <!-- {{ trans('data.complete_the_application_data') }}-->
                    </v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step step="5" :complete="e1 > 5" color="teal">
                        <!-- {{ trans('data.complete_the_application_data') }}-->
                    </v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step step="6" :complete="e1 > 6" color="teal">
                        <!-- {{ trans('data.complete_the_application_data') }}-->
                    </v-stepper-step>

                    <v-divider></v-divider>
                    <v-stepper-step step="7" :complete="e1 > 7" color="teal">
                        <!-- {{ trans('data.complete_the_application_data') }}-->
                    </v-stepper-step>

                    <v-divider></v-divider>
                    <v-stepper-step step="8" :complete="e1 > 8" color="teal">
                        <!-- {{ trans('data.complete_the_application_data') }}-->
                    </v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step step="9" :complete="e1 > 9" color="teal">
                        <!-- {{ trans('data.complete_the_application_data') }}-->
                    </v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step step="10" :complete="e1 > 10" color="teal">
                        <!-- {{ trans('data.complete_the_application_data') }}-->
                    </v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step step="11" :complete="e1 > 11" color="teal">
                        <!-- {{ trans('data.complete_the_application_data') }}-->
                    </v-stepper-step>

                 

       



                </v-stepper-header>

                <v-stepper-items>
                    <v-stepper-content step="1">
                        <CustomerInfo />

                        <v-layout row pt-3>
                            <v-btn color="teal" small outline @click="$router.go(-1)">
                                {{ trans('messages.back') }}
                            </v-btn>
                            <div style="display: flex" align="right">
                                <v-btn
                                    style="background-color: #06706d; color: white"
                                    small
                                    @click="e1 = 2"
                                >
                                    {{ trans('messages.next') }}
                                </v-btn>
                            </div>
                        </v-layout>
                    </v-stepper-content>

                    <v-stepper-content step="2">
                        <LocationInfo />
                        <v-layout row pt-3>
                            <v-btn color="teal" small outline @click="e1 = 1">
                                {{ trans('messages.back') }}
                            </v-btn>
                            <div style="display: flex" align="right">
                                <v-btn
                                    style="background-color: #06706d; color: white"
                                    small
                                    @click="e1 = 3"
                                >
                                    {{ trans('messages.next') }}
                                </v-btn>
                            </div>
                        </v-layout>
                    </v-stepper-content>

                    <v-stepper-content step="3">
                        <ProjectInfo />
                        <v-layout row pt-3>
                            <div style="display: flex" align="right">
                                    <v-btn color="teal" small outline @click="e1 = 2">
                                    {{ trans('messages.back') }}
                                </v-btn>
                                <v-btn
                                    style="background-color: #06706d; color: white"
                                    small
                                    @click="e1 = 4"
                                >
                                    {{ trans('messages.next') }}
                                </v-btn>
                        
                            </div>
                        </v-layout>
                    </v-stepper-content>

                    <v-stepper-content step="4">
                        <v-layout row pt-3>
                            <div style="display: flex" align="right">
                                <v-btn color="teal" small outline @click="e1 = 3">
                                    {{ trans('messages.back') }}
                                </v-btn>
                                <v-btn
                                    style="background-color: #06706d; color: white"
                                    small
                                    @click="e1 = 5"
                                >
                                    {{ trans('messages.next') }}
                                </v-btn>
                            
                            </div>
                        </v-layout>
                    </v-stepper-content>

                    <v-stepper-content step="5">
                        <v-layout row pt-3>
                            <div style="display: flex" align="right">
                                  <v-btn color="teal" small outline @click="e1 = 4">
                                    {{ trans('messages.back') }}
                                </v-btn>
                                <v-btn
                                    style="background-color: #06706d; color: white"
                                    small
                                    @click="e1 = 6"
                                >
                                    {{ trans('messages.next') }}
                                </v-btn>
                          
                            </div>
                        </v-layout>
                    </v-stepper-content>

                    <v-stepper-content step="6">
                        <v-layout row pt-3>
                            <div style="display: flex" align="right">
                                      <v-btn color="teal" small outline @click="e1 = 5">
                                    {{ trans('messages.back') }}
                                </v-btn>
                                <v-btn
                                    style="background-color: #06706d; color: white"
                                    small
                                    @click="e1 = 7"
                                >
                                    {{ trans('messages.next') }}
                                </v-btn>
                      
                            </div>
                        </v-layout>
                    </v-stepper-content>

                    <v-stepper-content step="7">
                        <v-layout row pt-3>
                            <div style="display: flex" align="right">
                                <v-btn color="teal" small outline @click="e1 = 6">
                                    {{ trans('messages.back') }}
                                </v-btn>
                                <v-btn
                                    style="background-color: #06706d; color: white"
                                    small
                                    @click="e1 = 8"
                                >
                                    {{ trans('messages.next') }}
                                </v-btn>
                            
                            </div>
                        </v-layout>
                    </v-stepper-content>

                    <v-stepper-content step="8">
                        <v-layout row pt-3>
                            <div style="display: flex" align="right">
                                    <v-btn color="teal" small outline @click="e1 = 7">
                                    {{ trans('messages.back') }}
                                </v-btn>
                                <v-btn
                                    style="background-color: #06706d; color: white"
                                    small
                                    @click="e1 = 9"
                                >
                                    {{ trans('messages.next') }}
                                </v-btn>
                        
                            </div>
                        </v-layout>
                    </v-stepper-content>

                    <v-stepper-content step="9">
                        <v-layout row pt-3>
                            <div style="display: flex" align="right">
                                 <v-btn color="teal" small outline @click="e1 = 8">
                                    {{ trans('messages.back') }}
                                </v-btn>
                                <v-btn
                                    style="background-color: #06706d; color: white"
                                    small
                                    @click="e1 = 10"
                                >
                                    {{ trans('messages.next') }}
                                </v-btn>
                           
                            </div>
                        </v-layout>
                    </v-stepper-content>

                    <v-stepper-content step="10">
                        <v-layout row pt-3>
                            <div style="display: flex" align="right">
                                 <v-btn color="teal" small outline @click="e1 = 9">
                                    {{ trans('messages.back') }}
                                </v-btn>
                                <v-btn
                                    style="background-color: #06706d; color: white"
                                    small
                                    @click="e1 = 11"
                                >
                                    {{ trans('messages.next') }}
                                </v-btn>
                           
                            </div>
                        </v-layout>
                    </v-stepper-content>

                    <v-stepper-content step="11">
                        <v-layout row pt-3>
                            <div style="display: flex" align="right">
                                    <v-btn color="teal" small outline @click="e1 = 10">
                                    {{ trans('messages.back') }}
                                </v-btn>
                                <v-btn
                                    style="background-color: #06706d; color: white"
                                    small
                                
                                >
                                    {{ trans('messages.save') }}
                                </v-btn>
                        
                            </div>
                        </v-layout>
                    </v-stepper-content>
                </v-stepper-items>
            </v-stepper>
        </v-container>
    </div>
</template>

<script>
import CustomerInfo from '../projects/components/project_info/customerInfo.vue';
import LocationInfo from '../projects/components/project_info/locationInfo.vue';
import ProjectInfo from '../projects/components/project_info/ProjectInfo.vue';
export default {
    components: {
        CustomerInfo,
        LocationInfo,
        ProjectInfo,
    },
    data() {
        const self = this;
        return {
            e1: 1,
            customer_id: '',
            project_id: '',
        };
    },
    mounted() {},
    created() {
        const self = this;
        self.customer_id = self.$route.params.project.customer_id;
        self.project_id = self.$route.params.project.project_id;
    },
    methods: {},
};
</script>
 

