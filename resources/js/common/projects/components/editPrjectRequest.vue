<template>
    <div class="component-wrap">
        <v-container grid-list-md>
            <v-layout row justify-center>
                <!-- category Add -->
                <CategoryAdd ref="categoryAdd"></CategoryAdd>
                    <v-card>
                        <v-card-title>
                            <v-icon medium>assessment</v-icon>
                            <span class="headline">
                                {{ trans('messages.create_project') }}
                            </span>
                        </v-card-title>
                        <v-divider></v-divider>
                        <v-card-text>
                            <v-container grid-list-md>
                                <v-layout row wrap>
                                    <v-flex xs12 md6>
                                        <v-text-field
                                            v-model="project_request.name"
                                            :label="trans('messages.name')"                                            
                                            data-vv-name="name"
                                            :data-vv-as="trans('messages.name')"
                                            :error-messages="errors.collect('name')"
                                            required
                                        >
                                        </v-text-field>
                                    </v-flex>
                              
                                </v-layout>
                                <v-layout row wrap>
                                    <v-flex xs12 sm12 md12>
                                        {{ trans('messages.description') }}
                                        <br>
                                        <quill-editor v-model="project.description"> </quill-editor>
                                    </v-flex>
                                </v-layout>
                                <v-layout wrap>
                                    <v-flex xs12 md4 v-if="$hasRole('employee') ||$can('superadmin')">
                                        <v-autocomplete
                                            item-text="company"
                                            item-value="id"
                                            :items="customers"
                                            v-model="project.customer_id"
                                            :label="trans('messages.customer')"
                                        ></v-autocomplete>
                                    </v-flex>

                             

                                    <v-flex xs12 md4>
                                        <div class="v-input v-text-field theme--light">
                                            <div class="v-input__control">
                                                <div class="v-input__slot">
                                                    <div class="v-text-field__slot">
                                                        <label
                                                            aria-hidden="true"
                                                            class="v-label v-label--active theme--light flat_picker_label"
                                                        >
                                                            {{ trans('messages.start_date') }}
                                                        </label>
                                                        <flat-pickr
                                                            v-model="start_date"
                                                            
                                                            name="start_date"
                                                            required
                                                            :config="flatPickerDate()"
                                                            :data-vv-as="trans('messages.start_date')"
                                                        ></flat-pickr>
                                                    </div>
                                                </div>
                                                <div class="v-messages theme--light error--text">
                                                    {{ errors.first('start_date') }}
                                                </div>
                                            </div>
                                        </div>
                                    </v-flex>

                                    <v-flex xs12 md4>
                                        <div class="v-input v-text-field theme--light">
                                            <div class="v-input__control">
                                                <div class="v-input__slot">
                                                    <div class="v-text-field__slot">
                                                        <label
                                                            aria-hidden="true"
                                                            class="v-label v-label--active theme--light flat_picker_label"
                                                        >
                                                            {{ trans('messages.end_date') }}
                                                        </label>
                                                        <flat-pickr
                                                            v-model="end_date"
                                                            
                                                            name="end_date"
                                                            required
                                                            :config="flatPickerDate()"
                                                            :data-vv-as="trans('messages.end_date')"
                                                        ></flat-pickr>
                                                    </div>
                                                </div>
                                                <div class="v-messages theme--light error--text">
                                                    {{ errors.first('end_date') }}
                                                </div>
                                            </div>
                                        </div>
                                    </v-flex>
                                    <v-flex xs12 md4 v-if="$can('superadmin')">
                                        <v-autocomplete
                                            item-text="name"
                                            item-value="id"
                                            :items="users"
                                            v-model="project.user_id"
                                            :label="trans('messages.members')"
                                            chips
                                            multiple
                                            
                                            data-vv-name="members"
                                            :data-vv-as="trans('messages.members')"
                                            :error-messages="errors.collect('members')"
                                            required
                                        >
                                            <Popover
                                                slot="append"
                                                :helptext="trans('messages.project_member_tooltip')"
                                            >
                                            </Popover>
                                        </v-autocomplete>
                                    </v-flex>

                                    <v-flex xs12 md4>
                                        <v-text-field
                                            v-model="authorization_request_number"
                                            :label="trans('data.authorization_request_number')"
                                            
                                            data-vv-name="Authorization Request Number"
                                            :data-vv-as="trans('data.authorization_request_number')"
                                            :error-messages="errors.collect('authorization_request_number')"
                                            required
                                        >
                                        </v-text-field>
                                    </v-flex>

                                    <v-flex xs12 md4>
                                        <v-text-field
                                            v-model="license_number"
                                            :label="trans('data.license_number')"
                                            
                                            data-vv-name="Authorization Request Number"
                                            :data-vv-as="trans('data.license_number')"
                                            :error-messages="errors.collect('license_number')"
                                            required
                                        >
                                        </v-text-field>
                                    </v-flex>

                                   


                                    <v-flex xs12 md4>
                                        <v-text-field
                                            v-model="type_of_request"
                                            :label="trans('data.type_of_request')"
                                            
                                            data-vv-name="Authorization Request Number"
                                            :data-vv-as="trans('data.type_of_request')"
                                            :error-messages="errors.collect('type_of_request')"
                                            required
                                        >
                                        </v-text-field>
                                    </v-flex>

                                    <v-flex xs12 md4>
                                        <v-text-field
                                            v-model="plot_number"
                                            :label="trans('data.plot_number')"
                                            
                                            data-vv-name="Authorization Request Number"
                                            :data-vv-as="trans('data.plot_number')"
                                            :error-messages="errors.collect('plot_number')"
                                            required
                                        >
                                        </v-text-field>
                                    </v-flex>

                                    <v-flex xs12 md4>
                                        <v-text-field
                                            v-model="cadastral_decision_number"
                                            :label="trans('data.cadastral_decision_number')"
                                            
                                            data-vv-name="Authorization Request Number"
                                            :data-vv-as="trans('data.cadastral_decision_number')"
                                            :error-messages="errors.collect('cadastral_decision_number')"
                                            required
                                        >
                                        </v-text-field>
                                    </v-flex>

                                </v-layout>
                            </v-container>
                        </v-card-text>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="darken-1" @click="reset" style="color:#06706d;" >
                                {{ trans('data.reset') }}
                            </v-btn>
                            <v-btn v-if="$can('superadmin')" style="background-color:#06706d;color:white;" @click="store" :loading="loading" :disabled="loading">
                                {{ trans('messages.save') }}
                            </v-btn>
                            <v-btn v-else style="background-color:#06706d;color:white;" @click="updateRequest" :loading="loading" :disabled="loading">
                                {{ trans('messages.update') }}
                            </v-btn>
                            <div align="right">
                                <v-btn style="color:#06706d;" @click="$router.go(-1)">
                                    {{ trans('messages.back') }}
                                </v-btn>
                            </div>
                        </v-card-actions>
                    </v-card>
            </v-layout>
        </v-container>
    </div>
