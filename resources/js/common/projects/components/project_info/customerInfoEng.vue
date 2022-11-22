<template>
    <v-container grid-list-md>
        <v-layout row>
            <v-flex xs12 sm12>
                <v-card class="elevation-3">
                    <v-card-title primary-title xs8 sm8>
                        <div>
                            <div class="headline">
                                {{ trans('data.customer_info') }}
                            </div>
                        </div>
                    </v-card-title>
                    <v-divider></v-divider>
                    <v-card-text>
                        <v-container grid-list-md>
                            <v-form ref="form"  v-model="valid" lazy-validation>
                            <v-layout row wrap v-for="(input, k) in inputs" :key="k">
                               <v-layout row wrap>
                                   <v-flex xs12 md4>
                                        <v-text-field
                                            v-model="input.id_card_number"
                                            type="number"
                                            :label="trans('data.id_card_number')"
                                             :rules="[
                                        (v) =>
                                            !!v ||
                                            trans('messages.required', {
                                                name: trans('data.id_card_number'),
                                            }),
                                    ]"
                                    v-validate="'required'"
                         data-vv-name="id_card_number"
                                            :data-vv-as="trans('data.id_card_number')"
                                            :error-messages="errors.collect('id_card_number')"
                                    required
                                            :disabled="isEdit"
                                                 append-icon="search"
                                            @click:append="findCustomer(input.id_card_number,k)"
                                            
                                        ></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 md4>
                                         <v-text-field
                                            v-model="input.name"
                                            :label="trans('messages.name')"
                                            readonly
                                            :disabled="isEdit"
                                        ></v-text-field>
                                 
                                    </v-flex>
                                   
                                    <v-flex xs12 md4>
                                        <v-text-field
                                            :label="trans('messages.email')"
                                            v-model="input.email"
                                            readonly
                                            :disabled="isEdit"
                                        ></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 md4>
                                        <v-text-field
                                            v-model="input.mobile"
                                            type="number"
                                            :label="trans('messages.mobile')"
                                            readonly
                                            :disabled="isEdit"
                                        ></v-text-field>
                                    </v-flex>
                                   <v-flex xs12 md4>
                                        <v-btn
                                            @click="add(k)"
                                            small
                                            v-show="k == inputs.length - 1 && !isEdit"
                                            fab
                                            style="background-color: #06706d; color: white"
                                        >
                                            <v-icon dark> add </v-icon>
                                        </v-btn>
                                        <v-btn
                                            @click="remove(k)"
                                            v-show="k || (!k && inputs.length > 1 && !isEdit)"
                                            small
                                            fab
                                            color="red"
                                            dark
                                        >
                                            <v-icon dark> delete </v-icon>
                                        </v-btn>
                                    </v-flex>
                                </v-layout>
                            </v-layout>
                            </v-form>
                  <v-layout row wrap v-if="isAgency || agency_inputs">
                               <v-layout row wrap>
                                   <v-flex xs12 md4>
                                        <v-text-field
                                            v-model="agency_inputs.id_card_number"
                                            type="number"
                                            :label="trans('data.id_card_number')"
                                             :rules="[
                                        (v) =>
                                            !!v ||
                                            trans('messages.required', {
                                                name: trans('data.id_card_number'),
                                            }),
                                    ]"
                       
                                    required
                                            :disabled="isEdit"
                                               append-icon="search"
                                            @click:append="findAgency(agency_inputs.id_card_number)"
                                        ></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 md4>
                                         <v-text-field
                                            v-model="agency_inputs.name"
                                            :label="trans('messages.name')"
                                            readonly
                                            :disabled="isEdit"
                                        ></v-text-field>
                                 
                                    </v-flex>
                                   
                                    <v-flex xs12 md4>
                                        <v-text-field
                                            :label="trans('messages.email')"
                                            v-model="agency_inputs.email"
                                            readonly
                                            :disabled="isEdit"
                                        ></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 md4>
                                        <v-text-field
                                            v-model="agency_inputs.mobile"
                                            type="number"
                                            :label="trans('messages.mobile')"
                                            readonly
                                            :disabled="isEdit"
                                        ></v-text-field>
                                    </v-flex>
                                   <v-flex xs12 md4>
                                        <v-btn
                                            @click="isAgency = false; agency_inputs = null "
                                            small
                                            fab
                                            color="red"
                                            dark
                                        >
                                            <v-icon dark> delete </v-icon>
                                        </v-btn>
                                    </v-flex>
                                </v-layout>
                            </v-layout>
                           
                            <!--<v-layout row wrap>
                               <!-- <v-flex md3>
                                    <v-btn
                                        @click="$router.push({ name: 'users_estate.create' })"
                                        large
                                        dark
                                        v-show="!isEdit"
                                        style="background-color: #06706d; color: white"
                                    >
                                        Add User
                                    
                                    </v-btn>
                                </v-flex>
                            </v-layout>-->
                            <v-layout row wrap>
                                <v-flex md3>
                                    <v-btn
                                        v-if="!isAgency && !agency_inputs"
                                        @click="addAgency"
                                        large
                                        dark
                                        v-show="!isEdit"
                                        style="background-color: #06706d; color: white"
                                    >
                                        Add Agency
                                        <!-- //<v-icon>add</v-icon> -->
                                    </v-btn>
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
import AddAgency from './AddAgency.vue';

