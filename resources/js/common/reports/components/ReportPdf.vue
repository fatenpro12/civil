<template>
  <v-container grid-list-md  id="printMe" ref="pdfHtml" style="min-width:1100px">
<div class="mt-2" v-if="reportData" style="border-end: 1px solid gray;border-start: 1px solid gray;border-top: 1px solid gray">
 <div class="flex justify-space-between header">
    <div v-if="$hasRole('Engineer')" class="title-report">{{ reportData.office?reportData.office.parent_title:'' }}</div>
    <div v-if="$hasRole('Engineer')" class="logo"><img style="max-width:150px;max-height:110px" :src="reportData.office?reportData.office.parent_logo:''" /></div>
    <div v-if="!$hasRole('Engineer')" class="title-report">{{ reportData.office?reportData.office.title:'' }}</div>
    <div v-if="!$hasRole('Engineer')" class="logo"><img style="max-width:150px;max-height:110px" :src="reportData.office?reportData.office.logo:''" /></div>
  </div>
  <div class="type_data" style="font-size:22px">
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
     <v-flex xs4 sm4 md4 class="height-detect">
        <div class="label mx-2" v-if="reportData.project">{{trans('messages.project')}} : {{ reportData.project.name }}</div>

    </v-flex>
      <v-flex xs4 sm4 md4 class="merge_rows justify-center height-detect" style="border-end: 1px solid gray;border-start: 1px solid gray;">
        <div class="label mx-2">{{trans('data.work_to_check')}} :</div>
    </v-flex>
      <v-flex xs4 sm4 md4 class="merge_rows justify-center height-detect">
        <div class="label mx-2">{{trans('data.delivery_request_num')}} :</div>
    </v-flex>
       <v-flex xs4 sm4 md4 class="height-detect">
        <div class="label mx-2">{{trans('data.day')}} : {{reportData.day}}</div>
    
    </v-flex>
     <v-flex xs4 sm4 md4 class="height-detect merge_rows justify-center" style="border-end: 1px solid gray;border-start: 1px solid gray;">
      {{ language == 'ar'?reportData.type.type_name_ar:reportData.type.type_name_en }}
    </v-flex>
     <v-flex xs4 sm4 md4 class="merge_rows justify-center height-detect">
          ({{ reportData.id }})
    </v-flex>
    <v-flex xs4 sm4 md4 class="height-detect">
        <div class="label mx-2">{{trans('data.date')}} : {{reportData.create_time}}</div>
    </v-flex>
    <v-flex xs4 sm4 md4 class="height-detect" style="border-end: 1px solid gray;border-start: 1px solid gray;"></v-flex>
    <v-flex xs4 sm4 md4 ></v-flex>
     <v-flex xs8 sm8 md8 class="height-detect" style="border-end: 1px solid gray; border-bottom:none">
        <div class="label mx-2 d-flex">{{trans('data.contractor_actor')}} : {{reportData.contractor_actor}} </div>
    </v-flex>
    <v-flex xs4 sm4 md4 class="height-detect" style="border-bottom:none">
        <div class="label d-flex">{{trans('data.signature')}} : {{reportData.signature}} </div>
    </v-flex>
  </v-layout>

<table>

    <tr>
      <th width="5%" style="border-end:1px solid gray;" class="py-3">{{trans('data.serial')}}</th>
      <th width="40%" style="border-end:0.5px solid gray;" class="py-3">{{trans('data.list review')}}</th>
      <th width="12%" style="border-end:1px solid gray;" class="py-3">{{trans('data.equal')}}</th>
      <th width="13%" style="border-end:1px solid gray;" class="py-3">{{trans('data.not equal')}}</th>
      <th width="40%" class="last-col">{{trans('data.notes')}}</th>
    </tr>
  
<tr  v-if="language == 'ar'" row wrap v-for="(type_list, index) in reportData.type.type_list_ar" :key="index+'x'">
   <td style="border-end:1px solid gray; " class="py-3"> {{ index+1 }}</td>
    <td style="border-end:0.5px solid gray; " class="py-3"> {{ type_list }}</td>
    <td style="border-end:1px solid gray;" class="py-3"> 
            <v-icon v-if="reportData.equal[index]">check</v-icon>
      </td>
    <td style="border-end:1px solid gray; " class="py-3"> 
           <v-icon v-if="!reportData.equal[index]">check</v-icon>
      </td>
     <td :rowspan="reportData.type.type_list_ar.length">  
        <span v-if="index==0">{{reportData.notes}}</span>
      </td>
  </tr>
