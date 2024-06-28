<?php

namespace App\Http\Controllers\Admin;

use App\Models\Unit;
use App\Models\Brand;
use App\Models\Color;
use App\Models\search;
use App\Models\Product;
use App\Models\Artibute;
use App\Models\SubCategory;
use App\Models\maincategory;
use Illuminate\Http\Request;
use App\Models\AdditionalImg;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product_artibuteInfo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.product_list',[
            'products' => Product::select(
                'id',
                         'name',
                         'code',
                         'sku',
                        'image_path',
                        'category_id',
                        'created_at',
                DB::raw('(mrp_price - ((mrp_price * discount_price) / 100)) as discounted_price')
            )
            ->orderBy('created_at', 'desc')
            ->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.add_product',[
             'categories'=>maincategory::get(),
             'subcategories'=>SubCategory::get(),
             'brand'=>Brand::where('status', 1)->get(),
             'unit'=>Unit::where('status', 1)->get(),
             'colors'=>Color::where('status', 1)->get(),
              'attributes'=>Artibute::where('status', 1)->get(),
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'code' => 'required|string|max:50|unique:products,code',
            'sku' => 'required|string|max:50',
            'mrp_price' => 'required|numeric|min:0',
            'discount_price' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'current_stock' => 'required|numeric|min:0',
            'minimum_qty' => 'required|numeric|min:0',
            'select_attributes' => 'nullable|string|max:255',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'youtube_link' => 'nullable|string|url',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'artibute_info' => 'nullable',
            'artibute_info_id.*' => 'exists:attribute_info,id',
            'additional_img' => 'nullable|array',
            'additional_img.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'required',
            'tags.*' => 'string|max:255',

        ], [
            'required' => 'The :attribute field is required.',
            'exists' => 'The selected :attribute is invalid.',
            'string' => 'The :attribute must be a string.',
            'max' => 'The :attribute may not be greater than :max characters.',
            'numeric' => 'The :attribute must be a number.',
            'img' => 'The :attribute must be an image file.',
            'mimes' => 'The :attribute must be a file of type: :values.',
            'url' => 'The :attribute format is invalid.',
            // 'artibute_info_id.*.exists' => 'Invalid attribute info selected.',
        ]);

        $name=$request->input('name');
        $description=$request->input('description');
        $category_id=$request->input('category_id');
        $subcategory_id=$request->input('subcategory_id');
        $brand_id=$request->input('brand_id');
        $code=$request->input('code');
        $sku=$request->input('sku');
        $mrp_price=$request->input('mrp_price');
        $discount_price=$request->input('discount_price');
        $price=$request->input('price');
        $current_stock=$request->input('current_stock');
        $minimum_qty=$request->input('minimum_qty');
        $select_attributes=$request->input('select_artibutes');
        $image_path=$request->input('image_path');
        $youtube_link=$request->input('youtube_link');
        $meta_title=$request->input('meta_title');
        $meta_description=$request->input('meta_description');
        $meta_image_path=$request->input('meta_image_path');
         $additional_img=$request->input('additional_img');
        $artibute_info_id=$request->input('artibute_info_id');
        $tag=$request->input('tag');


    // Create a new product instance
        $product = new Product;
        $product->name =  $name;
        $product->description = $description;
        $product->category_id = $category_id;
        $product->subcategory_id = $subcategory_id;
        $product->brand_id = $brand_id;
        $product->code =   $code;
        $product->sku =  $sku;
        $product->mrp_price =   $mrp_price;
        $product->discount_price = $discount_price;
        $product->price = $price;
        $product->current_stock =   $current_stock;
        $product->minimum_qty = $minimum_qty;
        $product->select_attributes =   $select_attributes;
        $product->youtube_link =$youtube_link;
        $product->meta_title =  $meta_title;
        $product->meta_description =  $meta_description;



    if ($request->hasFile('img')) {
        $image = $request->file('img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        // Move the file to the desired location
        $image->move(public_path('product_images'), $imageName);
        // Assign values to product fields as mentioned earlier
        $product->image_path= $imageName;
        // Save the product


    }

    if ($request->hasFile('meta_img')) {
        $image = $request->file('meta_img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        // Move the file to the desired location
        $image->move(public_path('product_images'), $imageName);
        // Assign values to product fields as mentioned earlier
        $product->meta_image_path = $imageName;
        // Save the product
        $product->save();
    }

    // Save the product
    // $product->save();

    // Store data in ProductAttributeInfo
    foreach ($request->input('artibute_info') as $attributeId) {
        $productAttributeInfo = new Product_artibuteInfo;
        $productAttributeInfo->product_id = $product->id;
        $productAttributeInfo->artibute_info_id= $attributeId;
         $productAttributeInfo->save();
    }

    // Store data in AdditionalImage
    if ($request->hasFile('additional_img')) {
        foreach ($request->file('additional_img') as $file) {
            $additionalImage = new AdditionalImg;
            $additionalImage->product_id = $product->id;
            // Generate unique filename
            $imageName = time() . '_' . $file->getClientOriginalName();
            // Move the file to the desired location
            $file->move(public_path('additional_images'), $imageName);
            // Assign the image path to the model
            $additionalImage->additional_img = $imageName;
            $additionalImage->save();
        }
    }
    // Store data in Search
    foreach($request->input('tags') as $tag){
        $search = new search;
        $search->product_id = $product->id;
        $search->search_tag=  $tag;
        $search->save();
    }


    // Redirect to a success page or return a response
    return redirect()->route('product.index')->with('success', 'Product created successfully.');

}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        $product=Product::findOrfail($id);

        return view('admin.product.product_edit',[
                'product'=> Product::findOrfail($id),
                'categories'=> MainCategory::get(),
                'subcategories'=>SubCategory::get(),
                'brand'=>Brand::get(),
                'attributes'=>Artibute::get(),
                // 'search_tag'=>search::with('searchTags')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

         $product=Product::findOrfail($id);

        // $product->name = $request->name;
        // $product->description = $request->description;
        // $product->category_id = $request->category_id;
        // $product->subcategory_id = $request->subcategory_id;
        // $product->brand_id = $request->brand_id;
        // $product->code = $request->code;
        // $product->sku = $request->sku;
        // $product->mrp_price = $request->mrp_price;
        // $product->discount_price = $request->discount_price;
        // $product->current_stock = $request->current_stock;
        // $product->minimum_qty = $request->minimum_qty;




              $img_name = '';

              $deleteOldImage = 'product_images/' . $product->image_path;

        if ($request->hasFile('img')) {

            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage); // Delete the old image
            }
            $image = $request->file('img');
            $img_name= time() . '.' . $image->getClientOriginalExtension();
            // Move the file to the desired location
            $image->move(public_path('product_images'),  $img_name);
            // Assign values to product fields as mentioned earlier
            // $product->image_path=  $image;
            // Save the product
        }else{
            $img_name=$product->image_path;
        }

        $meta_img_name = ''; // Initialize meta image name variable

        $deleteOldMetaImage = 'product_images/' . $product->meta_image_path;

        if ($request->hasFile('meta_img')) {
            if (file_exists($deleteOldMetaImage)) {
                File::delete($deleteOldMetaImage); // Delete the old meta image
            }
            $meta_image = $request->file('meta_img');
            $meta_img_name = time() . '.' . $meta_image->getClientOriginalExtension();
            // Move the file to the desired location
            $meta_image->move(public_path('product_images/'), $meta_img_name);
        } else {
            $meta_img_name = $product->meta_image_path;
        }



        $additional_img_names = [];

        // Delete old additional images if new images are uploaded
        if ($request->hasFile('additional_img')) {
            // Delete old images associated with the product
            foreach ($product->additionalImgs as $img) {//additionalImgs is this relation ship of hasmany
                $deleteOldImage = public_path('additional_images/' . $img->additional_img);
                if (file_exists($deleteOldImage)) {
                    File::delete($deleteOldImage);
                }
                $img->delete(); // Delete record from database
            }

            // Upload new images
            foreach ($request->file('additional_img') as $file) {
                // Generate unique filename
                $additional_img_name = time() . '_' . $file->getClientOriginalName();
                // Move the file to the desired location
                $file->move(public_path('additional_images'), $additional_img_name);
                // Store the filename for database update
                $additional_img_names[] = $additional_img_name;
            }
         }


        // Update product information
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'brand_id' => $request->brand_id,
            'code' => $request->code,
            'sku' => $request->sku,
            'mrp_price' => $request->mrp_price,
            'discount_price' => $request->discount_price,
            'price' => $request->price,
            'current_stock' => $request->current_stock,
            'minimum_qty' => $request->minimum_qty,
            'image_path' => $img_name, // Assuming you have defined $img_name elsewhere
            'meta_image_path' => $meta_img_name,
            'youtube_link' => $request->youtube_link,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
        ]);

        // Associate the additional images with the product
        foreach ($additional_img_names as $name) {
            $product->additionalImgs()->create(['additional_img' => $name]);
        }

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');


        }






    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=Product::findOrfail($id);

        $deleteOldImage = 'product_images/' .  $product->image_path; // For deleting the old image select

        if (file_exists($deleteOldImage)) {
            File::delete($deleteOldImage); // Delete the old image
        }
        $deleteOldImage = 'product_images/' .  $product->meta_image_path; // For deleting the old image select

        if (file_exists($deleteOldImage)) {
            File::delete($deleteOldImage); // Delete the old image
        }



            // Delete old images associated with the product
            foreach ($product->additionalImgs as $img) {
                $deleteOldImage = public_path('additional_images/' . $img->additional_img);
                if (file_exists($deleteOldImage)) {
                    File::delete($deleteOldImage);
                }
                $img->delete(); // Delete record from database
            }


            foreach ($product->searchTags as $tags) {//this searchTags is hasmany realtionship
                           $tags->delete();
                }

            foreach ($product->artibutes as $artibute) {//this artibutes is hasmany relationship
                         $artibute->delete();
                }


             // Delete record from database
            $product->delete();
            return redirect()->back()->with('delete_success', 'Product deleted successfully.');



}

}