export default {
    components: {
        AddAgency,
    },
    props: ['customerId'],
    data() {
        return {
               valid: true,
            isEdit: false,
            inputs: [
                {
                    id: null,
                    name:'',
                    id_card_number: '',
                    email: '',
                    mobile: '',
                },
            ],
            agency_inputs: null,
            customers: [],
            agencies: [],
            customer:null,
            isAgency : false
        };
    },
    created() {
        const self = this;
        self.getCustomers();
        self.getAgencies()
    },
    methods: {
         findCustomer(event,k){
        this.customer=this.customers.find(val => val.id_card_number == event)
        
        if(this.customer){
            if(!this.inputs.find(x => x.id == this.customer.id))
            this.inputs[k] = this.customer
            else
            this.$store.commit('showSnackbar', {
                        message: this.trans('data.owner_added_before'),
                        color: '#4CAF50',
                    });
            console.log(this.customers,this.inputs[k],event)
            this.$forceUpdate()
        }
        /*  else{
                        this.$store.commit('showSnackbar', {
                        message: this.trans('data.not_found'),
                        color: '#FF5252',
                    });
                     }*/
      },
      findAgency(event){
       if(this.agencies.find(val => val.id_card_number == event))
       this.agency_inputs=this.agencies.find(val => val.id_card_number == event)
        console.log(this.agencies)
      },
      addAgency(){
         this.isAgency = true
         this.agency_inputs = {
                id: '',
                name:'',
                id_card_number: '',
                email: '',
                mobile: '',
            }
      },
        add() {
            this.inputs.push({
                id: '',
                name:'',
                id_card_number: '',
                email: '',
                mobile: '',
            });
        },  
        remove(k){
         this.inputs.splice(k)
        },    
        getCustomers() {
            const self = this;

         /*   if (self.getCurrentUser().user_type_log == 'SITE_MANAGENMENT') {
                const self = this;
                axios
                    .get('/customers')
                    .then(function (response) {
                        self.customers = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            } else {*/
            
                axios
                    .get('/customers') ///get-my-users
                    .then(function (response) {
                        self.customers = response.data;
                    
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
           // }
        },
getAgencies(){
    const self = this;
  axios
                    .get('/customers')
                    .then(function (response) {
                        self.agencies = response.data;
                       
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
},
        nextStep() {
            const self = this;
            var data = {
                customers: self.inputs.filter(x => x.id!=null),
                agency_id: self.agency_inputs?.id,
            };
            console.log(data)
             self.$validator.validateAll().then((result) => {
                 if (result == true && data.customers.length>0) {
                     this.$emit('next', data);
                 }
             });
        },

        fillEditData(data, agency, isEdit) {
            const self = this;
            if(data.length>0)
            self.inputs = data
        
            if (agency) {
                self.agency_inputs = agency;
            }

            self.isEdit = isEdit;
        },
  
    },
};
</script>