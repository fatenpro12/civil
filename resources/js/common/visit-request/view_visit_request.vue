<template>
<v-layout row justify-center>
  <v-dialog v-model="dialog" persistent max-width="600px">
<div :class="$vuetify.breakpoint.xsOnly?'w-full mt-5':''" class="overflow-hidden bg-white shadow sm:rounded-lg  mx-auto">
  <div class="px-4 py-3 sm:px-6 flex">
    <h3 class="text-lg mt-2 font-medium leading-6 text-gray-900">{{ trans('data.visit_request_detaile') }}</h3>
     <v-spacer></v-spacer>
                    <v-btn flat icon @click="dialog = false"> <v-icon>clear</v-icon> </v-btn>
  </div>
  <div class="border-t border-gray-200">
    <dl>
      <div :class="$vuetify.breakpoint.xsOnly?'flex justify-around':''" class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-md font-medium text-gray-500">{{trans('data.project_name')}}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">{{ project_name }}</dd>
      </div>
      <div :class="$vuetify.breakpoint.xsOnly?'flex justify-around':''" class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-md font-medium text-gray-500">{{trans('messages.customer')}}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">{{ customer }}</dd>
      </div>
      <div :class="$vuetify.breakpoint.xsOnly?'flex justify-around':''" class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-md font-medium text-gray-500">{{ trans('data.visit_datetime') }}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">{{ dead_line_date }}</dd>
      </div>
      <div :class="$vuetify.breakpoint.xsOnly?'flex justify-around':''" class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-md font-medium text-gray-500">{{trans('data.enginnering_type')}}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">{{ enginnering_type }}</dd>
      </div>
       
      <div :class="$vuetify.breakpoint.xsOnly?'flex justify-around':''" class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-md font-medium text-gray-500">{{ trans('data.note') }}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">{{ note }}</dd>
      </div>

          <div :class="$vuetify.breakpoint.xsOnly?'flex justify-around':''" class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-md font-medium text-gray-500">{{ trans('data.enginnering_office_name') }}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">{{ offices[0]?offices[0].name:'' }}</dd>
      </div>
      <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-md font-medium text-gray-500">{{trans('data.employee_and_Dead_lines')}}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
          <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
            <li class="flex items-center justify-between py-3 px-2 text-md" v-for="enginner in request_enginners" :key="enginner.id">
  
                <span class="ml-2 w-0 flex-1 min-w-fit truncate">{{ enginner.employee.name }}</span>
                 <!--<span class="ml-2 w-0 flex-1 min-w-fit truncate"> {{trans('data.dead_line_date')}}</span>-->
                  <span class="ml-2 w-0 flex-1 min-w-fit truncate">{{ enginner.dead_line_date !=null ?  enginner.dead_line_date : 'لم يحدد بعد'}}</span>
                
           
            </li>
          </ul>
        </dd>
      </div>
    </dl>
    <div class="mx-auto my-2 flex justify-center">
      <v-btn style="color: #06706d" @click="dialog =false">
                        {{ trans('data.close') }}
                    </v-btn>
                    </div>
  </div>
</div>
  </v-dialog>
  </v-layout>
</template>
<script>
import store from '../../store'
export default {
    data() {
        return {
            propRequestId: null,
             dialog: false,
            project_name: '',
            loading: false,
            request_type: '',
            customer: '',
            dead_line_date: null,
            note: '', //
            enginnering_type: '',
             request_enginners: [],
             offices:[],
        };
    },

    methods: {
        getEnginners() {
            const self = this;
            axios.get('get-requests-enginners/' + self.propRequestId).then(function (response) {
                self.request_enginners = response.data;
            });
        },
        create(data){
   this.dialog=true
   this.propRequestId =data
           const self = this;
self.getEnginners();
        this.loadRequest(() => {});
        },
        loadRequest() {
            const self = this;
            axios.get('request/' + self.propRequestId).then(function (response) {
              console.log(response.data.msg)
                if (response.data.success) {
                    var tem = response.data.msg;
                   self.enginnering_type = tem.request.specialties? tem.request.specialties.map(x=>x.name).join(','):'';
                    self.request_type = tem.request.request_type;
                    self.project_name = tem.request.projectName;
                    self.customer = tem.request.customer;
                    self.offices = tem.request.offices;
                    self.note = tem.request.note;
                    self.dead_line_date = tem.request.dead_line_date;
                } else {
                    self.$store.commit('showSnackbar', {
                        message: response.data.msg,
                        color: response.data.success,
                    });
                }
            });
        },

    },
};
</script>
