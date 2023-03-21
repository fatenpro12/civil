<template>
    <div class="component-wrap">
        <v-layout row justify-center>
            <v-dialog v-model="dialog">
                <v-card>
                    <v-card-title>
                        <v-icon>receipt</v-icon>
                        <div v-if="invoice.status == 'estimate'">
                            <span class="headline">
                                {{ trans('messages.estimate_details') }} (
                                <strong> {{ trans('messages.estimate_number') }}: </strong>
                                <span>{{ invoice.ref_no }}</span> )
                            </span>
                        </div>
                        <div v-else>
                            <span class="headline">
                                {{ trans('messages.invoice_details') }} (
                                <strong> {{ trans('messages.invoice_number') }}: </strong>
                                <span>{{ invoice.ref_no }}</span> )
                            </span>
                        </div>
                        <v-spacer></v-spacer>
                        <v-btn @click="dialog = false" flat small icon>
                            <v-icon>clear</v-icon>
                        </v-btn>
                    </v-card-title>
                    <v-divider></v-divider>
                    <v-card-text>
                        <v-container grid-list-md>
                            <v-layout wrap>
                                <v-flex xs12 sm8 md8 v-if="customer" class="justify-around">
                                    <div>
                                    {{ trans('messages.customer') }} : 
                                    <strong> {{ customer.name }} </strong> 
</div>
<div>
                                    {{ trans('messages.tax_number') }} :
                                    <span>{{ customer.tax_number }} </span>
</div>
<div>
                                    {{ trans('messages.mobile') }} :
                                    <span>{{ customer.mobile }} </span>
                                    </div>
                                </v-flex>
                                 <v-flex xs12 sm12 md12 class="justify-around">
                                       <div>
                                    <span class="font-bold"> {{ trans('messages.title') }} : </span>
                                    <span>{{ invoice.title }} </span>
</div>
                                    <div v-if="invoice.status == 'estimate'">
                                        <span class="font-bold"> {{ trans('messages.estimate_number') }} : </span>
                                        <span> {{ invoice.ref_no }}</span> 
                                    </div>
                                    <div v-else>
                                        <span class="font-bold"> {{ trans('messages.invoice_number') }} : </span>
                                        <span> {{ invoice.ref_no }}</span> 
                                    </div>
                                    <div>
                                    <span class="font-bold"> {{ trans('messages.payment_status') }} : </span>
                                    {{ trans('messages.' + invoice.payment_status) }}
</div>
                                    </v-flex>
                                <v-flex xs12 sm12 md12 class="justify-around">
                                 

<div>
                                    <span class="font-bold"> {{ trans('messages.date') }} : </span>
                                    <span>
                                        {{ invoice.transaction_date | formatDate }}
                                    </span>
                                 </div>

                                    <div v-if="!_.isNull(invoice.due_date)">
                                        <span class="font-bold"> {{ trans('messages.due_date') }} : </span>
                                        <span>
                                            {{ invoice.due_date | formatDate }}
                                        </span>
                           
                                    </div>
