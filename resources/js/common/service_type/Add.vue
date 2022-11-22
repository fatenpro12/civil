<template>
    <v-layout row justify-center>
        <v-dialog v-model="dialog" width="700" persistent>
            <v-card>
                <v-card-title>
                    <v-icon medium>category</v-icon>
                    <span class="headline">
                        {{ trans('data.create_service_type') }}
                    </span>
                    <v-spacer></v-spacer>
                    <v-btn flat @click="close" icon> <v-icon>clear</v-icon> </v-btn>
                </v-card-title>
                <v-divider></v-divider>
                <v-card-text>
                    <v-container grid-list-md>
                        <v-layout row wrap>
                         
                              <v-flex xs12 sm12 md12>
                                <v-text-field
                                    v-model="name_ar"
                                    :label="trans('data.name_ar')"
                                    v-validate="'required'"
                                    data-vv-name="name_ar"
                                    :data-vv-as="trans('data.name_ar')"
                                    :error-messages="errors.collect('name_ar')"
                                    required
                                >
                                </v-text-field>
                            </v-flex>
                              <v-flex xs12 sm12 md12>
                                <v-text-field
                                    v-model="name_en"
                                    :label="trans('data.name_en')"
                                    v-validate="'required'"
                                    data-vv-name="name_en"
                                    :data-vv-as="trans('data.name_en')"
                                    :error-messages="errors.collect('name_en')"
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
                    <v-btn color=" darken-1" style="color:#06706d;"  flat @click="close">
                        {{ trans('messages.close') }}
                    </v-btn>
                    <v-btn style="background-color:#06706d;color:white;" @click="store" :loading="loading" :disabled="loading">
                        {{ trans('messages.save') }}
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-layout>
</template>
<script>
export default {
    props:{
     externalDialogAdd:{
        type: Boolean,
        default: false
     },
     type: {
         type: Object,
        default: null
     }
    },
    data() {
        return {
            dialog: false,
            name_ar: null,
            name_en: null,
            form_name: null,
            loading: false,
        };
    },
    watch:{
      externalDialogAdd(){
        this.dialog = this.externalDialogAdd
      }
    },

    methods: {
        create() {
            const self = this;
            self.name_ar = null;
            self.name_en = null;
            self.form_name = null;
            self.$validator.reset();
            self.dialog = true;
        },
        close(){
this.dialog = false
this.$emit('close',this.dialog)

        },
        store() {
            const self = this;
            let data = {
                name_ar: self.name_ar,
                name_en: self.name_en,
            };
            self.$validator.validateAll().then(result => {
                if (result == true) {
                    self.loading = true;
                    axios
                        .post('/serviceTypes', data)
                        .then(function(response) {
                            self.loading = false;
                            self.dialog = false;
                        self.$emit('store',self.dialog)

                            self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });

                            if (response.data.success === true) {
                                self.$eventBus.$emit('updateCategoryList', response.data.serviceTypes);
                            }

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