<tr  v-if="language == 'en'" row wrap v-for="(type_list, index) in reportData.type.type_list_en" :key="index+'x'">
   <td style="border-end:1px solid gray; " class="py-3"> {{ index+1 }}</td>
    <td style="border-end:0.5px solid gray; " class="py-3"> {{ type_list }}</td>
    <td style="border-end:1px solid gray;" class="py-3"> 
          <v-icon v-if="reportData.equal[index]">check</v-icon>
      </td>
  <td style="border-end:1px solid gray; " class="py-3"> 
         <v-icon v-if="!reportData.equal[index]">check</v-icon>
      </td>
   <td :rowspan="reportData.type.type_list_ar.length">  
        <div v-if="index === 2"> {{reportData.notes}} </div>
      </td>
  </tr>
</table>
 
     <v-layout row wrap class="px-1" style="font-size:22px">
      <div style="border-end:1px solid gray;border-bottom:1px solid gray;width:50%">
        <div class="px-2 py-3" style="border-bottom:1px solid gray;background:#ededed">
        {{trans('data.Rating scores')}}:
        </div>
        <div class="px-2 footer-item mt-2">
          1 {{trans('data.Acceptable')}} (
                 <v-icon v-if="reportData.rating==='Acceptable'">check</v-icon>
          )
        </div>
            <div class="px-2 footer-item mt-2">
          2 {{trans('data.Accepted comments')}} (
          <v-icon v-if="reportData.rating==='withComments'">check</v-icon>
          )
        </div>
            <div class="px-2 footer-item mt-2 mb-2">
          3 {{trans('data.unacceptable')}} (
             <v-icon v-if="reportData.rating==='unacceptable'">check</v-icon>
         )
        </div>
        </div>
      <div class="px-2" style="border-bottom:1px solid gray;width:50%">
        <div class="footer-item mt-5">{{trans('data.Supervising engineer')}}:
            {{ reportData.office?reportData.office.name:'' }}
      </div>
         <div class="footer-item mt-2">{{trans('data.signature')}}:
          <img class="signature"  :src="reportData.office?reportData.office.signature:''" >
         </div>
        </div>
     </v-layout>
</div>
 </v-container>
</template>

<script>
import jsPDF from 'jspdf';
import html2canvas from "html2canvas"

export default {
      components:{
jsPDF
  },
  props:{
    reportData: null,
    language: null,
    visit_request_id:null,
    stage: null,
    medias:[]
  },
  data(){
     return{
        pdfBlob: null,
     }
  },
  methods:{
        renderComponent(){
 if(this.reportData){
          this.$forceUpdate()
 }
        },
        printPdf() {
    //  const doc = new jsPDF("p", "pt", "a4", true, { compress: true });
      const Html = this.$refs.pdfHtml;
      
          const pdf = new jsPDF("", "", "a4", true, { compress: true });
          
      html2canvas(Html,{
        scale: 0.66,
        height: 3000
      })
      .then((canvas) => {
        if(this.reportData){
          this.$forceUpdate()
        const imgData = canvas.toDataURL('image/png');
        pdf.addImage(imgData, 'PNG',2,2)
        this.pdfBlob = pdf.output('blob');//205,285 mm
        this.store()
     //   window.open(pdf.output("bloburl"), "_blank")
        }
  });
    },
            store() {
            const self = this;
            let formData = new FormData();
            formData.append('pdfFile', self.pdfBlob);
            formData.append('project_id', self.reportData.project.id);
            formData.append('office_id', self.reportData.office?.id);
            formData.append('type', self.reportData.type.id);
            formData.append('visit_request_id',self.visit_request_id);
            formData.append('stage_id',self.stage.id);
            formData.append('report_status',self.reportData.rating);
            formData.append('medias',self.medias);
            self.$validator.validateAll().then((result) => {
                if (result == true) {
                    self.loading = true;
                    axios
                        .post('/reports', formData)
                        .then(function (response) {
                            self.loading = false;
                            
                            self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });
                            if (response.data.success === true) {
                              self.goBack();
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }
            });
           
        },
  }
}
</script>

<style scoped>
.sm1, .md1,.sm6,.md6,.sm2 ,.md2{
  justify-content: center;
}
.logo{
  text-align: end;
}
.title-report {
  padding: 20px;
  text-align: start;
  font-size:28px;
}
.header{
  border-bottom: 1px solid gray;
      align-items: center;
      padding-top:10px;
      padding-bottom: 10px;
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
    max-height: 5rem;
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
  font-size:20px;
}
.signature{
  max-width: 250px;
    max-height: 100px;
    margin-top: 4rem;
}
.height-detect{
  height: 4rem;
  font-size: 20px;
}
.merge_rows{
  border-bottom:none!important;
}
.label{
  max-width: fit-content;
  white-space: nowrap;
}
.text-input{
  margin:-0.6rem 15px 0 15px;
  padding: 0;
}
  .v-text-field >>> input {
      text-align: center!important;
    }
</style>