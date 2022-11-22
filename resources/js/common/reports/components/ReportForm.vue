<template>
  <div>
<v-container grid-list-md  id="printMe">
<div class="mt-5"  style="border-end: 1px solid gray;border-start: 1px solid gray;border-top: 1px solid gray">
  <div class="flex justify-space-between header">
    <div v-if="$hasRole('Engineer')" class="title-report">{{ reportData.office?reportData.office.parent_title:'' }}</div>
    <div v-if="$hasRole('Engineer')" class="logo"><img style="max-width:150px;max-height:110px" :src="reportData.office?reportData.office.parent_logo:''" /></div>
    <div v-if="!$hasRole('Engineer')" class="title-report">{{ reportData.office?reportData.office.title:'' }}</div>
    <div v-if="!$hasRole('Engineer')" class="logo"><img style="max-width:150px;max-height:110px" :src="reportData.office?reportData.office.logo:''" /></div>
  </div>
  <div class="type_data">
    <div class="type_name">{{ language == 'ar'?reportData.type.type_name_ar:reportData.type.type_name_en }}</div>
    <div class="type_num">{{ reportData.type.id }}</div>
  </div>
 <v-layout row wrap class="px-1">
      <v-flex xs12 sm12 md12 class="height-detect">
        <div class="label mx-2">{{trans('data.owner')}} : {{ reportData.owner }}</div>
      
    </v-flex>
       <v-flex xs12 sm12 md12 class="height-detect">
        <div class="label mx-2">{{trans('data.contractor')}} :
          <span v-for="contractor in reportData.contractors" :key="contractor.id">
                        {{ contractor.name }} 
           </span>
           </div>

      
    </v-flex>
     <v-flex xs12 sm4 md4 class="height-detect">
        <div class="label mx-2" v-if="reportData.project">{{trans('messages.project')}} : {{ reportData.project.name }}</div>

    </v-flex>
      <v-flex xs12 sm4 md4 class="merge_rows justify-center height-detect" style="border-end: 1px solid gray;border-start: 1px solid gray;">
        <div class="label mx-2">{{trans('data.work_to_check')}} :</div>
    </v-flex>
      <v-flex xs12 sm4 md4 class="merge_rows justify-center height-detect">
        <div class="label mx-2">{{trans('data.delivery_request_num')}} :</div>
    </v-flex>
       <v-flex xs12 sm4 md4 class="height-detect">
        <div class="label mx-2">{{trans('data.day')}} : {{reportData.day}}</div>
    
    </v-flex>
     <v-flex xs12 sm4 md4 class="height-detect merge_rows justify-center" style="border-end: 1px solid gray;border-start: 1px solid gray;">
   {{ language == 'ar'?reportData.type.type_name_ar:reportData.type.type_name_en }}
    </v-flex>
     <v-flex xs12 sm4 md4 class="merge_rows justify-center height-detect">
         ({{ reportData.id }})
    </v-flex>
    <v-flex xs12 sm4 md4 class="height-detect">
        <div class="label mx-2">{{trans('data.date')}} : {{reportData.create_time}}</div>
    </v-flex>
    <v-flex xs12 sm4 md4 class="height-detect" style="border-end: 1px solid gray;border-start: 1px solid gray;"></v-flex>
    <v-flex xs12 sm4 md4 ></v-flex>
     <v-flex xs12 sm8 md8 class="height-detect" style="border-end: 1px solid gray; border-bottom:none">
        <div class="label mx-2 d-flex">{{trans('data.contractor_actor')}} :  <v-text-field v-model="reportData.contractor_actor" class="text-input" :rules="rulesText1" style="max-height: 2.5rem;"></v-text-field> </div>
    </v-flex>
    <v-flex xs12 sm4 md4 class="height-detect" style="border-bottom:none">
        <div class="label d-flex">{{trans('data.signature')}} : <v-text-field  class="text-input" v-model="reportData.signature" :rules="rulesText1" style="max-height: 2.5rem;"></v-text-field> </div>
    </v-flex>
  </v-layout>

