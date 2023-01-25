<template>
  <v-layout row justify-center>
        <v-dialog v-model="dialog" width="700" persistent>
            <v-card>
    <v-container grid-list-md class="flex">
        <v-layout row>

            <v-flex xs12 sm12>
                <v-card class="elevation-3">
                    <v-card-title primary-title xs8 sm8>
                            <div class="headline">
                                {{ trans('data.document_info') }}
                            </div>
                     
                                           <div class="flex flex-wrap rounded-md shadow-sm" role="group">
  <button @click="getMedia('images')" type="button" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
             <svg lass="mx-auto feather feather-image text-slate-400" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
    <circle cx="8.5" cy="8.5" r="1.5"></circle>
    <polyline points="21 15 16 10 5 21"></polyline>
  </svg>
    {{trans('data.project images')}}
  </button>
  <button @click="getMedia('files')" type="button" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
    <svg aria-hidden="true" class="mr-2 w-4 h-4 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z"></path></svg>
    {{trans('data.project files')}}
  </button>
  <button @click="getMedia('videos')" type="button" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
    <svg aria-hidden="true" class="mr-2 w-4 h-4 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z" clip-rule="evenodd"></path></svg>
    {{trans('data.project videos')}}
  </button>
                        </div>
                                <v-spacer></v-spacer>
                    <v-btn flat @click="dialog =false" icon> <v-icon>clear</v-icon> </v-btn>
                    </v-card-title>
                    <v-divider></v-divider>
                    <v-card-text>
                        <v-container grid-list-md>
                <div v-if="type === 'image'">
                                <div class="flex" v-if="filterMedia.length>0">
                                    <div
                                        class="main_view"
                                        :class="$vuetify.breakpoint.xsOnly ? 'w-full' : 'w-3/4'"
                                    >
                                        <img
                                            v-if="currentSrc"
                                            :src="currentSrc"
                                            id="main"
                                            alt="IMAGE"
                                        />
                                        <img
                                            v-else
                                            src="/img/image-1@2x.jpg"
                                            style="max-width:40rem"
                                        />
                                    </div>

                                    <!-- All images with side view -->
                                    <div
                                        class="side_view max-h-80 overflow-y-auto"
                                    >
                                        <img
                                            v-for="media in filterMedia"
                                            :key="media.id"
                                            :src="
                                                media.full_url ? media.full_url : media.original_url
                                            "
                                            @click="
                                                currentSrc = media.full_url
                                                    ? media.full_url
                                                    : media.original_url
                                            "
                                        />
                                    </div>
                                    </div>
                                     <div v-else> {{trans('messages.no_files_exists')}}</div>
                                    </div>
                                    <div v-if="type === 'file'">
                                        <div class="flex" v-if="filterMedia.length>0">
                                    <div
                                        class="main_view overflow-y-auto max-h-full"
                                        :class="$vuetify.breakpoint.xsOnly ? 'w-full' : 'w-3/4'"
                                        
                                    >
                                        <button
                                            v-if="numPages > 0"
                                            type="button"
                                            class="text-blue-700 hover:text-white border-solid border-2 border-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800"
                                            @click="myPdfComponentPrint.print()"
                                        >
                                            print
                                        </button>
                                        <pdf
                                            v-for="i in numPages"
                                            :key="i"
                                            :src="currentSrc"
                                            :page="i"
                                            class="mx-5"
                                            style="max-width:35rem"
                                        ></pdf>
                                        <img
                                            v-if="!numPages"
                                            src="/img/image-1@2x.jpg"
                                            style="max-width:35rem"
                                        />
                                    </div>

                                    <!-- All images with side view -->
                                    <div
                                        class="side_view max-h-80 overflow-y-auto w-1/4"
                                        style="display:block;cursor:pointer"
                               
                                    >
                                       
              <v-flex v-for="(media, index) in filterMedia" :key="index" xs12 md12>
                                     <v-card class="text-center"  @click="
                                                changePdf(
                                                    media.full_url
                                                        ? media.full_url
                                                        : media.original_url,
                                                    $refs.myPdfComponent[index],
                                                    media.file_name
                                                )
                                            ">
                  <v-list two-line>
                    <v-list-tile>
                          <v-list-tile-avatar>
                        <v-icon class="primary--text">mdi-download</v-icon>
                      </v-list-tile-avatar>
                     <v-list-tile-content ref="myPdfComponent" class="text-sm">{{ media.file_name}}</v-list-tile-content>
                    
                    </v-list-tile>
                  </v-list>
                </v-card>
                </v-flex>
              
                                    </div>
                                        </div>
                                        <div v-else> {{trans('messages.no_files_exists')}}</div>
                                    </div>
                                       <div v-if="type === 'video'">
                                        <div class="flex" v-if="filterMedia.length>0">
                                    <div
                                        class="main_view"
                                        :class="$vuetify.breakpoint.xsOnly ? 'w-full' : 'w-3/4'"
                                    >
                                        <div
                                            @click.outside="videoOpen = false"
                                            class="max-w-[550px] w-full mx-auto bg-white"
                                        >
                                            <iframe
                                                v-if="currentSrc"
                                                class="w-full h-[320px]"
                                                :src="currentSrc"
                                            >
                                            </iframe>
                                            <img v-if="!currentSrc" src="/img/image-1@2x.jpg" />
                                        </div>
                                    </div>

                                    <!-- All images with side view -->
                                    <div
                                        class="side_view max-h-80 overflow-y-auto"
                                    >
                                        <div v-for="media in filterMedia" :key="media.id">
                                            <img
                                                @click="
                                                    currentSrc = media.full_url
                                                        ? media.full_url
                                                        : media.original_url
                                                "
                                                src="https://api.tailgrids.com/images/tag/069d8cd8-ca1b-4570-9d4a-1cff18ee2a8d.svg"
                                                alt="image"
                                                class="w-full h-full object-center object-cover"
                                            />
                                        </div>
                                    </div>
                                    </div>
                                      <div v-else> {{trans('messages.no_files_exists')}}</div>
                                    </div>
                                
                        </v-container>
                    </v-card-text>
                     <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color=" darken-1" style="color:#06706d;"  flat @click="dialog=false">
                        {{ trans('messages.close') }}
                    </v-btn>
                     </v-card-actions>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
        </v-card>
        </v-dialog>
    </v-layout>
