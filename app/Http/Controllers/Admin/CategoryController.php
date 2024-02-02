<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{

    public function index(){
        return view('admin.category.index');
    }


    public function create(){
        return view('admin.category.create');
    }


    public function store(Request $request){

        $request->validate([
            'name' => ['required','string','unique:categories'],
            'slug' => ['required','string'],
            'description' => ['required','string'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'meta_title' => ['required','string'],
            'meta_keyword' => ['required','string'],
            'meta_description' => ['required','string'],
        ]);

        try{
            $category = new Category;
            $category->name = $request->name;
            $category->slug = Str::slug($request->slug);
            $category->description = $request->description;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/category'), $filename);
                $category->image = $filename;
            }

            $category->meta_title = $request->meta_title;
            $category->meta_keyword = $request->meta_keyword;
            $category->meta_description = $request->meta_description;
            $category->status = $request->has('status') ? '1' : '0';

            $category->save();

            return redirect('admin/category')->with('message', 'Category Added Successfully');
        }
        catch (\Exception $e) {
            // Handle the exception, for example, log it
            // You might also want to redirect back with an error message
            return redirect()->back()->withErrors(['error' => 'An error occurred while saving the category.'])->withInput();
        }


    }



    public function edit(Category $category){
        return view('admin.category.edit', compact('category'));
    }



    public function update(Request $request, $category) {
        $request->validate([
            'name' => ['required','string','unique:categories'],
            'slug' => ['required','string'],
            'description' => ['required','string'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'meta_title' => ['required','string'],
            'meta_keyword' => ['required','string'],
            'meta_description' => ['required','string'],
        ]);

        try{
        $category = Category::findOrFail($category);

        $category->name = $request->name;
        $category->slug = Str::slug($request->slug);
        $category->description = $request->description;

        if ($request->hasFile('image')) {

            $path = 'uploads/category'.$category->image;
            if( File::exists($path)){
                File::delete($path);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/category'), $filename);
            $category->image = $filename;
        }

        $category->meta_title = $request->meta_title;
        $category->meta_keyword = $request->meta_keyword;
        $category->meta_description = $request->meta_description;
        $category->status = $request->has('status') ? '1' : '0';

        $category->save();
        return redirect('admin/category')->with('message', 'Category Updated Successfully');
        }
        catch (\Exception $e) {
            // Handle the exception, for example, log it
            // You might also want to redirect back with an error message
            return redirect()->back()->withErrors(['error' => 'Oops! The category already exists'])->withInput();
        }
    }






}
