<template>
    <v-container grid-list-md>
        <v-layout row pt-3>
            <v-flex xs12 sm12>
                <v-card class="elevation-3">
                    <v-card-title primary-title xs8 sm8>
                        <div>
                            <div class="headline">
                                {{ trans('data.review_project_data') }}
                            </div>
                        </div>
                    </v-card-title>
                    <v-divider></v-divider>
                    <v-card-text>
                        
                            <v-container grid-list-md>
                                <v-layout row wrap>
                                    <v-flex xs12 md6>
                                        <v-text-field
                                             :disabled="isEdit"
                                            v-model="project.name"
                                            :placeholder="trans('messages.name')"
                                            v-validate="'required'"
                                            data-vv-name="name"
                                            :data-vv-as="trans('messages.name')"
                                            :error-messages="errors.collect('name')"
                                            required
                                        >
                                        </v-text-field>
                                    </v-flex>
                                    
                                </v-layout>
                                <v-layout row wrap class="my-3">
                                    {{ trans('messages.description') }}
                                    <v-flex xs12 sm12 md12>
                                        
                                        <br />
                                        <quill-editor
                                        v-if="!isEdit"
                                        :disabled="isEdit"
                                          
                                            v-model="project.description"
                                        >
                                        </quill-editor>
                                        <div class="max-2" v-else v-html="project.description"></div>
                                    </v-flex>
                                </v-layout>
            
                                <v-layout wrap>
                                   
                                    <v-flex xs12 md4>
                                        <v-select
                                           :disabled="isEdit"
                                            item-text="value"
                                            item-value="key"
                                            :items="status"
                                            :class="$vuetify.breakpoint.xsOnly?'mt-5':''"
                                            v-model="project.status"
                                            :placeholder="trans('messages.status')"
                                            not_started
                                        ></v-select>
                                    </v-flex>
                                   
                                    <v-flex xs12 md4>
                                        <div class="v-input v-text-field theme--light">
                                            <div class="v-input__control">
                                                <div class="v-input__slot">
                                                    <div class="v-text-field__slot">
                                                          <label
                                                    aria-hidden="true"
                                                    class="
                                                        v-label
                                                        theme--light
                                                        
                                                        text-start
                                                        flat_picker_label
                                                    "
                                                    :class="label_active"
                                                    style="left:auto"
                                                >
                                                            {{ trans('messages.start_date') }}
                                                        </label>
                                                        <flat-pickr
                                                            v-model="project.start_date"
                                                            @input="label_active = 'v-label--active'"
                                                           :disabled="isEdit"
                                                            name="start_date"
                                                            
                                                            :config="flatPickerDate()"
                                                           
                                                        ></flat-pickr>
                                                    </div>
                                                </div>
                                                <div class="v-messages theme--light error--text">
                                                    {{ errors.first('start_date') }}
                                                </div>
                                            </div>
                                        </div>
                                    </v-flex>
                                          <v-flex xs12 md4>
                                        <div class="v-input v-text-field theme--light">
                                            <div class="v-input__control">
                                                <div class="v-input__slot">
                                                    <div class="v-text-field__slot">
                                                        <label
                                                    aria-hidden="true"
                                                    class="
                                                        v-label
                                                        theme--light
                                                        
                                                        text-start
                                                        flat_picker_label
                                                    "
                                                    :class="label_active2"
                                                    style="left:auto"
                                                >
                                                            {{ trans('messages.end_date') }}
                                                        </label>
                                                        <flat-pickr
                                                            v-model="project.end_date"
                                                            :disabled="isEdit"
                                                            name="end_date"
                                                            @input="label_active2 = 'v-label--active'"
                                                            :config="flatPickerDate()"
                                                        
                                                        ></flat-pickr>
                                                    </div>
                                                </div>
                                                <div class="v-messages theme--light error--text">
                                                    {{ errors.first('end_date') }}
                                                </div>
                                            </div>
                                        </div>
                                    </v-flex>
                                    <v-flex xs12 md4>
                                        <v-autocomplete
                                             class="content-sign"
                                               multiple
                                              :disabled="isEdit"
                                            :clearable="true"
                                            :deletable-chips="true"
                                            :dense="true"
                                            search-input=""
                                            :solo-inverted="false"
                                            :eager="true"
                                            :loading="false"
                                            :validate-on-blur="false"
                                            :persistent-placeholder="false"
                                             item-text="name"
                                            item-value="id"
                                            :items="users"
                                            :readonly="isEdit"
                                            v-model="project.users_id"
                                            :placeholder="trans('messages.members')"
                                            :rules="[
                                                (v) =>
                                                    !!v ||
                                                    trans('messages.required', {
                                                        name: trans('messages.members'),
                                                    }),
                                            ]"
                                            required
                                        >
                                            <Popover
                                                slot="append"
                                                :helptext="trans('messages.project_member_tooltip')"
                                            >
                                            </Popover>
                                        
                                        </v-autocomplete>

                                     
                                    </v-flex>
                              

                                    <v-flex xs12 md4>
                                        <v-text-field
                                            v-model="project.authorization_request_number"
                                            :disabled="isEdit"
                                            :placeholder="trans('data.authorization_request_number')"
                                         
                                        >
                                        </v-text-field>
                                    </v-flex>

                                    <v-flex xs12 md4>
                                        <v-text-field
                                            v-model="project.license_number"
                                            :disabled="isEdit"
                                            :placeholder="trans('data.license_number')"
                                         
                                        >
                                        </v-text-field>
                                    </v-flex>

                                    <v-flex xs12 md4>
                                        <v-text-field
                                            v-model="project.plot_number"
                                             :disabled="isEdit"
                                            :placeholder="trans('data.plot_number')"
                                          
                                        >
                                        </v-text-field>
                                    </v-flex>
                                   
                                    <v-flex xs12 md4>
                                        <v-text-field
                                            v-model="project.cadastral_decision_number"
                                            :disabled="isEdit"
                                            :placeholder="trans('data.cadastral_decision_number')"
                                           
                                        >
                                        </v-text-field>
                                    </v-flex>

                                    <v-flex xs12 md4>
                                        <v-autocomplete
                                            item-text="value"
                                            item-value="key"
                                             :disabled="isEdit"
                                            :items="buiding_types"
                                            v-model="project.buiding_type"
                                            :placeholder="trans('data.buiding_type')"
                                            return-object
                                        >
                                        </v-autocomplete>
                                    </v-flex>

                                    <v-flex xs12 md4>
                                        <v-text-field
                                            type="number"
                                            ref="input"
                                          :disabled="isEdit"
                                            :placeholder="trans('data.unit_number')"
                                            v-model.number="project.unit_number"
                                        ></v-text-field>
                                    </v-flex>
                                    <v-flex md4>
                                        <v-text-field
                                            v-model="project.build_rate"
                                            :placeholder="trans('data.build_rate')"
                                           :disabled="isEdit"
                                           
                                        ></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 md4>
                                        <v-autocomplete
                                            item-text="value"
                                            item-value="key"
                                           :disabled="isEdit"
                                            :items="project_types"
                                            v-model="project.project_type"
                                            :placeholder="trans('data.project_type')"
                                           return-object
                                        ></v-autocomplete>
                                    </v-flex>
                                    <v-flex md4>
                                        <v-autocomplete
                                            item-text="value"
                                            item-value="key"
                                            :disabled="isEdit"
                                            :items="roles_number"
                                            v-model="project.role_number"
                                            :placeholder="trans('data.role_number')"
                                        >
                                        </v-autocomplete>
                                    </v-flex>
                                    <v-flex md4>
                                        <v-autocomplete
                                            item-text="value"
                                            item-value="key"
                                            :disabled="isEdit"
                                            :items="using_types"
                                            v-model="project.using"
                                            :placeholder="trans('data.using')"
                                            return-object
                                        >
                                        </v-autocomplete>
                                    </v-flex>
                                </v-layout>
                            </v-container>
                            <v-container grid-list-md>
                                <v-layout row wrap> </v-layout>
                            </v-container>

                            <v-container grid-list-md>
                                <v-layout row wrap> </v-layout>
                            </v-container>
                
                    </v-card-text>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>