</template>
<script>

import pdf from 'vue-pdf'
export default {
    components: {
        pdf,
    },
    props: ['customerId','media'],
    data() {
        return {
            dialog: false,
            numPages: undefined,
            isEdit: true,
            medias: [],
            tempMedia: [], 
            filterMedia: [],
            can_file_upload: false,
            type: null,
            currentSrc:null,
            myPdfComponentPrint:null,
        };
    },
    methods: {
          create(data) {
            const self = this;
            self.tempMedia = data
            self.dialog = true;
            
        },
        getMedia(type){
            this.currentSrc = null
           this.filterMedia = this.tempMedia
        
           if(type === 'images'){
             this.filterMedia = this.tempMedia.filter(val => val? /\.(jpe?g|png|gif)$/i.test(val.full_url ? val.full_url : val.original_url):'')
             this.type = 'image'
               console.log(this.filterMedia)
           }
                    if(type === 'files'){
             this.filterMedia = this.tempMedia.filter(val => val?/\.(pdf|doc?x|txt|csv|xlsx|ppt?x)$/i.test(val.full_url ? val.full_url : val.original_url):'')
             this.type = 'file'
                    }
                    if(type === 'videos'){
             this.filterMedia = this.tempMedia.filter(val => val?/\.(mp4|wav)$/i.test(val.full_url ? val.full_url : val.original_url):'')
             this.type = 'video'
                    }
        },
    
          vsuccessMuliple(files, response){
    response.files_name.forEach(val => this.medias.push(val));
                        
                         this.$emit('next', this.medias);
        },
       
        fillEditData(data, isEdit) {
            const self = this;
            (self.tempMedia = data), (self.isEdit = isEdit);
        },
        changePdf (src,refCom){
          if(src.includes('.pdf')){
            this.currentSrc = pdf.createLoadingTask(src);
            this.currentSrc.promise.then(pdf => {
                this.myPdfComponentPrint = refCom;
                this.numPages = pdf.numPages;
                this.$forceUpdate();
            });
            } else{
     
      const link = document.createElement('a')
      link.href = src
      link.setAttribute('download', name)
      document.body.appendChild(link)
      link.click()
            }
       
    },
    }
}
</script>
<style scoped>
   .main_view{
        height: 25rem;
    }
    .main_view img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .side_view{
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }
    .side_view img{
        width: 9rem;
        height: 7rem;
        object-fit: cover;
        cursor: pointer;
        margin:0.5rem;
    }
</style>