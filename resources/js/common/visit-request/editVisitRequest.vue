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
                                    @change="(event) => updateEmployee(event, k)"
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
                                                name: trans('messages.customer'),
                                            }),
                                    ]"
                                    required
                                    return-object
                                ></v-autocomplete>
                            </v-flex>

                            <v-flex xs12 sm6 md6>
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
                                    <!-- <Popover
                                    slot="append"
                                    :helptext="trans('messages.project_member_tooltip')"
                                >
                                </Popover> -->
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

                        <v-layout row wrap> </v-layout>
                    </v-container>
                </v-card-text>
                <v-divider></v-divider>
                <v-layout justify-center>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="error" class="mr-4" @click="reset">
                            {{ trans('data.reset') }}
                        </v-btn>
                        <v-btn
                            :disabled="!valid || !checkActive()"
                            color="success"
                            class="mr-4"
                            @click="update"
                        >
                            {{ trans('messages.update') }}
                        </v-btn>
                        <v-btn style="color: #06706d" @click="$router.go(-1)">
                            {{ trans('messages.back') }}
                        </v-btn>
                    </v-card-actions>
                </v-layout>
            </v-form>
        </v-card>
    </v-container>
</template>
<script>
export default {
    components: {},
    props: {
        propRequestId: {
            required: true,
        },
    },
    data() {
        return {
            valid: true,
            id: '',
            type: '',
            projects: [],
            enginnering_types: [],
            visit_request: null,
            loading: false,
            title: '',
            request_type: '',
            project_id: '',
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
            note: '', //
            enginnering_type: '',
        };
    },
    created() {},
    beforeDestroy() {
        const self = this;
        self.$eventBus.$off('updateCategoryList');
    },
    mounted() {
        const self = this;

        self.getCustomerProject();
        self.getEnginneringTypes();
        self.getCustomers();
        self.getOffices();
        this.loadRequest(() => {});
        self.$eventBus.$on('updateRequestTypeList', (data) => {
            //  self.request_types = [];
            // self.request_types = data;
        });
    },
    methods: {
        validate() {
            this.$refs.form.validate();
        },
        reset() {
            this.$refs.form.reset();
        },
        resetValidation() {
            this.$refs.form.resetValidation();
        },
        loadRequest() {
            const self = this;
            axios.get('request/' + self.propRequestId).then(function (response) {
                var  tmp=response.data.msg;
                console.log(response.data)
                self.id = tmp.request.id;
                self.enginnering_type =
                    tmp.request.specialties != undefined
                        ? tmp.request.specialties.map((x) => x.id)
                        : '';
                self.request_types = tmp.request_types;
                self.request_type = tmp.request.request_type;
                self.project_id = tmp.request.projectId;
                self.status = tmp.request.status;
                self.customer_id = tmp.request.customer_id;
                self.office_id =tmp.request.offices[0];
                self.note = tmp.request.note;
                self.dead_line_date = tmp.request.dead_line_date;
            });
        },
        getCustomers() {
            const self = this;
            let link = ''
            if(self.getCurrentUser().user_type_log == 'ESTATE_OWNER')
             link = '/estate_owner/customers'
             else if(self.getCurrentUser().user_type_log == 'ENGINEERING_OFFICE_MANAGER')
             link ='/enginner_office/customers' 
            axios
                .get(link)
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
            self.note = ''; //
            self.enginnering_type = '';
        },

        getCustomerProject() {
            const self = this;
            axios
                .get('/projects-customer')
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
        updateEmployee(value, key) {
            const self = this;
            axios
                .get('get-customer-project/' + value)
                .then(function (response) {
                    self.customer_id = response.data[0].id;
                 //   self.customers = response.data
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
        update() {
            const self = this;
            let data = {
                title: self.title,
                request_type: self.request_type,
                project_id: self.project_id,
                description: self.description,
                status: 'new',
                priority: self.priority,
                customer_id: self.customer_id,
                office_id: self.office_id,
                note: self.note, //
                dead_line_date: self.dead_line_date,
                enginnering_type: self.enginnering_type,
            };
            if (this.$refs.form.validate()) {
                self.loading = true;
                axios
                    .put('/request/' + self.id, data)
                    .then(function (response) {
                        self.loading = false;
                        self.$store.commit('showSnackbar', {
                            message: response.data.msg,
                            color: response.data.success,
                        });

                        if (response.data.success === true) {
                             // self.reset();
                            self.goBack();
                           // self.$router.push({ name: 'visit_request_list' });
                        }
                      
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            } else {
                self.$store.commit('showSnackbar', {
                    message: 'املئ الحقول الضرورية',
                    color: 'error',
                    duration: 3000,
                });
            }
        },
    },
};
</script>
