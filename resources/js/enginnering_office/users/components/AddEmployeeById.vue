<template>
   <v-layout row justify-center>
    <v-dialog
      v-model="dialog"
      max-width="400"
    >
      <v-card>
        <v-card-title class="headline">{{ trans('data.customer_info') }}
                <v-spacer></v-spacer>
                    <v-btn flat @click="dialog=false;$refs.form.reset();customer=null" icon> <v-icon>clear</v-icon> </v-btn>
        </v-card-title>
 <v-form ref="form" v-model="valid" lazy-validation>
        <v-card-text>
      <v-layout row wrap>
        
                                  
                                    <v-flex xs12 md12>
                                        <v-text-field
                                            v-model="id_card_number"
                                            type="number"
                                            :label="trans('data.id_card_number')"
                                            append-icon="search"
                                            @click:append="findCustomer"
                                        ></v-text-field>
       
                                    </v-flex>
                                    <v-flex xs12 md12 v-if="customer && !customer.parent_id">
                                        <v-text-field
                                            v-model="name"
                                            :label="trans('data.name')"
                                            readonly
                                            
                                        ></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 md12 v-if="customer && !customer.parent_id">
                                        <v-text-field
                                            :label="trans('messages.email')"
                                            v-model="email"
                                            readonly
                                            
                                        ></v-text-field>
                                    </v-flex>
                                        <v-flex xs12 sm12 md12 v-if="customer && !customer.parent_id">

                                <v-autocomplete
                              
                                    item-text="value"
                                    :clearable="true"
                                    :deletable-chips="true"
                                    :dense="true"
                                    search-input=""
                                    :solo-inverted="false"
                                    :eager="true"
                                    :loading="false"
                                    :validate-on-blur="false"
                                    :persistent-placeholder="false"
                                    :chips="true"
                                    item-value="key"
                                    :items="enginnering_types"
                                    v-model="specialty_id"
                                    :label="trans('data.enginnering_type')"
                                    :rules="[
                                        (v) =>
                                            !!v ||
                                            trans('messages.required', {
                                                name: trans('data.enginnering_type'),
                                            }),
                                    ]"
                                    required
                                >
                        
                                </v-autocomplete>
                            </v-flex>
                           <v-flex xs12 sm12 md12 v-if="message">
                            <v-chip>{{ message }}</v-chip>
                            
                           </v-flex> 
      </v-layout>
        </v-card-text>

        <v-card-actions >
          <v-spacer></v-spacer>

          <v-btn
          v-if="customer && !customer.parent_id"
            color="green darken-1"
            flat="flat"
            @click="save"
          >
            {{trans('data.save')}}
          </v-btn>

          <v-btn
            color="green darken-1"
            flat="flat"
            @click="dialog = false;$refs.form.reset();customer=null"
          >
             {{trans('data.close')}}
          </v-btn>
        </v-card-actions>
        </v-form>
      </v-card>
    </v-dialog>
  </v-layout>
</template>

<script>
 export default {
    data () {
      return {
        dialog: false,
        id_card_number:null,
        name:null,
        email:null,
        customer:null,
         valid: true,
         message: null,
        customers:[],
             enginnering_types: [],
            specialty_id:null,
      }
    },
    methods:{
      create(){
        this.getCustomers();
this.dialog = true
    this.$refs.form.reset();
                             this.customer = null
      },
      findCustomer(){
         this.message = null
        this.getCustomers();
        this.customer=this.customers.find(val => val.id_card_number == this.id_card_number)
        if(this.customer){
          this.name = this.customer.name
          this.email = this.customer.email
          this.getEnginneringTypes(7)
           if(this.customer.parent_id === this.getCurrentUser().id){
this.message = this.trans('messages.employee_work_same_office')
        }
          if(tthis.customer.parent_id && his.customer.parent_id !== this.getCurrentUser().id){
          this.message = this.trans('messages.employee_busy')
        }
        }else{
          this.message = this.trans('messages.not_found')
        }
      },
         getEnginneringTypes(event) {
            const self = this;
            let url= '/get-enginnering-types-by-role/'+event
            axios
                .get(url)
                .then(function (response) {
                    self.enginnering_types = response.data;
                 
                })
                .catch(function (error) {
                    console.log(error);
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
        save(){
          const self =this
          self.dialog = false
          axios.post('/enginner_office/addNewEmployee',{
            id:self.customer.id,
            specialty_id: self.specialty_id
            })
          .then(function (response) {
                        self.$store.commit('showSnackbar', {
                            message: response.data.msg,
                            color: response.data.success,
                        });
                        self.$store.commit('hideLoader');
                        if (response.data.success === true) {
                             self.$refs.form.reset();
                             self.customer = null
                        }
                        self.$emit('addUser')
                    })
                    .catch(function (error) {
                        self.$store.commit('hideLoader');
                        self.$store.commit('showSnackbar', {
                            message: error.response,
                            color: 'error',
                            duration: 50000,
                        });
        })
        },
    }
 }
</script>

<style>

</style>