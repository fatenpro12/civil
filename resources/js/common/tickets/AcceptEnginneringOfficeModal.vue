<template>
    <div justify="center">
            <v-dialog v-model="dialog" persistent max-width="550px">
                <v-card>
                    <v-card-text>
                        <v-form ref="form" v-model="valid" lazy-validation>
                            <v-container>
                                    <div cols="12" sm="6">
                                        <v-datetime-picker
                                            :label="trans('data.visit_datetime')"
                                            :datetime="dead_line_date"
                                            v-model="dead_line_date"
                                        >
                                        </v-datetime-picker>
                                    </div>
                                <v-layout row v-if="enginners.length > 0">
                                    <v-flex xs12 md12>
                                        <v-autocomplete
                                            item-text="name"
                                            item-value="id"
                                            :items="users"
                                            multiple
                                            v-model="enginners"
                                            :rules="[
                                                (v) =>
                                                    !!v ||
                                                    trans('messages.required', {
                                                        name: trans('data.enginner'),
                                                    }),
                                            ]"
                                            :label="trans('data.enginner')"
                                            @change="(event) => updatevalues(event, k)"
                                            :error-messages="errors.collect('enginner')"
                                            required
                                        ></v-autocomplete>
                                    </v-flex>
                                </v-layout>
                                <div v-if="enginners.length <= 0">
                                    <v-layout row v-for="(input, k) in inputs" :key="k">
                                        <v-flex xs12 md5>
                                            <v-autocomplete
                                                item-text="name"
                                                item-value="id"
                                                :items="users"
                                                v-model="input.enginner_id"
                                                :rules="[
                                                    (v) =>
                                                        !!v ||
                                                        trans('messages.required', {
                                                            name: trans('data.enginner'),
                                                        }),
                                                ]"
                                                :label="trans('data.enginner')"
                                                @change="(event) => updatevalues(event, k)"
                                                :error-messages="errors.collect('enginner')"
                                                required
                                            ></v-autocomplete>
                                        </v-flex>
                                        <v-flex xs12 md3>
                                            <v-checkbox
                                                v-model="input.isDefault"
                                                :label="trans('data.is_default')"
                                            ></v-checkbox>
                                        </v-flex>
                                        <v-flex xs12 md4>
                                            <v-btn
                                                @click="add(k)"
                                                small
                                                v-show="k == inputs.length - 1 && !isEdit"
                                                fab
                                                style="background-color: #06706d; color: white"
                                            >
                                                <v-icon dark> add </v-icon>
                                            </v-btn>
                                            <v-btn
                                                @click="remove(k)"
                                                v-show="k || (!k && inputs.length > 1 && !isEdit)"
                                                small
                                                fab
                                                color="red"
                                                dark
                                            >
                                                <i class="fas fa-minus-circle"></i>
                                            </v-btn>
                                        </v-flex>
                                    </v-layout>
                                </div>
                            </v-container>
                        </v-form>
                    </v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn style="color: #06706d" text @click="close()">
                            {{ trans('data.cancel') }}
                        </v-btn>
                        <v-btn
                            style="background-color: #06706d; color: white"
                            color="darken-1"
                            @click="save()"
                            :loading="loading"
                            :disabled="loading"
                            text
                        >
                            {{ trans('data.save') }}
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
    </div>
</template>
<style scoped>
.style_rtl {
    padding-left: 5px;
}

.style_ltr {
    padding-right: 5px;
}
</style>
<script>
export default {
    name: 'permission',
    data() {
        return {
            valid: true,
            users: [],
            enginners: [],
            dialog: false,
            dead_line_date: null,
            loading: false,
            status: '',
            office_id: null,
            isEdit:false,
            id: '',
            inputs: [
                {
                    enginner_id: '',
                    isDefault: '',
                },
            ],
        };
    },
    mounted() {
        const self = this;
        self.loadUsers();

        self.setCurrentUser();
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
    methods: {
        close() {
            const self = this;
            self.dialog = false;
            self.loading = false;
            self.reset();
            self.resetValidation();
            self.inputs.splice(1);
        },
        reset() {
            this.$refs.form.reset();
        },
        resetValidation() {
            this.$refs.form.resetValidation();
        },

        add() {
            this.inputs.push({
                enginner_id: '',
                isDefault: '',
            });
            console.log(this.inputs);
        },

        remove(index) {
            this.inputs.splice(index, 1);
        },
        updatevalues(value, key) {
            const self = this;
            // self.current_customer = value;
        },
        //detects location from browser
        loadUsers() {
            const self = this;
        },
        setCurrentUser() {
            const self = this;
            axios.get('/get-current-user').then(function (response) {
                if (!response.data.error_code) {
                    let user = response.data.data.original;
                    self.enginner = user.id;
                } else {
                    self.$store.commit('hideLoader');
                    self.$store.commit('showSnackbar', {
                        message: response.data.error_description,
                        color: 'red',
                    });
                }

                //  self.resetvalues(1);
            });
        },
        create(id) {
            const self = this;
            self.getDefaultMembers(id);
            //  alert(id)
            self.dialog = true;
        },
        fillData(data) {
            const self = this;
            self.status = data.status;
            self.office_id = data.office_id;
            self.id = data.id;
            axios
                .get('get-office-empoloyees/' + self.office_id)
                .then(function (response) {
                    //self.gender_types = response.data.gender_types;
                    self.users = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        save() {
            const self = this;

            let data = {
                id: self.id,
                default_enginners: self.inputs,
                dead_line_date: self.dead_line_date,
                enginners: self.enginners,
            };

            if (this.$refs.form.validate()) {
                self.loading = true;
                axios.post('/accept-project', data).then(function (response) {
                    if (!response.data.error_code) {
                        self.loading = false;
                        self.dialog = false;
                        self.reset();
                        self.resetValidation();
                        self.inputs.splice(1);
                        self.$emit('next');
                        self.$store.commit('hideLoader');
                        self.$store.commit('showSnackbar', {
                            message: response.data.data,
                            color: 'green',
                        });
                    } else {
                        self.$store.commit('hideLoader');
                        self.$store.commit('showSnackbar', {
                            message: response.data.error_description,
                            color: 'red',
                        });
                    }
                });
            }
        },

        getDefaultMembers(id) {
            const self = this;
            axios
                .get('get-default-members/' + id)
                .then(function (response) {
                    // if (response.data.length > 0) {
                    //     self.enginners = response.data;
                    //     self.inputs = [
                    //         {
                    //             enginner_id: '',
                    //             isDefault: '',
                    //         },
                    //     ];
                    // }
                })
                .catch(function (error) {
                    self.type = '-';
                });
            return self.type;
        },
    },
};
</script>