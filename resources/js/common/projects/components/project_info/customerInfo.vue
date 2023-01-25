<template>
    <v-container grid-list-md>
        <!--<AddAgency ref="agencyadded" @fillAgencyData="getAgenctData($event)"></AddAgency>-->
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
                                <v-layout row wrap v-for="(input, k) in inputs" :key="k">
                                  
                                    <v-flex xs12 md4>
                                        <v-autocomplete
                                            item-text="name"
                                            item-value="id"
                                            :items="customers.filter(i => !inputs.includes(i))"
                                            v-model="input.id"
                                            :placeholder="trans('messages.name')"
                                            v-validate="'required'"
                                            data-vv-name="name"
                                            :data-vv-as="trans('messages.name')"
                                            @change="(event) => updatevalues(event, k)"
                                            :error-messages="errors.collect('name')"
                                            required
                                            
                                        ></v-autocomplete>
                                    </v-flex>
                                    <v-flex xs12 md4>
                                        <v-text-field
                                            v-model="input.id_card_number"
                                            type="number"
                                            :placeholder="trans('data.id_card_number')"
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
                            </v-form>
                                    <v-layout row wrap v-if="isAgency || agency_inputs">
                               <v-layout row wrap>
                                   <v-flex xs12 md4>
                                        <v-text-field
                                            v-model="agency_inputs.id_card_number"
                                            type="number"
                                            :placeholder="trans('data.id_card_number')"
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
                                            :placeholder="trans('messages.name')"
                                            readonly
                                            :disabled="isEdit"
                                        ></v-text-field>
                                 
                                    </v-flex>
                                   
                                    <v-flex xs12 md4>
                                        <v-text-field
                                            :placeholder="trans('messages.email')"
                                            v-model="agency_inputs.email"
                                            readonly
                                            :disabled="isEdit"
                                        ></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 md4>
                                        <v-text-field
                                            v-model="agency_inputs.mobile"
                                            type="number"
                                            :placeholder="trans('messages.mobile')"
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
                           
                            <v-layout row wrap>
                                <v-flex md3>
                                    <v-btn
                                    v-if="!isAgency && !agency_inputs"
                                        @click="createAgency"
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
            isEdit: false,
            inputs: [
                {
                    id: '',
                    id_card_number: '',
                    email: '',
                    mobile: '',
                },
            ],
            agency_inputs: null,
            customers: [],
            agencies: [],
            isAgency: false,
        };
    },
    created() {
        const self = this;
        self.getCustomers();
        self.getAgencies()
    },
    methods: {
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
      
      /*  getAgenctData(data) {
            const self = this;
            if (self.agency_inputs.length == 1 && !self.isAgency) {
                self.agency_inputs[0] = data;
                self.isAgency = true;
            } else {
                self.agency_inputs.push(data);
            }

            //   self.agency=data;
        },*/
        add() {
            this.inputs.push({
                id: '',
                id_card_number: '',
                email: '',
                mobile: '',
            });
        },

        remove(index) {
            this.inputs.splice(index, 1);
        },
        updatevalues(value, key) {
            const self = this;
            let x = self.customers.find((o) => o.id === value);
            self.inputs[key].mobile = x.mobile;
            self.inputs[key].id_card_number = x.id_card_number;
            self.inputs[key].email = x.email;
          //  self.resetAgentvalues();
         //   self.getAgenciesData(value);
        },
        resetvalues(value, key = 0) {
            const self = this;
            let x = self.customers.find((o) => o.id === value);
            self.inputs[key].id = x.id;
            self.inputs[key].mobile = x.mobile;
            self.inputs[key].id_card_number = x.id_card_number;
            self.inputs[key].email = x.email;
        },
        updateAgentvalues(value) {
            const self = this;
            var x = self.agencies.find((o) => o.id == value);

            self.agency.record_number = x.record_number;
            self.agency.agency_number = x.agency_number;
            self.agency.delegate_record = x.delegate_record;
            self.agency.agent_name = x.agent_name;
            self.agency.agent_card_number = x.agent_card_number;
            self.agency.email = x.email;
            self.agency.mobile = x.mobile;
        },
        resetAgentvalues() {
            const self = this;
            if(self.agency){
            self.agency.id = null;
            self.agency.record_number = null;
            self.agency.agency_number = null;
            self.agency.delegate_record = null;
            self.agency.agent_name = null;
            self.agency.agent_card_number = null;
            self.agency.email = null;
            self.agency.mobile = null;
            }
        },
        getCustomers() {
            const self = this;

            if (self.getCurrentUser().user_type_log == 'SITE_MANAGENMENT') {
                const self = this;
                axios
                    .get('/customers')
                    .then(function (response) {
                        self.customers = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            } else {
                axios
                    .get('/get-my-users')
                    .then(function (response) {
                        self.customers = response.data;
                        //  self.resetvalues(1);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
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
                agency_id: self.agency_inputs?.id,
            };
            console.log(data)
             self.$validator.validateAll().then((result) => {
                 if (result == true) {
                     this.$emit('next', data);
                 } else {
            //         this.$refs.form.validate();
                 }
             });
        },
  findAgency(event){
       if(this.agencies.find(val => val.id_card_number == event))
       this.agency_inputs=this.agencies.find(val => val.id_card_number == event)
        console.log(this.agencies)
      },
        fillEditData(data, agency, isEdit) {
            const self = this;
            if(data.length>0)
            self.inputs = data;
            if (agency != null) {
                self.agency_inputs = agency;
            }

            self.isEdit = isEdit;
        },
        createAgency() {
            const self = this;
          //  this.$refs.agencyadded.create();
           self.isAgency = true
         self.agency_inputs = {
                id: '',
                name:'',
                id_card_number: '',
                email: '',
                mobile: '',
            }
        },
    },
};
</script>