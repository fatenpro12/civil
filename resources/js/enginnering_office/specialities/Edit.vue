<template>
    <v-layout row justify-center>
        <v-dialog v-model="dialog" persistent max-width="600px">
            <v-card>
                <v-card-title>
                    <v-icon>assignment</v-icon>
                    <span class="headline">
                        {{ trans('data.edit_specialty') }}
                    </span>
                    <v-spacer></v-spacer>
                    <v-btn flat icon @click="dialog = false"> <v-icon>clear</v-icon> </v-btn>
                </v-card-title>
                <v-divider></v-divider>
                <v-card-text>
                    <v-form ref="form" v-model="valid" lazy-validation>
                        <v-container grid-list-md>
                            <v-layout row wrap>
                                <v-flex xs6 md6>
                                    <v-text-field
                                        v-model="name"
                                        required
                                        :label="trans('messages.name')"
                                        :rules="[
                                            (v) =>
                                                !!v ||
                                                trans('messages.required', {
                                                    name: trans('messages.subject'),
                                                }),
                                        ]"
                                    >
                                    </v-text-field>
                                </v-flex>
                                <v-flex xs6 md6>
                                    <v-text-field v-model="ar_name" :label="trans('data.ar_name')">
                                    </v-text-field>
                                </v-flex>

                                <v-flex xs6 md6>
                                    <v-text-field
                                        v-model="en_name"
                                        required
                                        :label="trans('data.en_name')"
                                    >
                                    </v-text-field>
                                </v-flex>
                                      <v-flex xs12 sm6 md4>
                                    <v-autocomplete
                                        item-text="name"
                                        item-value="id"
                                        :items="roles"
                                        v-model="role_id"
                                        :label="trans('data.role_name')"
                                        :data-vv-as="trans('data.role_name')"
                                        :error-messages="errors.collect('role_id')"
                                  
                                    required
                                    ></v-autocomplete>
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
                        @click="edit"
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
            name: '',
            id: '',
            ar_name: '',
            en_name: '',
            loading: false,
                 roles:[],
            role_id: null
        };
    },
    mounted() {
        const self = this;
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
            self.getRoles();
            self.id = data.id;
            self.name = data.name;
            self.role_id = data.role_id;
         (self.en_name = data.en_name), (self.ar_name = data.ar_name), (self.dialog = true);
        },
        reset() {
            this.$refs.form.reset();
        },
        resetValidation() {
            this.$refs.form.resetValidation();
        },
             getRoles(){
            const self = this;
            axios
                .get('/enginner_office/roles')
                .then(function(response) {
                    self.roles = response.data.data;
                    console.log(response.data.data)
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        /*create(project_id) {
            const self = this;
            self.projectId = project_id;
            if (project_id === null) {
                self.create_task_from_dashboard = true;
            }
            axios
                .get('/enginner_office/project-tasks/create', {
                    params: { project_id: self.projectId },
                })
                .then(function (response) {
                    if (response.data.success) {
                        console.log(response.data.msg.project.members);
                        self.task = [];
                        self.start_date = null;
                        self.category_id = null;
                        self.due_date = null;
                        self.$validator.reset();
                        self.priority = response.data.msg.priority;
                        self.dialog = true;
                        self.taskMembers = response.data.msg.project.members;
                        self.billingType = response.data.msg.project.billing_type;
                        self.project = response.data.msg.project;
                        self.categories = response.data.msg.categories;
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
        },*/
        edit() {
            const self = this;
            let data = {
                name: self.name,
                en_name: self.en_name,
                ar_name: self.ar_name,
                role_id: self.role_id
            };
            if (this.$refs.form.validate()) {
                self.loading = true;
                axios
                    .put('specialty/' + self.id, data)
                    .then(function (response) {
                        if (response.data.success) {
                            self.loading = false;
                            self.dialog = false;
                            self.reset();
                            self.resetValidation();
                            if (response.data.success === true) {
                                self.$eventBus.$emit('SPECIALTY_ADDED', response.data);
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
    },
};
</script>
