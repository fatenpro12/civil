<template>
    <div class="component-wrap">
        <v-container grid-list-md>
            <v-flex pt-3 pb-4>
                <h1   style="color:#0000008a;" class="text-md-center"> {{ trans('data.Engineering_offices_system') }}</h1>
            </v-flex>
             <v-container grid-list-lg>
                <v-layout wrap>
                    <v-flex xs12 sm12 md6>
                        <v-hover  v-slot:default="{ hover }" open-delay="100" close-delay="100">
                            <v-card :elevation="hover ? 16 : 2">
                                <v-card-text>
                                    <div class="my-2">
                                        <v-flex xs12 sm12 md12 class="text-md-center">
                                               <v-progress-circular
                                                :rotate="180"
                                                :size="100"
                                                :width="10"
                                                :value="
                                                    projectProgress(
                                                        project_counts_completed.total,
                                                           project_counts_completed.completed
                                                    )
                                                "
                                                color="teal"
                                            >
                                                {{
                                                    projectProgress(
                                                   
                                                        project_counts_completed.total,
                                                             project_counts_completed.completed
                                                    )
                                                }}
                                            </v-progress-circular>
                                        </v-flex>
                                        <div class="text-md-center mt-2">
                                            <v-btn outline  large :color="'#06706d'" @click="$router.push('/finished-projects')">{{ trans('data.finished_projects') }}</v-btn>
                                        </div>                                    
                                    </div>
                                </v-card-text>
                            </v-card>
                        </v-hover>
                </v-flex>
                <v-flex xs12 sm12 md6>
                        <v-hover  v-slot:default="{ hover }" open-delay="100" close-delay="100">
                            <v-card :elevation="hover ? 16 : 2">
                                <v-card-text>
                                    <div class="my-2">
                                        <v-flex xs12 sm12 md12 class="text-md-center">
                                            <v-progress-circular
                                                :rotate="180"
                                                :size="100"
                                                :width="10"
                                                :value="
                                                    projectProgress(
                                                        project_counts.incompleted,
                                                        project_counts.total
                                                    )
                                                "
                                                color="teal"
                                            >
                                                {{
                                                    projectProgress(
                                                        project_counts.incompleted,
                                                        project_counts.total
                                                    )
                                                }}
                                            </v-progress-circular>
                                        </v-flex>
                                        <div class="text-md-center mt-2">
                                            <v-btn outline  large :color="'#06706d'" @click="goToProjects">{{ trans('data.current_projects') }}</v-btn>
                                        </div>                                    
                                    </div>
                                </v-card-text>
                            </v-card>
                        </v-hover>
                </v-flex>
                
            </v-layout>
        </v-container>
        <v-layout row-wrap  mb-2>
            <v-flex >
                <v-card elevation="4" xs12 sm4 md4>
                    <v-card-title>
                        <span class="headline">
                        <v-icon>receipt</v-icon>
                            {{ trans('data.warnings') }} & {{ trans('data.notification') }}
                        </span>
                        </v-card-title>
                        <v-divider></v-divider>
                        <v-card-text>
                            <v-container grid-list-lg>
                                <v-layout wrap>
                                        <v-flex xs12 sm12 md6>
                                            <v-data-table
                                                :headers="headers"
                                                :pagination.sync="pagination"
                                                :total-items="total_items"
                                                :loading="loading"
                                                :items="items"
                                                class="elevation-3"
                                            >
                                                <template slot="headerCell" slot-scope="props">
                                                    <span v-if="props.header.value == 'warrning_date'">
                                                        {{ props.header.text }}
                                                    </span>
                                                    <span v-else-if="props.header.value == 'warrning_message'">
                                                        {{ props.header.text }}
                                                    </span>
                                                    <span v-else>{{ props.header.text }}</span>
                                                </template>

                                                <template slot="items" slot-scope="props">
                                                    <td>
                                                        <v-menu>
                                                            <v-btn icon slot="activator"> <v-icon>more_vert</v-icon> </v-btn>
                                                                <v-list>
                                                                    <v-list-tile
                                                                        @click="
                                                                            $router.push({
                                                                                name: 'customers.show',
                                                                                params: { id: props.item.id },
                                                                            })
                                                                        "
                                                                    >
                                                                    <v-list-tile-title>
                                                                        <v-icon small class="mr-2"> visibility </v-icon>
                                                                            {{ trans('messages.view') }}
                                                                        </v-list-tile-title>
                                                                    </v-list-tile>

                                                                    <v-list-tile
                                                                        @click="edit(props.item.id)"
                                                                    >
                                                                        <v-list-tile-title>
                                                                            <v-icon small class="mr-2"> edit </v-icon>
                                                                            {{ trans('messages.edit') }}
                                                                        </v-list-tile-title>
                                                                    </v-list-tile>

                                                                    <v-list-tile
                                                                        @click="deleteCustomer(props.item)"
                                                                    >
                                                                    <v-list-tile-title>
                                                                        <v-icon small class="mr-2"> delete_forever </v-icon>
                                                                            {{ trans('messages.delete') }}
                                                                        </v-list-tile-title>
                                                                    </v-list-tile>
                                                                </v-list>
                                                            </v-menu>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                    </template>
                                            </v-data-table>
                                                </v-flex>
                                            
                                                <v-flex xs12 sm12 md6>
                                                    <v-data-table
                                                        :headers="headersNotifications"
                                                        :pagination.sync="pagination"
                                                        :total-items="total_items"
                                                        :loading="loading"
                                                        :items="items"
                                                        class="elevation-3"
                                                    >
                                                    <template slot="headerCell" slot-scope="props">
                                                        <span v-if="props.header.value == 'warrning_date'">
                                                            {{ props.header.text }}
                                                        </span>
                                                        <span v-else-if="props.header.value == 'warrning_message'">
                                                            {{ props.header.text }}
                                                        </span>
                                                        <span v-else>{{ props.header.text }}</span>
                                                    </template>

                                                    <template slot="items" slot-scope="props">
                                                        <td>
                                                            <v-menu>
                                                                <v-btn icon slot="activator"> <v-icon>more_vert</v-icon> </v-btn>
                                                                <v-list>
                                                                    <v-list-tile
                                                                        
                                                                        @click="
                                                                            $router.push({
                                                                                name: 'customers.show',
                                                                                params: { id: props.item.id },
                                                                            })
                                                                        "
                                                                    >
                                                                        <v-list-tile-title>
                                                                            <v-icon small class="mr-2"> visibility </v-icon>
                                                                            {{ trans('messages.view') }}
                                                                        </v-list-tile-title>
                                                                    </v-list-tile>

                                                                    <v-list-tile
                                                                        
                                                                        @click="edit(props.item.id)"
                                                                    >
                                                                        <v-list-tile-title>
                                                                            <v-icon small class="mr-2"> edit </v-icon>
                                                                            {{ trans('messages.edit') }}
                                                                        </v-list-tile-title>
                                                                    </v-list-tile>

                                                                    <v-list-tile
                                                                        
                                                                        @click="deleteCustomer(props.item)"
                                                                    >
                                                                        <v-list-tile-title>
                                                                            <v-icon small class="mr-2"> delete_forever </v-icon>
                                                                            {{ trans('messages.delete') }}
                                                                        </v-list-tile-title>
                                                                    </v-list-tile>
                                                                </v-list>
                                                            </v-menu>
                                                        </td>
                                                        <td>test</td>
                                                    </template>
                                                </v-data-table>
                                                </v-flex>
                                        </v-layout>
                                    </v-container>
                                </v-card-text>
                            </v-card>
                        </v-flex>
                    </v-layout> 
        </v-container>
    </div>
