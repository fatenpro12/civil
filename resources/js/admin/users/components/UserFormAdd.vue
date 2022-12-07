<template>
        <v-card>
          
               <v-card  :class="$vuetify.breakpoint.xsOnly?'pt-4':''">
         <UserForm @save="save">
            <template #engineer><span></span></template>
            </UserForm>
        </v-card>
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
                self.$store.commit('showLoader');
                axios
                    .post('/admin/users', data)
                    .then(function (response) {
                         self.user_id= response.data.id
                   
                         if(response.data.success)
                        self.$store.commit('showSnackbar', {
                            message: response.data.msg.original.msg,
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
                     
                        if (response.data.msg.original.success == true) {
                            self.goBack();
                        }
                    })
                    .catch(function (error) {
                        self.$store.commit('hideLoader');
                    });
                
            }
    },
};
</script>