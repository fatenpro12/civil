<template>
 <div class="container" >

                <v-card class="card-signin mt-5 mx-auto">
                    <v-card-title class="p-3">
                            <h5 style="color:white;">
                                {{ trans('data.Log_in_to_the_engineering_offices_system') }}
                            </h5>
                    </v-card-title>
                    <div  v-if="!showRoles" class="card-body p-3">
                        <form>
                          <div class="form-outline mb-1">
                               
                                <input type="text" v-model="auth.email_id_card"  class="form-control form-control-lg" :placeholder="trans('data.email_or_id_card')">
                            </div>
                           <div class="form-outline mb-1">

                                <input type="password" :placeholder="trans('data.password')" v-model="auth.password" name="password" id="password" class="form-control form-control-lg">
                            </div>
                      
                           <v-btn class="btn btn-lg btn-block mx-auto  text-uppercase mt-3 w-40" @click="getRoles"  style="background-color:#06706d;color:white;" id="submit" >
                             
                             {{trans('data.login')}}
                            </v-btn>
                              
                           
                        </form>
                          <v-btn flat  class="btn d-block text-center py-0 mt-2 mx-auto"  id="register" style="color:#06706d;"  :to=" '/register'">
                                {{trans('data.register')}}
                                </v-btn>
                    </div>
                    <Roles  v-if="showRoles" :roles="roles" @login="login"/>
                </v-card>
        </div>
</template>
<script>
import { mapActions } from 'vuex'
import Roles from './Roles.vue'
export default {
    name:"login",
    components:{
       Roles
    },
    data(){
        return {
            auth:{
                email_id_card:"",
                password:"",
                user_type: null
            },
            roles:[],
            processing:false,
            showRoles: false
        }
    },
    methods:{
        ...mapActions({
            signIn:'auth/login'
        }),
         login(event){
            this.processing = true
          this.auth.user_type = event
             axios.post('api/login',this.auth).then(({data})=>{
                this.signIn(data)
            }).catch(({response:{data}})=>{
                console.log(data.message)
            }).finally(()=>{
                this.processing = false
            })
        },
            getRoles(){
        axios.post('getType', this.auth).then((response)=>{
                this.roles = response.data.roles
                 if(this.roles.length>1)
                 this.showRoles=true
  else
  this.login()
            }).catch((response)=>{
                console.log(response.message)
            })
    }
    }
}
</script>
<style scoped>
  .card-signin {
          border: 0;
          max-width: 50%;
       /*   box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);*/
        }
  .card-signin .v-card__title {
          background-color:#06706d;
         /* margin-bottom: 2rem;*/
          font-weight: 300;
          font-size: 1.5rem;
        }
        .card-signin .card-body {
          padding: 0rem;
        }
</style>