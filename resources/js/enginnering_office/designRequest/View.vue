<template>
    <v-layout row justify-center>
        <v-dialog v-model="dialog" persistent max-width="600px">
            <v-card>
                <v-card-title>
                    <v-icon>assignment</v-icon>
                    <span class="headline">
                        {{ trans('data.view_design') }}
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
                                    <v-text-field
                                        v-model="design.project.name"
                                        :readonly="true"
                                        :label="trans('messages.customer')"
                                    ></v-text-field>
                                </v-flex>
                                <v-flex xs12 sm6 md6>
                                    <v-text-field
                                        v-model="design.customer.name"
                                        :readonly="true"
                                        :label="trans('messages.customer')"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>
                            <v-layout row>
                                <v-flex xs12 sm12 md12>
                                    <v-text-field
                                        v-model="design.office.name"
                                        :readonly="true"
                                        :label="trans('data.enginnering_office_name')"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>
                            <v-layout row>
                                <v-flex xs12 sm12 md12>
                                    <v-text-field
                                        v-model="design.note"
                                        :readonly="true"
                                        :label="trans('data.note')"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>
                            <v-container grid-list-md v-if="design.design_enginners.length > 0">
                                <h3>{{ trans('data.employees') }}</h3>
                                <v-layout
                                    v-for="enginner in design.design_enginners"
                                    :key="enginner.id"
                                >
                                    <v-flex xs12 md12>
                                        <v-card light>
                                            <v-card-text>
                                                <div>
                                                    <!-- <v-icon small>create</v-icon> -->
                                                    <h3>
                                                        {{ getEmployee(enginner.enginner_id) }}
                                                    </h3>
                                                    {{ trans('data.is_active') }}
                                                    ::
                                                    <!-- <v-icon small>date_range</v-icon> -->
                                                    <span>
                                                        <v-switch
                                                            :label="trans('data.is_active')"
                                                            v-model="enginner.is_active"
                                                            :disabled="true"
                                                        ></v-switch>
                                                    </span>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-flex>
                                </v-layout>
                            </v-container>
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
            design: {},
            loading: false,
        };
    },
    mounted() {
        const self = this;
    },
    created() {
        const self = this;
    },
    beforeDestroy() {
        const self = this;
    },

    methods: {
        getEmployee(user_id) {
            const self = this;
            axios
                .get('/admin/users/' + user_id + '/name')
                .then(function (response) {
                    self.employee = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        close() {
            const self = this;
            self.loading = false;
            self.dialog = false;
            //this.$refs.form.resetValidation();
         //   this.$refs.form.reset();
        },
        create(data) {
            const self = this;
            self.design = data;
            console.log(data)
            self.dialog = true;
        },
        reset() {
            this.$refs.form.reset();
        },
        resetValidation() {
            this.$refs.form.resetValidation();
        },
    },
};
</script>
