<template>
        <v-card>
          
             <UserForm @save="save" :reg_birth_date = birth_date>
            <template #role><span></span></template>
            <template #engineer><span></span></template>
             <template #register>
                 <v-flex xs12 sm6 md6>
                                <div class="v-input v-text-field theme--light">
                                    <div class="v-input__control">
                                        <div class="v-input__slot">
                                            <div class="v-text-field__slot">
                                               <label
                                                    aria-hidden="true"
                                                    class="
                                                        v-label
                                                        theme--light
                                                        text-start
                                                        flat_picker_label
                                                    "
                                                    :class="label_active"
                                                    style="left:auto"
                                                >
                                                    {{ trans('messages.date_of_birth') }}
                                                </label>
                                                <flat-pickr
                                                    v-model="birth_date"
                                                    @input="label_active = 'v-label--active'"
                                                    name="date_of_birth"
                                                    
                                                ></flat-pickr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </v-flex>
             </template>
            <template #login>
                  <v-btn style="color: #06706d" @click="$router.push({name: 'login'})">
                            {{ trans('data.back_to_login') }}
                        </v-btn>
            </template>
            </UserForm>

        </v-card>
        
</template>

<script>
import UserForm from './users/UserForm'
export default {
    components: {
        UserForm
    },
   data(){
     return {
        birth_date: null,
        label_active:''
     }
   },
    methods: {
        save(payload) {
            const self = this;
           
                axios
                    .post('/register', payload)
                    .then(function (response) {
                        console.log(response)
                          self.$store.commit('showSnackbar', {
                            message: response.data.msg,
                            color: response.data.success,
                        });
                        self.$store.commit('hideLoader');
                        if(response.status === 201){
                            self.login();
                        }
                    })
                    .catch(function (error) {
                        self.$store.commit('hideLoader');
                    });
                
            }
        },

     
};
</script>
