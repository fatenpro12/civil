<template>
    <v-layout row justify-center>
        <v-dialog v-model="dialog" persistent max-width="600px">
                   <div class="overflow-hidden bg-white shadow sm:rounded-lg mx-auto">
  <div class="px-4 py-2 sm:px-6 flex">
    <h3 class="text-2xl my-auto font-medium leading-6 text-gray-900">{{ trans('data.view_support') }}</h3>
            <v-spacer></v-spacer>
                    <v-btn flat icon @click="dialog = false"> <v-icon>clear</v-icon> </v-btn>
  </div>
  <div class="border-t border-gray-200" v-if="design.project">
    <dl>
      <div :class="$vuetify.breakpoint.xsOnly?'flex justify-around':''" class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-md font-medium text-gray-500">{{trans('data.project_name')}}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">{{ design.project.name }}</dd>
      </div>
      <div :class="$vuetify.breakpoint.xsOnly?'flex justify-around':''" class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-md font-medium text-gray-500">{{trans('messages.customer')}}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">{{ design.customer.name }}</dd>
      </div>
        <div :class="$vuetify.breakpoint.xsOnly?'flex justify-around':''" class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-md font-medium text-gray-500">{{ trans('data.created_by') }}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">{{ design.creator.name }}</dd>
      </div>
         <div :class="$vuetify.breakpoint.xsOnly?'flex justify-around':''" class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-md font-medium text-gray-500">{{trans('data.service_types_list')}}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0"><span v-if="design.service_type">{{ design.service_type['name_'+getCurrentLang()] }}</span></dd>
      </div>
      <div :class="$vuetify.breakpoint.xsOnly?'flex justify-around':''" class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-md font-medium text-gray-500">{{ trans('data.note') }}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">{{ design.note }}</dd>
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
export default {
    data() {
        return {
            valid: true,
            dialog: false,
            design: {},
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

        },
        create(data) {
            const self = this;
            self.design = data;
            self.dialog = true;
        },
        reset() {
            this.$refs.form.reset();
        },
        resetValidation() {
            this.$refs.form.resetValidation();
        },
    },
};
</script>
