<template>
<div class="fixed inset-x-0 z-30">

    <v-toolbar dense style="background: linear-gradient(45deg, #119f9b, #06706d);box-shadow: none;height:60px;">
       <v-menu 
       :close-on-content-click="false"
        :nudge-width="200"
         offset-y
          style="margin-inline-start: 10px;width:100%;left:auto">
      <template v-slot:activator="{ on }">
      <v-toolbar-side-icon
      color="#fff"
          v-on="on">
          </v-toolbar-side-icon>
          <notification color="#fff" colorIcon="#fff" class="mx-1" ref="notifications"></notification>
  </template>
      <v-list>
        <v-list-tile
          @click="$router.push('/').catch(() => { /* ignore */ })"
        >
          <v-list-tile-title>
            {{trans('data.home')}} 
          </v-list-tile-title>
        </v-list-tile>
         <v-list-tile
          @click="$router.push('/to-do').catch(() => { /* ignore */ })"
        >
          <v-list-tile-title>
            {{trans('data.to_do_list')}}
          </v-list-tile-title>
        </v-list-tile>
        
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
      <v-list-group
              no-action
            >
              <template v-slot:activator>
                <v-list-tile>
                  <v-list-tile-content>
                    <v-list-tile-title style="font-size:14px;  margin-top:15px">
                                {{trans('data.basic_information')}}
                             &nbsp;&nbsp;
                            <avatar :members="getCurrentUser()[0]" :tooltip="true">
                            </avatar>&nbsp;
                            <v-icon dark medium>more_vert</v-icon>
                           </v-list-tile-title>
                  </v-list-tile-content>
                </v-list-tile>
              </template>
  
              <v-list-tile
              @click="$router.push({ name: 'profile.list' }).catch(() => { /* ignore */ })"
              >
                <v-list-tile-content class="py-2">
                  <v-list-tile-title>
                    <v-icon> account_circle </v-icon>
                                    {{trans('messages.profile')}}
                  </v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
              <v-list-tile @click="logoutUser">
                                <v-list-tile-title>
                                    <v-icon> directions_walk </v-icon>
                                    {{trans('messages.logout')}}
                                </v-list-tile-title>
                            </v-list-tile>
            </v-list-group>
      </v-list>
    </v-menu>


      <v-spacer></v-spacer>

      <div>
         <img src="img/logo.png" class="rounded-lg"  alt="logo" width="150" />
      </div>
    </v-toolbar>
      
      </div>
</template>

<script>
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

<style scoped>
>>> .v-toolbar__content{
  height: 100%!important;
}
>>> .v-list__tile__title{
  @apply min-h-full
}
</style>