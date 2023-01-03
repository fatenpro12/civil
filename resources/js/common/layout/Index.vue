<template>
  <div>
      <div v-if="authenticated">
           <Nav v-if='!$vuetify.breakpoint.xsOnly' />
            <mobileheader v-if="$vuetify.breakpoint.xsOnly"/>
            </div>
            <v-content :class="$vuetify.breakpoint.xsOnly?'mt-5':''" style="padding:0">
              <v-app id="inspire-font" :style="!authenticated?'background:url(img/welcome.jpg) 0 0 no-repeat;background-size:cover':''">
                <transition name="fade">
                    <router-view></router-view>
                </transition>
                </v-app>
            </v-content>

            <div v-scroll="onScroll">
                <v-footer app
                    v-show="toggleFooter">
                    <span>
                    </span>
                </v-footer>
            </div>

        <!-- loader -->
        <div v-if="showLoader" class="wask_loader bg_half_transparent">
            <moon-loader color="red"></moon-loader>
        </div>

        <!-- snackbar -->
        <v-snackbar
                :timeout="snackbarDuration"
                :color="snackbarColor"
                top
                right
                v-model="showSnackbar">
            @{{ snackbarMessage }}
        </v-snackbar>

        <!-- dialog confirm -->
        <v-dialog v-show="showDialog" v-model="showDialog" lazy absolute max-width="450px">
            <v-btn color="primary" slot="activator">Open Dialog</v-btn>
            <v-card>
                <v-card-title>
                    <div class="headline"><v-icon v-if="dialogIcon" medium>@{{dialogIcon}}</v-icon> @{{ dialogTitle }}</div>
                </v-card-title>
                <v-card-text>@{{ dialogMessage }}</v-card-text>
                <v-card-actions v-if="dialogType=='confirm'">
                    <v-spacer></v-spacer>
                    <v-btn color="green darken-1" flat="flat" @click.native="dialogCancel">
                        {{trans('messages.cancel')}}
                    </v-btn>
                    <v-btn color="green darken-1" flat="flat" @click.native="dialogOk">
                        {{trans('messages.ok')}}
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
  </div>
</template>

<script>
import Nav from './Nav.vue'
import store from '../../store'
export default {
components:{
    Nav
},
data(){
 return {
    authenticated: false,
    user: null
 }
},
created(){
  this.authenticated=store.getters['auth/isAuthenticated']
  this.user=store.getters['auth/user']
}
}
</script>

<style>
/* show when screen is at least 600px wide */

div[aria-required=true].v-input .v-label::after {
    content: " *";
    color: red;
  }
  .v-label  > .required.sign {
    color: rgb(248, 14, 14);
    font-weight: bold;
    margin-left: .25em;
}
div[aria-required=true].v-autocomplete .v-label::after {
  content: " *";
  color: red;
}
    /* quill editor toolbar */
   #inspire-font {
    font-family: 'Tajawal', sans-serif;
   }
.ql-toolbar {
  background-color: white;
}
.ql-container {
    min-height: 200px;
    font-size: 15px;
    overflow-y: scroll;
    resize: vertical;
}
.v-card{
    width: 100%
 }
 .v-progress-circular{
    margin: auto
 }
</style>