<template>
    <div class="component-wrap">
        <v-container grid-list-md>
            <v-flex pt-3 pb-5>
                <h1   style="color:#0000008a;" class="text-md-center"> {{ trans('data.Engineering_offices_system') }}</h1>
            </v-flex>
            <v-card pt-3 >
                <v-card-text>
                    <v-container grid-list-lg>
                        <v-layout wrap>
                             <!-- v-if="$hasRole('employee') ||$can('superadmin')" -->
                            <v-flex xs12 sm12 md3  v-if="$can('project.create')">
                                <v-flex xs12 sm12 md12>
                                    <v-hover :disabled="!checkActive()"  v-slot:default="{ hover }" open-delay="100" close-delay="100">
                                        <v-card
                                        
                                          @click="$router.push({name:'add-project'})"
                                                         :elevation="hover ? 16 : 2">
                                            <v-card-text>
                                                <div class="text-md-center mt-2">
                                                    <p x-large style="font-size:18px; color:#06706d;" >
                                                        {{ trans('messages.add_project') }}&nbsp;&nbsp;
                                                        <v-icon :color="'#06706d'">settings</v-icon>
                                                    </p>                                    
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-hover>
                                </v-flex>
                            </v-flex>

                            <v-flex xs12 sm12 md3>
                                <v-flex xs12 sm12 md12 v-if="$can('project.list')">
                                    <v-hover  v-slot:default="{ hover }" open-delay="100" close-delay="100">
                                        <v-card  @click="$router.push({name:'projects.list'})"
                                                         :elevation="hover ? 16 : 2">
                                            <v-card-text>
                                                <div class="text-md-center mt-2">
                                                    <p x-large style="font-size:18px; color:#06706d;" >
                                                        {{ trans('data.current_projects') }}&nbsp;&nbsp;
                                                        <v-icon :color="'#06706d'">settings</v-icon>
                                                    </p>                                    
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-hover>
                                </v-flex>
                            </v-flex>
                                
                            <v-flex xs12 sm12 md3 v-if="$can('project.list')">
                                <v-flex xs12 sm12 md12>
                                    <v-hover  v-slot:default="{ hover }" open-delay="100" close-delay="100">
                                        <v-card  @click="$router.push({name:'finished-projects'})"
                                                         :elevation="hover ? 16 : 2">
                                            <v-card-text>
                                                <div class="text-md-center mt-2">
                                                    <p x-large style="font-size:18px; color:#06706d;" >
                                                        {{ trans('data.complated_projects') }}&nbsp;&nbsp;
                                                        <v-icon :color="'#06706d'">settings</v-icon>
                                                    </p>                                    
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-hover>
                                </v-flex>
                            </v-flex>
                                
                            <v-flex xs12 sm12 md3>
                                <v-flex xs12 sm12 md12>
                                    <v-hover
                                        v-slot:default="{ hover }"
                                        open-delay="100"
                                        close-delay="100"
                                    >
                                        <v-card
                                            @click="
                                                $router.push({
                                                    name: 'tasks.list',
                                                })
                                            "
                                            :elevation="hover ? 16 : 2"
                                        >
                                            <v-card-text>
                                                <div class="text-md-center mt-2">
                                                    <p
                                                        x-large
                                                        style="font-size: 18px; color: #06706d"
                                                    >
                                                        {{ trans('messages.tasks') }}&nbsp;&nbsp;
                                                        <v-icon :color="'#06706d'">settings</v-icon>
                                                    </p>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-hover>
                                </v-flex>
                            </v-flex>
                            <!-- <v-flex xs12 sm12 md3 v-if="$can('project.list')"> 
                                <v-flex xs12 sm12 md12>
                                    <v-hover  v-slot:default="{ hover }" open-delay="100" close-delay="100">
                                        <v-card  @click="$router.push({name:'schedule'})"
                                                         :elevation="hover ? 16 : 2">
                                            <v-card-text>
                                                <div class="text-md-center mt-2">
                                                    <p x-large style="font-size:18px; color:#06706d;" >
                                                        {{ trans('data.schedule') }}&nbsp;&nbsp;
                                                        <v-icon :color="'#06706d'">settings</v-icon>
                                                    </p>                                    
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-hover>
                                </v-flex>
                            </v-flex> -->
                                   
                            </v-layout>
                        </v-container>
                </v-card-text>
            </v-card>
            <br>
            <div align="center">
                <v-btn style="background-color:#06706d;color:white;" @click="$router.go(-1)">
                    {{ trans('messages.back') }}
                </v-btn>
           </div>
        <br>
        </v-container>
    </div>
</template>

<script>

export default {
    components:{
        
    },
    data(){
        return{
           
        }        
    },
    created() {
       
    },
    methods: {
       
    },
};
</script>
<style scoped>
.v-card{
    @apply w-full;
}
</style>
