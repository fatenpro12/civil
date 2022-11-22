<template>
    <div
    :class="$vuetify.breakpoint.xsOnly?'w-full mt-2':'w-3/5 border-2 rounded-lg shadow-lg'" 
   class="p-4 mx-auto bg-white sm:p-6 dark:bg-gray-800 dark:border-gray-700" v-if="ownerData">
        <ul  :class="$vuetify.breakpoint.xsOnly?'my-1':'my-4'" class="space-y-3">

            <li>
                <a href="#" class="flex items-center p-3 text-base font-bold text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#617BFF" class="w-6 h-6" >
  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
</svg>
<span class="flex-1 ml-3 whitespace-nowrap mx-1">{{trans('data.name')}} :  {{ownerData.name}}</span>
<v-chip class="flex-1 ml-3 mx-1 text-sm max-w-fit" style="max-width: fit-content;"
 v-if="ownerData.pivot"
:style="ownerData.pivot && ownerData.pivot.status === 'accepted'?'background:#368e0b;color:#fff':ownerData.pivot && ownerData.pivot.status === 'rejected'?'background:#8d0303;color:#fff':''"> {{ownerData.pivot.status}}</v-chip>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-3 text-base font-bold text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#617BFF" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
</svg>

                    <span class="flex-1 ml-3 mx-1 whitespace-nowrap">{{trans('data.id_card_number')}} : {{ownerData.id_card_number}} </span>
                   
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-3 text-base font-bold text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#617BFF" class="w-6 h-6" >
  <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
</svg>

<span class="flex-1 ml-3 whitespace-nowrap mx-1">{{trans('messages.email')}} : {{ownerData.email}}</span>
                </a>
            </li>
             <li>
                <a href="#" class="flex items-center p-3 text-base font-bold text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#617BFF" class="w-6 h-6" >
  <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
</svg>

   <span class="flex-1 ml-3 whitespace-nowrap mx-1">{{trans('data.mobile')}} : {{ownerData.mobile}}</span>
                </a>
            </li>
              
        </ul>
      
    </div>
</template>

<script>
export default {
props:{
    ownerData:{
        type: Object,
        default: null
    }
}
}
</script>

<style>

</style>