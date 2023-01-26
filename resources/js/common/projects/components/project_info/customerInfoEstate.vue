<template>
    <v-container grid-list-md>
        <AddAgency ref="agencyadded" @fillAgencyData="getAgenctData($event)"></AddAgency>
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
                            <v-form ref="form">
                                <!--<v-layout row wrap v-for="(input, k) in inputs" :key="k">-->
                               <v-layout row wrap v-if="getCurrentUser().user_type_log === 'ESTATE_OWNER'">
                                  <v-flex xs12 md4>
                                         <v-text-field
                                            v-model="input.name"
                                            :placeholder="trans('messages.name')"
                                            readonly
                                        ></v-text-field>
                                 
                                    </v-flex>
                                   <v-flex xs12 md4>
                                        <v-text-field
                                            v-model="input.id_card_number"
                                            :placeholder="trans('data.id_card_number')"
                                           readonly
                                        ></v-text-field>
                                    </v-flex>
                                  
                                   
                                    <v-flex xs12 md4>
                                        <v-text-field
                                            :placeholder="trans('messages.email')"
                                            v-model="input.email"
                                            readonly
                                
                                        ></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 md4>
                                        <v-text-field
                                            v-model="input.mobile"
                                            type="number"
                                            :placeholder="trans('messages.mobile')"
                                            readonly
                                            :disabled="isEdit"
                                        ></v-text-field>
                                    </v-flex>
                                 <v-flex xs12 md4>
                                        <v-btn  
                                        @click="userBtns=true"
                                            style="background-color: #06706d; color: white"
                                        >
                                            {{trans('data.add')}}
                                        </v-btn>
                                          </v-flex>
                                <v-flex md3 v-if="userBtns">
                                    <v-btn
                                        @click="newCustomer = true"
                                        large
                                        dark
                                        v-show="!isEdit"
                                        style="background-color: #06706d; color: white"
                                    >
                                        {{trans('data.new customer')}}
                                        <!-- //<v-icon>add</v-icon> -->
                                    </v-btn>
                                    <v-btn
                                        @click="newAgency = true"
                                        large
                                        dark
                                        v-show="!isEdit"
                                        style="background-color: #06706d; color: white"
                                    >
                                        {{trans('data.Agency')}}
                                        <!-- //<v-icon>add</v-icon> -->
                                    </v-btn>
                                   </v-flex>
                        
                                </v-layout>
                                   <v-layout row wrap v-else>
                                   <v-flex xs12 md4>
                                        <v-text-field
                                            v-model="input.id_card_number"
                                            type="number"
                                            :placeholder="trans('data.id_card_number')"
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
                                            @click:append="findCustomer(input.id_card_number)"
                                            
                                        ></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 md4>
                                         <v-text-field
                                            v-model="input.name"
                                            :placeholder="trans('messages.name')"
                                            readonly
                                            :disabled="isEdit"
                                        ></v-text-field>
                                 
                                    </v-flex>
                                   
                                    <v-flex xs12 md4>
                                        <v-text-field
                                            :placeholder="trans('messages.email')"
                                            v-model="input.email"
                                            readonly
                                            :disabled="isEdit"
                                        ></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 md4>
                                        <v-text-field
                                            v-model="input.mobile"
                                            type="number"
                                            :placeholder="trans('messages.mobile')"
                                            readonly
                                            :disabled="isEdit"
                                        ></v-text-field>
                                    </v-flex>
                                       <v-flex xs12 md4>
                                        <v-btn  
                                        @click="userBtns=true"
                                            style="background-color: #06706d; color: white"
                                        >
                                            {{trans('data.add')}}
                                        </v-btn>
                                          </v-flex>
                                <v-flex md3 v-if="userBtns">
                                    <v-btn
                                        @click="newCustomer = true"
                                        large
                                        dark
                                        v-show="!isEdit"
                                        style="background-color: #06706d; color: white"
                                    >
                                        {{trans('data.new customer')}}
                                        <!-- //<v-icon>add</v-icon> -->
                                    </v-btn>
                                    <v-btn
                                        @click="newAgency = true"
                                        large
                                        dark
                                        v-show="!isEdit"
                                        style="background-color: #06706d; color: white"
                                    >
                                        {{trans('data.Agency')}}
                                        <!-- //<v-icon>add</v-icon> -->
                                    </v-btn>
                                   </v-flex>
                                </v-layout>
                            </v-form>
                         <dd v-if="inputs.length>1" class="mt-1 border-2 pa-2 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                         <h3 class="text-gray-500 bold">{{trans('data.other_owners')}}</h3>   
                         <NewCustomer  v-for="(owner,index) in inputs.slice(1)" :user="owner" :key="index" @remove="removeOwner(owner.id)"/> 
                        </dd>
                         <NewCustomer  v-if="newCustomer" @remove="newCustomer = false" :customers="customers"  @addCustomer="addCustomer" :card_label="trans('data.id_card_number_for_owner')"/>
                         <dd v-if="agency" class="mt-1 border-2 pa-2 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                         <h3  class="text-gray-500 bold">{{trans('data.Agency')}}</h3>   
                         <NewCustomer @remove="agency = null" :user="agency" />
                         </dd>
                         <NewCustomer v-if="newAgency" @remove="newAgency = false;" :customers="agencies" @addCustomer="addAgency" :card_label="trans('data.id_card_number_for_agency')"/>
                         
                        </v-container>
                    </v-card-text>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>
