<template>
    <div class="component-wrap">
        <v-container grid-list-md>
            <v-layout row pt-3>
                <v-flex xs12 sm12>
                    <v-card class="elevation-3">
                        <v-card-title primary-title xs8 sm8>
                            <div>
                                <div class="headline">
                                    {{ trans('data.requests_creating_projects') }}
                                </div>
                            </div>
                        </v-card-title>
                        <v-divider></v-divider>
                        <v-card-text>
                            <v-container grid-list-md>
                                    <v-layout wrap>
                                        <v-flex xs12 sm12 md12>
                                          <v-data-table
                                                    :headers="headers"
                                                    :pagination.sync="pagination"
                                                    :total-items="total_items"
                                                    :loading="loading"
                                                    :items="projects"
                                                    class="elevation-3"
                                                >
                                                
                                                <template slot="items" slot-scope="props">
                                                    <td>
                                                        <div style="display:flex;">
                                                             <v-btn  small fab dark color="teal"  v-if="props.item.status=='accepted'" @click="$router.push({name: 'create_project',params: { project: props.item }})">
                                                                 <v-icon color="white">add</v-icon>
                                                                <!-- {{trans('messages.add')}}-->
                                                            </v-btn>
                                                            <v-btn color="primary" small fab v-if="props.item.status=='pending'" dark @click="acceptProject(props.item.id)">
                                                                <v-icon color="white">check</v-icon>
                                                                <!--{{trans('data.accept')}}-->
                                                            </v-btn>
                                                            <v-btn color="error" small fab dark @click="removeProject(props.item.id)">
                                                                <v-icon color="white">cancel</v-icon>
                                                                <!-- {{trans('messages.cancel')}}-->
                                                            </v-btn> 

                                                        </div>
                                                    </td>
                                                     <td>
                                                        <div align="center">
                                                            {{ props.item.id }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">
                                                            {{ props.item.name }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">
                                                            <v-chip class="ma-2" :color="props.item.status=='pending'?'red':'success'" text-color="white">
                                                                {{ props.item.status }}
                                                            </v-chip>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div v-html="props.item.description" align="center">                              
                                                        </div>
                                                    </td>                                                               
                                                    <td>
                                                        <div align="center">
                                                            {{ props.item.authorization_request_number }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">
                                                            {{ props.item.license_number }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">
                                                            {{ props.item.type_of_request }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">
                                                            {{ props.item.plot_number }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">
                                                            {{ props.item.cadastral_decision_number }}
                                                        </div>    
                                                    </td>
                                                    
                                                    <td>
                                                        <div align="center">
                                                            test
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">
                                                            test
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">
                                                            test
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">
                                                            {{ createdDate(props.item.start_date) }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">
                                                            {{ createdDate(props.item.end_date) }}
                                                        </div>
                                                    </td> 
                                                </template>
                                        </v-data-table>
                                        </v-flex>
                                    </v-layout>
                                </v-container>
                            </v-card-text>
                        </v-card>
                    </v-flex>
                </v-layout>                
            </v-container>
           
        </div>
</template>

<script>

export default {
    components:{
        
    },
    data(){
        const self = this;
        return{
           projectRequest: [],
           loading:false,
           total_items:0,
           pagination: { totalItems: 0 },
           projects:[],
           headers: [
                {
                    text: self.trans('messages.action'),
                    value: false,
                    align: 'centre',
                    sortable: false,
                },
                  {
                    text: self.trans('data.id'),
                    value: 'id',
                    align: 'centre',
                    sortable: true,
                },
                {
                    text: self.trans('messages.name'),
                    value: 'name',
                    align: 'centre',
                    sortable: true,
                },
                {
                    text: self.trans('messages.status'),
                    value: 'status',
                    align: 'centre',
                    sortable: true,
                },
                {
                    text: self.trans('messages.description'),
                    value: 'description',
                    align: 'centre',
                    sortable: true,
                },
                {
                    text: self.trans('data.authorization_request_number'),
                    value: 'authorization_request_number',
                    align: 'centre',
                    sortable: true,
                },
                {
                    text: self.trans('data.license_number'),
                    value: 'license_number',
                    align: 'centre',
                    sortable: true,
                },
                {
                    text: self.trans('data.type_of_request'),
                    value: 'type_of_request',
                    align: 'centre',
                    sortable: true,
                },
                {
                    text: self.trans('data.plot_number'),
                    value: 'plot_number',
                    align: 'centre',
                    sortable: true,
                },
                {
                    text: self.trans('data.cadastral_decision_number'),
                    value: 'cadastral_decision_number',
                    align: 'centre',
                    sortable: true,
                },
                {
                    text: self.trans('data.beneficiary_id_number'),
                    value: 'beneficiary_id_number',
                    align: 'centre',
                    sortable: true,
                },
                {
                    text: self.trans('data.beneficiary_id_type'),
                    value: 'beneficiary_id_type',
                    align: 'centre',
                    sortable: true,
                },
                {
                    text: self.trans('messages.mobile'),
                    value: 'mobile',
                    align: 'centre',
                    sortable: true,
                },
                {
                    text: self.trans('messages.start_date'),
                    value: 'start_date',
                    align: 'centre',
                    sortable: true,
                },
                {
                    text: self.trans('messages.end_date'),
                    value: 'end_date',
                    align: 'centre',
                    sortable: true,
                },

            ],
            items:[],
        }        
    },
    mounted() {
        const self = this;
        self.projectRequest=[];
        this.getProjectRequest();
    },
    methods: {
        acceptProject(id){
            const self = this;
             self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                message: self.trans('messages.are_you_sure'),
                okCb: () => {
                    axios.get('/accept-project/' +id).then(function(response) {
                        self.projectRequest=[];
                        self.projects=[];
                        self.getProjectRequest();
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
                },
                cancelCb: () => {
                    console.log('CANCEL');
                },
            });     
        },
        removeProject(id){
            const self = this;
             self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                message: self.trans('messages.you_cant_restore_it'),
                okCb: () => {
                    axios.delete('/sent-requests/' +id).then(function(response) {
                        self.projectRequest=[];
                        self.projects=[];
                        self.getProjectRequest();
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
                },
                cancelCb: () => {
                    console.log('CANCEL');
                },
            });          
        },
        createdDate(date){
        const current_datetime = new Date(date);
        return current_datetime.toLocaleDateString('en-US');
        },
       getProjectRequest(){ 
           const self = this;          
           self.loading = true;
           axios.get('/sent-requests').then(function(response) { 
               self.total_items = response.data.total;
               self.projectRequest = response.data.data;
               self.loading = false;  

               self.projectRequest.visit_requests.forEach(el => {
                   self.projects.push(el);                
               });

               self.projectRequest.projectrequest.forEach(el => {
                   self.projects.push(el);
                
               });
                console.log(11111111111);
               console.log(self.projects);
            })
            .catch(function(error) {
                console.log(error);
            });
       }
    },
};
</script>
 