<table>

    <tr>
      <th width="5%" style="border-end:1px solid gray;" class="py-2">{{trans('data.serial')}}</th>
      <th width="40%" style="border-end:0.5px solid gray;" class="py-2">{{trans('data.list review')}}</th>
      <th width="14%" style="border-end:1px solid gray;" class="py-2">{{trans('data.equal')}}</th>
      <th width="40%" class="last-col">{{trans('data.notes')}}</th>
    </tr>
  
<tr  v-if="language == 'ar'" row wrap v-for="(type_list, index) in reportData.type.type_list_ar" :key="index+'x'">
   <td style="border-end:1px solid gray; " class="py-2"> {{ index+1 }}</td>
    <td style="border-end:0.5px solid gray; " class="py-2"> {{ type_list }}</td>
    <td style="border-end:1px solid gray;" class="py-2"> 
                    <v-switch
              color="success"
              class="my-auto mx-2"
              hide-details
               v-model="reportData.equal[index]"
            ></v-switch>
      </td>
   <td :rowspan="reportData.type.type_list_ar.length" >  
        <v-textarea v-if="index==0" @keypress="textAreaWrite" clearable v-model="reportData.notes" no-resize :rows="reportData.type.type_list_ar.length" cols="8" class="mx-1"></v-textarea>
      </td>
  </tr>
<tr  v-if="language == 'en'" row wrap v-for="(type_list, index) in reportData.type.type_list_en" :key="index+'x'">
   <td style="border-end:1px solid gray; " class="py-2"> {{ index+1 }}</td>
    <td style="border-end:0.5px solid gray; " class="py-2"> {{ type_list }}</td>
    <td style="border-end:1px solid gray;" class="py-2"> 
                    <v-switch
              color="success"
              class="my-auto mx-2"
               v-model="reportData.equal[index]"
              hide-details
            ></v-switch>
      </td>
   <td :rowspan="reportData.type.type_list_ar.length">  
        <v-textarea  v-model="reportData.notes" @keypress="textAreaWrite" clearable no-resize  v-if="index==0" :rows="reportData.type.type_list_ar.length" cols="8" class="mx-1"></v-textarea>
      </td>
  </tr>
</table>
     
    
     <v-layout row wrap class="px-1">
      <div style="border-end:1px solid gray;border-bottom:1px solid gray;width:50%">
        <div class="px-2 py-1" style="border-bottom:1px solid gray;background:#ededed">
        {{trans('data.Rating scores')}}:
        </div>
         <v-radio-group
              v-model="reportData.rating"
              column
              required
            >
        <div class="px-2 footer-item">
          1 {{trans('data.Acceptable')}} (
                    <v-radio
                color="primary"
                value="Acceptable"
              ></v-radio>
          )
        </div>
            <div class="px-2 footer-item">
          2 {{trans('data.Accepted comments')}} (
             <v-radio
                color="primary"
                value="withComments"
              ></v-radio>
          )
        </div>
            <div class="px-2 footer-item">
          3 {{trans('data.unacceptable')}} (
                 <v-radio
                color="primary"
                value="unacceptable"
              ></v-radio>
         )
        </div>
        </v-radio-group>
        </div>
               
      <div class="px-2" style="border-bottom:1px solid gray;width:50%">
        <div class="footer-item mt-2">{{trans('data.Supervising engineer')}}:
        {{ reportData.office?reportData.office.name:'' }}
        </div>
         <div class="footer-item mt-2">{{trans('data.signature')}}:
          <img class="signature" :src="reportData.office?reportData.office.signature:''" >
         </div>
        </div>
     </v-layout>
</div>
                </v-container>
                <slot name="dropzone"></slot>
        <v-btn
                style="background-color: #06706d; color: white"
                color="darken-1"
                class="mt-3"
                @click="printReport"
                :loading="loading"
                :disabled="loading"
            >
                {{ trans('data.save') }}
            </v-btn>
</div>
	
</template>

