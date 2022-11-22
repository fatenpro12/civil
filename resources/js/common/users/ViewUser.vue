<template>
<div>
    
<ProfileMobile v-if="$vuetify.breakpoint.xsOnly" :data="data"/>
 <div v-else class="z-10 inset-0 mx-auto w-3/4">
    <div  class="flex items-stretch md:items-center justify-center min-h-full text-center md:px-2 lg:px-4">
      <div class="flex text-base text-left transform transition w-full md:max-w-2xl md:px-4 md:my-8 lg:max-w-4xl">
        <div class="w-full relative flex items-center bg-white px-4 pt-14 pb-8 overflow-hidden shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">

          <div class="w-full grid grid-cols-1 gap-y-8 gap-x-6 items-start sm:grid-cols-12 lg:gap-x-8">
             <HeaderData :data="data" />
            <div class="sm:col-span-8 lg:col-span-7">
              <section aria-labelledby="information-heading" class="mt-2 mx-auto">
                  <v-tabs
      color="accent-4"
    >
      <v-tab active-class>{{trans('messages.personal_data')}}</v-tab>
      <v-tab>{{ trans('messages.communication_details') }}</v-tab>
      <v-tab>{{ trans('data.bank_details') }}</v-tab>
      <v-tab>{{trans('data.document_info')}}</v-tab>
      
      <v-tab-item
      >
     <PersonalData :data="data" />
      </v-tab-item>
         <v-tab-item>
<CommunicationData :data="data" />
</v-tab-item>
   <v-tab-item>
<BankData :data="data" />
</v-tab-item>
      <v-tab-item>
<PersonDocuments :data="data" />
</v-tab-item>
    </v-tabs>
                                                   
              </section>
   <slot name="actions">
              <section aria-labelledby="options-heading" class="mt-2 mx-auto">
              
                  <div class="flex">
                      <button  
                   @click="$router.go(-1)"
                   class="mt-6 w-full bg-gray-600 border border-transparent rounded-md py-2 px-8 mx-2 flex items-center justify-center text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                   >{{ trans('messages.back') }}
                    </button>
                    </div>
              </section>
              </slot>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</template>
<script>
import ProfileMobile from  '../profile/components/ProfileMobile.vue'
import MobileHeader from '../MobileHeader'
import PersonalData from '../profile/components/PersonalData'
import PersonDocuments from '../profile/components/PersonDocuments'
import HeaderData from '../profile/components/HeaderData'
import CommunicationData from '../profile/components/CommunicationData'
import BankData from '../profile/components/BankData'

export default {
    components:{
ProfileMobile,
CommunicationData,
BankData,
MobileHeader,
PersonalData,
PersonDocuments,
HeaderData
    },
    data() {
        return {
            profileImg: [],
            user_id: null,
            data: [],
        };
    },
      created() {
        const self = this;
        self.user_id = self.$route.params.id;
        self.getEmployee(self.user_id);
    },
};
</script>
