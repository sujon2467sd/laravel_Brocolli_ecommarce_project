@extends('admin.master')

@section('title', 'Products Edit')


@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- toaster start --}}
<script>
    $(document).ready(function() {
        @if(session('success'))
            toastr.success('{{ session('success') }}');
        @endif
    });
</script>
{{-- toaster end --}}

<div class="container py-4 px-4">
     <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card">
            <div class="card-header bg-success">
                <h4><b>Edit  Product</b></h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Product Name (EN)</label>
                    <input type="text" name="name" class="form-control" id="recipient-name"   value="{{ $product->name }}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                </div>


                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Description</label>
                    <textarea id="summernote" name="description">{{ $product->description }}</textarea>
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                   @enderror
                </div>

            </div>
        </div>



        <div class="card">
            <div class="card-header">
                <h4><b> General setup</b></h4>
            </div>
            <div class="card-body">
                <div class="row">


                    <div class="col-4">
                        <div class="form-group">
                            <label for="category" class="col-form-label">Category</label>
                            <select id="category" name="category_id" class="form-control"  value="{{ old('category_id') }}">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id}}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>




                    <div class="col-4">
                        <div class="form-group">
                            <label for="subcategory" class="col-form-label">Sub Category</label>
                            <select id="subcategory"  name="subcategory_id" class="form-control"  value="{{ old('subcategory_id') }}">
                                <!-- Subcategory options will be populated dynamically -->
                                @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}" {{ $subcategory->id == $product->subcategory_id ? 'selected' : '' }}>
                                    {{ $subcategory->name }}
                                </option>
                            @endforeach
                            </select>

                            @error('subcategory_id')
                            <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>


                    {{-- jason data show dynamic for subcategory--}}

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(document).ready(function () {
                            $('#category').change(function () {
                                var categoryId = $(this).val();
                                $.ajax({
                                    url: '/getSubcategories', // Route to fetch subcategories
                                    method: 'GET',
                                    data: {
                                        categoryId: categoryId
                                    },
                                    success: function (response) {
                                        $('#subcategory').empty();
                                        $.each(response.subcategories, function (key,
                                            value) {
                                            $('#subcategory').append(
                                                '<option value="' + value.id +
                                                '">' + value.name + '</option>');
                                        });
                                    },
                                    error: function (xhr, status, error) {
                                        console.error(error);
                                    }
                                });
                            });
                        });

                    </script>

                    {{-- jason data show dynamic for subcategory end--}}

                    <div class="col-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Brand</label>
                            <select  id="" name="brand_id" class="form-control"   value="{{ old('brand_id') }}">
                                @foreach ($brand as $brands)
                                <option value="{{$brands->id}}"  {{ $brands->id == $product->brand_id ? 'selected' : '' }}>{{$brands->name}}</option>
                                @endforeach
                            </select>
                            @error('brand_id')
                            <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Product Code </label>
                            <input type="text" name="code" class="form-control" id="recipient-name"  value="{{ $product->code}}">
                            @error('code')
                            <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Product Sku</label>
                            <input type="text" name="sku" class="form-control" id="recipient-name" value="{{ $product->sku}}">
                            @error('sku')
                            <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>
                </div>





            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Pricing & others</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label" >Mrp Price ($)</label>
                            <input type="text" name="mrp_price" class="form-control" id="mrp_price"  onchange="calculatePrice()"value="{{ $product->mrp_price}}"" >
                            @error('mrp_price')
                            <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Discount Price</label>
                            <input type="text" name="discount_price" id="discount_price" class="form-control" id="recipient-name" onchange="calculatePrice()"  value="{{ $product->discount_price}}">
                            @error('discount_price')
                            <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Price</label>
                            <input type="number" step="0.01" name="price" class="form-control" id="price" value="{{ $product->price}}" readonly>
                            @error('price')
                            <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>

                    <script>
                        function calculatePrice() {
                            // Get the values from the input fields
                            var mrp_price= parseFloat(document.getElementById('mrp_price').value);
                            var discount_price = parseFloat(document.getElementById('discount_price').value);

                            // Calculate the final price
                            var price = mrp_price - discount_price;

                            // Set the final price in the output field
                            document.getElementById('price').value =  price.toFixed(0); // toFixed(2) ensures two decimal places
                        }
                    </script>


                    <div class="col-2">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Current Stock</label>
                                <input type="text" name="current_stock" class="form-control" id="recipient-name"  value="{{ $product->current_stock }}">
                                @error('mrp_price')
                                <div class="text-danger">{{ $message }}</div>
                               @enderror
                            </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Minimum Order Qty</label>
                            <input type="text" name="minimum_qty" class="form-control" id="recipient-name"  value="{{ $product->minimum_qty }}">

                            @error('minimum_qty')
                             <div class="minimum_qty">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                Image
            </div>
             <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label"><p>Product Thumnil</p></label>
                            <input type="file" name="img" class="form-control" accept="image/*"
                            onchange="loadFile(event)"  value="{{ old('img') }}"><br>


                               <img  id="output" src="{{ asset('product_images/'.$product->image_path) }}" alt="" height="100px">

                        </div>
                    </div>
                    <div class="col-8">
                        <div class="form-group pl-4">
                            <label for="message-text" class="col-form-label">Aditional Images</label><br>
                            <input type="file" name="additional_img[]" class="form-control" accept="image/*" onchange="loadFiles(event)" multiple ><br>
                            <div id="imagePreviews">
                            {{-- {{ dd($product->additionalImgs) }} --}}
                              @foreach ($product->additionalImgs as $imgs )
                                  <img id="output" src="{{ asset('additional_images/'.$imgs->additional_img) }}" alt="" style="height: 100px">
                              @endforeach
                            </div>

                        </div>
                    </div>



                </div>
             </div>
        </div>

         <div class="card">
            <div class="card-header">Product Video</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Youtube Video Link <span class="text-info">(Optional please provide embed link not direct link.)</span></label><br>
                            <input type="text" name="youtube_link" class="form-control"  value="{{ $product->youtube_link}}">
                        </div>

                    </div>
                </div>
            </div>
         </div>

         <div class="card">
            <div class="card-header">Seo Section</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label" >Meta Tittle</label><br>
                           <input type="text" name="meta_title" class="form-control"   value="{{ $product->meta_title }}">
                           @error('meta_title')
                           <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Meta Description</label>
                            <textarea id="summernotes" name="meta_description" > {{ $product->description }}</textarea>
                            @error('meta_description')
                            <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>


                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label"><p>Meta Image</p></label>
                            <input type="file" class="form-control" name="meta_image_path">
                            <img  src="{{ asset('product_images/'.$product->meta_image_path) }}" alt="" height="50px">

                        </div>
                    </div>
                </div>
            </div>
         </div>




         <button type="submit" class="btn btn-primary w-75">Submit</button>


    </form>


</div>

{{-- //img preview  single  start--}}
<script>
    var loadFile = function (event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };

</script>


{{-- //img preview  single end--}}


{{-- //img preview  multiple start--}}
<script>
    var loadFiles = function (event) {
        var files = event.target.files;
        var imagePreviews = document.getElementById('imagePreviews');
        imagePreviews.innerHTML = ''; // Clear existing previews

        // Limit the number of files to preview
        var maxFiles = Math.min(files.length, 5);

        for (var i = 0; i < maxFiles; i++) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.height = '100px';
                imagePreviews.appendChild(img);
            };
            reader.readAsDataURL(files[i]);
        }
    };
</script>

{{-- //img preview  multiple end--}}


@endsection
