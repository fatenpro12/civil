<template>
      <v-card  :class="$vuetify.breakpoint.xsOnly?'pt-4':''">
   
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
    mounted(){
      this.$refs.userdataform.loadUser(() => {});
    },
    methods: {
     
        save(payload) {
            const self = this;

                axios
                    .put('/enginner_office/users/' + self.propUserId, payload)
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
        },
      
    },
};
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