<div>
                                    <span class="font-bold">  {{ trans('messages.discount_type') }} : </span>
                                    {{ trans('messages.' + invoice.discount_type) }} </div>
                                </v-flex>
                            </v-layout>
                            <v-layout wrap>
                                <v-flex xs12 sm12 md12>
                                    <table class="v-datatable v-table theme--dark">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ trans('messages.task') }}</th>
                                                <th>
                                                    {{ trans('messages.rate') }}
                                                </th>
                                                <th>{{ trans('messages.quantity') }}</th>
                                                <th>{{ trans('messages.tax') }} (%)</th>
                                                <th>
                                                    {{ trans('messages.total') }}
                                                    ({{ currency }})
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-md-center">
                                            <tr
                                                v-for="(invoice_line, index) in invoice_lines"
                                                :key="index"
                                            >
                                                <td>{{ index + 1 }}</td>
                                                <td>
                                                    {{ invoice_line.short_description }}
                                                </td>
                                                <td>{{ invoice_line.rate }}</td>
                                                <td>
                                                    {{ invoice_line.quantity }}
                                                    {{ invoice_line.unit }}
                                                </td>
                                                <td>{{ invoice_line.tax }}</td>
                                                <td>
                                                    {{
                                                        invoice_line.total
                                                            | formatMoney(currency)
                                                    }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </v-flex>
                            </v-layout>
                            <v-layout wrap>
                                <v-flex xs12 sm12 md6>
                                    <table class="v-datatable v-table theme--dark">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ trans('messages.amount') }}</th>
                                                <th>{{ trans('messages.paid_on') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-md-center">
                                            <tr
                                                v-for="(payment, index) in invoice_payments"
                                                :key="index"
                                            >
                                                <td>{{ index + 1 }}</td>
                                                <td>
                                                    {{
                                                        payment.amount
                                                            | formatMoney(currency)
                                                    }}
                                                </td>
                                                <td>
                                                    {{ payment.paid_on | formatDate }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </v-flex>
                                <v-flex xs12 sm12 md6>
                                    <table class="v-datatable v-table theme--dark">
                                        <tbody>
                                            <tr>
                                                <th>{{ trans('messages.sub_total') }} :</th>
                                                <td></td>
                                                <td>
                                                    {{ sub_total | formatMoney(currency) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>{{ trans('messages.tax') }} (%):</th>
                                                <td>(+)</td>
                                                <td>{{ total_tax }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ trans('messages.discount') }} :</th>
                                                <td>(-)</td>
                                                <td>
                                                    {{
                                                        invoice.discount_amount
                                                            | formatMoney(currency)
                                                    }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>{{ trans('messages.total') }} :</th>
                                                <td></td>
                                                <td>
                                                    {{
                                                        invoice.total | formatMoney(currency)
                                                    }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </v-flex>
                            </v-layout>
                            <v-layout wrap>
                                <v-flex xs12 sm6 md6>
                                    {{ trans('messages.terms') }} : <br />
                                    <span v-html="invoice.terms" id="project_info"></span>
                                </v-flex>
                                <v-flex xs12 sm6 md6>
                                    {{ trans('messages.notes') }} : <br />
                                    <span v-html="invoice.notes" id="project_info"></span>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="green darken-1" flat @click="dialog = false">
                            {{ trans('messages.close') }}
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-layout>
    </div>
</template>
<script>
export default {
    data() {
        return {
            dialog: false,
            invoice: [],
            customer: [],
            invoice_lines: [],
            invoice_payments: [],
            sub_total: 0,
            total_tax: 0,
            currency: [],
        };
    },
    methods: {
        view(invoice_params) {
            const self = this;
            axios
                .get('/invoices/' + invoice_params.transaction_id, {
                    params: { project_id: invoice_params.project_id },
                })
                .then(function(response) {
                    self.invoice = response.data.transaction;
                    self.customer = response.data.transaction.customer;
                    self.currency = response.data.currency;
                    self.invoice_lines = response.data.transaction.invoice_lines;
                    self.calculateSubtotalAndTax(self.invoice_lines);
                    self.invoice_payments = response.data.transaction.payments;
                    self.dialog = true;
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        calculateSubtotalAndTax(invoice_lines) {
            const self = this;
            var total = 0;
            var tax = 0;
            var total_tax = 0;
            var row_total_inc_tax = 0;

            if (self.sub_total == 0) {
                _.forEach(invoice_lines, function(line) {
                    total = _.add(parseFloat(line.total), total);
                });
                self.sub_total = _.floor(total, 2);
            }
            if (self.total_tax == 0) {
                _.forEach(invoice_lines, function(line) {
                    tax = _.divide(parseFloat(line.tax), 100);
                    row_total_inc_tax = _.multiply(tax, parseFloat(line.total));
                    total_tax = _.add(row_total_inc_tax, total_tax);
                });

                self.total_tax = _.floor(total_tax, 2);
            }
        },
    },
};
</script>
