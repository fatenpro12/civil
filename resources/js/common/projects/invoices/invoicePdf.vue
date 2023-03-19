<template>
<v-layout row justify-center>
  <v-dialog v-model="dialog" persistent max-width="600px">
            <v-card class="p-5">
<div ref="pdfHtml">
<h3 style="text-align:center">
    <img v-if="system['logo']" :src="'uploads/'+system['logo']" alt="logo" width="150" class="logo"/>
            <span v-else class="invoice_text">
                {{trans('messages.invoice')}}
            </span>
            </h3>
            <v-divider />
<p> <span class="grey text-center">
        {{trans('messages.invoice_number')}}:  
      </span>
     <span>{{invoice.ref_no}}</span></p>

  <!-- Customer Address -->
  <div class="row">
    <div class="column" style="margin-left: 22px;">
      <h4 class="lightgray">
          {{trans('messages.billed_to')}}: <br>
      </h4>
      <p>{{trans('data.name')}}: {{invoice.customer.name}}</p>
      <p>{{trans('data.mobile')}}: {{invoice.customer.mobile}}</p>
      <p>{{trans('messages.email')}}: {{invoice.customer.email}}</p>
      <p>{{trans('messages.current_address')}}: {{invoice.customer.current_address}}</p>
 

    </div>



    <div class="column">
      <span class="grey">
          {{trans('messages.invoice_total')}}:
      </span>
        <span class="currency invoice_total">
            {{invoice_total}}
        </span><br>

      <span class="grey">
        {{trans('messages.date_of_issue')}}: 
      </span>
       <span>{{invoice.transaction_date}}</span>
    </div>
  <br><br>
  <hr class="divider">
  <!-- invoice description -->
 <table width="100%" id="invoice">
    <thead class="blue">
      <tr>
        <th> # </th>
        <th> {{trans('messages.description')}} </th>
        <th> 
          {{trans('messages.rate')}} 
          <span class="currency">
          ({{invoice.currency}})
          </span>
        </th>
        <th> {{trans('messages.quantity')}} </th>
        <th> {{trans('messages.tax')}} (%) </th>
        <th> {{trans('messages.total')}}
          <span class="currency">
            ({{invoice.currency}})
          </span>
        </th>
      </tr>
    </thead>

    <tbody>
        <tr>
          <td class="tr_border">
            <span class="currency">
              {{rate}}
            </span>
          </td>
          <td class="tr_border">
            {{quantity}}
          </td>
          <td class="tr_border">
            <span class="currency">
              {{tax}}
            </span>
          </td>
          <td class="tr_border"> 
            <span class="currency">
              {{total}}
            </span>
          </td>
        </tr>

    </tbody>
    <tfoot>
        <tr>
            <td colspan="4"></td>
            <th class="invoice_footer"> 
                <span class="blue">
                    {{trans('messages.subtotal')}}
                    </span>
            </th>
            <td class="invoice_footer"> 
              <span class="currency">
                {{subtotal}}
              </span>
            </td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <th>
                <span class="blue">
                    {{trans('messages.discount')}}
                </span>
            </th>
            <td> 
              <span class="currency">
                {{discount_amount}}
              </span>
            </td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <th>
                <span class="blue">
                    {{trans('messages.tax')}}
                </span>
            </th>
            <td> 
              <span class="currency">
                {{total_tax}}
              </span>
            </td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <th>
                <span class="blue">
                    {{trans('messages.total')}}
                </span>
            </th>
            <td> 
              <span class="currency">
                {{invoice_total}}
              </span>
            </td>
        </tr>
    </tfoot>
  </table>

  <div class="row">
    <div class="terms" v-if="invoice.terms">
        <span class="grey">
            {{trans('messages.invoice_terms')}} <br>
          </span>
          {{invoice.terms}}
    </div>
  </div>
  </div>
</div>
  <v-card-actions class="flex-wrap">
                    <v-spacer></v-spacer>
                    <v-btn color="green darken-1" flat @click="dialog=false">
                        {{ trans('data.cancel') }}
                    </v-btn>
                   
                    
                    <v-btn color="success" @click="printPdf">
                        {{ trans('data.print') }}
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
</v-layout>
</template>

<script>
import jsPDF from 'jspdf';
import html2canvas from "html2canvas"
export default {
    data(){
return{
  pdfBlob: null,
  invoice: null,
  dialog :false,
 system: null,
 invoice_total: null,
 total_tax: null,
 discount_amount: null,
rate:null,
tax: null,
quantity: null,
total: null,
subtotal: null
}
  },
        components:{
jsPDF
  },

methods:{
  create(data){
    axios.get('invoices/'+data.id+'/download')
    .then(response => {
console.log(response)
this.dialog=true;
this.discount_amount = response.data.discount_amount
this.total_tax = response.data.discount_amount
this.rate= response.data.rate
this.tax= response.data.tax
this.invoice = response.data.invoice
this.system = response.data.system
this.invoice_total = response.data.invoice_total
this.subtotal = response.data.subtotal
this.quantity = response.data.quantity
this.total = response.data.total

    })
  },
   printPdf() {
    //  const doc = new jsPDF("p", "pt", "a4", true, { compress: true });
      const Html = this.$refs.pdfHtml;
      
          const pdf = new jsPDF("", "", "a4", true, { compress: true });
          console.log(this.$refs,Html,pdf)
      html2canvas(Html,{
        scale: 0.66,
        height: 3000
      })
      .then((canvas) => {
        const imgData = canvas.toDataURL('image/png');
        pdf.addImage(imgData, 'PNG',2,2)
        this.pdfBlob = pdf.output('blob');//205,285 mm
        window.open(pdf.output("bloburl"), "_blank")
  });
    },
}
}
</script>

<style>

</style>