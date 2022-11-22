<template>
    <v-layout row justify-center>
        <v-dialog v-model="dialog" persistent max-width="600px">
            <v-card>
                <v-card-title>
                    <v-icon>assignment</v-icon>
                    <span class="headline">
                        {{ trans('data.viewPrice')}}
                    </span>
                    <v-spacer></v-spacer>
                     <v-btn
                style="background-color: #06706d; color: white"
                color="darken-1"
                @click="$refs.myPdfComponent.print()"
                :loading="loading"
                :disabled="loading"
            >
                {{ trans('data.print') }}
            </v-btn>
                    <v-btn flat icon @click="dialog = false"> <v-icon>clear</v-icon> </v-btn>
                </v-card-title>
                <v-divider></v-divider>
                <v-card-text>
                
            	<pdf
        ref="myPdfComponent"
        class="mx-auto"
			:src="url"
		>
                <v-progress-circular
      :size="50"
      color="primary"
      indeterminate
    ></v-progress-circular>
        </pdf>
                </v-card-text>
                <v-card-actions v-if="user_type == 'owner'">
                    <v-spacer></v-spacer>
                    <v-btn color="green darken-1" flat @click="rejectOffer">
                        {{ trans('data.reject') }}
                    </v-btn>
                    <v-btn
                        color="success"
                        @click="agreeOffer"
                        :loading="loading"
                        :disabled="!valid || !checkActive()"
                    >
                        {{ trans('data.aproved') }}
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-layout>
</template>

<script>
import pdf from 'vue-pdf'
export default {
       components:{
            pdf
    },
    data() {
        return {
            valid: true,
            dialog: false,
            loading: false,
            url: null,
            item: null,
            user_type:null,
            office_id:null,
            reject_link:null,
            accept_link: null
        };
    },
    mounted() {
        const self = this;
    },
    created() {
        const self = this;

    },
    beforeDestroy() {
        const self = this;
    },

    methods: {
        openDialog(data){
          this.dialog =true
          this.item = data[0]
          this.url = data[1].full_url
         this.office_id= data[2]
         this.user_type=data[3]
         this.accept_link =data[4]
         this.reject_link =data[5]
        },
        agreeOffer(){
            const self = this;
            let data = {
                design_id: self.item.id,
                office_id: this.office_id
              //  created_by: self.item.design_enginners[0].created_by
            };
                self.loading = true;
                axios
                    .post(self.accept_link, data)
                    .then(function (response) {
                        self.loading = false;
                        if (response.data.success === true) {
                            self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });
                           self.dialog =false
                           self.$emit('refreshTable',response)
                           self.$forceUpdate()
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            //self.reset();
        },
         rejectOffer(){
            const self = this;
            let data = {
                design_id: self.item.id,
                office_id: this.office_id
            };

                self.loading = true;
                axios
                    .post(self.reject_link, data)
                    .then(function (response) {
                        self.loading = false;
                        if (response.data.success === true) {
                            self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });
                           self.dialog =false
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            //self.reset();
        },
        close() {
            const self = this;
            self.loading = false;
            self.dialog = false;
        },
   
    },
};
</script>
