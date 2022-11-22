<template>
    <v-container grid-list-md>
            <v-layout row pt-3>
                <v-flex xs12 sm12>
                    <v-card class="elevation-3">
                        <v-card-title primary-title xs8 sm8>
                            <div>
                                <div class="headline">
                                    {{ trans('data.review_owner_data') }}
                                </div>
                            </div>
                        </v-card-title>
                        <v-divider></v-divider>
                        <v-card-text>
                            <v-container grid-list-md>
                                    <v-layout row wrap>
                                        <v-flex xs12 sm12 md6>
                                            <v-text-field
                                                v-model="project.owner_id"
                                                :label="trans('data.identification_number')"
                                                v-validate="'required'"
                                                data-vv-name="identification_number"
                                                :data-vv-as="trans('data.identification_number')"
                                                :error-messages="errors.collect('identification_number')"
                                                required
                                            ></v-text-field>
                                        </v-flex>
                                    </v-layout>
                                    <br>
                                    <v-divider></v-divider>
                                    
                                        <v-layout row wrap>
                                            <v-flex xs12 sm12 md3>
                                                <v-text-field
                                                v-model="project.owner_id"
                                                :label="trans('data.beneficiary_id_type')"
                                                v-validate="'required'"
                                                data-vv-name="beneficiary_id_type"
                                                :data-vv-as="trans('data.beneficiary_id_type')"
                                                :error-messages="errors.collect('beneficiary_id_type')"
                                                required
                                            ></v-text-field>
                                            <v-text-field
                                                v-model="project.owner_id"
                                                :label="trans('data.first_name')"
                                                v-validate="'required'"
                                                data-vv-name="first_name"
                                                :data-vv-as="trans('data.first_name')"
                                                :error-messages="errors.collect('first_name')"
                                                required
                                            ></v-text-field>
                                            <v-text-field
                                                v-model="project.owner_id"
                                                :label="trans('data.second_name')"
                                                v-validate="'required'"
                                                data-vv-name="second_name"
                                                :data-vv-as="trans('data.second_name')"
                                                :error-messages="errors.collect('second_name')"
                                                required
                                            ></v-text-field>
                                            <v-text-field
                                                v-model="project.owner_id"
                                                :label="trans('data.last_name')"
                                                v-validate="'required'"
                                                data-vv-name="last_name"
                                                :data-vv-as="trans('data.last_name')"
                                                :error-messages="errors.collect('last_name')"
                                                required
                                            ></v-text-field>
                                            </v-flex> 
                                            <v-spacer></v-spacer>
                                            <v-flex xs12 sm12 md3>
                                                <v-text-field
                                                v-model="project.owner_id"
                                                :label="trans('data.fourth_name')"
                                                v-validate="'required'"
                                                data-vv-name="fourth_name"
                                                :data-vv-as="trans('data.fourth_name')"
                                                :error-messages="errors.collect('fourth_name')"
                                                required
                                            ></v-text-field>
                                                <v-text-field
                                                v-model="project.owner_id"
                                                :label="trans('data.identity_granted_date')"
                                                v-validate="'required'"
                                                data-vv-name="identity_granted_date"
                                                :data-vv-as="trans('data.identity_granted_date')"
                                                :error-messages="errors.collect('identity_granted_date')"
                                                required
                                            ></v-text-field>
                                                <v-text-field
                                                v-model="project.owner_id"
                                                :label="trans('data.identity_expiration_date')"
                                                v-validate="'required'"
                                                data-vv-name="identity_expiration_date"
                                                :data-vv-as="trans('data.identity_expiration_date')"
                                                :error-messages="errors.collect('identity_expiration_date')"
                                                required
                                            ></v-text-field>
                                                <v-text-field
                                                v-model="project.owner_id"
                                                :label="trans('messages.mobile')"
                                                v-validate="'required'"
                                                data-vv-name="mobile"
                                                :data-vv-as="trans('messages.mobile')"
                                                :error-messages="errors.collect('mobile')"
                                                required
                                            ></v-text-field>
                                            </v-flex> 
                                            <v-spacer></v-spacer>
                                            <v-flex xs12 sm12 md4>
                                                <v-textarea
                                                    rows="4"
                                                    v-model="project.owner_id"
                                                    :label="trans('data.other_owners')"
                                                    v-validate="'required'"
                                                    data-vv-name="other_owners"
                                                    :data-vv-as="trans('data.other_owners')"
                                                    :error-messages="errors.collect('other_owners')"
                                                    required
                                                ></v-textarea>
                                            </v-flex> 
                                        </v-layout>
                                </v-container>
                            </v-card-text>
                        </v-card>
                    </v-flex>
                </v-layout>
        <!------------------------------------>
                <v-layout row pt-3>
                <v-flex xs12 sm12>
                    <v-card class="elevation-3">
                        <v-card-title primary-title xs8 sm8>
                            <div>
                                <div class="headline">
                                    {{ trans('data.agent_data') }}<small> ({{ trans('data.if_existing') }})</small>
                                </div>
                            </div>
                        </v-card-title>
                        <v-divider></v-divider>
                        <v-card-text>
                            <v-container grid-list-md>
                                        <v-layout row wrap>
                                            <v-flex xs12 sm12 md5>
                                                <v-text-field
                                                v-model="project.owner_id"
                                                :label="trans('data.agency_number')"
                                                v-validate="'required'"
                                                data-vv-name="agency_number"
                                                :data-vv-as="trans('data.agency_number')"
                                                :error-messages="errors.collect('agency_number')"
                                                required
                                            ></v-text-field>
                                            <v-text-field
                                                v-model="project.owner_id"
                                                :label="trans('data.agent\'s_name')"
                                                v-validate="'required'"
                                                data-vv-name="agent\'s_name"
                                                :data-vv-as="trans('data.agent\'s_name')"
                                                :error-messages="errors.collect('agent\'s_name')"
                                                required
                                            ></v-text-field>
                                            </v-flex> 
                                            <v-spacer></v-spacer>
                                            <v-flex xs12 sm12 md5>
                                                <v-text-field
                                                v-model="project.owner_id"
                                                :label="trans('messages.mobile')"
                                                v-validate="'required'"
                                                data-vv-name="mobile"
                                                :data-vv-as="trans('messages.mobile')"
                                                :error-messages="errors.collect('mobile')"
                                                required
                                            ></v-text-field>
                                            </v-flex> 
                                        </v-layout>
                                </v-container>
                            </v-card-text>
                        </v-card>
                    </v-flex>
                </v-layout>

                <!------------------------------------>
                <v-layout row pt-3>
                <v-flex xs12 sm12>
                    <v-card class="elevation-3">
                        <v-card-title primary-title xs8 sm8>
                            <div>
                                <div class="headline">
                                    {{ trans('data.order_type') }}
                                </div>
                            </div>
                        </v-card-title>
                        <v-divider></v-divider>
                        <v-card-text>
                            <v-container grid-list-md>
                                        <v-layout row wrap>
                                            <v-flex xs12 sm12 md5>
                                                <v-text-field
                                                v-model="project.owner_id"
                                                :label="trans('data.building_type')"
                                                v-validate="'required'"
                                                data-vv-name="building_type"
                                                :data-vv-as="trans('data.building_type')"
                                                :error-messages="errors.collect('building_type')"
                                                required
                                            ></v-text-field>
                                            <v-text-field
                                                v-model="project.owner_id"
                                                :label="trans('data.waste_removal_contractor')"
                                                v-validate="'required'"
                                                data-vv-name="waste_removal_contractor"
                                                :data-vv-as="trans('data.waste_removal_contractor')"
                                                :error-messages="errors.collect('waste_removal_contractor')"
                                                required
                                            ></v-text-field>
                                            </v-flex> 
                                            <v-spacer></v-spacer>
                                            <v-flex xs12 sm12 md5>
                                                <v-text-field
                                                v-model="project.owner_id"
                                                :label="trans('data.supervising_office')"
                                                v-validate="'required'"
                                                data-vv-name="supervising_office"
                                                :data-vv-as="trans('data.supervising_office')"
                                                :error-messages="errors.collect('supervising_office')"
                                                required
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
    data(){
        return{
            project:{
                owner_id:''
            },
        }; 
    }
}
</script>