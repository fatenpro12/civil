<template>
    <v-layout row justify-center>
        <v-dialog v-model="dialog" width="700" persistent>
            <v-card>
                <v-card-title>
                    <v-icon medium>category</v-icon>
                    <span class="headline">
                        {{ trans('data.create_report_type') }}
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
                                    v-model="type_name_ar"
                                    :label="trans('data.type_name_ar')"
                                    v-validate="'required'"
                                    data-vv-name="type_name_ar"
                                    :data-vv-as="trans('data.type_name_ar')"
                                    :error-messages="errors.collect('type_name_ar')"
                                    required
                                >
                                </v-text-field>
                            </v-flex>
                              <v-flex xs12 sm12 md12>
                                <v-text-field
                                    v-model="type_name_en"
                                    :label="trans('data.type_name_en')"
                                    v-validate="'required'"
                                    data-vv-name="type_name_en"
                                    :data-vv-as="trans('data.type_name_en')"
                                    :error-messages="errors.collect('type_name_en')"
                                    required
                                >
                                </v-text-field>
                            </v-flex>
                             <v-layout row wrap  v-for="i in list" :key="i">
                               <v-flex xs6 sm6 md6>
                                <v-text-field
                                    v-model="type_list_ar[i-1]"
                                    :label="trans('data.type_list_ar')"
                                    v-validate="'required'"
                                    data-vv-name="type_list_ar"
                                    :data-vv-as="trans('data.type_list_ar')"
                                    :error-messages="errors.collect('type_list_ar')"
                                    required
                                >
                                </v-text-field>
                            </v-flex>
                                    <v-flex xs6 sm6 md6>
                                <v-text-field
                                    v-model="type_list_en[i-1]"
                                    :label="trans('data.type_list_en')"
                                    v-validate="'required'"
                                    data-vv-name="type_list_en"
                                    :data-vv-as="trans('data.type_list_en')"
                                    :error-messages="errors.collect('type_list_en')"
                                    required
                                >
                                </v-text-field>
                            </v-flex>
                             </v-layout>
                                <!-- <v-flex xs12 sm12 md12>
                                <v-text-field
                                    v-model="form_name"
                                    :label="trans('data.form_name')"
                                    data-vv-name="form_name"
                                    :data-vv-as="trans('data.form_name')"
                                    :error-messages="errors.collect('form_name')"
                                    required
                                >
                                </v-text-field>
                            </v-flex>-->
                        </v-layout>
                    </v-container>
                </v-card-text>
                <v-divider></v-divider>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color=" darken-1" style="color:#06706d;"  flat @click="close">
                        {{ trans('messages.close') }}
                    </v-btn>
                      <v-btn color="secondary" style="color:#fff;background-color:cyan;"  flat @click="list++;">
                        {{ trans('messages.list_add') }}+
                    </v-btn>
                      <v-btn  style="color:#fff;background-color:darkred;"  flat @click="list>0?list--:list=0">
                        {{ trans('messages.list_remove') }}-
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
     externalDialog:{
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
            type_name_ar: null,
            type_name_en: null,
            type_list_ar: [],
            type_list_en: [],
            form_name: null,
            loading: false,
            list:1
        };
    },
    watch:{
      externalDialog(){
        this.dialog = this.externalDialog
      }
    },
    methods: {
        create() {
            const self = this;
            self.type_name_ar = null;
            self.type_name_en = null;
            self.type_list_ar = [];
            self.type_list_en = [];
            self.form_name = null;
            self.$validator.reset();
            self.dialog = true;
        },
        close(){
this.dialog = false
this.$emit('close',this.dialog)
this.list = 1;
   this.type_list_ar = [];
            this.type_list_en = [];
        },
        store() {
            const self = this;
            let data = {
                type_name_ar: self.type_name_ar,
                type_name_en: self.type_name_en,
                type_list_ar: self.type_list_ar,
                type_list_en: self.type_list_en,
                form_name: self.form_name,
            };
            self.$validator.validateAll().then(result => {
                if (result == true) {
                    self.loading = true;
                    axios
                        .post('/reportTypes', data)
                        .then(function(response) {
                            self.loading = false;
                            self.dialog = false;
                        self.$emit('store',self.dialog)
                              self.list = 1;
   self.type_list_ar = [];
            self.type_list_en = [];
                            self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });

                            if (response.data.success === true) {
                                self.$eventBus.$emit('updateCategoryList', response.data.reportTypes);
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
