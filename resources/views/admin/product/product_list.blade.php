@extends('admin.master')

@section('title', 'Products List')



@section('content')

{{-- show data  table--}}
<div class="container pt-4">
    <div class="card">

        <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h3>Product List</h3>
              </div>
              <div class="col-6 d-flex justify-content-end">
                <button class="btn btn-success"><a href="{{ route('product.create') }}">Add Product</a></button>
              </div>
        </div>
        </div>




        @php
        $index=1;
        @endphp

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>

                        <th>Tittle</th>
                        <th>Category</th>
                        <th>product code</th>

                        <th>sku</th>
                        <th>price</th>
                        <th>img</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($products as $product)


                    <tr>
                        <td>{{ $index++ }}</td>
                        <td>{{ $product->name}}</td>
                          <td>{{ $product->category->name }}</td>
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->sku }}</td>
                        <td>{{  number_format($product->discounted_price) }}</td>
                        <td><img src="{{ asset('product_images/'.$product->image_path) }}" alt="" width="80px"
                                height="50px"></td>
                        <td>{{ $product->created_at->format('d-m-Y') }}</td>
                        <td>
                            <div style="text-align: center;" class="d-flex">
                                <a href="{{ route('product.edit', $product->id) }}">
                                    <i class="fa-regular fa-pen-to-square"
                                        style="color: rgb(25, 199, 126); font-size: 26px;margin-right:10px"></i></a>

                                <form action="{{ route('product.destroy', ['product' => $product->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this product?')"
                                        class="btn btn-sm btn-danger"> <i class="fa-solid fa-trash"></i></button>
                                </form>


                            </div>

                        </td>
                    </tr>


                    @endforeach

                </tbody>
            </table>
        </div>





    </div>
</div>


@endsection