<script>
import Popover from '../../../../admin/popover/Popover';
import Document from './documnets.vue';
export default {
    components: {
        Popover,
        Document
    },
    props: ['projectId','compo_type'],
    data() {
        return {
            project_types: [],
            status: [],
            users: [],
            categories: [],
            loading: false,
label_active:"",
label_active2:"",
            customers: [],
            //    project: [],
            isEdit: false,
            project: {
                buiding_type: '',
                role_number: 0,
                unit_number: 0,
                build_rate: '',
                using: '',
                name: '',
                project_type: '',
                total_rate: '',
                authorization_request_number: '',
                license_number: '',
                //  type_of_request:'',
                plot_number: '',
                cadastral_decision_number: '',
                start_date: null,
                end_date: null,
                // customer_id:null,
                users_id: null,
                description: null,
                lead_id: null,
                status: null,
                id: '',
            },
            using_types: [],
            roles_number: [],
            buiding_types: [],
        };
    },
    created() {
        const self = this;
        // self.getProjectData();
        this.create();
    },
    methods: {
        create() {
            const self = this;
            // self.$validator.reset();
            self.category_id = [];
            (self.start_date = null),
                (self.end_date = null),
                axios.get('/projects/create').then(function (response) {
                    if (!response.data.error_code) {
                        self.customers = response.data.data.customers;
                        self.project_types = response.data.data.projectTypes;

                        self.status = response.data.data.status;
                        self.users = response.data.data.users;
                        self.categories = response.data.data.categories;
                        self.buiding_types = response.data.data.buildingTypes;
                        self.using_types = response.data.data.buildUsing;
                        self.roles_number = response.data.data.roles_number;
                        self.project.status = self.status.filter((c) => c.key == 'not_started')[0][
                            'key'
                        ];
                    } else {
                    }
                });
        },
        getProjectData() {
            const self = this;
            axios
                .post('getProject-Data')
                .then(function (response) {
                    // self.using_types=response.data.using_types;
                    self.roles_number = response.data.roles_number;
                    // self.building_types=response.data.building_types;

                    console.log(self.using_types);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        nextStep() {
            this.$validator.validateAll().then((result) => {
                //  alert(result)
                if (result == true) {
                    this.$emit('next', this.project);
                } else {
                  //  this.$refs.form.validate();
                }
            });
        },
        fillEditData(data, isEdit) {
            const self = this;
            self.project = data;
            self.isEdit = isEdit;
            self.users= self.project.members
            self.project.users_id = data.members.map(({ id }) => id);
            
        },
    },
};
</script>
<style scoped>
>>> .ql-container{
    max-height: 70%;
}
</style>