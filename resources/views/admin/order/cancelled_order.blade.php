@extends('admin.master')

@section('title', 'CancelOrder')

@section('content')
<!-- Button trigger modal -->
<div class="d-flex justify-content-end mr-4">
    <button type="button" class="btn btn-success mt-4" data-toggle="modal" data-target="#exampleModalCenter">
       Cancel Order
    </button>
</div>



{{-- show data  table--}}
<div class="container mt-4">
    <div class="card">

        <div class="card-header">
            <h3>Pending Order </h3>
        </div>
        @php
        $index=1;
        @endphp
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>

                        <th>Order Number</th>
                        <th>Product Name</th>
                        <th>Total Price</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($orders as $order)


                    <tr>
                        <td>{{ $index++ }}</td>
                     <td>  <a href="{{ route('view.order',$order->id) }}">{{ $order->invoice_number}}</a></td>

                        <td>{{ $order->payment_type}}</td>
                        <td>{{ $order->total}}৳</td>

                        <td>{{ $order->created_at->format('d-m-Y') }}</td>
                        <td>

                            <form action="{{ route('update.order.status', $order->id) }}" method="POST" class="status-form">
                                @csrf
                                @method('PUT')
                                <select name="status_single" id="status" onchange="confirmAndSubmit(this)" class="bg-success">
                                    <option value="">Select</option>
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Confirm</option>
                                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancel</option>
                                </select>
                            </form>
                        </td>


                    </tr>


                    @endforeach

                </tbody>
            </table>
        </div>





    </div>
</div>




<script>
    function confirmAndSubmit(selectElement) {
        if (confirm('Are you sure you want to change the status?')) {
            selectElement.closest('form').submit();
        } else {
            // Reset the select element to its previous value if the user cancels the action
            selectElement.value = selectElement.defaultValue;
        }
    }
</script>



@endsection
