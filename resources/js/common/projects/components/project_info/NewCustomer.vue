<template>
<v-layout>
   <v-flex xs12 md4>
     <v-text-field
     v-if="user"
                                            v-model="customer.id_card_number"
                                            type="number"
                                            :label="trans('data.id_card_number')"
                                             readonly
                                        ></v-text-field>
                                        <v-text-field
                                        v-else
                                            v-model="id_card_number"
                                            type="number"
                                             :label="card_label"
                                             append-icon="search"
                                            @click:append="findCustomer"
                                        ></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 md4>
                                         <v-text-field
                                         v-if="customer"
                                            v-model="customer.name"
                                            :label="trans('messages.name')"
                                            readonly
                                        ></v-text-field>
                                 
                                    </v-flex>
                                     <v-flex md3>
                                    <v-btn
                                        v-if="customer && !user"
                                        @click="addCustomer"
                                        style="background-color: #06706d; color: white"
                                    >
                                        {{trans('data.add')}}
                                    </v-btn>
                                     <v-btn
                                        v-if="customer"
                                        @click="$emit('remove')"
                                       style="background-color: rgb(185 28 28); color: white"
                                    >
                                        <v-icon>delete</v-icon>
                                    </v-btn>
                                </v-flex>
                                    </v-layout>
</template>

<script>
export default {
    props:{
  customers :[],
  card_label: null,
  user:null
    },
    data(){
return {
        id_card_number:null,
        customer:null
}
    },
    created(){
        if(this.user){
this.customer = this.user
this.id_card_number = this.user.id_card_number
        }
    },
    watch:{
        user(){
            if(this.user)
this.customer = this.user
        }
    },
methods:{
    addCustomer(){
this.$emit('addCustomer', this.customer)
this.customer = null
this.id_card_number =null
    },
          findCustomer(){
           this.customer = this.customers.find(val => val.id_card_number == this.id_card_number)
           console.log(this.customers)
       // if(this.customer.name)
      //  this.$emit('updatevalues', this.customer.id)
        if(!this.customer){
             this.$store.commit('showSnackbar', {
                        message: this.trans('data.not_found'),
                        color: '#FF5252',
                    });
        }
      },
}
}
</script>

<style>

</style>