<template>
<v-layout row justify-center>
  <v-dialog v-model="dialog" persistent max-width="600px">
            <v-card class="p-5">
<div ref="pdfHtml" style="width:100%;" class="mx-auto mt-4">
<h4 style="text-align:center">
    <img v-if="system['logo']" :src="'uploads/'+system['logo']" alt="logo" width="150" class="logo"/>
            <span v-else class="invoice_text">
                {{trans('messages.invoice')}}
            </span>
            </h4>
            <v-divider />
<p class="text-center"> <span >
        {{trans('messages.invoice_number')}}:
      </span>
     <span>{{invoice.ref_no}}</span></p>

  <!-- Customer Address -->
  <div class="row">
    <div class="column" style="margin-left: 22px;">
      <h4 class="">
          {{trans('messages.billed_to')}}: <br>
      </h4>
      <p>{{trans('data.name')}}: {{invoice.customer.name}}</p>
      <p>{{trans('data.mobile')}}: {{invoice.customer.mobile}}</p>
      <p>{{trans('messages.email')}}: {{invoice.customer.email}}</p>
      <p>{{trans('messages.current_address')}}: {{invoice.customer.current_address}}</p>


    </div>



    <div class="column">
      <span>
          {{trans('messages.invoice_total')}}:
      </span>
        <span class="currency invoice_total">
            {{invoice_total}}
        </span><br>

      <span>
        {{trans('messages.date_of_issue')}}:
      </span>
       <span>{{invoice.transaction_date}}</span>
    </div>
  <br><br>
  <v-divider class="my-2"/>
  <!-- invoice description -->
 <table width="100%" id="invoice" class="mx-2">
    <thead class="">
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
                <span class="">
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
                <span class="">
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
                <span class="">
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
                <span class="">
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
        <span class="">
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

          const pdf = new jsPDF("p", "mm", "a4", true, { compress: true });
          
      /*  pdf.html(Html, {
    callback: function(doc) {
        // Save the PDF
         doc.setLanguage("ar-AR")
        doc.save('sample-document.pdf');
    },
    x: 15,
    y: 15,
    width: 170, //target width in the PDF document
    windowWidth: 650 //window width in CSS pixels
});*/
      html2canvas(Html,{
        margin: [-50, 10, 10, 10],
        autoPaging: 'text',
        x: 0,
        y: 0,
    scale: 1.2, //target width in the PDF document
    height:6000,
    windowWidth: 650 //window width in CSS pixels
      })
      .then((canvas) => {
        const imgData = canvas.toDataURL('image/png');
        pdf.addImage(imgData, 'PNG', 0, 15)
        this.pdfBlob = pdf.output('blob');//205,285 mm
        window.open(pdf.output("bloburl"), "_blank")
  });
    },
}
}
</script>

<style>

</style>
