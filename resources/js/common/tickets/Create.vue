<template>
    <v-container row justify-center>
        <AddRequestType ref="RequestTypeAdd"></AddRequestType>
        <v-card>
            <v-form ref="form" v-model="valid" lazy-validation>
                <v-divider></v-divider>
                <v-card-text>
                    <v-container grid-list-md>
                        <v-layout row wrap>
                       

                            <v-flex xs12 sm6 md6>
                                <v-autocomplete
                                    item-text="name"
                                    item-value="id"
                                    :items="projects"
                                    v-model="project_id"
                                    :label="trans('data.project_name')"
                                    :rules="[
                                        (v) =>
                                            !!v ||
                                            trans('messages.required', {
                                                name: trans('data.project_name'),
                                            }),
                                    ]"
                                    @change="(event) => updateEmployee(event)"
                                    required
                                ></v-autocomplete>
                            </v-flex>
                            <v-flex xs12 sm6 md6>
                                <v-autocomplete
                                    item-text="name"
                                    item-value="id"
                                    :items="customers"
                                    :readonly="true"
                                    v-model="customer_id"
                                    :label="trans('messages.customer')"
                                    :rules="[
                                        (v) =>
                                            !!v ||
                                            trans('messages.required', {
                                                name: trans('messages.customer'),
                                            }),
                                    ]"
                                    required
                                ></v-autocomplete>
                            </v-flex>
                        </v-layout>
                        <v-layout row>
                           
                            <v-flex xs12 sm6 md6>
                                <v-autocomplete
                                    item-text="name"
                                    item-value="id"
                                    :items="engennering_offices"
                                    v-model="office_id"
                                    :label="trans('data.enginnering_office_name')"
                                    :rules="[
                                        (v) =>
                                            !!v ||
                                            trans('messages.required', {
                                                name: trans('data.enginnering_office_name'),
                                            }),
                                    ]"
                                    required
                                ></v-autocomplete>
                            </v-flex>

                            <v-flex xs12 sm6 md6>
                                <v-datetime-picker
                                    :label="trans('data.visit_datetime')"
                                    :datetime="dead_line_date"
                                    :okText="trans('data.ok')"
                                    :clearText="trans('data.clear')"
                                    v-model="dead_line_date"
                                >
                                </v-datetime-picker>
                            </v-flex>
                        </v-layout>
                        <v-layout row>
                            <v-flex xs12 sm12 md12>
                                <v-autocomplete
                                    item-text="value"
                                    item-value="key"
                                    :items="enginnering_types"
                                    v-model="enginnering_type"
                                    :label="trans('data.enginnering_type')"
                                    multiple
                                    data-vv-name="enginnering_type"
                                    :data-vv-as="trans('data.enginnering_type')"
                                    :error-messages="errors.collect('enginnering_type')"
                                    required
                                >
                              
                                </v-autocomplete>
                            </v-flex>
                        </v-layout>
                        <v-layout row>
                            <v-flex xs12 sm12 md12>
                                <v-text-field
                                    v-model="note"
                                    :label="trans('data.note')"
                                   
                                ></v-text-field>
                            </v-flex>
                        </v-layout>
                     
                       
                    </v-container>
                </v-card-text>
                <v-divider></v-divider>
                <v-layout justify-center>
                    <v-card-actions class="flex-wrap">
                        <v-spacer></v-spacer>
                        <v-btn color="error" class="mr-4" @click="reset">
                            {{ trans('data.reset') }}
                        </v-btn>
                        <v-btn :disabled="!valid" color="success" class="mr-4" @click="store(1)">
                            {{ trans('data.send') }}
                        </v-btn>
                        <v-btn style="color: #06706d" @click="$router.go(-1)">
                            {{ trans('data.back') }}
                        </v-btn>
                        <v-btn :disabled="!valid" color="success" class="mr-4" @click="store(0)">
                            {{ trans('data.draft') }}
                        </v-btn>
                    </v-card-actions>
                </v-layout>
            </v-form>
        </v-card>
    </v-container>
</template>
<script>
import AddRequestType from './AddRequestType';

