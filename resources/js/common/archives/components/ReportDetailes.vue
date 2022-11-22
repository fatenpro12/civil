<template>
  <v-layout row>
    <v-flex xs12 sm12>
      <v-card class="pa-2 container-list">
           <v-card :key="index" v-for="(item, index) in reportData" flat>
                     <div class="btn-bar">
                    <v-btn outline color="indigo"
                                     @click="$router.push({name: 'edit_report', 
                                   params:{
                                  //  id :item.id,
                                    id: item.media[item.media.length-1].full_url//.replace('upload','public/upload')
                                   }
                                                                        })"
                                                                    v-if="$can('project.list')">
                                                                     <v-icon>list</v-icon>
                                                                    {{ trans('data.view') }}
                                                                    </v-btn>
                                                                    </div>
                <div class="element"><div class="col-title">{{trans('data.owner')}}</div><div class="content">{{ item.owner }} </div></div>
                <div class="element"><div class="col-title">{{trans('data.type')}}</div><div class="content" >{{ language == 'ar'?item.type.type_name_ar:item.type.type_name_en }}</div></div>
                <div class="element"><div class="col-title">{{trans('data.created_by')}}</div><div class="content">{{ item.report_creator.name }}</div></div>
           </v-card>
      </v-card>
    </v-flex>
  </v-layout>
</template>

<script>
export default {
    props:{
      reportData: {
          type: Array,
          default:[]
      }
    },
    data () {
      return {
        selected: [2],
        language: ''
      }
    },
     created(){
        this.language = localStorage.getItem('currentLange')?localStorage.getItem('currentLange'):'ar'
     },
    methods: {
          view(id) {
    
               const self = this;
            self.$router.push({
                name: 'view_project',
                params: { id: id },
            });

            // self.$refs.projectEdit.edit(id);
        },
    }
  }
</script>

<style scoped>
.element{
    display: flex;
    align-items: center;

}
.col-title{
    background: rgb(207 205 242 / 44%);
    height: 100%;
    padding: 0.5rem;
    font-size:12px;
    width: 20rem;
    text-align: center;
}
.content{
    padding-right:1rem;
       padding-left:1rem;
    width:100%;
    font-size:14px!important;
    border-bottom: 1px solid rgb(228, 228, 228);
}
.btn-bar{
    display: flex;
    justify-content: flex-end;
}
.container-list
{
    max-height: 25rem;
    overflow-y: auto;
}
</style>