@extends('admin.master')

@section('title', 'ConfirmOrder')

@section('content')
<!-- Button trigger modal -->
<div class="d-flex justify-content-end mr-4">
    <button type="button"  class="btn btn-success mt-4" data-toggle="modal" data-target="#exampleModalCenter">
       Confirm Order
    </button>
</div>




{{-- show data  table--}}
<div class="container mt-4">
    <div class="card">

        <div class="card-header">
            <h3>Confirm Order </h3>
        </div>
        @php
        $index=1;
        @endphp
    <form action="{{ route('download.pdf.bulk') }}" method="GET" id="status-form">
        @csrf

        <div class="card-body">
            <button id="status" class="btn btn-warning mb-4" type="submit" disabled>Download Invoice</button>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><input type="checkbox" value="" id="selectall"></th>
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
                        <td><input type="checkbox" class="item" name="order_ids[]" value="{{ $order->id }}"></td>
                        <td><a href="{{ route('view.order', $order->id) }}">{{ $order->invoice_number }}</a></td>
                        <td>{{ $order->payment_type }}</td>
                        <td>{{ $order->total }}৳</td>
                        <td>{{ $order->created_at->format('d-m-Y') }}</td>
                        <td>
                            <form action="{{ route('update.order.status', $order->id) }}" method="POST" class="status-form">
                                @csrf
                                @method('PUT')
                                <select name="status_single" id="status-{{ $order->id }}" onchange="confirmAndSubmit(this)" class="bg-success">
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
    </form>

    <script>
        $(document).ready(function() {
            // Select all checkboxes
            $('#selectall').click(function() {
                $('.item').prop('checked', this.checked);
                toggleDownloadButton();
            });

            // Update the "select all" checkbox based on individual selections
            $('.item').click(function() {
                if ($('.item:checked').length === $('.item').length) {
                    $('#selectall').prop('checked', true);
                } else {
                    $('#selectall').prop('checked', false);
                }
                toggleDownloadButton();
            });

            // Enable or disable the download button based on selection
            function toggleDownloadButton() {
                if ($('.item:checked').length > 0) {
                    $('#status').prop('disabled', false);
                } else {
                    $('#status').prop('disabled', true);
                }
            }

            // Initially disable the download button
            toggleDownloadButton();
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
    </script>


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
