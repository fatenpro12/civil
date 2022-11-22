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
            
      
            </v-stepper-header>

        <v-stepper-items>
            <v-stepper-content step="1">
                <identityCheckChooseTheTypeOfBuilding :customerId="customer_id"/>

                 <v-layout row pt-3>
                    <div style="display: flex;" align="right">
                            <v-btn style="background-color:#06706d;color:white;" small @click="e1 = 2">
                                    {{ trans('messages.next') }}
                            </v-btn>
                            <v-btn color="teal" small outline @click="$router.go(-1)" >
                                {{ trans('messages.back') }}
                            </v-btn> 
                        </div> 
                </v-layout> 
            </v-stepper-content>

      <v-stepper-content step="2">
          <ProjectInfo :projectId="project_id"/>
        <v-layout row pt-3>
            <div style="display: flex;" align="right">
                <v-btn style="background-color:#06706d;color:white;" small @click="e1 = 3">
                    {{ trans('messages.next') }}
                </v-btn>
                <v-btn color="teal" small outline @click="e1 = 1" >
                    {{ trans('messages.back') }}
                </v-btn> 
            </div> 
        </v-layout> 
    </v-stepper-content>

      <v-stepper-content step="3">
        <v-layout row pt-3>
            <div style="display: flex;" align="right">
                <v-btn style="background-color:#06706d;color:white;" small @click="e1 = 4">
                    {{ trans('messages.next') }}
                </v-btn>
                <v-btn color="teal" small outline @click="e1 = 2" >
                    {{ trans('messages.back') }}
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
import identityCheckChooseTheTypeOfBuilding from "./identity_check_choose_the_type_of_building.vue";
import ProjectInfo from "./ProjectInfo.vue";

export default {
    components:{
        identityCheckChooseTheTypeOfBuilding,
        ProjectInfo,
        
    },
    data(){
        const self = this;
        return{
            e1: 1,
            customer_id:'',
            project_id:'',
        }        
    },
    mounted() {
       
    },
    created(){
        const self = this;
        self.customer_id=self.$route.params.project.customer_id;
        self.project_id=self.$route.params.project.project_id;
    },
    methods: {
      
    },
};
</script>
 

