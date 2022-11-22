<template>
<v-card :class="$vuetify.breakpoint.xsOnly?'mt-4':''" class="mx-3" style="min-width: 80%;" flat>
                    <v-card-text>
  <Document ref="documentsInfo">
    <template #form><span></span></template>
  </Document>
                    </v-card-text>
</v-card>
</template>

<script>
import Document from './project_info/documnets.vue';
export default {
    components:{
Document
    },
    mounted(){
       this.$refs.documentsInfo.fillEditData(this.$route.params.media, false)
    },
}
</script>

<style>

</style>