<script>
import AddAgency from './AddAgency.vue';
import NewCustomer from './NewCustomer.vue'
import store from '../../../../store'
export default {
    components: {
        AddAgency,
        NewCustomer
    },
    props: ['customerId'],
    data() {
        return {
            isEdit: false,
            userBtns: false,
            newCustomer: false,
            newAgency: false,
            inputs: [],
            input:{
                        name:null,
                    id_card_number: null,
                    email: '',
                    mobile: '',
            },
            agency_inputs: [],
            customers: [],
            agencies: [],
            isAgency: false,
            agency: null
        };
    },
    mounted() {
        const self = this;
        self.getCustomers();
        self.getAgencies();
        console.log(self.getCurrentUser().user_type_log)
       if(self.getCurrentUser().user_type_log === 'ESTATE_OWNER'){
        console.log(store.getters['auth/user'])
        self.input = self.getCurrentUser()
        self.inputs.push(self.input)
       }
    },
    methods: {
 removeOwner(id){
    this.inputs = this.inputs.filter(x => x.id !== id)
    this.$forceUpdate()
 },
     findCustomer(event){

       // this.input=this.customers.find(val => val.id_card_number == event)
        
        if(this.customers.find(val => val.id_card_number == event)){
            this.input=this.customers.find(val => val.id_card_number == event)
            if(!this.inputs.find(x => x.id == this.input.id))
            this.inputs[0] = this.input
            else
            this.$store.commit('showSnackbar', {
                        message: this.trans('data.owner_added_before'),
                        color: '#4CAF50',
                    });
            console.log(this.customers,this.inputs[0],event)
            this.$forceUpdate()
        }
          else{
                        this.$store.commit('showSnackbar', {
                        message: this.trans('data.not_found'),
                        color: '#FF5252',
                    });
                    this.input.id_card_number = null
                    this.input.name = null
                     }
      },
        getAgenctData(data) {
            const self = this;
            if (self.agency_inputs.length == 1 && !self.isAgency) {
                self.agency_inputs[0] = data;
                self.isAgency = true;
            } else {
                self.agency_inputs.push(data);
            }
        },
        addCustomer(event){
            if(this.inputs.find(x=>x.id_card_number === event.id_card_number))
            this.$store.commit('showSnackbar', {
                        message: this.trans('data.owner_added_before'),
                        color: '#4CAF50',
                    });
                    else{
         this.inputs.push(event)
         console.log(this.inputs)
                  this.$store.commit('showSnackbar', {
                        message: this.trans('data.owner_added'),
                        color: '#4CAF50',
                    });
                    }
        },
        addAgency(event){
         this.agency = event
              this.$store.commit('showSnackbar', {
                        message: this.trans('data.agency_added'),
                        color: '#4CAF50',
                    });
        },
       
        getCustomers() {
            const self = this;
                axios
                    .get('/customers')
                    .then(function (response) {
                        self.customers = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
        },
getAgencies(){
    const self = this;
  axios
                    .get('/customers')  //get-my-agencies
                    .then(function (response) {
                        self.agencies = response.data;
                        console.log(self.agencies)
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
},
        getAgenciesData(value) {
            const self = this;
            axios
                .get('/get-agencies/' + value)
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
                customers: self.inputs,
                agency_id: self.agency?.id//_inputs?.id,
            };
            console.log(data)
             self.$validator.validateAll().then((result) => {
                 if (result && this.input.name) {
                     this.$emit('next', data);
                 }
                 else 
                  this.$store.commit('showSnackbar', {
                        message: this.trans('data.not_found'),
                        color: '#FF5252',
                    });
             });
        },

        fillEditData(data, agency, isEdit) {
            const self = this;
            
            if(data.length>0){
            self.input = data[0];
            self.inputs = data
            }
            self.agency = agency;
            if (agency != null) {
                self.isAgency = true;
                self.agency_inputs[0] = agency;
            }

            self.isEdit = isEdit;
        },
        createAgency() {
            const self = this;
            this.$refs.agencyadded.create();
        },
    },
};
</script>