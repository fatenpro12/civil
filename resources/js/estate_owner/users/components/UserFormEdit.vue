<template>
        <v-card  :class="$vuetify.breakpoint.xsOnly?'pt-4':''">
              <UserForm @save="save" ref="userdataform" :propUserId="propUserId">
                 <template #title>
                       <span class="headline">
                        {{ trans('data.edit_employee') }}
                    </span>
                </template>
            <template #engineer><span></span></template>
            <template #role><span></span></template>
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
        const self = this;
          self.$refs.userdataform.loadUser(() => {});
       // self.checkCurrentUserType();
    },
    methods: {
        save(payload) {
            const self = this;
                axios
                    .put('/estate_owner/users/' + self.propUserId, payload)
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
            }
    },
};
</script>