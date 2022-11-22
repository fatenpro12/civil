<template>
    <v-layout row justify-center>
        <v-dialog v-model="dialog" width="1000">
            <v-card>
                <v-card-title>
                    <v-icon medium>category</v-icon>
                    <span class="headline">
                        {{ trans('data.add_agency') }}
                    </span>
                    <v-spacer></v-spacer>
                    
                    <v-btn @click="dialog = false" icon> <v-icon>clear</v-icon> </v-btn>
                </v-card-title>
                <v-divider></v-divider>
                <v-card-text>
                    <v-container grid-list-md>
                        <v-layout row wrap>
                            <v-flex md3>
                                <v-text-field
                                    v-model="trade_name"
                                    v-validate="'required'"
                                    data-vv-name="name"
                                    :label="trans('data.trade_name')"
                                    :error-messages="errors.collect('name')"
                                    required
                                >
                                </v-text-field>
                            </v-flex>
                            <v-flex md3>
                                <v-text-field
                                    v-model="record_number"
                                    :label="trans('data.record_number')"
                                ></v-text-field>
                            </v-flex>
                            <v-flex md3>
                                <v-text-field
                                    :label="trans('messages.email')"
                                    v-model="email"
                                    v-validate="'required|email'"
                                    data-vv-name="email"
                                    :data-vv-as="trans('messages.email')"
                                    :error-messages="errors.collect('email')"
                                    required
                                ></v-text-field>
                            </v-flex>
                            <v-flex md3>
                                <v-text-field
                                    v-model="mobile"
                                    type="number"
                                    :label="trans('messages.mobile')"
                                ></v-text-field>
                            </v-flex>
                        </v-layout>
                        <v-layout row wrap>
                            <v-flex md3>
                                <v-text-field
                                    v-model="delegate_record"
                                    :label="trans('data.delegate_record')"
                                ></v-text-field>
                            </v-flex>
                            <v-flex md3>
                                <v-text-field
                                    v-model="agency_number"
                                    :label="trans('data.agency_number')"
                                ></v-text-field>
                            </v-flex>
                            <v-flex md3>
                                <v-text-field
                                    v-validate="'required'"
                                    v-model="agent_name"
                                    :label="trans('data.agent_name')"
                                    data-vv-name="agent_name"
                                    :data-vv-as="trans('data.agent_name')"
                                    :error-messages="errors.collect('agent_name')"
                                    required
                                >
                                </v-text-field>
                            </v-flex>
                            <v-flex md3>
                                <v-text-field
                                    v-model="agent_card_number"
                                    :label="trans('data.agent_card_number')"
                                ></v-text-field>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-text>
                <v-divider></v-divider>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color=" darken-1" style="color: #06706d" @click="dialog = false">
                        {{ trans('messages.close') }}
                    </v-btn>
                    <v-btn
                        style="background-color: #06706d; color: white"
                        @click="store"
                        :loading="loading"
                        :disabled="loading"
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
            customers: [],
            dialog: false,
            loading: false,
            trade_name: null,
            record_number: null,
            delegate_record: null,
            agency_number: null,
            agent_name: null,
            agent_card_number: null,
            email: null,
            mobile: null,
        };
    },
    methods: {
        create() {
            const self = this;
            self.name = null;
            //  (self.type = data.type), self.$validator.reset();
            self.dialog = true;
        },
        reset(){
             const self = this;
            self.trade_name= '',
           self.record_number = null;
            self.agency_number =null;
            self.delegate_record = null;
            self.agent_name ='';
            self.agent_card_number = null;
            self.email = '';
            self.mobile = null;
        },
        store() {
            const self = this;
            var data = {
                trade_name: self.trade_name,
                record_number: self.record_number,
                agency_number: self.agency_number,
                delegate_record: self.delegate_record,
                agent_name: self.agent_name,
                agent_card_number: self.agent_card_number,
                email: self.email,
                mobile: self.mobile,
            };
            self.$validator.validateAll().then((result) => {
                if (result == true) {
                    self.loading = true;
                    axios
                        .post('/add-agency', data)
                        .then(function (response) {
                           
                            self.loading = false;
                            self.dialog = false;
                            (self.trade_name = data.trade_name),
                                (self.record_number = data.record_number),
                                (self.elegate_record = data.delegate_record),
                                (self.agency_number = data.agency_number),
                                (self.agent_name = data.agent_name),
                                (self.agent_card_number = data.agent_card_number),
                                (self.email = data.email),
                                (self.mobile = data.mobile),
                                
                            /*   self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });
*/
                            //  if (response.data.success === true) {
                            //      self.$eventBus.$emit('updateRequestTypeList', response.data);
                            //    }
                            self.reset();
                            self.$emit('fillAgencyData', response.data);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }
            });
        },
    },
};
</script>
