<template>
        <v-card  :class="$vuetify.breakpoint.xsOnly?'pt-4':''">
         <UserForm @save="save">
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
 
    methods: {
        save(data) {
            const self = this;
                axios
                    .post('/enginner_office/users', data)
                    .then(function (response) {
              
                        self.$store.commit('showSnackbar', {
                            message: response.data.msg,
                            color: response.data.success,
                        });
                        self.$store.commit('hideLoader');
                        if(response.data.success){
                            self.goBack();
                        }
                    })
                    .catch(function (error) {
                        self.$store.commit('hideLoader');
                        alert(JSON.stringify(error.response.data.message))
                        self.$store.commit('showSnackbar', {
                            message: error.response,
                            color: 'error',
                            duration: 50000,
                        });
                    
                    });
            } ,
    },
}
</script>
