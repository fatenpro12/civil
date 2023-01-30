<template>
        <v-card :class="$vuetify.breakpoint.xsOnly?'pt-4':''"> 
             <UserForm @save="save" ref="userdataform" :propUserId="propUserId">
                <template #title>
                       <span class="headline">
                        {{ trans('data.edit_employee') }}
                    </span>
                </template>
            <template #role><span></span></template>
            </UserForm>
        </v-card>
</template>

<script>
import UserForm from '../users/UserForm'
export default {
    components: {
        UserForm
    },
    data() {
        return {
       propUserId: null
        };
    },
      mounted(){
      this.$refs.userdataform.loadUser(() => {});
    },
    created() {
        const self = this;
        self.propUserId = self.$route.params.id
        self.getLocationInfo()
    },
    methods: {
        /*edit(userId) {
            const self = this;
            self.$validator.reset();
            axios
                .get('/manage-profiles/' + userId + '/edit')
                .then(function (response) {
                    let User = response.data.user;
                    self.form_fields = User;
                    self.gender_types = response.data.gender_types;
                    self.birth_date = User.birth_date;
                    self.name = User.name;
                    self.email = User.email;
                    self.location_data= User.location_data,
                    self.id_card_number = User.id_card_number;
                    self.active = User.active !== null;
                              self.imageFiles.signature = response.data.user.signature;
                self.imageFiles.logo = response.data.user.logo
                self.imageFiles.avatar = response.data.user.personal_image
                    self.checkRolePrimary(self.propUserId);
      
                })
                  .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });;
        },*/
              save(payload) {
            const self = this;
                axios
                    .put('/manage-profiles/' + self.getCurrentUser().id, payload)
                    .then(function (response) {
                        self.$store.commit('showSnackbar', {
                            message: response.data.msg,
                            color: response.data.success,
                        });

                        self.$store.commit('hideLoader');

                        if (response.data.success === true) {
                            self.goBack();
                        }
                    })
                    .catch(function (error) {
                        self.$store.commit('hideLoader');

                        if (error.response) {
                            self.$store.commit('showSnackbar', {
                                message: error.response.data.message,
                                color: 'error',
                                duration: 3000,
                            });
                        } else if (error.request) {
                            console.log(error.request);
                        } else {
                            console.log('Error', error.message);
                        }
                    });
            } /*else {
                self.$store.commit('showSnackbar', {
                    message: 'املئ الحقول الضرورية',
                    color: 'error',
                    duration: 3000,
                });
            }*/
        },
     /*   store() {
            const self = this;
            let data = _.pick(self.form_fields, [
                'name',
                'email',
                'mobile',
                'alternate_num',
                'skype',
                'linkedin',
                'facebook',
                'twitter',
                'gender',
                'home_address',
                'current_address',
                'gender',
                'media',
            ]);

            data.birth_date = self.birth_date;
            data.password = self.password;

            self.$validator.validateAll().then((result) => {
                if (result == true) {
                    self.loading = true;
                    axios
                        .put('/manage-profiles/' + self.userId, data)
                        .then(function (response) {
                            self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });
                            self.loading = false;
                            if (response.data.success === true) {
                                self.goBack();
                            }
                        })
                        .catch(function (error) {
                            if (error.response) {
                                self.$store.commit('showSnackbar', {
                                    message: error.response.data.message,
                                    color: 'error',
                                });
                            }
                        });
                }
            });
        },*/
    }
</script>
<style scoped>
.img-container {
  position: relative;
  max-width: 300px;
  cursor: pointer;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
    position: absolute;
    bottom: 0;
    background: rgb(0, 0, 0);
    background: rgb(237 245 239 / 50%);
    width: 100%;
    transition: .5s ease;
    opacity: 0;
    padding: 20px;
    text-align: center;
    height: 100%;
}
.img-container:hover .overlay {
  opacity: 1;
}
 .delete-icon {
    color:rgb(105, 0, 0)!important;
    font-size: 24px;
}
</style>