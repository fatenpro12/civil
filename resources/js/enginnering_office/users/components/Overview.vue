<template>
    <v-container grid-list-md>
        <v-layout wrap>
            <v-flex xs12 sm7 md7>
                <v-card elevation="4">
                    <v-card-title primary-title>
                        <v-icon>person</v-icon>
                        <h4 class="headline mb-0">{{ employee_data.name }}</h4>
                        <v-spacer></v-spacer>
                        <v-tooltip top>
                            <template slot="activator">
                                <v-icon>radio_button_checked</v-icon>
                                {{ trans('messages.' + employee_data.gender) }}
                            </template>

                            <span>{{ trans('messages.gender') }}</span>
                        </v-tooltip>
                    </v-card-title>
                    <v-divider></v-divider>
                    <v-card-text>
                        <v-layout wrap>
                            <v-flex xs12 sm6 md6>
                                <v-tooltip top>
                                    <template slot="activator">
                                        <v-icon>mobile_friendly</v-icon>
                                        {{ employee_data.mobile }}
                                    </template>

                                    <span>{{ trans('messages.mobile') }}</span>
                                </v-tooltip>
                            </v-flex>
                            <v-flex xs12 sm6 md6>
                                <v-tooltip top>
                                    <template slot="activator">
                                        <v-icon>mobile_friendly</v-icon>
                                        {{ employee_data.alternate_num }}
                                    </template>

                                    <span>{{ trans('messages.alternate_num') }}</span>
                                </v-tooltip>
                            </v-flex>
                        </v-layout>
                        <v-layout wrap>
                            <v-flex xs12 sm6 md6>
                                <v-tooltip top>
                                    <template slot="activator">
                                        <v-icon>cake</v-icon>
                                        {{ employee_data.birth_date | formatDate }}
                                    </template>

                                    <span>{{ trans('messages.date_of_birth') }}</span>
                                </v-tooltip>
                            </v-flex>
                            <v-flex xs12 sm6 md6>
                                <v-tooltip top>
                                    <template slot="activator">
                                        <v-icon>email</v-icon>
                                        {{ employee_data.email }}
                                    </template>

                                    <span>{{ trans('messages.email') }}</span>
                                </v-tooltip>
                            </v-flex>
                        </v-layout>
                        <v-layout wrap>
                            <v-flex xs12 sm6 md6>
                                <v-tooltip top>
                                    <template slot="activator">
                                        <v-icon>web</v-icon>
                                        {{ employee_data.skype }}
                                    </template>

                                    <span>{{ trans('messages.skype') }}</span>
                                </v-tooltip>
                            </v-flex>
                            <v-flex xs12 sm6 md6>
                                <v-tooltip top>
                                    <template slot="activator">
                                        <v-icon>public</v-icon>
                                        {{ employee_data.twitter }}
                                    </template>

                                    <span>{{ trans('messages.twitter') }}</span>
                                </v-tooltip>
                            </v-flex>
                        </v-layout>
                        <v-layout wrap>
                            <v-flex xs12 sm6 md6>
                                <v-tooltip top>
                                    <template slot="activator">
                                        <v-icon>public</v-icon>
                                        {{ employee_data.linkedin }}
                                    </template>

                                    <span>{{ trans('messages.linkedin') }}</span>
                                </v-tooltip>
                            </v-flex>
                            <v-flex xs12 sm6 md6>
                                <v-tooltip top>
                                    <template slot="activator">
                                        <v-icon>public</v-icon>
                                        {{ employee_data.facebook }}
                                    </template>

                                    <span>{{ trans('messages.facebook') }}</span>
                                </v-tooltip>
                            </v-flex>
                        </v-layout>
                        <v-layout wrap>
                          
                            <v-flex xs12 sm6 md6>
                                <v-tooltip top>
                                    <template slot="activator">
                                        <v-icon>location_on</v-icon>
                                        {{ employee_data.current_address }}
                                    </template>

                                    <span>{{ trans('messages.current_address') }}</span>
                                </v-tooltip>
                            </v-flex>
                            <v-flex xs12 sm6 md6>
                                <v-tooltip top>
                                    <template slot="activator">
                                        <v-icon>location_on</v-icon>
                                        {{ employee_data.home_address }}
                                    </template>

                                    <span>{{ trans('messages.home_address') }}</span>
                                </v-tooltip>
                            </v-flex>
                            <v-flex xs12 sm6 md6>
                                <v-tooltip top>
                                    <template slot="activator">
                                        <v-icon>note</v-icon>
                                        {{ employee_data.note }}
                                    </template>

                                    <span>{{ trans('messages.note') }}</span>
                                </v-tooltip>
                            </v-flex>
                        </v-layout>
                        <v-divider></v-divider>
                        <v-layout>
                            <v-flex xs12 sm6 md6>
                                <v-tooltip top>
                                    <template slot="activator">
                                        <v-icon>account_circle</v-icon>
                                        {{ employee_data.account_holder_name }}
                                    </template>

                                    <span>{{ trans('messages.account_holder_name') }}</span>
                                </v-tooltip>
                            </v-flex>
                            <v-flex xs12 sm6 md6>
                                <v-tooltip top>
                                    <template slot="activator">
                                        <v-icon>account_balance_wallet</v-icon>
                                        {{ employee_data.account_no }}
                                    </template>

                                    <span>{{ trans('messages.account_no') }}</span>
                                </v-tooltip>
                            </v-flex>
                        </v-layout>
                        <v-layout>
                            <v-flex xs12 sm6 md6>
                                <v-tooltip top>
                                    <template slot="activator">
                                        <v-icon>account_balance</v-icon>
                                        {{ employee_data.bank_name }}
                                    </template>

                                    <span>{{ trans('messages.bank_name') }}</span>
                                </v-tooltip>
                            </v-flex>
                            <v-flex xs12 sm6 md6>
                                <v-tooltip top>
                                    <template slot="activator">
                                        <v-icon>account_balance</v-icon>
                                        {{ employee_data.bank_identifier_code }}
                                    </template>

                                    <span>{{ trans('messages.bank_identifier_code') }}</span>
                                </v-tooltip>
                            </v-flex>
                        </v-layout>
                        <v-layout>
                            <v-flex xs12 sm6 md6>
                                <v-tooltip top>
                                    <template slot="activator">
                                        <v-icon>location_on</v-icon>
                                        {{ employee_data.branch_location }}
                                    </template>

                                    <span>{{ trans('messages.branch_location') }}</span>
                                </v-tooltip>
                            </v-flex>
                            <v-flex xs12 sm6 md6>
                                <v-tooltip top>
                                    <template slot="activator">
                                        <v-icon>verified_user</v-icon>
                                        {{ employee_data.tax_payer_id }}
                                    </template>

                                    <span>{{ trans('messages.tax_payer_id') }}</span>
                                </v-tooltip>
                            </v-flex>
                        </v-layout>
                          <v-layout>
                                       <v-flex xs12 sm6 md6>
                                <v-tooltip top>
                                    <template slot="activator">
                                        <v-icon>verified_user</v-icon>
                                        {{ employee_data.id_card_number }}
                                    </template>

                                    <span>{{ trans('messages.id_card_number') }}</span>
                                </v-tooltip>
                            </v-flex>
                        </v-layout>
                        <v-layout>
                            <v-flex xs12 sm12 md12>
                                <v-tooltip top>
                                    <template slot="activator">
                                        <v-icon>accessibility_new</v-icon>
                                        {{ enginnering_type }}
                                    </template>
                                    <span>{{ trans('data.speciality') }}</span>
                                </v-tooltip>
                            </v-flex>
                        </v-layout>
                    </v-card-text>
                    <v-card-actions justify-center>
                          <v-btn style="color: #06706d" @click="$router.go(-1)">
                            {{ trans('messages.back') }}
                        </v-btn>
                        <v-btn
                            v-if="$can('employee.edit')"
                            block
                            outline
                            color="accent"
                            @click="
                                $router.push({
                                    name: 'users.edit',
                                    params: { id: employee_data.id },
                                })
                            "
                        >
                            <v-icon>edit</v-icon>
                            {{ trans('messages.edit') }}
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>
<script>
export default {
    data() {
        return {
            userId: null,
            employee_data: [],
            enginnering_types: [],
            enginnering_type: '',
        };
    },
    created() {
        const self = this;
        self.userId = self.$route.params.id;

        self.getEnginneringTypes();
        self.show(self.userId);
    },
    mounted() {},
    methods: {
        getEnginneringTypes() {
            const self = this;
            axios
                .get('/get-enginnering-types')
                .then(function (response) {
                    self.enginnering_types = response.data;
                    //alert(JSON.stringify(self.employee_data))
                    //alert(JSON.stringify(response.data.find(x=>x.key==self.employee_data.enginnering_type)))
                    self.enginnering_type =
                        response.data.find((x) => x.key == self.employee_data.enginnering_type) !=
                        undefined
                            ? response.data.find(
                                  (x) => x.key == self.employee_data.enginnering_type
                              ).value
                            : '';
                })
                  .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });;
        },
        show(user_id) {
            const self = this;
            axios
                .get('/enginner_office/users/' + user_id)
                .then(function (response) {
                    self.employee_data = response.data;
                    // self.getEnginneringTypes();
                    axios
                        .get('/get-enginnering-types')
                        .then(function (response) {
                            self.enginnering_types = response.data;
                            self.enginnering_type = response.data.find(
                                (x) => x.key == JSON.parse(self.employee_data.enginnering_type)
                            ).value;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                })
                  .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });;
        },
    },
};
</script>
