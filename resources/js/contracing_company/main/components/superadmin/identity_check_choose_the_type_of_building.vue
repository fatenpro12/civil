<template>
    <v-container grid-list-md>
            <v-layout row >
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
                                                v-model="customer.identification_number"
                                                :label="trans('data.identification_number')"
                                            ></v-text-field>
                                        </v-flex>
                                    </v-layout>
                                    <br>
                                    <v-divider></v-divider>
                                        <v-layout row wrap>
                                            <v-flex xs12 sm12 md3>
                                                <v-text-field                                                
                                                v-model="customer.owner_id"
                                                :label="trans('data.beneficiary_id_type')"
                                            ></v-text-field>
                                            <v-text-field                                       
                                                v-model="customer.first_name"
                                                :label="trans('data.first_name')"
                                            ></v-text-field>
                                            <v-text-field                             
                                                v-model="customer.second_name"
                                                :label="trans('data.second_name')"
                                            ></v-text-field>
                                            <v-text-field                           
                                                v-model="customer.last_name"
                                                :label="trans('data.last_name')"
                                            ></v-text-field>
                                            <v-text-field    
                                                v-model="customer.fourth_name"
                                                :label="trans('data.fourth_name')"
                                            ></v-text-field>
                                            </v-flex> 
                                            <v-spacer></v-spacer>
                                            <v-flex xs12 sm12 md3>
                                                <v-text-field
                                                v-model="customer.identity_granted_date"
                                                :label="trans('data.identity_granted_date')"
                                            ></v-text-field>
                                                <v-text-field
                                                v-model="customer.identity_expiration_date"
                                                :label="trans('data.identity_expiration_date')"
                                            ></v-text-field>
                                                <v-text-field
                                                v-model="customer.email"
                                                :label="trans('messages.email')"
                                            ></v-text-field>
                                                <v-text-field
                                                v-model="customer.mobile"
                                                :label="trans('messages.mobile')"
                                            ></v-text-field>
                                            <v-text-field                           
                                                v-model="customer.website"
                                                :label="trans('messages.website')"
                                                
                                            ></v-text-field>
                                            </v-flex> 
                                            <v-spacer></v-spacer>
                                            <v-flex xs12 sm12 md3>
                                                <v-text-field
                                                v-model="customer.city"
                                                :label="trans('messages.city')"
                                            ></v-text-field>
                                                <v-text-field
                                                v-model="customer.primary_contact_id"
                                                :label="trans('data.primary_contact_id')"
                                            ></v-text-field>
                                                <v-text-field
                                                v-model="customer.tax_number"
                                                :label="trans('messages.tax_number')"
                                            ></v-text-field>
                                                <v-text-field
                                                v-model="customer.billing_address"
                                                :label="trans('messages.billing_address')"
                                            ></v-text-field>
                                                <v-text-field
                                                v-model="customer.zip_code"
                                                :label="trans('messages.zip_code')"
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
    props:['customerId'],
    data(){
        return{
            customer:{
                identification_number:'',
                beneficiary_id_type:'',
                first_name:'',
                second_name:'',
                last_name:'',
                fourth_name:'',
                identity_granted_date:'',
                identity_expiration_date:'',
                email:'',
                mobile:'',
                website:'',
                city:'',
                primary_contact_id:'',
                tax_number:'',
                billing_address:'',
                zip_code:'',
            },
        }; 
    },
    created(){
        const self = this;
        self.getCustomerData();
    },
    methods:{
        getCustomerData(){
            // const self = this;
            // axios.post('/customer-info' ,{customer_id:self.customerId}).then(function(response) {
            //     self.customer=response.data;
            //     console.log(self.customer);
            // })
            // .catch(function(error) {
            //     console.log(error);
            // });
        },

            nextStep() {
            this.$emit('next',this.customer);
    },
    }
}
</script>