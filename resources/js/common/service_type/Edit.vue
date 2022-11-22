
<template id="panel-template">
  <v-layout row justify-center>
        <v-dialog v-model="dialog" width="700" persistent>
            <v-card>
                <v-card-title>
                    <v-icon medium>category</v-icon>
                    <span class="headline">
                        {{ trans('data.edit_service_type') }}
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
                                    v-model="service_type.name_ar"
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
                                    v-model="service_type.name_en"
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
             
                    
                    <v-btn style="background-color:#06706d;color:white;" @click="update" :loading="loading" :disabled="loading">
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
        service_type: {},
        externalDialogEdit:{
        type: Boolean,
        default: false
     },
    },
    data() {
        return {
            
            create_time:'',
            dialog: false,
            loading: false
        };
    },
        watch:{
      externalDialogEdit(){
        this.dialog = this.externalDialogEdit
      }
    },
    methods: {
          close(){
this.dialog = false
this.$emit('close',this.dialog)
        },
   
        update() {
            const self = this;
            let data = this.service_type;
            self.$validator.validateAll().then((result) => {
                if (result == true) {
                    self.loading = true;
                    axios
                    .put('serviceTypes/' + self.service_type.id, data)
                        .then(function (response) {
                            self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });
                            if (response.data.success === true) {
                                 self.loading = false;
                                self.dialog = false
                                self.$forceUpdate();
                                self.$emit('update',self.dialog)
                            }
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
<style scoped>
.remove-list{
    color: rgb(255, 255, 255)!important;
    background-color: #914848;
    max-width: 25px;
    border-radius: 50%;
    min-width: 0;
    margin-top: 25px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 0.5rem;
}
.card > hr {
    margin-right: 0;
    margin-left: 0;
}
.card > .list-group {
    border-top: inherit;
    border-bottom: inherit;
}
.card > .list-group:first-child {
    border-top-width: 0;
    border-top-left-radius: calc(0.25rem - 1px);
    border-top-right-radius: calc(0.25rem - 1px);
}
.card > .list-group:last-child {
    border-bottom-width: 0;
    border-bottom-right-radius: calc(0.25rem - 1px);
    border-bottom-left-radius: calc(0.25rem - 1px);
}
.card > .card-header + .list-group,
.card > .list-group + .card-footer {
    border-top: 0;
}

.card-body {
    flex: 1 1 auto;
    padding: 1rem 1rem;
    background-color: rgba(217, 217, 217, 255);
}

.card-title {
    margin-bottom: 0.5rem;
}

.card-subtitle {
    margin-top: -0.25rem;
    margin-bottom: 0;
}

.card-text:last-child {
    margin-bottom: 0;
}

.card-link + .card-link {
    margin-left: 1rem;
}

.card-header {
    padding: 0.5rem 1rem;
    margin-bottom: 0;
    background-color: rgba(12, 111, 109, 255);
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    color: white;
}
.card-header:first-child {
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}

.card-footer {
    padding: 0.5rem 1rem;
    background-color: rgba(0, 0, 0, 0.03);
    border-top: 1px solid rgba(0, 0, 0, 0.125);
}
.card-footer:last-child {
    border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
}

.card-header-tabs {
    margin-right: -0.5rem;
    margin-bottom: -0.5rem;
    margin-left: -0.5rem;
    border-bottom: 0;
}
.card-text {
    text-align: -webkit-center;
}

.card-header-pills {
    margin-right: -0.5rem;
    margin-left: -0.5rem;
}

.card-img-overlay {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 1rem;
    border-radius: calc(0.25rem - 1px);
}

.card-img,
.card-img-top,
.card-img-bottom {
    width: 100%;
}

.card-img,
.card-img-top {
    border-top-left-radius: calc(0.25rem - 1px);
    border-top-right-radius: calc(0.25rem - 1px);
}

.card-img,
.card-img-bottom {
    border-bottom-right-radius: calc(0.25rem - 1px);
    border-bottom-left-radius: calc(0.25rem - 1px);
}

.card-group > .card {
    margin-bottom: 0.75rem;
}
@media (min-width: 576px) {
    .card-group {
        display: flex;
        flex-flow: row wrap;
    }
    .card-group > .card {
        flex: 1 0 0%;
        margin-bottom: 0;
    }
    .card-group > .card + .card {
        margin-left: 0;
        border-left: 0;
    }
    .card-group > .card:not(:last-child) {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }
    .card-group > .card:not(:last-child) .card-img-top,
    .card-group > .card:not(:last-child) .card-header {
        border-top-right-radius: 0;
    }
    .card-group > .card:not(:last-child) .card-img-bottom,
    .card-group > .card:not(:last-child) .card-footer {
        border-bottom-right-radius: 0;
    }
    .card-group > .card:not(:first-child) {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    .card-group > .card:not(:first-child) .card-img-top,
    .card-group > .card:not(:first-child) .card-header {
        border-top-left-radius: 0;
    }
    .card-group > .card:not(:first-child) .card-img-bottom,
    .card-group > .card:not(:first-child) .card-footer {
        border-bottom-left-radius: 0;
    }
}
</style>