<template>
    <v-layout row justify-center>
        <v-dialog v-model="dialog" persistent max-width="600px">
                       <div class="overflow-hidden bg-white shadow sm:rounded-lg mx-auto">
  <div class="px-4 py-3 sm:px-6 flex">
    <h3 class="text-2xl my-auto font-medium leading-6 text-gray-900">{{ trans('data.view_design') }}</h3>
            <v-spacer></v-spacer>
                    <v-btn flat icon @click="dialog = false"> <v-icon>clear</v-icon> </v-btn>
  </div>
  <div class="border-t border-gray-200" v-if="design.project">
    <dl>
      <div :class="$vuetify.breakpoint.xsOnly?'flex justify-around':''" class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-md font-medium text-gray-500">{{trans('data.project_name')}}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">{{ design.project.projectName }}</dd>
      </div>
      <div :class="$vuetify.breakpoint.xsOnly?'flex justify-around':''" class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-md font-medium text-gray-500">{{trans('messages.customer')}}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">{{ design.customer }}</dd>
      </div>
         <!--<div :class="$vuetify.breakpoint.xsOnly?'flex justify-around':''" class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-md font-medium text-gray-500">{{trans('data.location_info')}}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0"><span v-if="design.location">{{ design.location.province_municipality+'-'+design.location.municipality+'-'+ design.location.category+'-'+ design.location.plan_id}}</span></dd>
      </div>-->
     <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-md font-medium text-gray-500">{{ trans('data.enginnering_office_name') }}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
          <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-md" v-for="office in design.offices" :key="office.id">
              <div class="flex w-0 flex-1 items-center">
                <!-- Heroicon name: mini/paper-clip -->
                  <span class="ml-2 w-0 flex-1 truncate">{{ office.name }}</span>
                
              </div>
            </li>
          </ul>
        </dd>
      </div>
           <div v-if="design.service_type" :class="$vuetify.breakpoint.xsOnly?'flex justify-around':''" class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-md font-medium text-gray-500">{{trans('data.service_types_list')}}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0"><span>{{ design.service_type['name_'+getCurrentLang()] }}</span></dd>
      </div>
      <div :class="$vuetify.breakpoint.xsOnly?'flex justify-around':''" class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-md font-medium text-gray-500">{{ trans('data.note') }}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">{{ design.note }}</dd>
      </div>
      <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6" v-if="employees.length>0">
        <dt class="text-md font-medium text-gray-500">{{ trans('data.employees') }}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
          <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-md" v-for="(enginner,index) in employees" :key="index">
              <div class="flex w-0 flex-1 items-center">
                <!-- Heroicon name: mini/paper-clip -->
                <span class="ml-2 w-0 flex-1 truncate"> {{ enginner != undefined ? enginner.stage : '' }} :: {{ enginner != undefined ? enginner.name : '' }} :: {{enginner != undefined? enginner.is_active ? 'مفعل': 'غير مفعل' : ''}} </span>

                
              </div>
            </li>
          </ul>
        </dd>
      </div>
    </dl>
    <div class="mx-auto my-2 flex justify-center border-t border-gray-200">
        <v-btn color="green darken-1" flat @click="close">
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
            valid: true,
            dialog: false,
            design: {},
            employees: [],
            loading: false,
        };
    },
    mounted() {
        const self = this;
    },
    created() {
        const self = this;
     //   self.dialog = true;
    },
    beforeDestroy() {
        const self = this;
    },

    methods: {
        close() {
            const self = this;
            self.loading = false;
            self.dialog = false;
           // this.$refs.form.resetValidation();
           // this.$refs.form.reset();
        },
        create(data) {
            const self = this;
            self.employees=[];
            self.design = data;
            for (var i = 0; i < data.design_enginners.length; i++) {
                self.employees.push({
                    id: data.design_enginners[i].enginner_id,
                    name: '',
                    is_active: data.design_enginners[i].is_active,
                    stage: '',
                });
                self.getEmployee(data.design_enginners[i].enginner_id, i);
                self.getStage(data.design_enginners[i].stage_id, i);
            }
            self.dialog = true;
        },
        reset() {
            this.$refs.form.reset();
        },
        resetValidation() {
            this.$refs.form.resetValidation();
        },
        getEmployee(user_id, i) {
            const self = this;
            axios.get('/admin/users/' + user_id + '/name').then(function (response) {
                self.employees[i].name = response.data.name;
                //  return
            });
        },

        getStage(stage_id, i) {
            const self = this;
            axios.get('get-stage/' + stage_id).then(function (response) {
                self.employees[i].stage = response.data.value;
                //  return
            });
        },
    },
};
</script>
