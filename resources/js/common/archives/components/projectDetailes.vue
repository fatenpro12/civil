<template>
  <v-layout row>
    <v-flex xs12 sm12>
      <v-card class="pa-2 container-list">
           <v-card :key="index" v-for="(item, index) in projectData" flat>
               <div class="btn-bar">
                    <v-btn outline color="indigo" @click="view(item.id)"
                                                                    v-if="$can('project.list')">
                                                                     <v-icon>list</v-icon>
                                                                    {{ trans('data.view') }}
                                                                    </v-btn>
                                                                      <v-btn outline color="teal"
                                                                      v-if="$can('report.create')"
                                                                    :disabled="!checkActive()"
                                                                    @click="
                                                                        $router.push({
                                                                            name: 'add_report',
                                                                            params: {project: item,},
                                                                        })">
                                                                         <v-icon>print</v-icon>
                                                                    {{ trans('data.create_a_report')}}
                                                                    </v-btn></div>
                <div class="element"><div class="col-title">{{trans('data.name')}}</div><div class="content">{{ item.name }} </div></div>
                <div class="element"><div class="col-title">{{trans('data.owner_name')}}</div><div class="content">{{ item.owners.map(x=> x.name)+', ' }}</div></div>
                <div class="element"><div class="col-title">{{trans('data.searchBy.location')}}</div><div class="content">{{ item.location.province_municipality +'-'+ item.location.municipality +'-'+ item.location.municipality +'-'+ item.location.piece_number}}</div></div>
                <div class="element"><div class="col-title">{{trans('data.start_date')}}</div><div class="content">{{ item.start_date | formatDateTime }}</div></div>
                <div class="element"><div class="col-title">{{trans('data.endDate')}}</div><div class="content">{{ item.end_date | formatDateTime }}</div></div>
                <div class="element"><div class="col-title">{{trans('data.searchBy.status')}}</div><div class="content" style="padding-bottom: 0;">
                      <v-progress-linear class="ma-0"
                                                        striped
                                                        :value="getprogress(item.status)"
                                                    ></v-progress-linear></div></div>
        

           </v-card>
      </v-card>
    </v-flex>
  </v-layout>
</template>

<script>
export default {
    props:{
      projectData: {
          type: Array,
          default:[]
      }
    },
    data () {
      return {
        selected: [2],
      }
    },

    methods: {

          markAsFavorite(project) {
            const self = this;
            axios
                .get('/projects/mark-favorite', {
                    params: { id: project.id, favorite: project.is_favorited },
                })
                .then(function (response) {
                    self.$store.commit('showSnackbar', {
                        message: response.data.msg,
                        color: response.data.success,
                    });
                    project.is_favorited = response.data.favorite;
                })
              .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });
        },
          view(id) {
    
               const self = this;
            self.$router.push({
                name: 'view_project',
                params: { id: id },
            });

            // self.$refs.projectEdit.edit(id);
        },
                toggleFavorite(project) {
            if (project.is_favorited) {
                return 'yellow darken-2';
            } else {
                return 'grey lighten-1';
            }
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