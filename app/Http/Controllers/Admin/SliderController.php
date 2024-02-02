<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::paginate(3);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create(){
        return view('admin.slider.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:800'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'status' => ['nullable'],
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            // Store the file in the public directory
            $file->move(public_path('uploads/slider'), $filename);

            // Set the image path in the validated data
            $validatedData['image'] = "uploads/slider/$filename";

        }

        $validatedData['status'] = $request->has('status') ? '1' : '0';

        // Create Slider after handling image upload
        Slider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $request->has('status') ? '1' : '0',
        ]);

        return redirect('admin/sliders')->with('message', 'Slider Added Successfully');
    }


    public function edit(Slider $slider){
        return view('admin.slider.edit', compact('slider'));
    }


    public function update(Request $request, Slider $slider) {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:800'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'status' => ['nullable'],
        ]);

        if ($request->hasFile('image')) {

            $destination  = $slider -> image;
            if(File::exists( $destination )){
                    File::delete( $destination );
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('uploads/slider'), $filename);
            $validatedData['image'] = "uploads/slider/$filename";

        }

        $validatedData['status'] = $request->has('status') ? '1' : '0';

        // Create Slider after handling image upload
         Slider::where('id',$slider->id) ->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'] ?? $slider->image,
            'status' => $request->has('status') ? '1' : '0',
        ]);

        return redirect('admin/sliders')->with('message', 'Slider Updated Successfully');
  }

  public function destroy(Slider $slider){
        if ($slider ->count() > 0){
            $destination  = $slider -> image;
            if(File::exists( $destination )){
                    File::delete( $destination );
            }
            $slider -> delete();
            return redirect('admin/sliders')->with('message', 'Slider Deleted Successfully');
        }
        return redirect('admin/sliders')->with('message', 'Something Went Wrong');
  }

}
