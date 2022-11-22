=<template>
     <v-container fluid>
          <table class="border-collapse table-auto w-full text-sm text-center">
  <tbody class="bg-white dark:bg-slate-800">

    <tr>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ trans('messages.date_of_birth') }}:</td>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ data.birth_date | formatDate }}</td>
    </tr>
         <tr>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ trans('data.province_municipality') }}:</td>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ trans('data['+data.location_data+']') }}</td>
    </tr>
      <tr>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ trans('messages.current_address') }}:</td>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ data.current_address }}</td>
    </tr>
    <tr>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ trans('messages.gender') }}:</td>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ trans('messages.' + data.gender) }}</td>
      </tr>
    
      <tr>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ trans('data.speciality') }}:</td>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ data.specialty != null ?  data.specialty.name : ''  }}</td>
    </tr>
     <tr>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ trans('data.note') }}:</td>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ data.note }}</td>
    </tr>
  </tbody>
</table>
        </v-container>
</template>

<script>
export default {
props:{
    data: null
}
}
</script>
<style scoped>
td{
  text-align: justify;
}
</style>