<script>
export default {

  props:{
    reportType: null,
    project: null,
    office: null,
    report: null,
    report_id: null,
     language: null,
  },
data(){
  return {
    reportData: {equal:[],rating:'Acceptable'},
     loading: false,
    
     options:[this.trans('data.yes'),this.trans('data.no')],
      rulesText1: [
           v => v && v.length <= 12 || 'Max 12 characters',
      ],
        rulesText2: [
           v => v && v.length <= 5 || 'Max 5 characters',
      ],
      rulesNumber:[
        v => v && v.length <= 5 || 'Max 5 characters',
        v => Number.isInteger(Number(v)) || 'The value must be an integer number',
      ],
  }
},
 computed: {
    lineCount: function() {
      // Return number of lines using regex if not empty
      return this.reportData?.notes?.length ? this.reportData?.notes?.split(/\r\n|\r|\n/).length : 0;
    }
  },
created(){
  const self = this;
  self.currentDateTime();
  self.getReportData();
},
watch:{
  reportType(){
    this.getReportData();
    this.reportData.type = this.reportType
  },
   office(){
    this.getReportData();
    this.reportData.office = this.office
  },
    project(){
this.getReportData();
 this.reportData.contractors = this.project?.members?.filter(val => val.user_type_log === 'CONTRACTING_COMPANY')
  }
},
methods:{
  textAreaWrite(event){
   if(event.which === 13)
    this.lineCount == this.reportData.type.type_list_ar.length?event.preventDefault():''
    else{
    this.lineCount > this.reportData.type.type_list_ar.length?event.preventDefault():''
    this.reportData?.notes?.length == this.reportData.type.type_list_ar.length * 25 ? event.preventDefault():''
    }
  },
  printReport(){
    this.$emit('printPdf', this.reportData)
  },
      getReportData() {
         const self = this;
         if(self.getCurrentUser().user_type_log === 'ENGINEERING_OFFICE_MANAGER')
            self.reportData.office = self.getCurrentUser()
            else
            self.reportData.office = self.office
                        self.reportData.type = self.reportType
                      self.reportData.id = self.report_id
                     self.reportData.owner= self.project?.customer?.name
                     self.reportData.project= self.project
                     self.reportData.contractors = self.project?.members?.filter(val => val.user_type_log === 'CONTRACTING_COMPANY')
                    this.$emit('getReportData', this.reportData)
                    self.$forceUpdate(); 
        },
   
    currentDateTime() {
            const current = new Date();
            const date =
                current.getFullYear() + '/' + (current.getMonth() + 1) + '/' + current.getDate();
            const time =
                current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
            const dateTime = date //+ ' ' + time;
            this.reportData.create_time = dateTime;
            var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
this.reportData.day = days[current.getDay()];
this.$forceUpdate();
        },
}
}
</script>

<style scoped>
.sm1, .md1,.sm6,.md6,.sm2 ,.md2{
  justify-content: center;
}
.v-textarea >>> textarea{
  overflow: hidden!important;
  resize: none;
}
.logo{
  text-align: end;
}
.title-report {
  padding: 20px;
  text-align: start;
}
.header{
  border-bottom: 1px solid gray;
      align-items: center;
}
.list-items{
  text-align: center;
}
.type_data{
      display: flex;
   justify-content: center;
    border-bottom: 1px solid gray;
    background: #ededed;
    padding: 10px;
}
.type_name{
  width: 100%;
    text-align: center;
}
.footer-item{
      display: flex;
    max-height: 2.5rem;
    align-items: center;
}
.flex{
  display: flex;
  border-bottom: 1px solid gray;
}

table, th, td {
  text-align: center;
  border-top: 0.5px solid gray;
  border-bottom: 0.5px solid gray;
  border-collapse: collapse;
  min-width: 100%;
}
.height-detect{
  height: 2rem;
}
.merge_rows{
  border-bottom:none!important;
}
.label{
  max-width: fit-content;
  white-space: nowrap;
}
.signature{
  max-width: 250px;
    max-height: 100px;
    margin-top: 4rem;
}
.text-input{
  margin:-0.6rem 15px 0 15px;
  padding: 0;
}
  .v-text-field >>> input {
      text-align: center!important;
    }
 /*  .v-select >>> .v-input__icon {
     display: none!important; 
    }*/
</style>