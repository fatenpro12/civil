<!-- Employees -->
<template>
    <div class="component-wrap" :class="$vuetify.breakpoint.xsOnly?'pt-3':''">
     
       
        <view1 ref="designView"></view1>
        
    
        <v-card class="mt-3">
            <v-card-title>
                <div>
                    <div class="headline">
                        {{ title }}
                    </div>
                </div>
                <v-spacer></v-spacer>
               <slot name="addRequest" />
            </v-card-title>
            <v-divider></v-divider>
            <!-- data table -->
            <v-data-table
                v-bind:headers="headers"
                v-bind:pagination.sync="pagination"
                ref="designData"
                :items="items"
                :total-items="totalItems"
                :expand="expand"
                class="elevation-3"
            >
                <template slot="headerCell" slot-scope="props">
                    <span v-if="props.header.value == 'created_by'">
                        <v-icon small>person</v-icon> {{ props.header.text }}
                    </span>
                    <span v-else-if="props.header.value == 'email'">
                        <v-icon small>email</v-icon> {{ props.header.text }}
                    </span>
                    <span v-else-if="props.header.value == 'roles'">
                        <v-icon small>control_point</v-icon> {{ props.header.text }}
                    </span>
                    <span v-else-if="props.header.value == 'created_at'">
                        <v-icon small>av_timer</v-icon> {{ props.header.text }}
                    </span>
                    <span v-else>{{ props.header.text }}</span>
                </template>
                <template slot="items" slot-scope="props">
                     <tr>
                    <td>
                        <div  align="center">
                            <slot name="arrow" :props="props" />
                            <v-btn small fab dark color="success" @click="viewDesign(props.item)">
                                <v-icon color="white">info</v-icon>
                            </v-btn>
                            <slot name="actions" :props="props"/>
                        
                        </div>
                    </td>

                    <td>
                        <div align="center">{{ props.item.id }}</div>
                    </td>

                    <td>
                        <div align="center">
                            <v-chip
                                class="ma-2"
                                :disabled="!checkActive()"
                                v-if="props.item.status != ''"
                                :color="getColor(props.item.status)"
                                text-color="white"
                            >
                                {{ props.item.status }}
                            </v-chip>
                        </div>
                    </td>
                    <slot name="office" :props="props" />
                    <td>
                        <div align="center">
                            {{ props.item.customer }}
                        </div>
                    </td>
                    <slot name="specialCols" :props="props" />
                    <td>
                        <div align="center">
                            <v-btn
                        
                                small
                                fab
                                dark
                                color="teal"
                                @click="viewProject(props.item.project.projectId)"
                            >
                                {{ props.item.project.projectName }}
                                <!-- {{trans('messages.add')}}-->
                            </v-btn>
                        </div>
                    </td>

                    <td>
                        <div align="center">
                            {{ props.item.created_at ? createdDate(props.item.created_at) : '-' }}
                        </div>
                    </td>
                     </tr>
                </template>
                 <template v-slot:expand="props">
            <slot name="expand" :props="props"/>
        </template>
            </v-data-table>
        </v-card>
        <br />
        <div align="center">
            <v-btn
                style="background-color: #06706d; color: white"
                @click="$router.go(-1)"
                :loading="loading"
                :disabled="loading"
            >
                {{ trans('messages.back') }}
            </v-btn>
        </div>
        <br />
    </div>
</template>

<script>
import view1 from './view1';
import _ from 'lodash';
import store from '../../store'

export default {
    components: {
        view1
    },
    props:{
      url:{
        type: String,
        default: null
      },
      title:{
        type: String   
      },
      headers:{
        type:Array
      }
    },
    data() {
        const self = this;
        return {
            expand: true,
            dialog: false,
            loading: false,
        
            items: [],
            totalItems: 0,
            pagination: {
                rowsPerPage: 10,
            },

            tabs: 'tab-1',
            filters: {
                name: '',
            },
        };
    },
    mounted() {
        const self = this;
        self.$eventBus.$on(
            ['DESIGN_ADDED', 'DESIGN__UPDATED', 'DESIGN__DELETED', 'DESIGN__ADDED'],
            () => {
                self.loadDesigns(() => {});
            }
        );
    },
    watch: {
        'pagination.page': function () {
            this.loadDesigns(() => {});
        },
        'pagination.rowsPerPage': function () {
            this.loadDesigns(() => {});
        },
        'filters.name': _.debounce(() => {
            const self = this;
            self.loadDesigns(() => {});
        }, 700),
    },
    methods: {
    
        viewProject(id) {
            const self = this;
            self.$router.push({
                name: 'view_project',
                params: { id: id },
            });
        },
       
   
        viewDesign(item) {
            const self = this;
            self.$refs.designView.create(item);
        },
 
   
        trash(id) {
            const self = this;
            self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                message: self.trans('messages.you_cant_restore_it'),
                okCb: () => {
                    axios
                        .delete('/estate_owner/request-design/' + id)
                        .then(function (response) {
                            if (response.data.success === true) {
                                self.$eventBus.$emit('DESIGN__DELETED');
                                self.$store.commit('showSnackbar', {
                                    message: response.data.msg,
                                    color: response.data.success,
                                });
                            } else {
                                self.$store.commit('showSnackbar', {
                                    message: response.data.msg,
                                    color: response.data.success,
                                });
                            }
                        })
                        .catch(function (error) {
                            self.$store.commit('hideLoader');

                            if (error.response) {
                                self.$store.commit('showSnackbar', {
                                    message: error.response.data.msg,
                                    color: response.data.success,
                                });
                            } else if (error.request) {
                                console.log(error.request);
                            } else {
                                console.log('Error', error.message);
                            }
                        });
                },
                cancelCb: () => {
                    console.log('CANCEL');
                },
            });
        },

        loadDesigns() {
            const self = this;
            let params = {
                page: self.pagination.page,
                rowsPerPage: self.pagination.rowsPerPage,
            };

            axios.get(self.url, { params: params }).then(function (response) {
                if (response.data.success === true) {
                    self.items = response.data.msg;
                    self.totalItems = response.data.msg.total;
                    self.pagination.totalItems = response.data.msg.total;
                    self.$forceUpdate()
                } else {
                    self.$store.commit('showSnackbar', {
                        message: response.data.msg,
                        color: response.data.success,
                    });

                    self.$store.commit('hideLoader');
                }
            });
        },
    },
};
</script>
<style scoped>
td{
    width: 30%;
}
</style>
