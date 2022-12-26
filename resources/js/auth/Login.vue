<template>
 <div class="container" >

                <v-card class="card-signin mt-5 mx-auto">
                    <v-card-title class="p-3">
                            <h5 style="color:white;">
                                {{ trans('data.Log_in_to_the_engineering_offices_system') }}
                            </h5>
                    </v-card-title>
                    <div class="card-body p-5">
                        <form>
                          <div class="form-outline mb-1">
                               
                                <input type="text" v-model="auth.email" name="email" id="email" class="form-control form-control-lg" :placeholder="trans('data.email_or_id_card')">
                            </div>
                           <div class="form-outline mb-1">

                                <input type="password" :placeholder="trans('data.password')" v-model="auth.password" name="password" id="password" class="form-control form-control-lg">
                            </div>
                      
                           <button class="btn btn-lg btn-block text-uppercase mt-3 w-40" @click="login"  style="background-color:#06706d;color:white;" id="submit" >
                             
                             {{trans('data.login')}}
                            </button>
                                <button  class="btn btn-link d-block text-center py-0 mt-2 mx-auto"  id="register" style="color:#06706d;"  @click="$router.push({name: 'register'})">
                                {{trans('data.register')}}
                                </button>
                           
                        </form>
                    </div>
                </v-card>
        </div>
</template>
<script>
import { mapActions } from 'vuex'
export default {
    name:"login",
    data(){
        return {
            auth:{
                email:"",
                password:""
            },
            processing:false
        }
    },
    methods:{
        ...mapActions({
            signIn:'auth/login'
        }),
        async login(){
            this.processing = true
          //  await axios.get('/sanctum/csrf-cookie')
             axios.post('api/login',this.auth).then(({data})=>{
                console.log(data)
                this.signIn(data)
            }).catch(({response:{data}})=>{
                console.log(data.message)
            }).finally(()=>{
                this.processing = false
            })
        },
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