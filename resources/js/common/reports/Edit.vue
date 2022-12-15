<template id="panel-template">
    <div class="mx-5">
        <documents ref="documents" />
        <v-card-actions justify-left :class="$vuetify.breakpoint.xsOnly?'mt-5':''">
            <v-btn style="color: #06706d" @click="$router.go(-1)">
                {{ trans('messages.back') }}
            </v-btn>
           
            <v-btn style="color: #06706d" @click="$refs.documents.create(medias)">
                {{ trans('data.attachments') }}
            </v-btn>
            <v-btn
                style="background-color: #06706d; color: white"
                color="darken-1"
                @click="$refs.myPdfComponent.print()"
                :loading="loading"
                :disabled="loading"
            >
                {{ trans('data.print') }}
            </v-btn>
        </v-card-actions>
   
            	<pdf
        ref="myPdfComponent"
        class="mx-auto"
        :style="$vuetify.breakpoint.xsOnly?'width:100%':'width:60%'"
			:src="url"
		>
                <v-progress-circular
      :size="50"
      color="primary"
      indeterminate
    ></v-progress-circular>
        </pdf>

           <!-- <v-divider></v-divider>
                
                    <ReportForm :reportType="report_type" :edit="true" :report="report" :office="office" />
        </v-card>
        <AddReportType :externalDialog="externalDialog" @close="externalDialog = event" @store="externalDialog = event" />-->
    </div>
</template>
<script>
import AddReportType from '../report_types/Add.vue'
import ReportForm from './components/ReportForm.vue'
import documents from './components/documnets'
import pdf from 'vue-pdf'
export default {
    components:{
            pdf,
     AddReportType,
     documents,
     ReportForm
    },
    data() {
        return {
            type: 'testt',
             loading:false,
            enable_report: false,
            url: null,
            medias: []
        };
    },
    created() {
        const self = this;
        self.getReport(self.$route.params.id);
        //self.url = self.$route.params.id
       // self.medias= self.$route.params.item?.media?.slice(1)//?.filter(x=>x.collection_name ==='report_attachment')
    },
    methods: {
        getReport(id) {
            const self = this;
            axios
                .get('/reports/'+id)
                .then(function (response) {
                    self.report = response.data;
                   console.log(self.report)
                    self.url = self.report?.media[0].full_url?self.report?.media[0].full_url:self.report?.media[0].original_url
                self.medias= self.report?.media?.slice(1)
                self.$forceUpdate()
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
};
</script>

<style scoped>
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 0.5rem;
}
.card > hr {
    margin-right: 0;
    margin-left: 0;
}
.card > .list-group {
    border-top: inherit;
    border-bottom: inherit;
}
.card > .list-group:first-child {
    border-top-width: 0;
    border-top-left-radius: calc(0.25rem - 1px);
    border-top-right-radius: calc(0.25rem - 1px);
}
.card > .list-group:last-child {
    border-bottom-width: 0;
    border-bottom-right-radius: calc(0.25rem - 1px);
    border-bottom-left-radius: calc(0.25rem - 1px);
}
.card > .card-header + .list-group,
.card > .list-group + .card-footer {
    border-top: 0;
}

.card-body {
    flex: 1 1 auto;
    padding: 1rem 1rem;
    background-color: rgba(217, 217, 217, 255);
}

.card-title {
    margin-bottom: 0.5rem;
}

.card-subtitle {
    margin-top: -0.25rem;
    margin-bottom: 0;
}

.card-text:last-child {
    margin-bottom: 0;
}

.card-link + .card-link {
    margin-left: 1rem;
}

.card-header {
    padding: 0.5rem 1rem;
    margin-bottom: 0;
    background-color: rgba(12, 111, 109, 255);
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    color: white;
}
.card-header:first-child {
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}

.card-footer {
    padding: 0.5rem 1rem;
    background-color: rgba(0, 0, 0, 0.03);
    border-top: 1px solid rgba(0, 0, 0, 0.125);
}
.card-footer:last-child {
    border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
}

.card-header-tabs {
    margin-right: -0.5rem;
    margin-bottom: -0.5rem;
    margin-left: -0.5rem;
    border-bottom: 0;
}
.card-text {
    text-align: -webkit-center;
}

.card-header-pills {
    margin-right: -0.5rem;
    margin-left: -0.5rem;
}

.card-img-overlay {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 1rem;
    border-radius: calc(0.25rem - 1px);
}

.card-img,
.card-img-top,
.card-img-bottom {
    width: 100%;
}

.card-img,
.card-img-top {
    border-top-left-radius: calc(0.25rem - 1px);
    border-top-right-radius: calc(0.25rem - 1px);
}

.card-img,
.card-img-bottom {
    border-bottom-right-radius: calc(0.25rem - 1px);
    border-bottom-left-radius: calc(0.25rem - 1px);
}

.card-group > .card {
    margin-bottom: 0.75rem;
}
@media (min-width: 576px) {
    .card-group {
        display: flex;
        flex-flow: row wrap;
    }
    .card-group > .card {
        flex: 1 0 0%;
        margin-bottom: 0;
    }
    .card-group > .card + .card {
        margin-left: 0;
        border-left: 0;
    }
    .card-group > .card:not(:last-child) {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }
    .card-group > .card:not(:last-child) .card-img-top,
    .card-group > .card:not(:last-child) .card-header {
        border-top-right-radius: 0;
    }
    .card-group > .card:not(:last-child) .card-img-bottom,
    .card-group > .card:not(:last-child) .card-footer {
        border-bottom-right-radius: 0;
    }
    .card-group > .card:not(:first-child) {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    .card-group > .card:not(:first-child) .card-img-top,
    .card-group > .card:not(:first-child) .card-header {
        border-top-left-radius: 0;
    }
    .card-group > .card:not(:first-child) .card-img-bottom,
    .card-group > .card:not(:first-child) .card-footer {
        border-bottom-left-radius: 0;
    }
}
</style>