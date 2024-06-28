@extends('admin.master')

@section('title', 'PendingOrder')

@section('content')
<!-- Button trigger modal -->
<div class="d-flex justify-content-end mr-4">
    <button type="button" class="btn btn-success mt-4" data-toggle="modal" data-target="#exampleModalCenter">
        Pending Order
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


 <form action="{{ route('update.order.status.all') }}" method="POST" id="status-form">
    @csrf
    @method('PUT')
    <select name="status_bulk" id="status" onchange="confirmAndSubmit(this)" class="bg-success p-3" disabled>
        <option value="">Select Status</option>
        <option value="pending">Pending</option>
        <option value="confirmed">Confirm</option>
        <option value="delivered">Delivered</option>
        <option value="cancelled">Cancel</option>
    </select>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th><input type="checkbox" value="" id="selectall"></th>
                    <th>Invoice number</th>
                    <th>Payment</th>
                    <th>Total Price</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $index => $order)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><input type="checkbox" class="item" name="order_ids[]" value="{{ $order->id }}"></td>
         </form>
                    <td><a href="{{ route('view.order', $order->id) }}">{{ $order->invoice_number }}</a></td>
                    <td>{{ $order->payment_type }}</td>
                    <td>{{ $order->total }}৳</td>
                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                    <td>
                        <form action="{{ route('update.order.status',$order->id) }}" method="POST" class="status-form" id="single-status">
                            @csrf
                            @method('PUT')
                            <select name="status_single" id="status" onchange="confirmAndSubmitsingle(this)" class="bg-success">
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


{{-- multiple status change   ++ select check box+ collect multple id+ disbale select option  --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Select all checkboxes
        $('#selectall').click(function() {
            $('.item').prop('checked', this.checked);
            toggleStatusDropdown();
        });

        // Update the "select all" checkbox based on individual selections
        $('.item').click(function() {
            if ($('.item:checked').length === $('.item').length) {
                $('#selectall').prop('checked', true);
            } else {
                $('#selectall').prop('checked', false);
            }
            toggleStatusDropdown();
        });

        // Enable or disable status dropdown based on selection
        function toggleStatusDropdown() {
            if ($('.item:checked').length > 0) {
                $('#status').prop('disabled', false);
            } else {
                $('#status').prop('disabled', true);
                $('#status').val('');
            }
        }

        // Initially disable the status dropdown
        toggleStatusDropdown();
    });

    function confirmAndSubmit(select) {
        var status = $(select).val();
        var selectedItems = $('.item:checked');

        if (status !== '' && selectedItems.length > 0) {
            if (confirm('Are you sure you want to update the status of selected orders to "' + status + '"?')) {
                selectedItems.each(function() {
                    if (!$('#status-form input[name="order_ids[]"][value="' + $(this).val() + '"]').length) {
                        $('#status-form').append('<input type="hidden" name="order_ids[]" value="' + $(this).val() + '">');
                    }
                });
                $('#status-form').submit();
            } else {
                // Revert the status selection if not confirmed
                $(select).val('');
            }
        }
    }

    function confirmAndSubmitsingle(select) {
        var form = $(select).closest('form');
        var status = $(select).val();
        if (status !== '') {
            if (confirm('Are you sure you want to update the status of this order to "' + status + '"?')) {
                form.submit();
            } else {
                // Revert the status selection if not confirmed
                $(select).val('');
            }
        }
    }
</script>




@endsection
