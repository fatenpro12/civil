<template>
    <v-container row justify-center>
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
                            <!-- v-if="$hasRole('employee')" -->

                            <!-- v-if="$hasRole('employee')" -->
                            <!-- <v-flex xs12 sm4 md4>
                            <v-autocomplete
                                item-text="value"
                                item-value="key"
                                :items="priorities"
                                v-model="priority"
                                :label="trans('messages.priority')"
                            ></v-autocomplete>
                        </v-flex> -->
                            <!--    <v-flex xs1 sm1 md1>
                                <v-btn
                                    @click="$router.push({name: 'add-project'})"
                                    small
                                    fab
                                    dark
                                    style="background-color:#06706d;color:white;"
                                >
                                    <v-icon>add</v-icon>
                                </v-btn>
                            </v-flex>-->
                            <!--<v-flex xs12 sm6 md6>
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
                            </v-flex>-->

                            <v-flex xs12 sm12 md12>
                                <v-datetime-picker
                                    :label="trans('data.visit_datetime')"
                                    :datetime="dead_line_date"
                                    :okText="trans('data.ok')"
                                    :clearText="trans('data.clear')"
                                    v-model="dead_line_date"
                                    class="w-full"
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
                        <!-- <v-layout row>
                        <v-flex xs12 sm12 md12>
                            <v-textarea
                                rows="4"
                                v-model="description"
                                :label="trans('data.description')"
                                v-validate="'required'"
                                data-vv-name="description"
                                :data-vv-as="trans('data.description')"
                                :error-messages="errors.collect('description')"
                                required
                            ></v-textarea>
                        </v-flex>
                    </v-layout> -->

                        <v-layout row> </v-layout>
                        <!--    <v-layout row>
                            <v-flex xs12 sm6 md6 v-if="$hasRole('employee')">
                                <v-autocomplete
                                    item-text="value"
                                    item-value="key"
                                    :items="statuses"
                                    v-model="status"
                                    :label="trans('messages.status')"
                                    v-validate="'required'"
                                    data-vv-name="status"
                                    :data-vv-as="trans('messages.status')"
                                    :error-messages="errors.collect('status')"
                                    required
                                ></v-autocomplete>
                            </v-flex>
              
                        </v-layout>-->
                        <v-layout row wrap>
                            <!--    <v-flex xs12 sm6 md6 v-if="$hasRole('employee')">
                                <v-autocomplete
                                    item-text="name"
                                    item-value="id"
                                    :items="employees"
                                    v-model="assigned_to"
                                    :label="trans('messages.assigned_to')"
                                ></v-autocomplete>
                            </v-flex>-->
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
                        <v-btn
                            :disabled="!valid || !checkActive()"
                            color="success"
                            class="mr-4"
                            @click="store(1)"
                        >
                            {{ trans('data.send') }}
                        </v-btn>
                        <v-btn style="color: #06706d" @click="$router.go(-1)">
                            {{ trans('data.back') }}
                        </v-btn>
                        <!-- <v-btn :disabled="!valid ||!checkActive()" color="success" class="mr-4" @click="store(0)">
                            {{ trans('data.draft') }}
                        </v-btn> -->
                    </v-card-actions>
                </v-layout>
            </v-form>
        </v-card>
    </v-container>
</template>
<script>
export default {
    components: {},
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
        computedDateFormattedDatefns() {
            const self = this;
            return self.dead_line_date;
            // ? format(parseISO(self.location.instrument_date), 'EEEE, MMMM do yyyy')
            //  : '';
        },
    },
    created() {
        const self = this;
        self.reset();
        self.project_id = self.project_id = self.$route.params.project_id;
        self.customer_id = self.customer_id = self.$route.params.customer_id;
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
            axios
                .get('/enginner_office/customers')
                .then(function (response) {
                    self.customers = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        getOffices() {
            const self = this;
            axios
                .get('/get-offices')
                .then(function (response) {
                    self.engennering_offices = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        getEnginneringTypes() {
            const self = this;
            axios
                .get('/get-enginnering-types')
                .then(function (response) {
                    self.enginnering_types = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
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
                .catch(function (error) {
                    console.log(error);
                });
        },

        getpriority() {
            const self = this;
            axios
                .get('/get-priority')
                .then(function (response) {
                    self.priorities = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        getCustomerProject() {
            const self = this;
            axios
                .get('enginner_office/projects-request')
                .then(function (response) {
                    self.projects = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        createRequestType() {
            const self = this;
            self.$refs.RequestTypeAdd.create();
        },
        store(val) {
            const self = this;
            if(self.$hasRole('Engineer'))
            self.office_id = self.getCurrentUser().parent_id
            else
             self.office_id = self.getCurrentUser().id
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
                    .post('/enginner_office/request', data)
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
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
};
</script>
