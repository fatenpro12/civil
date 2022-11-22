<template>
    <v-layout row justify-center>
        <!--<Location ref="locationInfo" @savedLocation="saveLocation"/>-->
        <v-dialog v-model="dialog" persistent max-width="600px">
            <v-card>
                <v-card-title>
                    <v-icon>assignment</v-icon>
                    <span class="headline">
                        {{ trans('data.create_contractor_request') }}
                    </span>
                    <v-spacer></v-spacer>
                    <v-btn flat icon @click="dialog = false"> <v-icon>clear</v-icon> </v-btn>
                </v-card-title>
                <v-divider></v-divider>
                <v-card-text>
                    <v-form ref="form" v-model="valid" lazy-validation>
                        <v-container grid-list-md>
                            <v-layout row wrap>
                                <v-flex xs12 sm6 md6>
                                    <v-autocomplete
                                        item-text="name"
                                        item-value="id"
                                        :items="projects"
                                        v-model="design.project_id"
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
                                        v-model="design.customer_id"
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
                                <v-flex xs12 sm12 md12>
                                    <v-autocomplete
                                        item-text="name"
                                        item-value="id"
                                        :items="contractors"
                                        v-model="design.office_id"
                                        @change="allOffices"
                                        clearable
                                        :label="trans('data.contractors')"
                                        :rules="[
                                            (v) =>
                                                !!v ||
                                                trans('messages.required', {
                                                    name: trans('data.enginnering_office_name'),
                                                }),
                                        ]"
                                        multiple
                                        required
                                    ></v-autocomplete>
                                </v-flex>
                            </v-layout>
                            <v-layout row>
                                <v-flex xs12 sm12 md12>
                                    <v-text-field
                                        v-model="design.note"
                                        :label="trans('data.note')"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-form>
                </v-card-text>
                <v-card-actions class="flex-wrap">
                    <v-spacer></v-spacer>
                    <v-btn color="green darken-1" flat @click="close">
                        {{ trans('data.cancel') }}
                    </v-btn>
                           <!-- <v-btn color="white darken-1" class="bg-gray-600" flat @click="openLocation">
                        {{ trans('data.location_info') }}
                    </v-btn>-->
                    <v-btn
                        :disabled="!valid || !checkActive()"
                        color="success"
                        class="mr-4"
                        @click="store(0)"
                    >
                        {{ trans('data.draft') }}
                    </v-btn>
                    <v-btn color="success" @click="store(1)" :disabled="!valid || !checkActive()">
                        {{ trans('data.send') }}
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-layout>
</template>

<script>
export default {
    data() {
        return {
            valid: true,
            dialog: false,
            design: {
                customer_id: null,
            },
            contractors: [],
            customers: [],
            projects: [],
            loading: false,
            location_id: null,
            project: null
        };
    },

    created() {
        const self = this;
        self.getCustomerProject();
        self.getCustomers();
        self.getContractors();
    },
    mounted() {
        const self = this;
    },
    computed: {},
    beforeDestroy() {
        const self = this;
        self.$eventBus.$off('DESIGN_ADDED');
    },
    methods: {
        allOffices(event){
if(event.find(val => val === 'all_offices')){
    this.design.office_id = this.contractors.map(val => val.id)
    this.design.office_id = this.design.office_id.filter(x => x!=='all_offices')
}
        },
          saveLocation(event){
           this.location_id = event
        },
          openLocation(){
            this.$refs.locationInfo.openLocationDialog()
        },
        close() {
            const self = this;
            self.loading = false;
            self.dialog = false;
            this.$refs.form.resetValidation();
            this.$refs.form.reset();
        },
        create() {
            const self = this;
            self.dialog = true;
        },
        reset() {
            this.$refs.form.reset();
        },
        resetValidation() {
            this.$refs.form.resetValidation();
        },

        store(sent) {
            const self = this;
            let data = self.design;
            data['sent'] = sent;
            data['location_id'] = self.location_id

            if (this.$refs.form.validate()) {
                self.loading = true;
                axios
                    .post('/enginner_office/request-contractor', data)
                    .then(function (response) {
                        if (response.data.success) {
                            self.loading = false;
                            self.dialog = false;
                            self.reset();
                            self.resetValidation();
                            if (response.data.success === true) {
                                self.$eventBus.$emit('DESIGN_ADDED', response.data);
                            }
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
                        console.log(error);
                    });
            }
        },

        //////get data/////
        updateEmployee(value) {
            const self = this;
               self.getProject(value)
            self.getContractors();
            axios
                .get('get-customer-project/' + value)
                .then(function (response) {
                    self.design.customer_id = response.data.id;
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
        getCustomers() {
            const self = this;
            axios
                .get('/customers')
                .then(function (response) {
                    self.customers = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        getContractors() {
            const self = this;
            axios
                .get('/get-contractors')
                .then(function (response) {
                    self.contractors = response.data.filter(val => val.id==='all_offices' || val.location_data == self.project.location.province_municipality);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
};
</script>
