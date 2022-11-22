<template>
       <v-container fluid>
          <table class="border-collapse table-auto w-full text-sm text-center">
  <tbody class="bg-white dark:bg-slate-800">
      <tr>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ trans('messages.mobile') }}:</td>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ data.mobile }}</td>
    </tr>
      <tr>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ trans('messages.alternate_num') }}:</td>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ data.alternate_num }}</td>
    </tr>
      <!--<tr>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ trans('messages.skype') }}:</td>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ data.skype }}</td>
    </tr>
      <tr>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ trans('messages.linkedin') }}:</td>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ data.linkedin }}</td>
    </tr>
          <tr>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ trans('messages.facebook') }}:</td>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ data.facebook }}</td>
    </tr>
              <tr>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ trans('messages.twitter') }}:</td>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ data.twitter }}</td>
    </tr>-->
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