<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    public function index(){
        $colors = Color::paginate(5);
        return view('admin.colors.index', compact('colors'));
    }


    public function create(){
        return view('admin.colors.create');
    }


    public function store(Request $request){

    // Validate the request data
    $validatedData = $request->validate([
        'name' => ['required','string','unique:colors'],
        'code' => ['required', 'string'],
        'status' => ['nullable'],
    ]);

    $validatedData['status'] = $request->has('status') ? '1' : '0';
    try{
        Color::create($validatedData);
        return redirect('admin/colors')->with('message', 'Color Added Successfully');
    }
    catch (\Exception $e) {
        // Handle the exception, for example, log it
        // You might also want to redirect back with an error message
        return redirect()->back()->withErrors(['error' => 'An error occurred while saving the category.'])->withInput();
    }
    }


    public function edit(Color $color){
        return view('admin.colors.edit', compact('color'));
    }


    public function update(Request $request, $color_id) {
         // Validate the request data
        $validatedData = $request->validate([
            'name' => ['required','string','unique:colors'],
            'code' => ['required', 'string'],
            'status' => ['nullable'],
        ]);

        $validatedData['status'] = $request->has('status') ? '1' : '0';
        
        try{
            Color::find($color_id)->update($validatedData);
            return redirect('admin/colors')->with('message', 'Color Updated Successfully');
        } catch (\Exception $e) {
            // Handle the exception, for example, log it
            // You might also want to redirect back with an error message
            return redirect()->back()->withErrors(['error' => 'Color Already Exists!'])->withInput();
        }


    }

    public function destroy($color_id){
        $color=Color::findOrFail($color_id);
        $color->delete();
        return redirect('admin/colors')->with('message', 'Color Deleted Successfully');
    }
}

