<template>
    <v-toolbar v-if='!$vuetify.breakpoint.xsOnly' style="background-color:#06706d;z-index: 100" app dark flat fixed dense height="100"
                :clipped-left="true">
                <img src="img/logo.png"  alt="logo" width="100" style="border-radius:20px;" />
                <v-layout >
                    <div style="font-size:16px;">
 
                        &nbsp;&nbsp;&nbsp;
                        <router-link to="/" style="color:white;">
                            {{trans('data.home')}}
                        </router-link>    
                        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
                        <router-link to="/to-do" style="color:white;">
                            {{trans('data.to_do_list')}}
                        </router-link>                                      
                    </div>
                </v-layout>
                <!--<notification></notification>-->
                <v-list-group
              no-action
            >
              <template v-slot:activator>
                <v-list-tile>
                  <v-list-tile-content>
                    <v-list-tile-title style="font-size:14px;  margin-top:15px">
                           <v-icon>language</v-icon>
                           <span class="mx-1">{{trans('data.language')}}</span>
                           </v-list-tile-title>
                  </v-list-tile-content>
                </v-list-tile>
              </template>
  
              <v-list-tile
               v-for="(lang,key) in getLanguages()" 
               :key="key"
               @click='change(key)' 
               class="mx-4"
              >
                <v-list-tile-content class="py-2">
                  <v-list-tile-title>
                    <div v-if="key!=language">
                                    <span :class="'pa-0 ma-0 max-h-full flag-icon flag-icon-'+lang['flag-icon']"></span>
                                     {{lang['display']}}
                                    </div>
                  </v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
            </v-list-group>
                    
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
                                <v-list-tile-title>
                                    <v-icon> account_circle </v-icon>
                                    {{trans('messages.profile')}}
                                </v-list-tile-title>
                            </v-list-tile>
                            <v-list-tile @click="logoutUser">
                                <v-list-tile-title>
                                    <v-icon> directions_walk </v-icon>
                                    {{trans('messages.logout')}}
                                </v-list-tile-title>
                            </v-list-tile>
                        </v-list>


                     </v-menu>
       
            </v-toolbar>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
    data(){
return {
language: null,
}
},
created(){
     self.language = localStorage.getItem('currentLange')?localStorage.getItem('currentLange'):self.getLanguages().ar
},
methods:{
   ...mapGetters({
            isAuthenticated:'auth/isAuthenticated',
            user: 'auth/user'
        }),
  logoutUser(){
   axios.post('/logout').then(r => {
                window.location.href = '/login';
            });
  },
    change(lang){
        localStorage.setItem("currenpathaftercjange",localStorage.getItem("currenpath"));
        localStorage.setItem("currentLange",lang);
        localStorage.removeItem("currenpath");
        window.location.href = "lang/"+lang;
        language= lang;
        console.log(lang)
        }
}
}
</script>

<style>

</style>