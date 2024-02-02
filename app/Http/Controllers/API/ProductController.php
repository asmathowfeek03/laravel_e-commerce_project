<?php

namespace App\Http\Controllers\API;


use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->product->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
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
                'image'  => ['nullable'],
                'meta_title' => ['required', 'string'],
                'meta_keyword' => ['required', 'string'],
                'meta_description' => ['required', 'string'],
            ]);

            $product = $this->product->create($validatedData);

            return response()->json(['message' => 'Product created successfully', 'data' => $product]);

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'An error occurred. Please check the logs for more details.'], 500);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->product->find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
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
                'image'  => ['nullable'],
                'meta_title' => ['required', 'string'],
                'meta_keyword' => ['required', 'string'],
                'meta_description' => ['required', 'string'],
            ]);
            $product = $this->product->findOrFail($id);
            // Update the product with the validated data
            $product->update($validatedData);
            return response()->json(['message' => 'Product updated successfully', 'data' => $product]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'An error occurred. Please check the logs for more details.'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = $this->product->findOrFail($id);

            // Delete the product
            $product->delete();

            return response()->json(['message' => 'Product deleted successfully']);

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'An error occurred. Please check the logs for more details.'], 500);
        }
    }
}
