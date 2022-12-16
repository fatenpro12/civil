<template>
    <div justify="center">
            <v-dialog v-model="dialog" persistent max-width="550px">
                <v-card>
                    <v-card-title>{{ trans('data.enginnering_office') }}</v-card-title>
                    <v-card-text>
                        <v-form ref="form" v-model="valid" lazy-validation>
                            <v-container>
                                    <div cols="12" sm="6" style="direction=ltr">
                                        <v-datetime-picker
                                            :label="trans('data.visit_datetime')"
                                            :datetime="dead_line_date"
                                            :okText="trans('data.ok')"
                                            :clearText="trans('data.clear')"
                                            timeFormat="HH:mm"
                                            v-model="dead_line_date"
                                            :rules="[
                                                (v) =>
                                                    v.length ==0 ||
                                                    trans('messages.required', {
                                                        name: trans('data.visit_datetime'),
                                                    }),
                                            ]"
                                            required
                                        >
                                        </v-datetime-picker>
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
                            :disabled="loading || !checkActive()"
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
            users: [],
            enginners: [],
            arr: [],
            dialog: false,
            dead_line_date: null,
            loading: false,
            status: '',
            office_id: null,
            id: '',
            valid: true
        };
    },
    mounted() {
        const self = this;
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
            self.arr = [];
        },
        reset() {
            this.$refs.form.reset();
        },
        resetValidation() {
            this.$refs.form.resetValidation();
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
            });
        },
        create(data) {
            const self = this;
            self.dialog = true;
            self.id = data.id;
        },
        fillData(data) {
            const self = this;
            self.id = data.id;
           
        },
        save() {
            const self = this;

            let data = {
                request_id: self.id,
                dead_line_date: self.dead_line_date,
            };

            if (this.$refs.form.validate()) {
                self.loading = true;
                axios
                    .post('/enginner_office/accept-request-by-enginner', data)
                    .then(function (response) {
                        if (!response.data.error_code) {
                            self.loading = false;
                            self.dialog = false;
                            self.reset();
                            self.resetValidation();
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
                             self.loading = false;
                        }
                    });
            }
        },
    },
};
</script>