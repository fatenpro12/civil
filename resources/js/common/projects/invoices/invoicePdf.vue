<template>
   <table width="100%" class="information">
    <tr>
      <td align="left" style="width: 50%;">
          <img v-if="system['logo']" src="uploads/{{system['logo']}}" alt="logo" width="150" class="logo"/>
            <span v-else class="invoice_text">
                {{trans('messages.invoice')}}
            </span>
      </td>
      <td align="center" style="width: 20%;">
            {{ config('app.name') }} <br>
            {{system['email']?system['email']:''}} <br>
            {{system['mobile']?system['mobile']:''}} <br>
            {{system['alternate_contact_no']?system['alternate_contact_no']:''}} <br>

      </td>
      <td align="right" class="company_address" style="width: 30%;">
                {{system['address_line_1']}} <br>

                {{system['address_line_2']}} <br>

                {{system['city']}} <br>

                {{system['state']}} <br>

                {{system['country']}} <br>

                {{system['zip_code']}} <br>

      </td>
    </tr>
  </table>

  <br/><br/>

  @php
    $currency = $customer_currency?->currency?->symbol;

    $invoice_total = $currency.' '.(number_format($invoice->total, 2));

    $discount_amount = $currency.' '.(number_format($invoice->discount_amount, 2));
  @endphp
  <!-- Customer Address -->
  <div class="row">
    <div class="column" style="margin-left: 22px;">
      <span class="grey">
          {{trans('messages.billed_to')}} <br>
      </span>
        {{$invoice.customer?.company}} <br>

            {{$invoice.customer.billing_address}} <br>

            {{$invoice.customer.tax_number}} <br>

            {{$invoice.customer.mobile}} <br>

            {{$invoice.customer.city}}

            , {{$invoice.customer.state}}

            , {{$invoice.customer.country}} <br>

          {{$invoice.customer.zip_code}} <br>

    </div>

    <div class="column">
      <span class="grey">
        {{trans('messages.invoice_number')}} <br>
      </span>
      {{$invoice->ref_no}}<br><br>
      <span class="grey">
        {{trans('messages.date_of_issue')}}
      </span><br>
      {{$invoice->transaction_date}}
    </div>

    <div class="column">
      <span class="grey" style="margin-right: 22px;">
          {{trans('messages.invoice_total')}} <br>
      </span>
        <span class="currency invoice_total">
            {{$invoice_total}}
        </span>
    </div>
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
          ({{$currency}})
          </span>
        </th>
        <th> {{trans('messages.quantity')}} </th>
        <th> {{trans('messages.tax')}} (%) </th>
        <th> {{trans('messages.total')}}
          <span class="currency">
            ({{$currency}})
          </span>
        </th>
      </tr>
    </thead>

    <tbody>
      @php
        $total_tax = 0;
        $subtotal = 0;
        $line_total = 0;
        $line_tax = 0;
      @endphp
      @foreach($invoice->invoiceLines as $line)
        @php
            $line_tax += $line->tax;
            $line_total += $line->total;
            $currency = $customer_currency?->currency?->symbol;

            $subtotal = $currency.' '.(number_format($line_total, 2));

            $total_tax = $currency.' '.(number_format($line_tax, 2));

            $rate = number_format($line->rate, 2);
            $tax = number_format($line->tax, 2);
            $total = number_format($line->total, 2);
            $quantity = number_format($line->quantity, 2) .' '. $line->unit;

        @endphp
        <tr>
          <th class="tr_border v_align"> {{$loop->iteration}} </th>
          <td class="tr_border"> 
              {{$line->short_description}} 
              @if($line->long_description)
                <br>
                <span class="grey">
                    <small>{{$line->long_description}}</small>
                </span>
              @endif
          </td>
          <td class="tr_border">
            <span class="currency">
              {{$rate}}
            </span>
          </td>
          <td class="tr_border">
            {{$quantity}}
          </td>
          <td class="tr_border">
            <span class="currency">
              {{$tax}}
            </span>
          </td>
          <td class="tr_border"> 
            <span class="currency">
              {{$total}}
            </span>
          </td>
        </tr>
      @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4"></td>
            <th class="invoice_footer"> 
                <span class="blue">
                    {{trans('messages.subtotal')}}
            </th>
            <td class="invoice_footer"> 
              <span class="currency">
                {{$subtotal}}
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
                {{$discount_amount}}
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
                {{$total_tax}}
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
                {{$invoice_total}}
              </span>
            </td>
        </tr>
    </tfoot>
  </table>

  <div class="row">
    <div class="terms" v-if="$invoice.terms">
        <span class="grey">
            {{trans('messages.invoice_terms')}} <br>
          </span>
          {{$invoice.terms}}
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>