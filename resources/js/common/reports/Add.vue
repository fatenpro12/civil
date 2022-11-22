<template id="panel-template">

    <v-container justify-center :class="$vuetify.breakpoint.xsOnly?'pt-5':''">
        <v-form>
        <v-card-actions justify-left class="flex-wrap">
            <v-btn style="color: #06706d" @click="$router.go(-1)">
                {{ trans('messages.back') }}
            </v-btn>
             <v-btn style="color: #06706d" @click="externalDialog = true">
                {{ trans('data.reportTypeAdd') }}
            </v-btn>
              <v-autocomplete
                                id="input_report_type"
                                class="mx-2"
                                item-text="value"
                                item-value="id"
                                :items="stages"
                                v-model="stage"
                                :label="trans('data.stage')"
                                v-validate="'required'"
                                 data-vv-name="stage"
                                :data-vv-as="trans('data.required')"
                                :error-messages="errors.collect('stage')"
                                return-object
                                required
                            ></v-autocomplete>
                            <v-autocomplete
                                id="input_report_type"
                                v-if="stage && stage.id==1"
                                class="mx-2"
                                item-text="type_name"
                                :items="report_types"
                                v-model="report_type"
                                :label="trans('data.report_type')"                                
                                v-validate="'required'"
                                 data-vv-name="report_type"
                                :data-vv-as="trans('data.required')"
                                :error-messages="errors.collect('report_type')"
                                return-object
                                required
                            ></v-autocomplete>
                                     <v-autocomplete
                                id="input_office"
                                v-if="$hasRole('superadmin') && report_type && stage.id==1"
                                class="mx-2"
                                item-text="name"
                                :items="offices"
                                v-model="office"
                                @change="getProjectsOffice"
                                :label="trans('data.enginnering_office_name')"
                                v-validate="'required'"
                                data-vv-name="office"
                                :data-vv-as="trans('data.required')"
                                :error-messages="errors.collect('office')"
                                return-object
                                required
                            ></v-autocomplete>
                              <v-autocomplete
                                id="input_project"
                                class="mx-2"
                                item-text="name"
                                v-if="($hasRole('superadmin') && office || report_type) && !$route.params.id && stage.id==1"
                                :items="projects"
                                v-model="project"
                                :label="trans('data.projects')"
                                v-validate="'required'"
                                data-vv-name="project"
                                :data-vv-as="trans('data.required')"
                                :error-messages="errors.collect('project')"
                                return-object
                                required
                            ></v-autocomplete>
                                 
        </v-card-actions>
        <v-spacer></v-spacer>
        <v-card class="mx-auto" :class="$vuetify.breakpoint.xsOnly?'max-w-full':'report'">
            
                    <ReportForm  :reportType="report_type" :office="office" :project="project"  :language="language" :report_id="report_id" @getReportData="getReportData" @printPdf="printPdf">
                       <template #dropzone>
                          <v-flex xs12 md12>
                                            <!--<div class="dropzone" id="fileupload"></div>-->
                                            <vue-dropzone @vdropzone-success="vsuccessMuliple" class="w-full" ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>
                                        </v-flex>
                       </template>
                                        </ReportForm>
        </v-card>
        <div class="mx-auto" :class="$vuetify.breakpoint.xsOnly?'max-w-full':'report'">
             <ReportPdf style="z-index:-15;position:fixed;" :visit_request_id="visit_request_id" :reportData="reportData"  :medias="medias" :language="language" :stage="stage" ref="pdf" />
      
            </div>
        </v-form>
        <AddReportType :externalDialog="externalDialog" @close="externalDialog = event" @store="externalDialog = event" />
   
    </v-container>
</template>
<script>
import AddReportType from '../report_types/Add.vue'
import ReportForm from './components/ReportForm.vue'
import ReportPdf from "./components/ReportPdf.vue"
import vue2Dropzone from 'vue2-dropzone'

