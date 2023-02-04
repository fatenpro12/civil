<template>
    <v-toolbar v-if='!$vuetify.breakpoint.xsOnly && isAuthenticated' 
    style="background-color:#06706d;z-index: 100" app dark flat fixed dense height="100"
                :clipped-left="true">
                <img :src="'/img/logo.png'"  alt="logo" width="100" style="border-radius:20px;" />
                <v-layout >
                    <div style="font-size:20px;">

                        <v-btn flat large @click="$router.push('/')" style="color:white;" class="w-6">
                            {{trans('data.home')}}
                        </v-btn>    
                       
                        <v-btn flat large @click="$router.push('/to-do')" style="color:white;" class="w-6">
                            {{trans('data.to_do_list')}}
                        </v-btn>                                      
                    </div>
                </v-layout>
               <notification v-if="isAuthenticated"/>
                   <v-menu
                        attach
                        offset-y
                        bottom
                        center
                        nudge-bottom="14"
                        transition="slide-x-transition"
                        >
                       
                        <v-btn flat slot="activator">
                            <v-icon class="mx-1">language</v-icon>
                           {{trans('data.language')}}
                        </v-btn>
                        
                        <v-list>
                  

                            <v-list-tile 
                              v-for="(lang,key) in languages" 
               :key="key"
               @click='change(key)'>
                      
                  <v-list-tile-title>
                    <div>
                                    <span :class="'pa-0 ma-0 max-h-full flag-icon flag-icon-'+lang['flag-icon']"></span>
                                     {{lang['display']}}
                                    </div>
                  </v-list-tile-title>
                            </v-list-tile>
                        </v-list>


                     </v-menu>
           
                    <v-menu
                        attach
                        offset-y
                        bottom
                        center
                        nudge-bottom="14"
                        transition="slide-x-transition"
                        >
                       
                        <v-btn flat slot="activator">
                            <b style="font-size:14px;">
                                {{trans('data.basic_information')}}
                            </b>&nbsp;&nbsp;
                            <avatar v-if="isAuthenticated" :members="user" :tooltip="true">
                            </avatar>&nbsp;
                            <v-icon dark medium>more_vert</v-icon>
                        </v-btn>
                        
                        <v-list>
                  

                            <v-list-tile @click="$router.push({ name: 'profile.list' })">
                                <v-list-tile-title class="text-justify">
                                    <v-icon> account_circle </v-icon>
                                    {{trans('messages.profile')}}
                                </v-list-tile-title>
                            </v-list-tile>
                            <v-list-tile @click="logoutUser">
                                <v-list-tile-title class="text-justify">
                                    <v-icon> directions_walk </v-icon>
                                    {{trans('messages.logout')}}
                                </v-list-tile-title>
                            </v-list-tile>
                        </v-list>


                     </v-menu>
       
            </v-toolbar>
</template>

<script>
import { mapGetters,mapActions } from 'vuex'
import store from '../../store'

export default {
    data(){
return {
language: null,
languages:[]
}
},
created(){ 
 store.dispatch('settings/getLanguages')
 this.languages = store.getters['settings/languages']
 this.language = localStorage.getItem('currentLange')
},
methods:{
   ...mapGetters({
            isAuthenticated:'auth/isAuthenticated',
            user: 'auth/user',
        }),
           ...mapActions({
            signOut:'auth/logout'
        }),
  logoutUser(){
    this.signOut()
    axios.post('/logout')
    this.$router.push('/login')
    this.$forceUpdate()
  },
    change(lang){
        axios.get("lang/"+lang).then(()=>{
        localStorage.setItem("currenpathaftercjange",localStorage.getItem("currenpath"));
        localStorage.setItem("currentLange",lang);
      //  localStorage.removeItem("currenpath");
          this.$router.go(0)
       // window.location.href = "lang/"+lang;
      //  language= lang;
       // console.log(lang) 
        })
              
        }
        
}
}
</script>