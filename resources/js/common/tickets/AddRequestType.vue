<template>
    <v-layout row justify-center>
        <v-dialog v-model="dialog" width="500">
            <v-card>
                <v-card-title>
                    <v-icon medium>category</v-icon>
                    <span class="headline">
                        {{ trans('data.visit_request') }}
                    </span>
                    <v-spacer></v-spacer>
                    <v-btn @click="dialog = false" icon> <v-icon>clear</v-icon> </v-btn>
                </v-card-title>
                <v-divider></v-divider>
                <v-card-text>
                    <v-container grid-list-md>
                        <v-layout row wrap>
                            <v-flex xs12 sm12 md12>
                                <v-text-field
                                    v-model="name"
                                    :label="trans('messages.name')"
                                    v-validate="'required'"
                                    data-vv-name="name"
                                    :data-vv-as="trans('messages.name')"
                                    :error-messages="errors.collect('name')"
                                    required
                                >
                                </v-text-field>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-text>
                <v-divider></v-divider>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color=" darken-1" style="color:#06706d;"  @click="dialog = false">
                        {{ trans('messages.close') }}
                    </v-btn>
                    <v-btn style="background-color:#06706d;color:white;"  @click="store" :loading="loading" :disabled="loading">
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
            dialog: false,
            name: null,
            type: null,
            loading: false,
        };
    },
    methods: {
        create() {
            const self = this;
            self.name = null;
          //  (self.type = data.type), self.$validator.reset();
            self.dialog = true;
        },
        store() {
            const self = this;
            let data = {
                name: self.name,
            };
            self.$validator.validateAll().then(result => {
                if (result == true) {
                    self.loading = true;
                    axios
                        .post('/request-type', data)
                        .then(function(response) {
                            self.loading = false;
                            self.dialog = false;
                         /*   self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });
*/
                          //  if (response.data.success === true) {
                                self.$eventBus.$emit('updateRequestTypeList', response.data);
                        //    }
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                }
            }); 
        },
    },
};
</script>
