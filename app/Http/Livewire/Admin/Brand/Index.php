<?php

namespace App\Http\Livewire\Admin\Brand;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Validation\ValidationException;


class Index extends Component
{
     use WithPagination;
     protected $paginationTheme = 'bootstrap';

    public $name, $slug, $status , $brand_id, $category_id, $validationErrorMessage;

    public function rules()
    {
        return[
            'name' =>'required|string|unique:brands',
            'slug'  =>'required|string',
            'category_id'  =>'required|integer',
            'status' => 'nullable'
        ];
    }

    public function resetInput(){
        $this->name =NULL;
        $this->slug =NULL;
        $this->status =NULL;
        $this->brand_id =NULL;
        $this->category_id =NULL;
    }



    public function storeBrand()
    {
        try {
            $this->validate([
                'name' => 'required|string|unique:brands',
                'slug' => 'required|string',
                'category_id' => 'required|integer',
                'status' => 'nullable',
            ]);

            Brand::create([
                'name' => $this->name,
                'slug' => Str::slug($this->slug),
                'status' => $this->status == true ? '1' : '0',
                'category_id' => $this->category_id,
            ]);

            // For success message
            session()->flash('message', 'Brand Added Successfully');
            session()->flash('message_type', 'success');
            $this->dispatchBrowserEvent('close-modal');
            $this->resetInput();

            return redirect('/admin/brands');

        } catch (ValidationException $e) {
            $this->validationErrorMessage = $e->validator->errors()->first('name');
            // For error message
            session()->flash('message', 'Opps! The brand already exists. Failed to add brand.');
            session()->flash('message_type', 'error');
            return redirect('/admin/brands');
        }
    }


    public function editBrand(int $brand_id){
        $this->brand_id = $brand_id;
        $brand = Brand::findOrFail($brand_id);
        $this->name =  $brand ->name;
        $this->slug =  $brand ->slug;
        $this->status =  $brand ->status;
        $this->category_id =  $brand ->category_id ;
    }



    public function closeModal(){
        $this ->resetInput();
    }


    public function openModal(){
        $this ->resetInput();
    }


    public function updateBrand(){
        try {
            $this->validate([
                'name' => 'required|string|unique:brands',
                'slug' => 'required|string',
                'category_id' => 'required|integer',
                'status' => 'nullable',
            ]);

            Brand::findOrFail($this->brand_id)->update([
                'name'=>$this->name,
                'slug'=>Str::slug($this->slug),
                'status'=>$this->status == true ? '1':'0',
                'category_id'=>$this->category_id,
            ]);
           // For success message
           session()->flash('message', 'Brand Added Successfully');
           session()->flash('message_type', 'success');
           $this->dispatchBrowserEvent('close-modal');
           $this->resetInput();

           return redirect('/admin/brands');

       } catch (ValidationException $e) {
           $this->validationErrorMessage = $e->validator->errors()->first('name');
           // For error message
           session()->flash('message', 'Opps! The brand already exists. Failed to update the brand.');
           session()->flash('message_type', 'error');
           return redirect('/admin/brands');
       }
    }


    public function deleteBrand($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    public function destroyBrand()
    {

        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message', 'Brand Deleted Successfull');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
         // Redirect to the desired page
         return redirect('/admin/brands');

    }


    public function render()
    {
        $categories = Category::where('status','0')->get();
        $brands = Brand::orderBy('id', 'DESC')->get();
        return view('livewire.admin.brand.index',['brands' => $brands, 'categories' => $categories])->extends('layouts.admin')->section('content');
    }
}
