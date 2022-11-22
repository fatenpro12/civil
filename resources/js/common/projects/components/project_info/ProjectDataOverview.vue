<template>
   <div :class="$vuetify.breakpoint.xsOnly?'w-full mt-2':'w-3/5 border-2 rounded-lg shadow-lg'" 
   class="p-4 mx-auto bg-white sm:p-6 dark:bg-gray-800 dark:border-gray-700" v-if="projectData">
        <h5 class="mb-3 text-base font-semibold text-slate-600 md:text-xl dark:text-white">
            {{ trans('data.review_project_data') }} : {{ projectData.name }}
        </h5>
        <p class="text-sm font-normal text-gray-500 dark:text-gray-400" v-html="projectData.description"></p>
        <ul :class="$vuetify.breakpoint.xsOnly?'my-1 p-0':'my-4'" class=" space-y-3">
            <li>
                <a href="#" class="flex items-center p-3 text-base font-bold text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                    
                    <span class="flex-1 ml-3 whitespace-nowrap">{{trans('messages.status')}}:  <v-chip
                                                            class="ma-2"
                                                            :color="getColor(projectData.status)"
                                                            text-color="white"
                                                        >
                                                            {{
                                                                trans(
                                                                    'messages.' + projectData.status
                                                                )
                                                            }}
                                                        </v-chip></span>
                     <v-progress-linear
                                                        striped
                                                        :value="getprogress(projectData.status)"
                                                    ></v-progress-linear>
                </a>
            </li>
            <li>
                <a href="#" :class="$vuetify.breakpoint.xsOnly?'py-2':'p-3'" class="flex items-center text-base font-bold text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="#3259A5" class="w-6" :class="$vuetify.breakpoint.xsOnly?'mx-2':''">
  <path strokeLinecap="round" strokeLinejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
</svg>
<div class="flex flex-wrap justify-between w-full">
                    <span class="flex-1 ml-3 whitespace-nowrap">{{trans('messages.start_date')}}: {{projectData.start_date}}</span>
                    <span class="flex-1 ml-3 whitespace-nowrap">{{ trans('messages.end_date') }}: {{projectData.end_date}}</span>
              </div>
                </a>
            </li>
            <li>
                <a href="#" :class="$vuetify.breakpoint.xsOnly?'py-2':'p-3'" class="flex items-center  text-base font-bold text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#5D9DF6" class="w-7 h-5" :class="$vuetify.breakpoint.xsOnly?'mx-2':''">
  <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
</svg>
   <div class="bg-gray-50 px-1 w-full py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-md font-medium text-gray-500">{{trans('messages.members')}}</dt>
        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
          <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-md" v-for="member in projectData.members" :key="member.id">
              <div class="flex w-0 flex-1 items-center">
                <!-- Heroicon name: mini/paper-clip -->
                <span class="ml-2 w-0 flex-1 truncate"> {{member.name}}</span>
                
              </div>
            </li>
          </ul>
        </dd>
      </div>
                 
</a>
            </li>
            <li>
                <a href="#" :class="$vuetify.breakpoint.xsOnly?'py-2':'p-3'" class="flex items-center text-base font-bold text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#617BFF" class="w-6 h-5" :class="$vuetify.breakpoint.xsOnly?'mx-2':''">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
</svg>

                  <div class="flex flex-wrap justify-between w-full">
                    <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.authorization_request_number')}}: {{projectData.authorization_request_number}}</span>
                 <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.license_number')}}: {{projectData.license_number}}</span>
               </div>
                </a>
            </li>
             <li>
                <a href="#" :class="$vuetify.breakpoint.xsOnly?'py-2':'p-3'" class="flex items-center text-base font-bold text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#617BFF" class="w-6 h-5" :class="$vuetify.breakpoint.xsOnly?'mx-2':''">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
</svg>
<div class="flex flex-wrap justify-between w-full">
                    <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.plot_number')}}: {{projectData.plot_number}}</span>
               <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.cadastral_decision_number')}}: {{projectData.cadastral_decision_number}}</span>
              </div>  </a>
            </li>
                <li>
                <a href="#" :class="$vuetify.breakpoint.xsOnly?'py-2':'p-3'" class="flex items-center text-base font-bold text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#617BFF" class="w-6 h-5" :class="$vuetify.breakpoint.xsOnly?'mx-2':''">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
</svg>
<div class="flex flex-wrap justify-between w-full">
                    <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.buiding_type')}}: {{ projectData.buildingTypes.find(val => val.key == projectData.buiding_type)?projectData.buildingTypes.find(val => val.key == projectData.buiding_type).value:'' }}</span>
                <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.unit_number')}}: {{projectData.unit_number}}</span>
               </div> </a>
            </li>
         
                <li>
                <a href="#" :class="$vuetify.breakpoint.xsOnly?'py-2':'p-3'" class="flex items-center text-base font-bold text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#617BFF" class="w-6 h-5" :class="$vuetify.breakpoint.xsOnly?'mx-2':''">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
</svg>
<div class="flex flex-wrap justify-between w-full">
                    <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.build_rate')}}: {{projectData.build_rate}}</span>
               <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.project_type')}}: {{ projectData.projectTypes.find(val => val.key == projectData.project_type)?projectData.projectTypes.find(val => val.key == projectData.project_type).value:''}}</span>
             </div>   </a>
            </li>
        
              <li>
                <a href="#" :class="$vuetify.breakpoint.xsOnly?'py-2':'p-3'" class="flex items-center text-base font-bold text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#617BFF" class="w-6 h-5" :class="$vuetify.breakpoint.xsOnly?'mx-2':''">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
</svg>
<div class="flex flex-wrap justify-between w-full">
                    <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.role_number')}}: {{projectData.role_number}}</span>
                 <span class="flex-1 ml-3 whitespace-nowrap">{{trans('data.using')}}: {{projectData.buildUsing.find(val => val.key == projectData.using)?projectData.buildUsing.find(val => val.key == projectData.using).value:''}}</span>
</div>  </a>
            </li>
           
        </ul>
      
    </div>
</template>

<script>
export default {
props:{
    projectData:{
        type: Object,
        default: null
    }
}
}
</script>

<style>

</style>