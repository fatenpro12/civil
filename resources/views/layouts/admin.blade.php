<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Civil Application</title>

    @if(!empty($favicon))
        <link rel="shortcut icon" href="{{asset('uploads/' . $favicon)}}"/>
    @endif
    <!-- Styles -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" rel="stylesheet"/>
    <!-- app js values -->
    
    <link href="{{ asset('css/font-tajaw.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Tajawal' rel='stylesheet'>
    
    <script type="application/javascript">
        var APP = {};
        APP.APP_URL = '{{config('app.url')}}';
        APP.TIMEZONE = '{{config('app.timezone')}}';
        APP.NOTIFICATION_REFRESH_TIMEOUT = '{{config('constants.notification_refresh_timeout')}}';
        APP.UPLOAD_FILE_MAX_SIZE = '{{config('constants.upload_file_max_size')}}';
        // @if(in_array(config('app.locale'), config('constants.langs_rtl'))) true @else false @endif;
       // APP.RTL =true;
      
        APP.RTL = @if(in_array(config('app.locale'), config('constants.langs_rtl'))) true @else false @endif;
        APP.FIRST_DAY_OF_WEEK = '{{$first_day_of_week}}';
        APP.LANGUAGES = {!! json_encode(Config::get('languages'), true) !!};
        APP.CURRENT_LANGUAGE = "{{App::getLocale()}}";
           @auth
             window.Permissions = {!! json_encode(Auth::user()->allPermissions, true) !!};

            @php
                $user =  Auth::user();
               $current_user=  new App\Http\Resources\UserResource($user);
            @endphp

            APP.USER_PERMISSIONS = {!! json_encode($user->getUserPermissions($user), true) !!};
            APP.USER_ROLES = {!! json_encode($user->getUserRoles($user), true) !!};
            APP.DATE_FORMAT = {!! json_encode($user->appDateFormat()) !!};
            APP.TIME_FORMAT = {!! json_encode($user->appTimeFormat()) !!};
            APP.USER_TYPE_LOG = {!! json_encode($user->user_type_log) !!};
            APP.CURRENT_USER = {!! json_encode($current_user) !!};
            
        @else
             window.Permissions = [];
            @php
                $user = null;
            @endphp
            APP.USER_PERMISSIONS = [];
            APP.USER_ROLES = [];
        @endauth
    </script>
</head>
<body>
<div id="admin">
    <template>
        <v-app id="inspire-font">
           
        <!--    </v-navigation-drawer>-->
            <div>
            <v-toolbar v-if='!$vuetify.breakpoint.xsOnly' style="background-color:#06706d;z-index: 100" app dark flat fixed dense height="100"
                :clipped-left="true">
                <img src="{{asset('img/logo.png')}}"  alt="logo" width="100" style="border-radius:20px;" />
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
                <notification></notification>
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
                                <v-icon>language</v-icon>
                                {{trans('data.language')}}
                                
                        </v-btn> 
                        <v-list>
                            <v-list-tile style="background: darkgrey;"  @click="save()"> 
                                <v-list-tile-title>
                                <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span> {{ Config::get('languages')[App::getLocale()]['display'] }}
                                </v-list-tile-title>
                            </v-list-tile>
                            <v-list-tile >
                                <v-list-tile-title>
                                @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                        <a class="dropdown-item" href='javascript:;' onclick='change("{{ $lang}}");' ><span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> {{$language['display']}}</a>
                                    @endif
                                @endforeach
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
                            <avatar :members="{{ json_encode([0 => $user->toArray()]) }}" :tooltip="true">
                            </avatar>&nbsp;<!--{{ $user->name }}-->
                            <v-icon dark medium>more_vert</v-icon>
                        </v-btn>
                        
                        <v-list>
                  

                            <v-list-tile @click="$router.push({ name: 'profile.list' })">
                                <v-list-tile-title>
                                    <v-icon> account_circle </v-icon>
                                    {{trans('messages.profile')}}
                                </v-list-tile-title>
                            </v-list-tile>
                            <v-list-tile @click="clickLogout('{{route('logout')}}','{{url('/login')}}')">
                                <v-list-tile-title>
                                    <v-icon> directions_walk </v-icon>
                                    {{trans('messages.logout')}}
                                </v-list-tile-title>
                            </v-list-tile>
                        </v-list>


                     </v-menu>
       
            </v-toolbar>
            <mobileheader v-if="$vuetify.breakpoint.xsOnly"/>
            </div>
            <v-content :class="$vuetify.breakpoint.xsOnly?'mt-5':''">
                <transition name="fade">
                    <router-view></router-view>
                </transition>
            </v-content>

            <div v-scroll="onScroll">
                <v-footer app
                    v-show="toggleFooter">
                    <span>
                    </span>
                </v-footer>
            </div>
        </v-app>

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
                        @lang('messages.cancel')
                    </v-btn>
                    <v-btn color="green darken-1" flat="flat" @click.native="dialogOk">
                        @lang('messages.ok')
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>

    </template>

</div>

    <!-- Scripts -->

    <script src="{{ env('APP_URL') . '/js/lang.js' }}"></script>
    <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>

    @if($user->is_employee)
        <script src="{{ asset('js/admin.js') }}"></script>
    @elseif($user->is_client)
        <script src="{{ asset('js/client.js') }}"></script>
    @endif
    <script type="text/javascript">
const isEmpty = str => !str.trim().length;
var language;
localStorage.setItem("currentLange","{{ app()->getLocale() }}");
 function change(lang){
        ///lang/ar
        localStorage.setItem("currenpathaftercjange",localStorage.getItem("currenpath"));
        localStorage.setItem("currentLange",lang);
        localStorage.removeItem("currenpath");
        window.location.href = "lang/"+lang; //causes the browser to refresh and load the requested url
        language= lang;
          //  alert(lang)
        }
</script>
   
</body>
<style type="text/css">
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
</html>