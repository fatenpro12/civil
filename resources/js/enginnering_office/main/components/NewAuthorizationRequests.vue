<template>
    <div class="component-wrap">
        <v-container grid-list-md>
            <v-flex pt-3 pb-5>
                <h1   style="color:#0000008a;" class="text-md-center"> {{ trans('data.Engineering_offices_system') }}</h1>
            </v-flex>
            <v-card pt-3 >
                    <v-card-text>
                        <v-container grid-list-lg>
                            <v-layout wrap>
                                <v-flex xs12 sm6 md12>
                                    <v-flex xs12 sm12 md12>
                                        <v-card-text>
                                            <div class="text-md-center mt-2">
                                                <v-data-table
                                                    :headers="headers"
                                                    :pagination.sync="pagination"
                                                    :total-items="total_items"
                                                    :loading="loading"
                                                    :items="newAuthorizationRequests"
                                                    class="elevation-3"
                                                >
                                            
                                            <template slot="items" slot-scope="props">
                                                <td>
                                                    <div style="display: flex;">
                                                        <v-btn color="success" small v-if=" $can('project.' + props.item.id + '.status') ||
                                                                $can('project.' + props.item.id + '.edit') ||
                                                                $can('project.' + props.item.id + '.delete')
                                                        " slot="activator"  @click="$router.push({name: 'projects.project-tasks.list',params: { id: props.item.id }})">
                                                            <v-icon small>visibility</v-icon>&nbsp;
                                                            {{ trans('messages.view') }}
                                                        </v-btn>
                                                         <v-btn color="primary" small slot="activator" v-if="$can('project.' + props.item.id + '.edit')"  @click="$router.push({name: 'projects.project-tasks.list',params: { id: props.item.id }})">
                                                            <v-icon small>edit</v-icon>&nbsp;
                                                            {{ trans('messages.edit') }}
                                                        </v-btn>
                                                         <v-btn color="error" small slot="activator"  v-if="$can('project.' + props.item.id + '.delete')"
                                                                @click="deleteProject(props.item.id)">
                                                            <v-icon small>delete_outline</v-icon>&nbsp;
                                                            {{ trans('messages.delete') }}
                                                        </v-btn> 
                                                    </div>  
                                                </td>
                                                <td>{{ props.item.name }}</td>
                                                <td> {{ props.item.customer.company }}</td>
                                                <td>
                                                    <v-chip class="ma-2" color="red" text-color="white">{{trans('messages.' + props.item.status)}}
                                                    </v-chip>
                                                </td>
                                                <td>
                                                    <v-btn icon @click="markAsFavorite(props.item)">
                                                        <v-icon :color="toggleFavorite(props.item)"> star </v-icon>
                                                    </v-btn>
                                                </td>
                                                <td><avatar :members="props.item.members" class="mr-2"></avatar></td>
                                                <td>{{ projectProgress(
                                                                props.item.tasks_count,
                                                                props.item.completed_task
                                                            )}}</td>
                                            </template>
                                        </v-data-table>                                  
                                    </div>
                                </v-card-text>
                            </v-flex>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-card-text>
        </v-card>
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
           newAuthorizationRequests:[],
           loading:false,
           total_items:0,
           pagination: { totalItems: 0 },
           headers: [
                {
                    text: self.trans('messages.action'),
                    value: false,
                    align: 'centre',
                    sortable: false,
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
                    text: self.trans('data.beneficiary_name'),
                    value: 'beneficiary_name',
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
                    text: self.trans('data.beneficiary_data'),
                    value: 'beneficiary_data',
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
                    text: self.trans('messages.mobile'),
                    value: 'mobile',
                    align: 'centre',
                    sortable: true,
                },
                {
                    text: self.trans('messages.status'),
                    value: 'status',
                    align: 'centre',
                    sortable: true,
                },
            ],
        }        
    },
    created() {
       
    },
    methods: {
       
    },
};
</script>
 

