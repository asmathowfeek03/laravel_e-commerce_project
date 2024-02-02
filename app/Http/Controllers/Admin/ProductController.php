<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Color;
use App\Models\ProductColor;

class ProductController extends Controller
{

    public function index(){
        $products = Product::paginate(5);
        return view('admin.products.index',compact('products'));
    }

    public function create(){
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status','0')->get();
        return view('admin.products.create',compact('categories','brands','colors'));
    }

    public function store(Request $request){

        try {
            // Validate the request data
        $request->validate([
            'category_id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'brand' => ['required', 'string'],
            'small_description' => ['required', 'string'],
            'description' => ['required', 'string'],
            'original_price' => ['required', 'integer', 'min:1'],
            'selling_price' => ['required', 'integer', 'min:1'],
            'quantity' => ['required', 'integer', 'min:0'],
            'trending' => ['nullable'],
            'featured' => ['nullable'],
            'status' => ['nullable'],
            'meta_title' => ['required', 'string'],
            'meta_keyword' => ['required', 'string'],
            'meta_description' => ['required', 'string'],
        ]);

        // Find the category by ID
        $category = Category::findOrFail($request->category_id);

        // Create a new product within the category
        $product = $category->products()->create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'brand' => $request->brand,
            'small_description' => $request->small_description,
            'description' => $request->description,
            'original_price' => $request->original_price,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
            'trending'=> $request->has('trending')== true ? '1' : '0',
            'featured'=> $request->has('featured')== true ? '1' : '0',
            'status' => $request->has('status')== true ? '1' : '0',
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
        ]);

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';
            $uploadedImages = [];
            $i =1;
            foreach ($request->file('image') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().$i++ . '.' . $extension;
                $uploaded = $imageFile->move($uploadPath, $filename);

                if ($uploaded) {
                    $finalImagePathName = $uploadPath . $filename;
                    $uploadedImages[] = $finalImagePathName;

                    $product->productImage()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }
        }

        if ($request->colors) {
                foreach ($request->colors as $key => $color) {
                    $product->productColors()->create([
                        'product_id' => $product->id,
                        'color_id' => $color,
                        'quantity' => $request->colorquantity[$key] ?? 0
                    ]);
                }
        }

        return redirect('/admin/products')->with('message', 'Product Added Successfully');

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please check the logs for more details.');
        }

    }

    public function edit(int $product_id){
        $categories = Category::all();
        $brands = Brand::all();
        //$product = Product::findOrFail($product_id);
        $product = Product::with('productImage')->findOrFail($product_id);
        $product_color = $product ->productColors ->pluck('color_id')->toArray();
        $colors =Color::whereNotIn('id', $product_color)->get();
        return view('admin.products.edit', compact('categories','brands','product','colors'));
    }


    public function update(Request $request, int $product_id) {
        // Validate the request data
        $request->validate([
            'category_id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'brand' => ['required', 'string'],
            'small_description' => ['required', 'string'],
            'description' => ['required', 'string'],
            'original_price' => ['required', 'integer', 'min:1'],
            'selling_price' => ['required', 'integer', 'min:1'],
            'quantity' => ['required', 'integer', 'min:0'],
            'trending' => ['nullable'],
            'featured' => ['nullable'],
            'status' => ['nullable'],
            'meta_title' => ['required', 'string'],
            'meta_keyword' => ['required', 'string'],
            'meta_description' => ['required', 'string'],
        ]);

        $product = Category::findOrFail($request->category_id)->products()->where('id',  $product_id)->first();
        if($product){
                $product->update([
                    'category_id' => $request->category_id,
                    'name' => $request->name,
                    'slug' => Str::slug($request->slug),
                    'brand' => $request->brand,
                    'small_description' => $request->small_description,
                    'description' => $request->description,
                    'original_price' => $request->original_price,
                    'selling_price' => $request->selling_price,
                    'quantity' => $request->quantity,
                    'trending'=> $request->has('trending')== true ? '1' : '0',
                    'featured'=> $request->has('featured')== true ? '1' : '0',
                    'status' => $request->has('status')== true ? '1' : '0',
                    'meta_title' => $request->meta_title,
                    'meta_keyword' => $request->meta_keyword,
                    'meta_description' => $request->meta_description,
                ]);

                if ($request->hasFile('image')) {
                    $uploadPath = 'uploads/products/';
                    $uploadedImages = [];
                    $i =1;
                    foreach ($request->file('image') as $imageFile) {
                        $extension = $imageFile->getClientOriginalExtension();
                        $filename = time().$i++ . '.' . $extension;
                        $uploaded = $imageFile->move($uploadPath, $filename);

                        if ($uploaded) {
                            $finalImagePathName = $uploadPath . $filename;
                            $uploadedImages[] = $finalImagePathName;

                            $product->productImage()->create([
                                'product_id' => $product->id,
                                'image' => $finalImagePathName,
                            ]);
                        }
                    }
                }

                if ($request->colors) {
                    foreach ($request->colors as $key => $color) {
                        $product->productColors()->create([
                            'product_id' => $product->id,
                            'color_id' => $color,
                            'quantity' => $request->colorquantity[$key] ?? 0
                        ]);
                    }
                }

            return redirect('/admin/products')->with('message', 'Product Updated Successfully');
        }
        else{
            return redirect('/admin/products')->with('message', 'No such product ID found.');
        }
    }

    public function destroyImage(int $product_image_id){
        $productImage= ProductImage::findOrFail($product_image_id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message', 'Product Image Deleted Successfully');
    }

    public function destroy(int $product_id){
        $product= Product::findOrFail($product_id);
        if($product ->productImage()){
            foreach($product ->productImage as $image){
                if(File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }


    public function updateProductColorQty(Request $request, $prod_color_id)
    {
    // Assuming $product_id is coming from somewhere in your request
    $product_id = $request->input('product_id');

     // Find the product and its associated color
        $productColorData = Product::findOrFail($product_id)
            ->productColors()
            ->where('id', $prod_color_id)
            ->first();

        if ($productColorData) {
            // Update the quantity
            $productColorData->update([
                'quantity' => $request->qty,
            ]);

            return response()->json(['message' => 'Product Color Quantity Updated Successfully']);
        } else {
            return response()->json(['message' => 'Product Color not found.']);
        }
    }


    public function deleteProductColor($prod_color_id) {
        $prodColor = ProductColor::findOrFail($prod_color_id);
        $prodColor->delete();
        return response()->json(['message' => 'Product Color Deleted Successfully']);
    }


}
