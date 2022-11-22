<template>
<v-layout row justify-center>
  <v-dialog v-model="dialog" persistent max-width="600px">
<div :class="$vuetify.breakpoint.xsOnly?'w-full mt-5':''" class="overflow-hidden bg-white shadow sm:rounded-lg mx-auto">
  <div class="px-4 py-3 sm:px-6 flex">
    <h3 class="text-lg mt-2 font-medium leading-6 text-gray-900">{{ trans('data.visit_request_detaile') }}</h3>
  <v-spacer></v-spacer>
                    <v-btn flat icon @click="dialog = false"> <v-icon>clear</v-icon> </v-btn>
  </div>
  <div class="border-t border-gray-200">
    <dl>
      <div :class="$vuetify.breakpoint.xsOnly?'flex justify-around':''" class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-md font-medium text-gray-500">{{trans('data.project_name')}}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">{{ projects.find(x => x.id == project_id)?projects.find(x => x.id == project_id).name:'' }}</dd>
      </div>
      <div :class="$vuetify.breakpoint.xsOnly?'flex justify-around':''" class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-md font-medium text-gray-500">{{trans('messages.customer')}}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">{{ customers.find(x => x.id == customer_id)?customers.find(x => x.id == customer_id).name:'' }}</dd>
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

      <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-md font-medium text-gray-500">{{trans('data.employee_and_Dead_lines')}}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
          <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
            <li class="flex items-center justify-between py-3 px-2 text-md" v-for="enginner in request_enginners" :key="enginner.id">
             <!-- <div class="flex w-0 flex-1 items-center">
                <!-- Heroicon name: mini/paper-clip -->
                <span class="ml-2 w-0 min-w-fit flex-1 truncate">{{ enginner.employee.name }}</span>
                 <!--<span class="ml-2 w-0 min-w-fit flex-1 truncate"> {{trans('data.dead_line_date')}}</span>-->
                  <span class="ml-2 w-0 min-w-fit flex-1 truncate">{{ enginner.dead_line_date !=null ?  enginner.dead_line_date : 'لم يحدد بعد'}}</span>
                
              <!--</div>-->
            </li>
          </ul>
        </dd>
      </div>
    </dl>
    <div class="mx-auto my-2 flex justify-center">
      <v-btn style="color: #06706d" @click="$router.go(-1)">
                        {{ trans('data.close') }}
                    </v-btn>
                    </div>
  </div>
</div>
  </v-dialog>
</v-layout>

</template>
<script>
export default {
    components: {},
    data() {
        return {
            type: '',
            isView: false,
            project_id: '',
                 propRequestId: null,
             dialog: false,
            projects: [],
            enginnering_types: [],
            visit_request: null,
            loading: false,
            location: null,
            title: '',
            request_type: '',
            project_id: '',
            description: '',
            status: 'new',
            priority: '',
            customer_id: '',
            statuses: [],
            employees: [],
            request_types: [],
            customers: [],
            priorities: [],
            request_type: '',
            engennering_offices: [],
            office_id: '',
            dead_line_date: null,
            enginnering_request: '',
            note: '', //
            enginnering_type: '',
            request_enginners: [],
        };
    },
    created() {
        this.getEnginners();
    },
    beforeDestroy() {
        const self = this;
        self.$eventBus.$off('updateCategoryList');
    },
    mounted() {
      /*  const self = this;

        self.getCustomerProject();
        self.getCustomers();
        self.getOffices();
        //
        this.loadRequest(() => {});
        self.$eventBus.$on('updateRequestTypeList', (data) => {
            //  self.request_types = [];
            // self.request_types = data;
        });*/
    },
    methods: {
             create(data){
   this.dialog=true
   this.propRequestId =data
           const self = this;
self.getEnginners();
        self.getCustomerProject();
        self.getCustomers();
        self.getOffices();
        this.loadRequest(() => {});
        },
        getEnginners() {
            const self = this;
            axios.get('get-requests-enginners/' + self.propRequestId).then(function (response) {
                console.log(response.data);
                self.request_enginners = response.data;
                //  self.enginnering_request = response.data.join(',');
            });
        },
        loadRequest() {
            const self = this;

            axios.get('/enginner_office/request/' + self.propRequestId).then(function (response) {
                if (response.data.success) {
                    console.log(response.data);
                    var tem = response.data.msg;
                    self.request_types = tem.request_types;
                    self.request_type = tem.request.request_type;
                    self.project_id = tem.request.project_id;
                    self.description = tem.request.description;
                    self.status = tem.request.status;
                    self.location = tem.request.location
                    self.customer_id = tem.request.customer_id;
                    self.office_id = tem.request.office_id;
                    
                         self.enginnering_type =
                        tem.request.specialties != undefined
                            ? tem.request.specialties.map((x) => x.name).join(',')
                            : '';
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
        getCustomers() {
            const self = this;
            axios
                .get('/enginner_office/customers')
                .then(function (response) {
                    self.customers = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        getOffices() {
            const self = this;
            axios
                .get('/get-offices')
                .then(function (response) {
                    self.engennering_offices = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        reset() {
            const self = this;
            self.title = '';
            self.request_type = '';
            self.project_id = '';
            self.description = '';
            self.status = '';
            self.priority = '';
            self.customer_id = '';
            self.office_id = '';
            self.note = ''; //
            self.enginnering_type = '';
        },

        getCustomerProject() {
            const self = this;
            axios
                .get('enginner_office/projects-request')
                .then(function (response) {
                    self.projects = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
};
</script>
