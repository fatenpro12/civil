<template>
    <v-layout row justify-center>
        <v-dialog v-model="dialog" persistent max-width="600px">
            <v-card>
                <v-card-title>
                    <v-icon>assignment</v-icon>
                    <span class="headline">
                        {{ trans('data.edit_design') }}
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
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="green darken-1" flat @click="close">
                        {{ trans('data.cancel') }}
                    </v-btn>
                    <v-btn
                        color="success"
                        @click="update"
                        :loading="loading"
                        :disabled="!valid || !checkActive()"
                    >
                        {{ trans('messages.save') }}
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
        };
    },
    mounted() {
        const self = this;
    },
    created() {
        const self = this;
        self.getCustomerProject();
        self.getCustomers();
        self.getOffices();
    },
    beforeDestroy() {
        const self = this;
    },
    filters: {
        filterCategories: function (categories, project_id) {
            var project_id = project_id;
            var filteredCategories = [];

            _.forEach(categories, function (category) {
                if (category.project_id == project_id) {
                    filteredCategories.push(category);
                }
            });

            return filteredCategories;
        },
    },
    methods: {
        close() {
            const self = this;
            self.loading = false;
            self.dialog = false;
            this.$refs.form.resetValidation();
            this.$refs.form.reset();
        },
        create(data) {
            const self = this;
            self.design =data 
            self.dialog = true;
        },
        reset() {
            this.$refs.form.reset();
        },
        resetValidation() {
            this.$refs.form.resetValidation();
        },
        update() {
            const self = this;
            let data = {
               
                   customer_id : self.design.customer_id,
                   project_id : self.design.project_id,
                   office_id: self.design.office_id,
                    note: self.design.note

            }
                ;
            if (this.$refs.form.validate()) {
                self.loading = true;
                axios
                    .put('/estate_owner/request-contractor/' + self.design.id, data)
                    .then(function (response) {
                        if (response.data.success) {
                            self.loading = false;
                            self.dialog = false;
                            self.reset();
                            self.resetValidation();
                            if (response.data.success === true) {
                                self.$eventBus.$emit('DESIGN__UPDATED', response.data);
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
        updateEmployee(value, key) {
            const self = this;
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
                .get('/projects-customer')
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
                .get('/estate_owner/customers')
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
                .get('/get-contractors')
                .then(function (response) {
                    self.contractors = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
};
</script>
