@extends('frontend.master')

@section('title', 'OrderView')

@section('content')

<div class="container mt-4 p-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header bg-success">Order Details</h5>
                <div class="card-body">
                    {{-- <h5 class="card-title">{{$orders->invoice_number }}</h5> --}}
                    <style>
                        #details{
                            background-color:red;
                        }
                    </style>
                    <table class="table table-bordered" id="details">
                        <thead>


                            <tr class="bg-danger">
                                <th scope="col text-center">invoice number</th>
                                <td>{{$orders->invoice_number }} </td>
                            </tr class="bg-warning">
                            @foreach ($shipping as $address)
                            <tr  class="bg-danger">
                                <th scope="col text-center">Name</th>
                                <td>{{$address->name }} </td>
                            </tr>
                            <tr  class="bg-danger">
                                <th scope="col text-center">email</th>
                                <td>{{$address->email }} </td>
                            </tr>
                            <tr  class="bg-danger">
                                <th scope="col text-center">Address</th>
                                <td>{{$address->address }} </td>
                            </tr>

                            <tr  class="bg-danger">
                                <th scope="col text-center">phone</th>
                                <td>{{$address->phone }} </td>
                            </tr>
                            <tr  class="bg-danger">
                                <th scope="col text-center">Charge</th>
                                <td>{{$address->delever_charge }} </td>
                            </tr>



                            @endforeach

                        </thead>

                    </table>


                    <table class="table table-bordered bg-success">
                        @php
                        $y=1;
                        @endphp
                        @foreach ($iteams as $item)

                        <tr  class="bg-success">
                            <th scope="col text-center">#</th>
                            <td>{{$y++ }} </td>


                            <th scope="col text-center">Sku</th>
                            <td>{{$item->product->sku  }} </td>


                            <th scope="col text-center">Code</th>
                            <td>{{$item->product->code }} </td>
                        </tr>
                        <tr  class="bg-success">
                            <th scope="col text-center">product name</th>
                            <td>{{$item->product->name }} </td>
                            <th scope="col text-center">Qty</th>
                            <td>{{$item->product_qty}} </td>
                            <th scope="col text-center">img</th>
                            <td><img src="{{ asset('product_images/'.$item->product->image_path) }}" width="100px"
                                    alt=""> </td>
                            <th scope="col text-center">price</th>
                            <td>{{$item->product->price}} </td>

                        </tr>
                        <tr>

                        </tr>
                        <tr>


                        </tr>


                        @endforeach


                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
