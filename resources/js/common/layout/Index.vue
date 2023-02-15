<template>
  <v-app id="inspire-font" :style="language == 'ar'?'direction:rtl;text-align:right':'direction:ltr;text-align:left'">
      <div v-if="authenticated">
           <Nav v-if='!$vuetify.breakpoint.xsOnly' />
            <mobileheader v-if="$vuetify.breakpoint.xsOnly"/>
            </div>
            <v-content class="px-0 pb-0"
            :style="!authenticated?'background:url(/img/welcome.jpg) 0 0 no-repeat;background-size:cover':''">
                <transition name="translate" mode="out-in">
                    <router-view :class="$vuetify.breakpoint.xsOnly?'mt-5':''"></router-view>
                </transition>
            </v-content>

            <div v-scroll="onScroll">
                <v-footer app
                    v-show="toggleFooter">
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
             {{ snackbarMessage }}
        </v-snackbar>

        <!-- dialog confirm -->
        <v-dialog v-show="showDialog" v-model="showDialog" lazy absolute max-width="450px">
            <v-btn color="primary" slot="activator">Open Dialog</v-btn>
            <v-card>
                <v-card-title>
                    <div class="headline"><v-icon v-if="dialogIcon" medium>{{dialogIcon}}</v-icon>{{ dialogTitle }}</div>
                </v-card-title>
                <v-card-text>{{ dialogMessage }}</v-card-text>
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
  </v-app>
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
    user: null,
    toggleFooter: false,
    language: null
 }
},
computed:{
         onScroll(e) {
            if (window.pageYOffset > 100) {
                this.toggleFooter = true;
            } else {
                this.toggleFooter = false;
            }
        },
           showLoader() {
            return store.getters['showLoader'];
        },
            snackbarDuration() {
            return store.getters['snackbarDuration'];
        },
              snackbarColor() {
                console.log(store)
            return store.getters['snackbarColor'];
        },
             snackbarMessage() {
            return store.getters['snackbarMessage'];
        },
            showSnackbar: {
            get() {
                return store.getters['showSnackbar'];
            },
            set(val) {
                if (!val) store.commit('hideSnackbar');
            },
        },
            // dialog
        showDialog: {
            get() {
              return store.getters['showDialog'];
            },
            set(val) {
                if (!val) store.commit('hideDialog');
            },
        },
                dialogType() {
            return store.getters['dialogType'];
        },
        dialogTitle() {
            return store.getters['dialogTitle'];
        },
        dialogMessage() {
            return store.getters['dialogMessage'];
        },
        dialogIcon() {
            return store.getters['dialogIcon'];
        },
           drawer: {
            get: function() {
                return store.getters['drawer'];
            },
            set: function() {
                return store.getters['drawerToggle'];
            },
        },
},
created(){
  this.authenticated=store.getters['auth/isAuthenticated']
  this.user=store.getters['auth/user']
  this.language = localStorage.getItem('currentLange')
},
mounted(){
  this.authenticated=store.getters['auth/isAuthenticated']
  this.user=store.getters['auth/user']
},
updated(){
  this.authenticated=store.getters['auth/isAuthenticated']
  this.user=store.getters['auth/user']
},
methods:{
      dialogOk() {
            store.commit('dialogOk');
        },
        dialogCancel() {
            store.commit('dialogCancel');
        },
}
}
</script>

<style>
     /*  :root {
          --input-padding-x: 1.5rem;
          --input-padding-y: .82rem;
        }*/

        .card-signin {
          border: 0;
          border-radius: 1rem;
       /*   box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);*/
        }

        .card-signin .card-title {
          background-color:#06706d;
         /* margin-bottom: 2rem;*/
          font-weight: 300;
          font-size: 1.5rem;
        }
        .card-signin .card-body {
          padding: 0rem;
        }
     

/* show when screen is at least 600px wide */

div[aria-required=true].v-input .v-label::after {
    content: " *";
    color: red;
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
>>> .error{
    color:#fff;
}
/* show when screen is at least 600px wide */


  .v-label  > .required.sign {
    color: rgb(248, 14, 14);
    font-weight: bold;
    margin-left: .25em;
}

    /* quill editor toolbar */


.ql-container {
    min-height: 200px;
    font-size: 15px;
    overflow-y: scroll;
    resize: vertical;
}

 .v-progress-circular{
    margin: auto
 }
  .translate-enter-active,
  .translate-leave-active {
    transition: all 0.5s ease;
  }
  
  .translate-enter-from,
  .translate-leave-to {
    opacity: 0;
    transform: translateX(30px);
  }
  a,a:hover,a:active {
    text-decoration: none;
  }
</style>