</template>
<script>
export default {
    components: {
    },
    data() {
        const self = this;
        return {
            loading:false,
            total_items: 0,
            items: [],
            pagination: { totalItems: 0 },
            headersNotifications:[
                {
                    text: self.trans('messages.action'),
                    value: false,
                    align: 'centre',
                    sortable: false,
                },
                {
                    text: self.trans('data.notice_date'),
                    value: 'notice_date',
                    align: 'centre',
                    sortable: true,
                },
                {
                    text: self.trans('data.notice_message'),
                    value: 'notice_message',
                    align: 'centre',
                    sortable: true,
                },
            ],
            headers: [
                {
                    text: self.trans('messages.action'),
                    value: false,
                    align: 'centre',
                    sortable: false,
                },
                {
                    text: self.trans('data.warrning_date'),
                    value: 'warrning_date',
                    align: 'centre',
                    sortable: true,
                },
                {
                    text: self.trans('data.warrning_message'),
                    value: 'warrning_message',
                    align: 'centre',
                    sortable: true,
                },
            ],
            notificationsmessage:'',
            project_counts_completed:[],
            project_counts: [],
            task_counts: [],
            invoice_counts: [],
            invoice_paid_amount: null,
            invoice_totals: [],
            currencies: [],
            currency_symbols: [],
            selected_currency: null,
            total_amount: null,
            selected_currency_symbol: null,
            business_currency: [],
            sticky_notes: null,
        };
    },
    mounted() {
        const self = this;
        self.getDashboardDataFromApi();
        self.$eventBus.$on('updateDashboard', data => {
            self.getDashboardDataFromApi();
        });
    },
    beforeDestroy() {
        const self = this;
        self.$eventBus.$off('updateDashboard');
    },
    created(){
    //    console.log(this.desserts);
    },
    watch: {
        pagination: {
            handler() {
                this.getDataFromApi();
            },
        },
    },
    methods: {
         getDataFromApi() {
            const self = this;
            //self.loading = true;
            const { sortBy, descending, page, rowsPerPage } = self.pagination;
            var params = {
                sort_by: sortBy,
                descending: descending,
                page: page,
                rowsPerPage: rowsPerPage,
            };
        },
        goToProjects(){
           this.$router.push('/project');
        },
        goToReview(){
            this.$router.push('/');
        },
        getDashboardDataFromApi() {
            const self = this;
            axios
                .get('/enginner_office/dashboards')
                .then(function(response) {
                    self.project_counts = response.data.project_counts;
                    self.project_counts_completed=response.data.project_counts_completed;
                    self.task_counts = response.data.task_counts;
                    self.invoice_counts = response.data.invoice_counts;
                    self.invoice_totals = response.data.invoice_totals;
                    self.initTicketPieChart(
                        response.data.ticket_pie_chart_label,
                        response.data.ticket_pie_chart_dataset
                    );
                    self.paymentStatusCount(response.data.payment_status_count);
                    self.currenciesInArray(response.data.currencies);
                    self.selected_currency = response.data.business_currency.id;
                    self.business_currency = response.data.business_currency;
                    self.currencyChanged();
                    self.sticky_notes = response.data.sticky_notes;
                    if (self.$can('superadmin')) {
                        self.initTransactionPieChart(
                            response.data.transaction_pie_chart_label,
                            response.data.transaction_pie_chart_datasets
                        );
                    }
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        currencyChanged() {
            const self = this;
            for (var key in self.invoice_counts) {
                if (self.selected_currency == self.invoice_counts[key].currency_id) {
                    self.invoice_paid_amount = self.invoice_counts[key].paid_amount;
                    self.total_amount = self.invoice_counts[key].total_amount;
                    self.selected_currency_symbol = self.invoice_counts[key].currency_symbol;
                }
            }
        },
        currenciesInArray(currencies) {
            const self = this;

            var result = Object.keys(currencies).map(function(key) {
                return currencies[key];
            });

            self.currencies = result;
        },
        paymentStatusCount(paymentStatus) {
            var total_counts = 0;
            var total_not_paid = 0;
            var total_due = 0;
            var total_paid = 0;
            var total_partials = 0;

            _.forEach(paymentStatus, function(status) {
                total_counts = _.add(total_counts, parseInt(status.count));
                if (status.payment_status !== 'paid') {
                    total_not_paid = _.add(total_not_paid, parseInt(status.count));
                }
                if (status.payment_status == 'paid') {
                    total_paid = _.add(total_paid, parseInt(status.count));
                }
                if (status.payment_status == 'due') {
                    total_due = _.add(total_due, parseInt(status.count));
                }
                if (status.payment_status == 'partial') {
                    total_partials = _.add(total_partials, parseInt(status.count));
                }
            });
            this.invoice_totals.total_counts = total_counts;
            this.invoice_totals.total_not_paid = total_not_paid;
            this.invoice_totals.total_paid = total_paid;
            this.invoice_totals.total_due = total_due;
            this.invoice_totals.total_partials = total_partials;
        },
        saveStickyNotes() {
            axios.post('/admin/save-stick-notes', { sticky_notes: this.sticky_notes });
        },
        initTicketPieChart(labels, datasets) {
            var ctx = document.getElementById('ticketPieChart');

            var ticketPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            data: datasets,
                            backgroundColor: ['red', 'blue', 'green'],
                        },
                    ],
                },
            });
        },
        initTransactionPieChart(labels, datasets) {
            var ctx = document.getElementById('transactionPieChart');

            var ticketPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            data: datasets,
                            backgroundColor: ['green', 'red'],
                        },
                    ],
                },
            });
        },
    },
};
</script>
