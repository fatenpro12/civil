<template>
  <div :class="$vuetify.breakpoint.xsOnly?'pt-2':''">
     <v-tabs
      v-model="tab"
      background-color="transparent"
      color="basil"
      :class="$vuetify.breakpoint.xsOnly?'':'mx-5'"
      grow
    >
      <v-tab
      >
       <h3> {{trans('data.reports')}}</h3>
      </v-tab>
       <v-tab
      >
         <h3> {{trans('data.all_report_types')}}</h3>
      </v-tab>
    </v-tabs>
     <v-tabs-items v-model="tab">
      <v-tab-item
      >
  <div flat :class="$vuetify.breakpoint.xsOnly?'mx-auto':'px-5 mx-5'"  class="elevation-2 pt-1 pb-3 my-2 report" style="min-width:70%;flex:4">
  <Report  />
  <v-btn class="mx-auto" style="color: #06706d" @click="$router.go(-1)">
                        {{ trans('messages.back') }}
                    </v-btn>
  </div>
  </v-tab-item>
      <v-tab-item>
  <div flat class="elevation-2 pt-1 pb-3 my-2" :class="$vuetify.breakpoint.xsOnly?'mx-auto':'px-5 mx-5'"  style="min-width:70%;flex:4">
   <ReportTypes  />
   <v-btn class="mx-auto" style="color: #06706d" @click="$router.go(-1)">
                        {{ trans('messages.back') }}
                    </v-btn>
  </div>

  </v-tab-item>
     
  </v-tabs-items>
  </div>
</template>

<script>
import ReportTypes from '../report_types/List.vue'
import Report from '../reports/List.vue'
export default {
 components:{
  Report,
     ReportTypes
    },
    data: () => ({
      tab: null,
    }),
}
</script>

<style scoped>
.report{
    display: flex;
    flex-direction: column;
}
</style>