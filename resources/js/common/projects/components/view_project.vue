<template>
    <div class="flex">
     <v-navigation-drawer
    v-model="drawer"
    :mini-variant.sync="mini"
    hide-overlay
    stateless
    class="min-h-full h-auto"
    style="min-width: 4rem"
  >
    <v-toolbar flat class="transparent">
      <v-list class="p-0">
        <v-list-tile>
          <v-list-tile-avatar :style="$vuetify.breakpoint.xsOnly?'padding:0!important':'padding:auto!important'">
           <v-icon>business</v-icon>
          </v-list-tile-avatar>

          <v-list-tile-content>
            <v-list-tile-title>{{ resultData?resultData.data.data.project.name:'' }}</v-list-tile-title>
          </v-list-tile-content>

          <v-list-tile-action>
            <v-btn
              icon
              @click.stop="mini = !mini"
            >
              <v-icon>chevron_left</v-icon>
            </v-btn>
          </v-list-tile-action>
        </v-list-tile>
      </v-list>
    </v-toolbar>

    <v-list class="pt-0" dense>
      <v-divider></v-divider>

      <v-list-tile
        @click="projectOverview"
      >
        <v-list-tile-action>
          <v-icon color="#617BFF" small>dvr</v-icon>
        </v-list-tile-action>

        <v-list-tile-content>
          <v-list-tile-title>{{ trans('messages.overview') }}</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>
        <v-list-tile
        @click="projectLocation"
      >
        <v-list-tile-action>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#617BFF" class="w-5 h-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
</svg>
        </v-list-tile-action>

        <v-list-tile-content>
          <v-list-tile-title>{{ trans('data.location_info') }}</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>
        <v-list-tile
        @click="projectCustomer"
      >
        <v-list-tile-action>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#617BFF" class="w-5 h-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
</svg>

        </v-list-tile-action>

        <v-list-tile-content>
          <v-list-tile-title>{{ trans('data.customer_info') }}</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>
       <v-list-tile
        @click="projectAgency"
      >
        <v-list-tile-action>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#617BFF" class="w-5 h-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
</svg>

        </v-list-tile-action>

        <v-list-tile-content>
          <v-list-tile-title>{{ trans('data.agency_info') }}</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>
          <v-list-tile
        @click="projectActivities"
      >
        <v-list-tile-action>
          <v-icon color="#617BFF" small>timeline</v-icon>
        </v-list-tile-action>

        <v-list-tile-content>
          <v-list-tile-title>{{ trans('messages.activities') }}</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>
          <v-list-tile
        @click="tasks"
      >
        <v-list-tile-action>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#617BFF" class="w-5 h-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
</svg>

        </v-list-tile-action>

        <v-list-tile-content>
          <v-list-tile-title>{{ trans('messages.tasks') }}</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>
         <v-list-tile
         @click="currentCard = 'visitRequests'"
      >
        <v-list-tile-action>
          <v-icon color="#617BFF" small>assignment</v-icon>
        </v-list-tile-action>

        <v-list-tile-content>
          <v-list-tile-title>{{ trans('data.visit_request') }}</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>
         <v-list-tile
        @click="currentCard = 'visitInvoices'"
      >
        <v-list-tile-action>
          <v-icon color="#617BFF" small>assignment</v-icon>
        </v-list-tile-action>

        <v-list-tile-content>
          <v-list-tile-title>{{ trans('data.public_bills') }}</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>
         <v-list-tile
         @click="getProjectMedia();showSub=!showSub"
      >
        <v-list-tile-action>
          <v-icon color="#617BFF" small>perm_media</v-icon>
        </v-list-tile-action>

        <v-list-tile-content>
          <v-list-tile-title>{{ trans('data.document_info') }}</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>
    </v-list>
  </v-navigation-drawer>
    <v-card :class="$vuetify.breakpoint.xsOnly?'mt-4':''" class="mx-3" style="min-width: 80%;" flat>
                    <v-card-text>
                        <ProjectDataOverview ref="projectData" v-show="currentCard === 'projectInfo'" :projectData="resultData?resultData.data.data.project:null" />
                        <LocationDataView ref="locationInfo" :location="resultData?resultData.data.data.project.location:null" v-show="currentCard === 'locationInfo'" />
        <div  v-if="resultData && resultData.data">
                         <UserDataOverview
                           v-for="owner in resultData.data.data.project.owners"
                           :key="owner.id"
                           v-show="currentCard === 'customerInfo'"
                           :ownerData="owner"
                            ref="customerInfo"
                        ><template #title> <h5 class="mb-3 flex justify-center text-base font-semibold text-slate-600 md:text-xl dark:text-white">
             {{ trans('data.customer_info') + owner.name }}
        </h5></template></UserDataOverview></div>
                                <div  v-if="resultData && resultData.data">
                        <UserDataOverview
                           v-show="currentCard === 'agencyInfo'"
                           :ownerData="resultData.data.data.project.agency"
                            ref="agencyInfo"
                          ><template #title>            <h5 class="mb-3 flex justify-center text-base font-semibold text-slate-600 md:text-xl dark:text-white">
             {{ trans('data.agency_info') }}
        </h5></template></UserDataOverview></div>
                        <ProjectActivity ref="projectActivity"
                        v-show="currentCard === 'projectActivity'"
                        > </ProjectActivity>
                        <TaskLists v-show="currentCard === 'taskLists'" :backBtn="false"></TaskLists>
                        <visitRequests v-show="currentCard === 'visitRequests'" :backBtn="false" :id="projectId" ></visitRequests>
                         <visitInvoices :backBtn="false" :id="projectId" v-show="currentCard === 'visitInvoices'"></visitInvoices>
                         <Document ref="documentsInfo" v-show="currentCard === 'document'"> </Document>
                    </v-card-text>
                         <v-card-actions jusi>
                <v-btn class="mx-auto" style="color: #06706d" @click="$router.go(-1)">
                    {{ trans('messages.back') }}
                </v-btn>
            </v-card-actions>
                </v-card>
    </div>
