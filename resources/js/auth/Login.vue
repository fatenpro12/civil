<template>
 <div class="container col-sm-9 col-md-7 col-lg-5">

                <v-card class="card-signin mt-2  mx-auto">
                    <v-card-title class="px-3 py-4">
                            <h5 style="color:white;">
                                {{ trans('data.Log_in_to_the_engineering_offices_system') }}
                            </h5>
                    </v-card-title>
                    <div  v-if="!showRoles" class="card-body p-3">
                        <form>
                          <div class="form-outline mt-3 mx-1 mb-1">
                               
                                <input type="text" v-model="auth.email_id_card"  class="form-control form-control-lg" :placeholder="trans('data.email_or_id_card')">
                            </div>
                           <div class="form-outline mt-4 mx-1 mb-1">

                                <input type="password" :placeholder="trans('data.password')" v-model="auth.password" name="password" id="password" class="form-control form-control-lg">
                            </div>
                       <div class="custom-control custom-checkbox mb-3 text-justify" id="remember_me">
                                <input type="checkbox" class="custom-control-input" name="remember" id="remember" ><!--{{ old('remember') ? 'checked' : '' }}-->
                                <label class="custom-control-label" for="remember">
                                    {{trans('data.remember_me')}}
                                </label>
                            </div>
                
                           <v-btn class="mx-auto w-full text-uppercase mt-3 rounded-md" @click="getRoles"  style="background-color:#06706d;color:white;" id="submit" >
                             
                             {{trans('data.login')}}
                            </v-btn>
                              
                               <button class="btn btn-lg btn-block text-uppercase" onclick="validateType(event);"  style="background-color:#06706d;color:white; display:none" id="button_type" >
                             
                             {{trans('data.ok')}}
                            </button>
                            <a class="btn btn-link d-block text-center" id="password_request"  style="color:#06706d;" href="#"> <!--{{ route('password.request') }}-->
                                
                               
                                {{trans('data.forget_password')}}
                            </a>
                        </form>
                          <v-btn flat  class="btn my-0 d-block text-center py-0  mx-auto"  id="register" style="color:#06706d;"  :to=" '/register'">
                                {{trans('data.register')}}
                                </v-btn>
                               
                    </div>
                   
                    <Roles  v-if="showRoles" :roles="roles" @login="login"/>
                        <div class="card-title text-center" style="margin-bottom: 0px;margin-top: 0px;">
                            <span style="font-size:12px; color:white;">
                                {{ trans('data.all_rights_are_save') }} <b>2020</b>
                            </span>
                        </div>
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
             axios.post('/login',this.auth).then(({data})=>{
                console.log(data)
                this.signIn(data)
              //  this.$router.push({path: '/'})
            }).catch((response)=>{
                console.log(response)
            }).finally(()=>{
                this.processing = false
            })
        },
            getRoles(){
        axios.post('/getType', this.auth).then((response)=>{
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
>>> .v-btn{
border-radius: 20px;
}
  .card-signin {
          border: 0;
          max-width: 40%;
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