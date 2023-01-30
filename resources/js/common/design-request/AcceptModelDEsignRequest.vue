<template>
    <div justify="center">
            <v-dialog v-model="dialog" persistent max-width="600px">
                <v-card>
                    <v-card-title > <span class="text-h2">{{trans('data.accept_design_request')}}</span>  </v-card-title>
                    <v-card-text>
                        <v-form ref="form" v-model="valid" lazy-validation>
                            <v-container>
                                <div v-if="enginners.length <= 0">
                                    <v-layout row v-for="(input, k) in inputs" :key="k">
                                        <v-flex xs12 md6>
                                            <v-text-field
                                                v-model="input.stages[k].value"
                                                :label="trans('data.stage')"
                                                data-vv-name="enginnering_type"
                                                :data-vv-as="trans('data.enginnering_type')"
                                                :error-messages="errors.collect('enginnering_type')"
                                                required
                                            >
                                            </v-text-field>
                                        </v-flex>
                                        <v-flex xs12 md6>
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
                                @click="viewProject(project.id)">
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
import store from '../../store'
export default {
    name: 'permission',
    data() {
        return {
             valid: true,
            users: [],
            enginners: [],
            arr: [],
            dialog: false,
            dead_line_date: null,
            loading: false,
            status: '',
            office_id: null,
            id: '',
            design_id: '',
            inputs: [],
            is_show: false,
            enginnering_types: [],
            project: null
        };
    },
    mounted() {
        const self = this;
        self.getEnginneringTypes();
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
            var filtered = [];
            // alert(JSON.stringify(this.arr))
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
            // this.arr[key]=value;

            axios
                .post('/enginner_office/get-office-empoloyees-specialty', {
                    office_id: self.office_id,
                    specialty_id: value,
                })
                .then(function (response) {
                    self.inputs[key].users = response.data;
                    //return ;
                })
               .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
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
        create(data) {
            const self = this;
            self.dialog = true;
            self.project = data.project
            self.fillData(data);
        },
        fillData(data) {
            const self = this;
            self.status = data.status;
            self.office_id = data.office_id;
            self.design_id = data.id;

            axios
                .post('/enginner_office/get-stages-design-request', {
                    office_id: self.office_id,
                    design_id: self.design_id,
                })
                .then(function (response) {
                    if (response.data.employee_data.length > 0) {
                        var tmp = response.data.employee_data;

                        var stages = response.data.stages;

                        for (var i = 0; i < tmp.length; i++) {
                            self.inputs.push({
                                // type: tmp[i] != undefined ? tmp[i].name : ' ',
                                stage_id: tmp[i] != undefined ? tmp[i].id : '',
                                enginner_id: '',
                                order:tmp[i] != undefined ? tmp[i].order : '',
                                stages: stages,
                                users: tmp[i] != undefined ? tmp[i].employees : [],
                            });
                        }
                    }
                })
               .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
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
               .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });
        },

        //
        save() {
            const self = this;

            let data = {
                stages: self.inputs,
                design_id:self.design_id
            };
            
             if (this.$refs.form.validate()) {
                self.loading = true;
                axios.post('/enginner_office/accept-design-request', data).then(function (response) {
                    if (response.data.success) {
                        self.loading = false;
                        self.dialog = false;
                        self.reset();
                        self.resetValidation();
                        self.inputs.splice(1);
                        self.$emit('next');
                        self.$store.commit('hideLoader');
                        self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });
                        self.inputs = [];
                       self.$eventBus.$emit('DESIGN_ADDED', response.data);

                    } else {
                        self.$store.commit('hideLoader');
                        self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
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
               .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
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