</template>
<script>
import CategoryAdd from '../category/Add';
import Popover from '../../../admin/popover/Popover';
export default {
    components: {
        CategoryAdd,
        Popover,
    },
    data() {
        return {
            customers: [],
            billing_types: [],
            status: [],
            users: [],
            project: [],
            authorization_request_number:'',
            license_number:'',
            type_of_request:'',
            plot_number:'',
            cadastral_decision_number:'',
            start_date: null,
            end_date: null,
            categories: [],
            loading: false,
            category_id: [],
        };
    },
    mounted() {
        const self = this;
        self.$eventBus.$on('updateCategoryList', data => {
            self.categories.push(data);
            self.category_id.push(data.id);
        });
    },
    beforeDestroy() {
        const self = this;
        self.$eventBus.$off('updateCategoryList');
    },
    created(){
        const self = this;
        self.project_request=self.$route.params.project_request;
        self.create();
        self.setProjectRequest();
    },
    methods: {
        reset(){
            const self = this;
            self.customers= [];
            self.billing_types= [];
            self.status= [];
            self.users= [];
            self.project= [];
            self.start_date= null;
            self.end_date= null;
            self.categories= [];
            self.loading= false;
            self.category_id= [];
            self.authorization_request_number='';
            self.license_number='';
            self.type_of_request='';
            self.plot_number='';
            self.cadastral_decision_number='';
            this.create();
        },
        create() {
            const self = this;
            self.$validator.reset();
            self.project = [];
            self.category_id = [];
            (self.start_date = null),
                (self.end_date = null),
                axios
                    .get('/projects/create')
                    .then(function(response) {
                        self.customers = response.data.customers;
                        self.billing_types = response.data.billingTypes;
                        self.status = response.data.status;
                        self.users = response.data.users;
                        self.categories = response.data.categories;
                    })
                    .catch(function(error) {
                        console.log(error);
                    });                   
        },
        setProjectRequest(){
            const self = this;
            self.project.name=self.project_request.name;
            self.project.description=self.project_request.description;
            self.start_date=self.project_request.start_date;
            self.end_date=self.project_request.end_date;

            self.authorization_request_number=self.project_request.authorization_request_number;
            self.license_number=self.project_request.license_number;
            self.type_of_request=self.project_request.type_of_request;
            self.plot_number=self.project_request.plot_number;
            self.cadastral_decision_number=self.project_request.cadastral_decision_number;            
        },
        store() {
            const self = this;
            let data = {
                id:self.project_request.id,
                name: self.project.name,
                category_id: self.category_id,
                customer_id: self.project.customer_id,
                billing_type: self.project.billing_type,
                total_rate: self.project.total_rate,
                price_per_hours: self.project.price_per_hours,
                estimated_hours: self.project.estimated_hours,
                estimated_cost: self.project.estimated_cost,
                status: self.project.status,
                lead_id: self.project.lead_id,
                description: self.project.description,
                user_id: self.project.user_id,
                start_date: self.start_date,
                end_date: self.end_date,
            };
            self.$validator.validateAll().then(result => {
                if (result == true) {
                    self.loading = true;
                    axios
                        .post('/edit-project-request', data)
                        .then(function(response) {
                            self.loading = false;
                            self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });
                            if (response.data.success === true) {
                                self.$router.push({name:'visit_request_list'});
                            }
                        })
                              .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });
                }
            });
        },
        createCategory() {
            const self = this;
            var data = { type: 'projects' };
            self.$refs.categoryAdd.create(data);
        },
        updateRequest(){            
            const self = this;
            let data = {
                id:self.project_request.id,
                name: self.project_request.name,
                description: self.project_request.description,
                start_date: self.start_date,
                end_date: self.end_date,
                authorization_request_number:self.authorization_request_number,
                license_number:self.license_number,
                type_of_request:self.type_of_request,
                plot_number:self.plot_number,
                cadastral_decision_number:self.cadastral_decision_number
            };
            self.$validator.validateAll().then(result => {
                if (result == true) {
                    self.loading = true;
                    axios
                        .post('/edit-project-request', data)
                        .then(function(response) {
                            self.loading = false;
                            
                            if (response.data.success === true) {
                                self.$router.push({name:'visit_request_list'});
                               // self.$eventBus.$emit('updateProjectTable');

                            }
                        })
                              .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });
                }
            });
            this.reset();
        },
    },
};
</script>
