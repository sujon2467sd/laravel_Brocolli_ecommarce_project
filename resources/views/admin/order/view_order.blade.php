@extends('admin.master')
@section('title', 'ViewOrder')
@section('content')


<div class="container py-4 ">
    <div class="row">
       <div class="col-12 d-flex justify-content-end pr-4">
         <a href="{{ route('invoice.pdf',$order->id) }}">  <button class="btn btn-danger btn-sm">Download Pdf</button></a>
       </div>
    </div>
</div>

<style>


    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 35px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
        background: #eee;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
        border-collapse: collapse;

    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

</style>


<div class="container py-4 ">


    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ asset('admin/logo_images/'.$logo->logo_img) }}" style="width: 50%; max-width: 300px" />
                            </td>

                            <td>
                                         <br />
                             <b>   Invoice:{{ $order->invoice_number }} </b> <br />
                                  Date: {{ $order->created_at->format('d-m-Y') }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <b>Billding Address</b><br>
                                {{$settings->gmail}}<br />
                               {{ $settings->address }}<br />
                               01701103784
                            </td>

                            <td>
                                    <b>Shipping Address</b><br />
                                {{ $shipping->name }}<br />
                                {{ $shipping->email }}<br>
                                {{ $shipping->address }}<br>
                               {{ $shipping->city }} <br>
                               {{ $shipping->phone }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Payment Method</td>

                <td>Check #</td>
            </tr>

            <tr class="details">
                <td>{{ $order->payment_type }}</td>

                <td>1000</td>
            </tr>

            <tr class="headings bg-info">
                <td>Item</td>
                <td>Price</td>

            </tr>

            @foreach ($iteams as $item)
            <tr class="item " >
                <td>{{ $item->product->name }} x {{ $item->product_qty }} -------------------- <img src="{{ asset('product_images/'.$item->product->image_path) }}" alt="" width="40px"></td>

                <td>{{ $item->product->price *  $item->product_qty }}  &#x9F3;</td>
            </tr>



            @endforeach

            <tr>
                <td>Tax</td>

                @php
                $percentage = 0;

                // Loop through each item and calculate the 2% of its total price
                foreach ($iteams as $item) {
                    $itemTotal = $item->product->price * $item->product_qty;
                    $percentage += $itemTotal * 0.02; // Calculate 2% and add to the total percentage
                }
             @endphp

                <td>{{  $percentage }}  &#x9F3;</td>
            </tr>

            <tr>
                <td>Delivery Charge</td>
                <td>{{ $order->delever_charge }}  &#x9F3;</td>
            </tr>



            {{-- <tr class="item">
                <td>Hosting (3 months)</td>

                <td>$75.00</td>
            </tr>

            <tr class="item last">
                <td>Domain name (1 year)</td>

                <td>$10.00</td>
            </tr> --}}

            <tr class="total bg-gray">
                <td>Total</td>

                <td>  {{  $order->total }} &#x9F3; </td>
                <td></td>
            </tr>

        </table>
        <p class="mt-4">Thank You Buy From Us <a href="">brocolli</a><br>
            {{$settings->facebook}}<br>
            {{$settings->instagram}}<br>
            {{$settings->twitter}}<br>
        </p>
    </div>
</div>



@endsection
