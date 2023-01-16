/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
 
// vendor
require('../bootstrap');
window.Vue = require('vue').default;



//import Vue from 'vue'
// VeeValidate
import VeeValidate from 'vee-validate';

import { format, parseISO } from 'date-fns';


Vue.use(VeeValidate, { validity: true, fieldsBagName: 'veeFields' });



//to use lodash in templates
Vue.prototype._ = _;

// 3rd party
//import Vuetify from 'vuetify';
import Chart from 'chart.js';
moment.tz.setDefault(APP.TIMEZONE);

//import 'vuetify/dist/vuetify.min.css';

//Quill Editor
import QuillEditor from 'vue-quill-editor';

// require styles
import 'quill/dist/quill.snow.css';

import './style.css'
Vue.use(QuillEditor, {
    placeholder: 'Write here..',
    theme: 'snow',
    modules: {
        toolbar: [
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [{ list: 'ordered' }, { list: 'bullet' }],
            [{ script: 'sub' }, { script: 'super' }],
            [{ indent: '-1' }, { indent: '+1' }],
            [{ direction: 'rtl' }],
            [{ size: ['small', false, 'large', 'huge'] }],
            [{ header: [1, 2, 3, 4, 5, 6, false] }],
            [{ font: [] }],
            [{ color: [] }, { background: [] }],
            [{ align: [] }],
            ['clean'],
            ['link', 'image', 'video'],
        ],
    },
});
var x=APP.RTL;

window.accounting = require('accounting');

Vue.filter('formatDateTime', function(date) {
    if (APP.TIME_FORMAT == 12) {
        var format = APP.DATE_FORMAT.VALUE + ' h:mm A';
    } else {
        var format = APP.DATE_FORMAT.VALUE + ' h:mm';
    }

    if (date) {
        return moment(date).format(format);
    }
});

Vue.filter('formatDate', function(date) {
    if (date) {
        return moment(date).format(APP.DATE_FORMAT.VALUE);
    }
});

Vue.filter('formatMoney', function(value, symbol = null) {
    if (symbol === null) {
        symbol = ' ';
    }
    return accounting.formatMoney(value, symbol);
});

//date range picker
import '@mdi/font/css/materialdesignicons.css'
import Vue from 'vue';
import VueFlatPickr from 'vue-flatpickr-component';
import 'flatpickr/dist/flatpickr.css';
import VueSignaturePad from 'vue-signature-pad';


//Vue.use(i18n)

Vue.use(VueSignaturePad);
Vue.use(VueFlatPickr);

flatpickr.setDefaults({
    // locale: 'Russian',
    //timezone: 'Asia/Kolkata
    locale: {
        firstDayOfWeek: APP.FIRST_DAY_OF_WEEK,
    },
});

import MoonLoader from "vue-spinner/src/MoonLoader.vue"
import Notification from "../common/notification/Notification.vue"
import FormAdd from "../common/UserFormAdd.vue"
import SignaturePad from "../common/SignaturePad.vue"
import MobileHeader from "../common/layout/MobileHeader.vue"
import Calendar from "../common/calendar/Calendar.vue"
import Avatar from "../common/projects/components/Avatar.vue"
import Create from "../admin/quick_add/Create.vue"
import Index from "../common/layout/Index.vue"

Vue.component('moon-loader', MoonLoader);
Vue.component('notification', Notification);
Vue.component('userformadd', FormAdd);
Vue.component('signaturepad', SignaturePad);
Vue.component('index', Index);
Vue.component('mobileheader', MobileHeader);
Vue.component('calendar', Calendar);
Vue.component('avatar', Avatar);
Vue.component('quick-add-button', Create);
Vue.component('vue-panel', {
    template: '#panel-template',
    props: ['title', 'body', 'footer', 'style']
  });
  
import formatters from './Formatters';
import functions from './Functions';

Vue.use(formatters);

Vue.mixin(functions);
Vue.mixin({
    mounted() {
        const e = this.$el;

        if ('querySelector' in this.$el) {
            const i = this.$el.querySelector('input[required]');

            if (i !== null) {
                const l = i.previousSibling;

                if (l?.querySelector('.required.sign') === null) {
                    const r = document.createElement('span');

                    // l.classList.add('required');
                    r.classList.add('required', 'sign');

                    r.appendChild(document.createTextNode('*'));
                    l.appendChild(r);
                }
            }
        }
    },
});

//import DatetimePicker from 'vuetify-datetime-picker'
// (Optional) import 'vuetify-datetime-picker/src/stylus/main.styl'
 
//Vue.use(DatetimePicker)

// import { Datetime } from 'vue-datetime'
// // You need a specific loader for CSS files
// import 'vue-datetime/dist/vue-datetime.css'
 
// Vue.use(Datetime)


//Simport DatetimePicker from '@goldenm/vuetify-datetime-picker'

import { BootstrapVue, IconsPlugin ,BootstrapVueIcons } from 'bootstrap-vue'

// Import Bootstrap an BootstrapVue CSS files (order is important)

//import 'bootstrap-vue/dist/bootstrap-vue.css'
// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)
Vue.use(BootstrapVueIcons)

//print  S


//import DatetimePicker from 'vuetify-datetime-picker'
import DatetimePicker from 'vuetify-datetime-picker';

// (Optional) import 'vuetify-datetime-picker/src/stylus/main.styl'
 
Vue.use(DatetimePicker)

import VuetifyMoney from "vuetify-money";
Vue.use(VuetifyMoney);


import * as VueGoogleMaps from 'vue2-google-maps'
Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyDbCbVzCES9MfgpiISriDDveQwshIPwH7I',
        libraries: 'places',
    }
});


// import DatetimePicker from 'vuetify-datetime-picker'
// Vue.use(DatetimePicker)
