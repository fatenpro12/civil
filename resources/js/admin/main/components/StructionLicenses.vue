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
                                <v-flex xs12 sm6 md3>
                                    <v-flex xs12 sm12 md12>
                                        <v-hover  v-slot:default="{ hover }" open-delay="100" close-delay="100">
                                            <v-card  @click="$router.push({name: 'newAuthorizationRequests'})"
                                                            :elevation="hover ? 16 : 2">
                                                <v-card-text>
                                                    <div class="text-md-center mt-2">
                                                        <p x-large style="font-size:14px; color:#06706d;" >
                                                            {{ trans('data.new_authorization_requests') }}
                                                            <v-icon :color="'#06706d'">settings</v-icon>
                                                        </p>                                    
                                                    </div>
                                                </v-card-text>
                                            </v-card>
                                        </v-hover>
                                    </v-flex>
                                </v-flex>
                                <v-flex xs12 sm6 md3>
                                    <v-flex xs12 sm12 md12>
                                        <v-hover  v-slot:default="{ hover }" open-delay="100" close-delay="100">
                                            <v-card  @click="$router.push({name: ''})"
                                                            :elevation="hover ? 16 : 2">
                                                <v-card-text>
                                                    <div class="text-md-center mt-2">
                                                        <p x-large style="font-size:14px; color:#06706d;" >
                                                            {{ trans('data.requests_under_procedure') }}
                                                            <v-icon :color="'#06706d'">settings</v-icon>
                                                        </p>                                    
                                                    </div>
                                                </v-card-text>
                                            </v-card>
                                        </v-hover>
                                    </v-flex>
                                </v-flex>
                                <!------------------------>
                                <v-flex xs12 sm6 md3>
                                    <v-flex xs12 sm12 md12>
                                        <v-hover  v-slot:default="{ hover }" open-delay="100" close-delay="100">
                                            <v-card  @click="$router.push({name: ''})"
                                                            :elevation="hover ? 16 : 2">
                                                <v-card-text>
                                                    <div class="text-md-center mt-2">
                                                        <p x-large style="font-size:14px; color:#06706d;" >
                                                            {{ trans('data.previous_requests') }}
                                                            <v-icon :color="'#06706d'">settings</v-icon>
                                                        </p>                                    
                                                    </div>
                                                </v-card-text>
                                            </v-card>
                                        </v-hover>
                                    </v-flex>
                                </v-flex>
                                <!------------------------>
                                <v-flex xs12 sm6 md3>
                                    <v-flex xs12 sm12 md12>
                                        <v-hover  v-slot:default="{ hover }" open-delay="100" close-delay="100">
                                            <v-card  @click="$router.push({name: ''})"
                                                            :elevation="hover ? 16 : 2">
                                                <v-card-text>
                                                    <div class="text-md-center mt-2">
                                                        <p x-large style="font-size:14px; color:#06706d;" >
                                                            {{ trans('data.supervision_requests') }}
                                                            <v-icon :color="'#06706d'">settings</v-icon>
                                                        </p>                                    
                                                    </div>
                                                </v-card-text>
                                            </v-card>
                                        </v-hover>
                                    </v-flex>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-card-text>
                </v-card>
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