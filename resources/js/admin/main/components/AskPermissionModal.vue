<template>
    <div justify="center">
            <v-dialog v-model="dialog" persistent max-width="500px">
                <v-card>
                    <v-card-text>
                        <v-form ref="form" v-model="valid" lazy-validation>
                            <v-layout row wrap>
                                    <v-flex xs12 sm12 md12>
                                        <v-autocomplete
                                            item-text="name"
                                            item-value="id"
                                            :items="permissions"
                                            :rules="[
                                                (v) =>
                                                    !!v ||
                                                    trans('messages.required', {
                                                        name: trans('data.role_name'),
                                                    }),
                                            ]"
                                            v-model="permission"
                                            :label="trans('data.choose_permission')"
                                            :error-messages="errors.collect('permission')"
                                            required
                                        ></v-autocomplete>
                                    </v-flex>
                                    <v-flex xs12 sm12 md12>
                                        <v-text-field
                                            :label="trans('data.select_document')"
                                            @click="onPickFile"
                                            v-model="fileName"
                                        ></v-text-field>
                                        <input
                                            type="file"
                                            style="display: none"
                                            ref="fileInput"
                                            accept="*/*"
                                            @change="onFilePicked"
                                        />
                                    </v-flex>

                                    <v-flex xs12 sm12 md12>
                                        <v-text-field
                                            v-model="note"
                                            :label="trans('data.note')"
                                        ></v-text-field>
                                    </v-flex>
                            </v-layout>
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
                            :disabled="loading"
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
            permissions: [],
            nameRules: [
                ,// (v) => (v && v.length <= 10) || 'Name must be less than 10 characters',
            ],
            permission: '',
            note: '',
            fileName: '',
            url: '',
            fileObject: null,
            cardResult: '',
            name: '',
            size: '',
            type: '',
            lastModifiedDate: '',
            dialog: false,
            loading: false,
            formData : new FormData()
        };
    },
    mounted() {
        const self = this;
        self.loadRolesAndGenders();
    },
    methods: {
        //detects location from browser
        loadRolesAndGenders() {
            const self = this;
            axios
                .get('get-roles-permission')
                .then(function (response) {
                    //self.gender_types = response.data.gender_types;
                    self.permissions = response.data.roles;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        create() {
            const self = this;
            self.dialog = true;
        },
        save() {
            const self = this;
            let data = {
                permission: self.permission,
                note: self.note,
            };

            // self.$validator.validateAll().then((result) => {
            //     if (result == true) 
            self.formData.append('permission',self.permission);
            self.formData.append('note',self.note);
            if (this.$refs.form.validate()) {
                self.loading = true;

                axios
                    .post('ask-for-permission', self.formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data',
                        },
                    })
                    .then(function (response) {
                        if (!response.data.error_code) {
                            self.loading = false;
                            self.$store.commit('showSnackbar', {
                                message: 'asked successfully',
                                color: 'green',
                            });
                            self.dialog = false;
                            self.reset();
                        } else {
                            self.loading = false;
                            self.$store.commit('showSnackbar', {
                                message: response.data.error_description,
                                color: 'red',
                            });
                        }
                    });
            }
            // });
        },
        close() {
            const self = this;
            self.dialog = false;
            self.loading = false;
            self.reset();
            self.resetValidation();
        },
        reset() {
            this.$refs.form.reset();
        },
        resetValidation() {
            this.$refs.form.resetValidation();
        },
        onPickFile() {
            this.$refs.fileInput.click();
        },
        onFilePicked(event) {
            const files = event.target.files;
            if (files[0] !== undefined) {
                this.fileName = files[0].name;
                // Check validity of file
                if (this.fileName.lastIndexOf('.') <= 0) {
                    return;
                }
                // If valid, continue
                const fr = new FileReader();
                fr.readAsDataURL(files[0]);
                fr.addEventListener('load', () => {
                    this.url = fr.result;
                    this.fileObject = files[0];
                    this.formData.append('file', this.fileObject);
                    // this is an file that can be sent to server...
                });
            } else {
                this.fileName = '';
                this.fileObject = null;
                this.url = '';
            }
        },
        onUploadSelectedFileClick() {
            this.loading = true;

            console.log(this.fileObject);
            // A file is not chosen!
            if (!this.fileObject) {
                alert('No file!!');
            }
            // DO YOUR JOB HERE with fileObjectToUpload
            // https://developer.mozilla.org/en-US/docs/Web/API/File/File
            this.name = this.fileObject.name;
            this.size = this.fileObject.size;
            this.type = this.fileObject.type;
            this.lastModifiedDate = this.fileObject.lastModifiedDate;
            // DO YOUR JOB HERE with fileObjectToUpload
            this.loading = false;
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