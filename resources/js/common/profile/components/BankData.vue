<template>
       <v-container fluid>
          <table class="border-collapse table-auto w-full text-sm text-center">
  <tbody class="bg-white dark:bg-slate-800">
        <tr>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ trans('data.bank_name') }}:</td>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ data.bank_name }}</td>
    </tr>
      <tr>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ trans('data.account_no') }}:</td>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ data.account_no }}</td>
    </tr>

  
              <tr>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ trans('data.tax_payer_id') }}:</td>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ data.tax_payer_id }}</td>
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