</template>
<script>
import TaskLists from '../tasks/List';
import MilestonesLists from '../milestones/Lists';
import ProjectOverview from '../overview/ProjectOverview';
import ProjectActivity from '../activities/ProjectActivity';
import InvoiceLists from '../invoices/Lists';
import NotesAndDocumentsList from '../notes/Lists';
import visitRequests from '../../tickets/List.vue';

import visitInvoices from '../invoices/Lists.vue';

import UserDataOverview from './project_info/UserDataOverview.vue';
import LocationDataView from './project_info/LocationDataView.vue';
import ProjectDataOverview from './project_info/ProjectDataOverview.vue';
import Document from './project_info/documnets.vue';
import Popover from '../../../admin/popover/Popover';

  export default {
     components: {
       TaskLists,
        MilestonesLists,
        ProjectOverview,
        ProjectActivity,
        InvoiceLists,
        NotesAndDocumentsList,
        Document,
        UserDataOverview,
        LocationDataView,
        Popover,
        visitRequests,
        ProjectDataOverview,
        visitInvoices
     },
         props: {
        propProjectId: {
            required: true,
        },
    },
    data () {
      return {
        drawer: true,
        mini: false,
        currentCard:'projectInfo',
        right: null,
        media: null,
        resultData: null,
        showSub: false
      }
    },
        created() {
        const self = this;
        self.projectId = self.$route.params.id;
        self.loadProject();
        self.$store.commit('drawer', {
            drawer: false,
        });
    },
    methods:{
       loadProject() {
            const self = this;
           axios.get('projects/' + self.propProjectId).then(function (response) {
                if (!response.data.error_code) {
                  self.resultData = response
                   self.$forceUpdate()
                   //self.$refs.projectData.fillEditData(response.data.data.project, true);
                } else {
                    self.$store.commit('hideLoader');
                    self.$store.commit('showSnackbar', {
                        message: response.data.error_description,
                        color: 'red',
                    });
                }
            });
        },
        getProjectMedia(){
          this.currentCard = 'document'
          
this.$refs.documentsInfo.fillEditData(this.resultData.data.data.project.media, false);
        },
        projectOverview() {
            const self = this;
            self.currentCard = 'projectInfo'
           // self.$refs.projectData.fillEditData(this.resultData.data.data.project, true);
        },
        projectLocation() {
            const self = this;
             self.currentCard = 'locationInfo'
             
          //  self.$refs.locationInfo.fillEditData(this.resultData.data.data.project.location, true);
        },
        projectCustomer() {
            const self = this;
            self.currentCard = 'customerInfo'

        },
           projectAgency() {
            const self = this;
            self.currentCard = 'agencyInfo'
        },
        projectActivities() {
            const self = this;
             self.currentCard = 'projectActivity'
            self.$refs.projectActivity.getProjectActivities();
        },
        tasks() {
            const self = this;
            self.currentCard = 'taskLists'
            self.$eventBus.$emit('updateTaskTable', self.propProjectId);
        },
 
        milestones() {
            const self = this;
            self.$refs.milestone.getMilestoneList();
        },
        invoice() {
            const self = this;
            self.$refs.invoice.getInvoiceFromApi();
        },
        getProject(project_id) {
            const self = this;
            axios
                .get('/projects/' + project_id + '/customer')
                .then(function (response) {
                    self.project = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
    }
</script>
<style scoped>
>>> .v-list__tile{
  
}
</style>