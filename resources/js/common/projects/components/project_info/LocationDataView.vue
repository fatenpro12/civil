<template>
     <div :class="$vuetify.breakpoint.xsOnly?'w-full mt-2':'w-3/5 border-2 rounded-lg shadow-lg'" 
   class="p-4 mx-auto bg-white sm:p-6 dark:bg-gray-800 dark:border-gray-700" v-if="location">
   

        <h5 class="mb-3 flex text-base font-semibold text-slate-600 md:text-xl dark:text-white">
            {{ trans('data.location_info') }}
        </h5>
        <p class="text-sm font-normal text-gray-500 dark:text-gray-400"></p>
        <ul :class="$vuetify.breakpoint.xsOnly?'my-1 p-0':'my-4'" class="space-y-3">

            <li>
                <a href="#" class="flex items-center p-3 text-base font-bold text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
  <div class="flex flex-wrap justify-between w-full">
<span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.province_municipality')}} :  {{trans('data.'+location.province_municipality)}}</span>
                    <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.municipality')}}: {{location.municipalitey?location.municipalitey.name:''}}</span>
  </div>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-3 text-base font-bold text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
 <div class="flex flex-wrap justify-between w-full">
                    <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.category')}}: {{location.category}} </span>
                     <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.neighborhood')}}: {{location.neighborhood}}</span>
    </div>            </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-3 text-base font-bold text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
   <div class="flex flex-wrap justify-between w-full">
<span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.district')}}: {{location.district}}</span>
                      <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.plan_id')}}: {{location.plan_id}}</span>
            </div>    </a>
            </li>
             <li>
                <a href="#" class="flex items-center p-3 text-base font-bold text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
  <div class="flex flex-wrap justify-between w-full">
   <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.piece_number')}}: {{location.piece_number}}</span>
                     <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.size_number')}}: {{location.size_number}}</span>
         </div>       </a>
            </li>
                <li>
                <a href="#" class="flex items-center p-3 text-base font-bold text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
   <div class="flex flex-wrap justify-between w-full">
 <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.northern_border')}}: {{location.northern_border}}</span>
 <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.eastern_border')}}: {{location.eastern_border}}</span>
        </div>        </a>
            </li>
         
                <li>
                <a href="#" class="flex items-center p-3 text-base font-bold text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
      <div class="flex flex-wrap justify-between w-full">
 <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.western_border')}}: {{location.western_border}}</span>
 <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.southern_border')}}: {{location.southern_border}}</span>
         </div>         
                </a>
            </li>
        
              <li>
                <a href="#" class="flex items-center p-3 text-base font-bold text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
   <div class="flex flex-wrap justify-between w-full">
 <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.location_status')}}: {{location.status}}</span>
 <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.instrument_date')}}: {{location.instrument_date}}</span>
          </div>         
                </a>
            </li>
                  <li>
                <a href="#" class="flex items-center p-3 text-base font-bold text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
  
 <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.instrument_number')}}: {{location.instrument_number}}</span>
                   
                </a>
            </li>
        </ul>
      
    </div>
</template>

<script>
export default {
props:{
    location:{
        type: Object,
        default: null
    }
}
}
</script>

<style>

</style>