export default {
    components: {
        AddRequestType,
    },
    data() {
        return {
            valid: true,
            nullDatetime: null,
            datetime: new Date(),
            datetimeString: '2019-01-01 12:00',
            formattedDatetime: '09/01/2019 12:00',
            enginnering_types: [],
            textFieldProps: {
                appendIcon: 'event',
            },
            dateProps: {
                headerColor: 'red',
            },
            timeProps: {
                useSeconds: false,
                ampmInTitle: false,
            },
            type: '',
            project_id: '',
            projects: [],
            visit_request: '',
            loading: false,
            title: '',
            request_type: '',
            description: '',
            status: 'new',
            priority: '',
            customer_id: '',
            statuses: [],
            employees: [],
            request_types: [],
            customers: [],
            priorities: [],
            request_type: '',
            engennering_offices: [],
            office_id: '',
            dead_line_date: null,
            enginnering_type: '',
            note: '',
        };
    },
    computed: {
        computedDateFormattedMomentjs() {
            const self = this;
            return null; //self.dead_line_date
            // ? moment(self.location.instrument_date).format('dddd, MMMM Do YYYY')
            // : '';
        },
    
    },
    created() {
        const self = this;
        self.reset();
        self.project_id =  self.$route.params.project_id;
        
       // self.customer_id =  self.$route.params.customer_id;
        self.request_type = self.$route.params.request_type;
        self.getRequestTypes();
        self.getCustomerProject();
        self.getCustomers();
        //self.getpriority();
        self.getOffices();
        self.getEnginneringTypes();
    },
    beforeDestroy() {
        const self = this;
        self.$eventBus.$off('updateCategoryList');
    },
    mounted() {
        const self = this;
        self.$eventBus.$on('updateRequestTypeList', (data) => {
            self.request_types = [];
            self.request_types = data;
        });
    },
    methods: {
        getCustomers() {
            const self = this;
            axios.get('get-customer-project/' + self.project_id)
               //  .get('all-customers-admin')
                
                .then(function (response) {
                    self.customers = response.data;
                    self.customer_id = response.data[0].id;
                })
                  .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });
        },
        getOffices() {
            const self = this;
            axios
                .get('/get-offices')
                .then(function (response) {
                    self.engennering_offices = response.data;
                })
                  .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });;
        },
        getEnginneringTypes() {
            const self = this;
            axios
                .get('/get-enginnering-types')
                .then(function (response) {
                    self.enginnering_types = response.data;
                })
                  .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });;
        },
        reset() {
            const self = this;
            self.title = '';
            self.request_type = '';
            self.project_id = '';
            self.description = '';
            self.status = '';
            self.priority = '';
            self.customer_id = '';
            self.office_id = '';
            // self.request_types=[];
        },

        getRequestTypes() {
            const self = this;
            axios
                .get('/get-request-types')
                .then(function (response) {
                    self.request_types = response.data;
                })
                  .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });;
        },

        getpriority() {
            const self = this;
            axios
                .get('/get-priority')
                .then(function (response) {
                    self.priorities = response.data;
                })
                  .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });;
        },
        getCustomerProject() {
            const self = this;
            axios
                .get('/projects-customer')
                .then(function (response) {
                    self.projects = response.data;
                   
                })
                  .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });;
        },
        createRequestType() {
            const self = this;
            self.$refs.RequestTypeAdd.create();
        },
        store(val) {
            const self = this;
            let data = {
                sent: val,
                title: self.title,
                request_type: self.request_type,
                project_id: self.project_id,
                description: self.description,
                //  status: 'new',
                priority: self.priority,
                customer_id: self.customer_id,
                office_id: self.office_id,
                dead_line_date: self.dead_line_date,
                note: self.note, //
                enginnering_type: self.enginnering_type,
            };
            console.log(data);
            if (this.$refs.form.validate()) {
                self.loading = true;
                axios
                    .post('request', data)
                    .then(function (response) {
                        self.loading = false;
                        self.$store.commit('showSnackbar', {
                            message: response.data.msg,
                            color: response.data.success,
                        });

                        if (response.data.success === true) {
                            //   self.dialog = false;
                            self.$eventBus.$emit('updateTicketsTable');
                            self.goBack();
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }

            //self.reset();
        },
        updateEmployee(value) {
            const self = this;
            axios
                .get('get-customer-project/' + value)
                .then(function (response) {
                    self.customer_id = response.data.id;
                })
                  .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });;
        },
    },
};
</script>
