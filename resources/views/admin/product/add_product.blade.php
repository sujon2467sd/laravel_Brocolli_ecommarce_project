@extends('admin.master')

@section('title', 'Products')



@section('content')

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}
                    @php
                         return redirect()->back()->with('delete_success', 'Product deleted successfully.');
                    @endphp
                </li>
            @endforeach
        </ul>
    </div>
@endif --}}




<div class="container py-4 px-4">
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card">
            <div class="card-header bg-success">
                <h4><b>Add New Product</b></h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Product Name (EN)</label>
                    <input type="text" name="name" class="form-control" id="recipient-name"  value="{{ old('name') }}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                </div>


                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Description</label>
                    <textarea id="summernote" name="description">{{ old('description') }}</textarea>
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
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                <option value="{{$brands->id}}">{{$brands->name}}</option>
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
                            <input type="text" name="code" class="form-control" id="recipient-name"  value="{{ old('code') }}">
                            @error('code')
                            <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Product Sku</label>
                            <input type="text" name="sku" class="form-control" id="recipient-name" value="{{ old('sku') }}">
                            @error('sku')
                            <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>
                </div>


        {{-- search tag css start --}}
                <style>
                    .tag {
                        margin: 2px;
                        padding: 5px;
                        background-color: black;
                        border: 1px solid #ccc;
                        border-radius: 5px;
                        display: inline-block;
                    }

                    .tag-text {
                        margin-right: 5px;
                    }

                    .tag-close {
                        cursor: pointer;
                    }

                    #tagInput {
                        display: none;
                    }

                </style>

         {{-- search tag css end --}}


                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Search Tags</label>
                            <input type="text"  class="form-control" id="recipient-name"
                                onkeydown="handleInput(event)" >
                        </div>
                    </div>
                </div>

                <div id="tagsContainer"></div>

                <!-- Hidden input field to store the tags -->
                <input type="hidden" name="tags[]" id="tagInput" value="{{ is_array(old('tags')) ? implode(',', old('tags')) : old('tags') }}">
                @error('tags')
                <div class="text-danger">{{ $message }}</div>
               @enderror

             {{-- search-tag js start--}}


             <script>
                const maxTags = 5; // Maximum number of tags allowed

                function handleInput(event) {
                    const inputField = event.target;
                    if ((event.key === 'Enter' || event.key === ',') && countTags() < maxTags) {
                        event.preventDefault(); // Prevent form submission
                        const tagText = inputField.value.trim();
                        if (tagText) {
                            addTag(tagText);
                            inputField.value = '';
                            inputField.focus(); // Focus on the input field after adding tag
                        }
                    }
                }

                function addTag(tagText) {
                    const tagsContainer = document.getElementById('tagsContainer');
                    const tag = document.createElement('div');
                    tag.classList.add('tag');

                    const tagTextElement = document.createElement('span');
                    tagTextElement.classList.add('tag-text');
                    tagTextElement.textContent = tagText;

                    const tagCloseButton = document.createElement('span');
                    tagCloseButton.classList.add('tag-close');
                    tagCloseButton.textContent = 'x';
                    tagCloseButton.onclick = function () {
                        tag.remove();
                        updateTagInput();
                    };

                    tag.appendChild(tagTextElement);
                    tag.appendChild(tagCloseButton);

                    tagsContainer.appendChild(tag);

                    updateTagInput();
                }

                function updateTagInput() {
                    const tagsContainer = document.getElementById('tagsContainer');
                    const tags = tagsContainer.querySelectorAll('.tag-text');
                    const tagInput = document.getElementById('tagInput');
                    tagInput.value = Array.from(tags).map(tag => tag.textContent).join(',');
                }

                function countTags() {
                    const tagsContainer = document.getElementById('tagsContainer');
                    return tagsContainer.querySelectorAll('.tag').length;
                }

            </script>

         {{-- search-tag  js end--}}


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
                            <input type="text" name="mrp_price" class="form-control" id="mrp_price"  onchange="calculatePrice()" value="{{ old('mrp_price') }}" >
                            @error('mrp_price')
                            <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Discount Price</label>
                            <input type="text" name="discount_price" id="discount_price" class="form-control" id="recipient-name" onchange="calculatePrice()"  value="{{ old('discount_price')}}">
                            @error('discount_price')
                            <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Price</label>
                            <input type="number" step="0.01" name="price" class="form-control" id="price" value="{{ old('price')}}" readonly>
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
                                <input type="text" name="current_stock" class="form-control" id="recipient-name"value="{{ old('mrp_price') }}">
                                @error('mrp_price')
                                <div class="text-danger">{{ $message }}</div>
                               @enderror
                            </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Minimum Order Qty</label>
                            <input type="text" name="minimum_qty" class="form-control" id="recipient-name" value="{{ old('minimum_qty') }}">

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
                <h4>Product variation setup</h4>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-6">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Select Attributes</label>
                            <select id="attribute" class="form-control" name="select_artibutes"  value="{{ old('select_artibutes') }}">
                                @foreach ($attributes as $attribute)
                                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                @endforeach
                            </select>
                            @error('select_artibutes')
                            <div class="minimum_qty">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Attribute Info</label>
                            <select id="attributeInfo" name="artibute_info[]" class="form-control" multiple  {{ in_array($attribute->id, old('artibute_info', [])) ? 'selected' : '' }}></select>
                            @error('artibute_info')
                            <div class="minimum_qty">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>


                     <script>
                        $(document).ready(function(){
                            $('#attribute').change(function(){
                                var attributeId = $(this).val();
                                $.ajax({
                                    url: '/getArtibuteInfo',
                                    type: 'GET',
                                    data: {
                                        'ArtibuteInfoId': attributeId
                                    },
                                    success: function(response){
                                        var attributeInfoSelect = $('#attributeInfo');
                                        attributeInfoSelect.empty(); // Clear previous options
                                        $.each(response.artibuteinfo, function(index, value){
                                            attributeInfoSelect.append($('<option>').text(value.name).attr('value', value.id));
                                        });
                                    },
                                    error: function(xhr, status, error){
                                        console.error(xhr.responseText);
                                    }
                                });
                            });
                        });
                    </script>


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
                            @error('img')
                            <div class="text-danger">{{ $message }}</div>
                           @enderror
                        <img id="output" style="height: 100px" />
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="form-group pl-4">
                            <label for="message-text" class="col-form-label">Aditional Images</label><br>
                            <input type="file" name="additional_img[]" class="form-control" accept="image/*" onchange="loadFiles(event)" multiple  required><br>
                            <div id="imagePreviews"></div>

                            @if ($errors->has('additional_img'))
                            <div class="text-danger">{{ $errors->first('additional_img') }}</div>
                        @endif

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
                            <input type="text" name="youtube_link" class="form-control" >
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
                           <input type="text" name="meta_title" class="form-control"  value="{{ old('meta_title') }}">
                           @error('meta_title')
                           <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Meta Description</label>
                            <textarea id="summernotes" name="meta_description" > {{ old('meta_description') }}</textarea>
                            @error('meta_description')
                            <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>


                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label"><p>Meta Image</p></label>
                            <input type="file" name="meta_img" class="form-control"  value="{{ old('meta_img') }}">
                            @error('meta_img')
                            <div class="text-danger">{{ $message }}</div>
                           @enderror
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
