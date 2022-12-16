<template>
    <div justify="center">
            <v-dialog v-model="dialog" persistent max-width="750px">
                <v-card>
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
                                            :error-messages="errors.collect('enginner')"
                                            required
                                        ></v-autocomplete>
                                    </v-flex>
                                </v-layout>
                                <div v-if="enginners.length <= 0">
                                    <v-layout row v-for="(input, k) in inputs" :key="k">
                                        
                                        <v-flex xs12 md4>
                                            <v-text-field
                                                v-model="input.enginnering_types.find(x => x.key === input.specialty_id).value"
                                                :label="trans('data.enginnering_type')"
                                                data-vv-name="enginnering_type"
                                                :data-vv-as="trans('data.enginnering_type')"
                                                :error-messages="errors.collect('enginnering_type')"
                                                required
                                            >
                                        
                                            </v-text-field>
                                        </v-flex>
                                        <v-flex xs12 md3>
                                            <v-autocomplete
                                                item-text="name"
                                                item-value="id"
                                                :items="input.users"
                                                v-model="input.enginner_id"
                                                :rules="[
                                                    (v) =>
                                                        !!v ||
                                                        trans('messages.required', {
                                                            name: trans('data.enginner'),
                                                        }),
                                                ]"
                                                :label="trans('data.enginner')"
                                                
                                                :error-messages="errors.collect('enginner')"
                                                required
                                            ></v-autocomplete>
                                        </v-flex>
                                        <v-flex xs12 md2>
                                            <v-checkbox
                                                v-model="input.isDefault"
                                                :label="trans('data.is_default')"
                                            ></v-checkbox>
                                        </v-flex>
                                        <v-flex xs12 md3 v-if="is_show">
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
                               <v-btn  dark
                                color="teal"
                                @click="viewProject(project)">
                            {{ trans('data.project_info') }}
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
            request_id: '',
            inputs: [],
            is_show: false,
            enginnering_types: [],
            valid: true,
            project: null
        };
    },
    mounted() {
        const self = this;
        self.getEnginneringTypes();
        self.setCurrentUser();
        console.log(self.inputs,self.enginnering_types)
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
            self.inputs = [];
            self.arr = [];
            self.is_show = false;
        },
        reset() {
            this.$refs.form.reset();
        },
        resetValidation() {
            this.$refs.form.resetValidation();
        },

        add(k) {
            const myArrayFiltered = this.enginnering_types.filter((array) =>
                this.arr.every((filter) => !(filter === array.key))
            );
            if (this.inputs[k].enginner_id != '') {
                this.inputs.push({
                    enginner_id: '',
                    isDefault: '',
                    users: [],
                    enginnering_types: myArrayFiltered,
                });
            } else {
                alert('please fill field');
            }
        },

        remove(index) {
            this.arr.splice(index, 1);
            this.inputs.splice(index, 1);
        },
        updatevalues1(value, key) {
            const self = this;
            self.arr.push(value);

            axios
                .post('/enginner_office/get-office-empoloyees-specialty', {
                    office_id: self.office_id,
                    specialty_id: value,
                })
                .then(function (response) {
                    self.inputs[key].users = response.data;
                    console.log(self.inputs)
                })
                .catch(function (error) {
                    console.log(error);
                });

            // self.current_customer = value;
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
        fillData(data) {
            const self = this;
             self.dialog = true;
            self.status = data.status;
            self.office_id =  data.office_id;
            self.request_id = data.id;

            axios
                .post('/enginner_office/get-office-empoloyees-request', {
                    office_id: self.office_id,
                    request_id: self.request_id,
                })
                .then(function (response) {
                    if (response.data.length > 0) {
                        let tmp = response.data;
                        
                        for (var i = 0; i < tmp.length; i++) {
                            self.inputs.push({
                                // type: tmp[i] != undefined ? tmp[i].name : ' ',
                                specialty_id: tmp[i] != undefined ? tmp[i].id : '',
                                enginner_id: '',
                                enginnering_types: self.enginnering_types,
                                isDefault: '',
                                users: tmp[i] != undefined ? tmp[i].employees : [],
                            });
                        }
                        console.log(self.inputs)
                    } else {
                        self.is_show = true;
                        self.inputs.push({
                            type: ' ',
                            specialty_id: null,
                            enginner_id: '',
                            isDefault: '',
                            enginnering_types: self.enginnering_types,
                            users: [],
                        });
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        getEmployeeSpecialty(specialty_id) {
            const self = this;
            axios
                .post('/enginner_office/get-office-empoloyees-specialty', {
                    office_id: self.office_id,
                    specialty_id: specialty_id,
                })
                .then(function (response) {
                    return response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        //
        save() {
            const self = this;

            let data = {
                id: self.request_id,
                default_enginners: self.inputs,
                dead_line_date: self.dead_line_date,
                enginners: self.enginners,
            };

            if (this.$refs.form.validate()) {
                self.loading = true;
                axios.post('/enginner_office/accept-project', data).then(function (response) {
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
                        self.inputs = [];
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