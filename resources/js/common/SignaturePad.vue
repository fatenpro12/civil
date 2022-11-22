<template>
<v-layout row justify-center>
   <v-dialog
      v-model="dialog"
      width="500"
    >
      <v-card>
        <v-card-title
          class="headline grey lighten-4"
          primary-title
        >
          {{ trans('data.addSignature') }}
        </v-card-title>
         <VueSignaturePad  
            width="100%"
          height="250px"
           ref="signaturePad" 
            :options="options"/>
        <v-divider></v-divider>
 <v-card-actions>
          <v-spacer></v-spacer>
      <v-btn class="btn success" style="color: #fff;background:#4CAF50 " @click="save">{{trans('data.save')}}</v-btn>
      <v-btn class="btn secondary" style="color: #fff;background:#2196F3 " @click="undo">{{trans('data.undo')}}</v-btn>
      <v-btn class="btn primary" style="color: #fff;" @click="$refs.signaturePad.clearSignature()">{{trans('data.delete')}}</v-btn>
      <v-btn class="btn secondary" style="color: #fff;background:#424242 " @click="dialog = false">{{trans('data.close')}}</v-btn>
    </v-card-actions>
     </v-card>
  </v-dialog>
   </v-layout>
</template>

<script>
export default {
 name: 'MySignaturePad',
 data(){
   return{
     dialog: false,
      options: {
        penColor: "#c0f",
        onBegin: () => {
          this.$refs.signaturePad.resizeCanvas();
        },
   }
 }
 },
 props:{
   extraDialogValue: false
 },
 watch:{
   extraDialogValue(){
    this.dialog = this.extraDialogValue
   }
 },
  methods: {
    undo() {
      this.$refs.signaturePad.undoSignature();
    },
    create(){
        this.dialog = true
    },
    save() {
      const { isEmpty, data } = this.$refs.signaturePad.saveSignature();
     // console.log(isEmpty);
     // console.log(data);
      this.$emit('save' ,data)
      this.dialog= false

    }
  }
}
</script>

<style scoped>

</style>