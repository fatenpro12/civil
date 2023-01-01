<template>

      <div id="user_type_log">
                             <v-layout row wrap>
                            <v-flex xs12 sm12>
                                <v-autocomplete
                                :dense="true"
                                :placeholder="trans('data.role_name')"
                                 item-text="name"
                                item-value="type"
                                v-model="user_type"
                                :items="roles"
                                class="ma-3" 
                                />
                            </v-flex>
                             <v-flex xs12 sm12>
                            <button class="btn btn-lg btn-block text-uppercase ma-3" @click="$emit('login',user_type)"  style="background-color:#06706d;color:white;">
                             
                             {{trans('data.login')}}
                            </button>
                             </v-flex>
                             </v-layout>
                        </div>
      </div>
</template>

<script>
export default {
  props:{
    roles:[],
  },
  data(){
   return {
    user_type:null
   }
  },
}
</script>

<style>

</style>