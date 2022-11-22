<template>
    <v-container grid-list-md>
            <v-layout row pt-3>
                <v-flex xs12 sm12>
                    <v-card class="elevation-3">
                        <v-card-title primary-title xs8 sm8>
                            <div>
                                <div class="headline">
                                    {{ trans('data.review_project_data') }}
                                </div>
                            </div>
                        </v-card-title>
                        <v-divider></v-divider>
                        <v-card-text>
                            <v-container grid-list-md>
                                    <v-layout row wrap>
                                        <v-flex xs12 sm12 md6>
                                            <v-text-field
                                                v-model="project.name"
                                                :label="trans('messages.name')"
                                            ></v-text-field>
                                        </v-flex>
                                    </v-layout>
                                    <br>
                                    <v-divider></v-divider>
                                        <v-layout row wrap>
                                            <v-flex xs12 sm12 md3>
                                                <v-text-field
                                                v-model="project.authorization_request_number"
                                                :label="trans('data.authorization_request_number')"
                                            ></v-text-field>
                                                <v-text-field
                                                v-model="project.license_number"
                                                :label="trans('data.license_number')"
                                            ></v-text-field>
                                            <v-text-field
                                                v-model="project.plot_number"
                                                :label="trans('data.plot_number')"
                                            ></v-text-field>
                                            <v-text-field
                                                v-model="project.cadastral_decision_number"
                                                :label="trans('data.cadastral_decision_number')"
                                            ></v-text-field>
                                            </v-flex> 
                                            <v-spacer></v-spacer>

                                            <v-flex xs12 sm12 md3>
                                                <v-text-field
                                                v-model="project.status"
                                                :label="trans('messages.status')"
                                            ></v-text-field>
                                                <v-text-field
                                                v-model="project.billing_type"
                                                :label="trans('messages.billing_type')"
                                            ></v-text-field>
                                                <v-text-field
                                                v-model="project.estimated_hours"
                                                :label="trans('messages.estimated_hours')"
                                            ></v-text-field>
                                                <v-text-field
                                                v-model="project.estimated_cost"
                                                :label="trans('messages.estimated_cost')"
                                            ></v-text-field>
                                            <v-text-field
                                                v-model="project.task_hours"
                                                :label="trans('messages.task_hours')"
                                            ></v-text-field>
                                            </v-flex> 
                                            <v-spacer></v-spacer>
                                            <v-flex xs12 sm12 md3>
                                                <v-textarea
                                                    rows="5"
                                                    v-model="project.description"
                                                    :label="trans('messages.description')"
                                                ></v-textarea>
                                                  <v-text-field
                                                v-model="project.start_date"
                                                :label="trans('messages.start_date')"
                                            ></v-text-field>
                                             <v-text-field
                                                v-model="project.end_date"
                                                :label="trans('messages.end_date')"
                                            ></v-text-field>
                                            </v-flex> 
                                        </v-layout>
                                </v-container>
                            </v-card-text>
                        </v-card>
                    </v-flex>
                </v-layout>                     
            </v-container> 
</template>
<script>
export default {
    props:['projectId'],
    data(){
        return{
            project:{
                name:'',
                authorization_request_number:'',
                license_number:'',
                plot_number:'',
                cadastral_decision_number:'',
                start_date:'',
                end_date:'',
                status:'',
                description:'',
                billing_type:'',
                estimated_hours:'',
                estimated_cost:'',
                task_hours:'',
            },
        }; 
    },
    created(){
        const self = this;
        self.getProjectData();
    },
    methods:{
        getProjectData(){
            const self = this;
            axios.post('/project-info' ,{project_id:self.projectId}).then(function(response) {
                self.project=response.data;
                console.log(self.customer);
            })
            .catch(function(error) {
                console.log(error);
            });
        }
    }
}
</script>