export default {
    components:{
     AddReportType,
     ReportForm,
     ReportPdf,
     vueDropzone: vue2Dropzone
    },
    data() {
        return {
            type: 'testt',
            externalDialog: false,
            reportData: null,
            project: null,
            name: '',
            offices: [],
            office: null,
            report_types: [],
            report_type: '',
            report_id: null,
            create_time: '',
            loading:false,
            projects:[],
            stages: [],
            stage: null,
            language: null,
            visit_request_id: null,
                   dropzoneOptions: {
          url: APP.APP_URL + '/media',
          thumbnailWidth: 150,
          maxFilesize: 10,
          addRemoveLinks: true,
          headers: { 'X-CSRF-TOKEN': _token }
      },
      medias:[]
        };
    },
    created() {
        const self = this;
        self.getReportTypes();
        self.getStages();
        self.getProject(self.$route.params.id)
        self.visit_request_id = self.$route.params.visit_request_id
        self.language = localStorage.getItem('currentLange')?localStorage.getItem('currentLange'):'ar'
    },
    methods: {
        
                  vsuccessMuliple(files, response){
        
    response.files_name.forEach(val => this.medias.push(val));
        },
        getStages(){
           axios.get('stages').then((response)=>{
            this.stages = response.data
           })
        },
        printPdf(event){
       this.reportData = event
         this.$refs.pdf.renderComponent();
        this.$refs.pdf.printPdf();
        },
        getReportData(event){
            this.reportData = event
            this.$refs.pdf?.renderComponent();
        },
      getProject(project_id) {
         const self = this;
            axios
                .get('/get-project/'+ project_id)
                .then(function (response) {
                    self.project  = response.data;
                    self.reportData.owner= self.project.customer.name
                     self.reportData.project= self.project.name
                     
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        getFields(input, field) {
            var output = [];

            for (var i = 0; i < input.length; ++i) output.push(input[i][field]);
            return output.join('&&');
        },
        getProjectsOffice(){
 const self = this;
            axios
                .get('getProjectsOffice',{ params: {office_id: self.office.id} })
                .then(function (response) {
                    self.projects = response.data
                })
                .catch(function (error) {
                    console.log(error);
                });
                self.$forceUpdate()
        },
        getReportTypes() {
            const self = this;
            axios
                .get('/get-report-types')
                .then(function (response) {
                    self.report_types = response.data.types;
                    self.offices = response.data.offices
                    self.projects = response.data.projects
                    self.report_id = response.data.report_id
                    
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

    },
};
</script>

<style scoped>
   .report{
max-width: 65%
    }
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 0.5rem;
}
.card > hr {
    margin-right: 0;
    margin-left: 0;
}
.card > .list-group {
    border-top: inherit;
    border-bottom: inherit;
}
.card > .list-group:first-child {
    border-top-width: 0;
    border-top-left-radius: calc(0.25rem - 1px);
    border-top-right-radius: calc(0.25rem - 1px);
}
.card > .list-group:last-child {
    border-bottom-width: 0;
    border-bottom-right-radius: calc(0.25rem - 1px);
    border-bottom-left-radius: calc(0.25rem - 1px);
}
.card > .card-header + .list-group,
.card > .list-group + .card-footer {
    border-top: 0;
}

.card-body {
    flex: 1 1 auto;
    padding: 1rem 1rem;
    background-color: rgba(217, 217, 217, 255);
}

.card-title {
    margin-bottom: 0.5rem;
}

.card-subtitle {
    margin-top: -0.25rem;
    margin-bottom: 0;
}

.card-text:last-child {
    margin-bottom: 0;
}

.card-link + .card-link {
    margin-left: 1rem;
}

.card-header {
    padding: 0.5rem 1rem;
    margin-bottom: 0;
    background-color: rgba(12, 111, 109, 255);
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    color: white;
}
.card-header:first-child {
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}

.card-footer {
    padding: 0.5rem 1rem;
    background-color: rgba(0, 0, 0, 0.03);
    border-top: 1px solid rgba(0, 0, 0, 0.125);
}
.card-footer:last-child {
    border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
}

.card-header-tabs {
    margin-right: -0.5rem;
    margin-bottom: -0.5rem;
    margin-left: -0.5rem;
    border-bottom: 0;
}
.card-text {
    text-align: -webkit-center;
}

.card-header-pills {
    margin-right: -0.5rem;
    margin-left: -0.5rem;
}

.card-img-overlay {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 1rem;
    border-radius: calc(0.25rem - 1px);
}

.card-img,
.card-img-top,
.card-img-bottom {
    width: 100%;
}

.card-img,
.card-img-top {
    border-top-left-radius: calc(0.25rem - 1px);
    border-top-right-radius: calc(0.25rem - 1px);
}

.card-img,
.card-img-bottom {
    border-bottom-right-radius: calc(0.25rem - 1px);
    border-bottom-left-radius: calc(0.25rem - 1px);
}

.card-group > .card {
    margin-bottom: 0.75rem;
}
@media (min-width: 576px) {
    .card-group {
        display: flex;
        flex-flow: row wrap;
    }
    .card-group > .card {
        flex: 1 0 0%;
        margin-bottom: 0;
    }
    .card-group > .card + .card {
        margin-left: 0;
        border-left: 0;
    }
    .card-group > .card:not(:last-child) {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }
    .card-group > .card:not(:last-child) .card-img-top,
    .card-group > .card:not(:last-child) .card-header {
        border-top-right-radius: 0;
    }
    .card-group > .card:not(:last-child) .card-img-bottom,
    .card-group > .card:not(:last-child) .card-footer {
        border-bottom-right-radius: 0;
    }
    .card-group > .card:not(:first-child) {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    .card-group > .card:not(:first-child) .card-img-top,
    .card-group > .card:not(:first-child) .card-header {
        border-top-left-radius: 0;
    }
    .card-group > .card:not(:first-child) .card-img-bottom,
    .card-group > .card:not(:first-child) .card-footer {
        border-bottom-left-radius: 0;
    }
}
</style>