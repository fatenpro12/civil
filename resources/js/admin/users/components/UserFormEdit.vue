<template>
        <v-card>

          
               <UserForm @save="save" ref="userdataform" :propUserId="propUserId">
                 <template #title>
                       <span class="headline">
                        {{ trans('data.edit_employee') }}
                    </span>
                </template>
            <template #engineer><span></span></template>
            </UserForm>
        </v-card>
</template>

<script>
import UserForm from '../../../common/users/UserForm'
export default {
    components: {
        UserForm
    },
    props: {
        propUserId: {
            required: true,
        },
    },
    mounted() {
        this.$refs.userdataform.loadUser(() => {});
    },
    methods: {
        save(payload) {
            const self = this;

                axios
                    .put('/admin/users/' + self.propUserId, payload )
                    .then(function(response) {
                        if(response.data.success)
                        self.$store.commit('showSnackbar', {
                            message: response.data.msg,
                            color: response.data.success,
                        });
                          if(!response.data.success) {
                          let msg=''
                          if(response.data.data.email) msg+='\n'+ response.data.data.email
                          if(response.data.data.id_card_number) msg+='\n'+ response.data.data.id_card_number
                          self.$store.commit('showSnackbar', {
                            message: msg,
                            color: "#FF5252",
                        });
                          }
                        self.$store.commit('hideLoader');

                        if (response.data.success === true) {
                            self.goBack();
                        }
                    })
                    .catch(function(error) {
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
            }
    },
};
</script>