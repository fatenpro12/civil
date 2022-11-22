<template>
  <div
    class="flex flex-col items-center"
    :class="mobile?'':'elevation-1 mx-auto my-2'"
  >
    <div class="header">
     
      <div class="header-bar mx-auto ">
        <div  class="text-center w-full text-white pa-0 col-9 text-2xl">
      {{trans('data.basic_information')}}
      </div>
      </div>
      <img v-if="getCurrentUser().avatar_url"
        class="profile-img mx-auto"
        src="svg/profile.svg"
      />
      <div class="profile-img text-center pt-12 text-4xl text-white bg-slate-300 mx-auto">{{getCurrentUser().name[0]}}</div>
    </div>
    <div class="shadow-md rounded-2xl bg-white pa-3" style="margin-top: 5rem; width: 90%;">
    <span class="personal-title">{{trans('messages.personal_data')}}</span>
    <v-container class="person-data">
        <div class="my-2 flex justify-between whitespace-nowrap border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
<div>{{trans('data.name')}}</div>    
     <div> {{data.name}}</div>
        </div>
        <div class="my-2 flex justify-between whitespace-nowrap border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
        <div>  {{trans('data.email_address')}}</div>
        <div>{{data.email}}</div>
        </div>
        <div class="my-2 flex justify-between whitespace-nowrap border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
       <div> {{trans('data.id_card_number')}}</div>
       <div>{{data.id_card_number}}</div>
        </div>
        <div class="my-2 flex justify-between whitespace-nowrap border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
        <div>  {{trans('data.mobile')}}</div>
       <div>{{data.mobile}}</div>
        </div>
         <div class="my-2 flex justify-between whitespace-nowrap border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
       <div>   {{trans('messages.date_of_birth')}}</div>
       <div>{{ data.birth_date | formatDate }}</div>
        </div>
        <div class="my-2 flex justify-between whitespace-nowrap border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
        <div>  {{trans('messages.gender')}}</div>
       <div>{{data.gender}}</div>
        </div>
           
             <div class="my-2 flex justify-between whitespace-nowrap border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
         <div> {{trans('messages.speciality')}}</div>
       <div>{{ data.specialty != null ?  data.specialty.name : ''  }}</div>
        </div>
        <div class="container mx-auto space-y-2 lg:space-y-0 lg:gap-2 lg:grid lg:grid-cols-2">
    <div v-if="data.signature" class="w-full rounded hover:shadow-2xl">
        <img :src="data.signature"
            alt="image">
    </div>
    <div v-if="data.logo" class="w-full rounded hover:opacity-50">
        <img :src="data.logo"
            alt="image">
    </div>
</div>
   
     <div class="flex">
                  <button  v-if="true"
                   @click="$router.push({ name: 'profile.edit', params: { id: data.id } })"
                   class="mt-6 w-full bg-indigo-600 border border-transparent rounded-md py-2 px-8 mx-2 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                   >
                     {{ trans('messages.edit') }}</button>
                      <button  
                   @click="$router.go(-1)"
                   class="mt-6 w-full bg-gray-600 border border-transparent rounded-md py-2 px-8 mx-2 flex items-center justify-center text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                   >{{ trans('messages.back') }}
                    </button>
                    </div>
    </v-container>
  </div>
 
  </div>
</template>

<script>
export default {

  props:{
  data:null
  },
  data () {
    return {
      validate: false,
      mobile: this.$vuetify.breakpoint.xsOnly,
    }
  },
  created () {
    this.validate = this.$route.query.validate
    console.log(this.$vuetify.breakpoint)
  },
}
</script>

<style lang="scss" scoped>

span{
  color: white;
}
  .header{
    width:100%;
    height:9rem;

        background: linear-gradient(45deg, #119f9b, #06706d);
    @apply from-slate-300;
  }
   .header:before {
    content: "";
    background: url('~/svg/header-shadow.svg');
    width: 402px;
    height:402px;
    opacity: 0.1;
   }
  .profile-img{
    position:absolute;
    width: 130px;
    height: 130px;
    border-radius: 50%;
    border: 4px solid #37D39B;
    right: calc(50% - 65px)
  }
  .header-bar{
    color: var(--v-anchor-base);
    margin-top: 25px;
  }
 .personal-title{
   color: var(--v-cpSecondary-base);
   opacity: 0.6;
   margin-top: 70px;
  width: 80%;
  font-weight: bold;
 }
 .person-data{
   width:87%;
 }
 .btns {
  width: 80%;
  justify-content: right;
  border-radius: 20px;
}

</style>
