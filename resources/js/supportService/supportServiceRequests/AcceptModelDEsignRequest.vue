<template>
    <div justify="center">
            <v-dialog v-model="dialog" persistent max-width="600px">
                <v-card>
                    <v-card-title > <span class="text-h2">{{trans('data.accept_support_service_request')}}</span>  </v-card-title>
                    <v-card-text>
        <v-form ref="form" v-model="valid" lazy-validation enctype="multipart/form-data">
           <v-layout row wrap>
              <div class="my-3">{{ trans('data.viewPrice') }}: </div>
                            <v-flex xs12 sm12 md12>
                              
           <input
              type="file"
              :label="trans('data.viewPrice')"
              ref="pdf"
              accept=".pdf"
              @change="onFilePicked"
            />
        </v-flex>
        </v-layout>
            <v-spacer></v-spacer>
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
<script>
export default {
    name: 'permission',
    data() {
        return {
             valid: true,
            dialog: false,
            loading: false,
            id: '',
            design_id: '',
            price_pdf: null,
            project: null
        };
    },
    mounted() {
        const self = this;
    },
    methods: {
        close() {
            const self = this;
            self.dialog = false;
            self.loading = false;
            self.reset();
        },
                 onFilePicked(e) {
     this.price_pdf = e.target.files[0]
    },
        reset() {
            this.$refs.form.reset();
        },
        create(data) {
            const self = this;
            self.design_id = data.id
            self.project = data.project
            self.dialog = true;
        },
        save() {
            const self = this;
            let formData=new FormData()
            formData.append('pdfPrice',self.price_pdf) 
            formData.append('design_id',self.design_id) 
             if (this.$refs.form.validate()) {
                self.loading = true;
              axios.post('/support_service_office/accept-support-service-request', formData).then(function (response) {
                    if (response.data.success) {
                        self.loading = false;
                        self.dialog = false;
                        self.$store.commit('hideLoader');
                        self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });
                        self.$emit('refreshTable')
                    }
                })
            }
          
        },
    },
};
</script>
<style scoped>
.style_rtl {
    padding-left: 5px;
}

.style_ltr {
    padding-right: 5px;
}
</style>