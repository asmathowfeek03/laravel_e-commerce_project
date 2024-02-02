<?php

namespace App\Http\Livewire\Frontend\Products;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class Views extends Component
{
    public $category, $product, $prodColorSelectedQuantity, $quantityCount=1, $productColorId;

    public function colorSelected($productColorId)
    {
      $this->productColorId = $productColorId;
      $productColor = $this->product->productColors()->where('id',$productColorId)->first();

      $this->prodColorSelectedQuantity = $productColor->quantity;

      if($this->prodColorSelectedQuantity==0){
        $this->prodColorSelectedQuantity = 'outOfStock';

        }
    }


    public function addToWishList($productID)
    {
        if (Auth::check()){
            if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productID)->exists()){
                    //session()->flash('message','Already Added to Wishlist');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Already Added to Wishlist',
                        'type' => 'warning',
                        'status' => 409,
                    ]);
                    return false;
            }
            else{
                 Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productID
                ]);
                $this->emit('wishlistAddedUpdated');
                //session()->flash('message','Wishlist Added Successfully! ');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Wishlist Added Successfully!',
                    'type' => 'success',
                    'status' => 200,
                ]);
            }
        }
        else{
           // session()->flash('message','Please Login to Continue');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login to Continue!',
                'type' => 'info',
                'status' => 401,
            ]);
            return false;
        }
    }

    public function incrementQuantity() {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }

    public function decrementQuantity() {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }

    public  function addToCart(int $productId) {
        if (Auth::check())
        {
            if($this->product->where('id',$productId)->where('status','0')->exists()){
               //If the product has a product color , then the add to cart function
                if($this->product->productColors()->count() > 1)
                {
                    if($this->prodColorSelectedQuantity != NULL){

                        if(Cart::where('user_id',auth()->user()->id)->where('product_id',$productId)->where('product_color_id',$this->productColorId)->exists())
                        {
                            $this->dispatchBrowserEvent('message', [
                                'text'   => 'Product Already Added!',
                                'type'   => 'warning',
                                'status' => 200,
                            ]);

                        }else{
                            $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();
                                if($productColor->quantity > 0){
                                    if($productColor->quantity >= $this->quantityCount ){
                                        Cart::create([
                                            'user_id' =>auth()->user()->id,
                                            'product_id'=>$productId,
                                            'product_color_id'=>$this->productColorId,
                                            'quantity' => $this->quantityCount
                                        ]);
                                        $this->emit('cartAddedUpdated');
                                        $this->dispatchBrowserEvent('message', [
                                            'text'   => 'Product Added to Cart',
                                            'type'   => 'success',
                                            'status' => 200,
                                        ]);

                                    }else{
                                        $this->dispatchBrowserEvent('message', [
                                            'text'   => 'Only ' . $productColor->quantity . ' Quantity Available for the selected color',
                                            'type'   => 'warning',
                                            'status' => 409,
                                        ]);
                                    }
                                }else{
                                    $this->dispatchBrowserEvent('message', [
                                        'text'   => 'Sorry! It is Out Of Stock',
                                        'type'   => 'warning',
                                        'status' => 404,
                                    ]);
                                }
                        }

                    }
                    else{
                        $this->dispatchBrowserEvent('message', [
                            'text'   => 'Please Select Your Product Color!',
                            'type'   => 'warning',
                            'status' => 404,
                        ]);
                    }
                }

                //If the product doesnt have a product color , then the add to cart function
                else{

                    if(Cart::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists()){
                        $this->dispatchBrowserEvent('message', [
                            'text'   => 'Product Already Added!',
                            'type'   => 'warning',
                            'status' => 200,
                        ]);
                    }else{
                        if($this->product->quantity > 0){
                            if ($this->quantityCount <= $this->product->quantity){
                                Cart::create([
                                    'user_id' =>auth()->user()->id,
                                    'product_id'=>$productId,
                                    'quantity' => $this->quantityCount
                                ]);
                                $this->emit('cartAddedUpdated');
                                $this->dispatchBrowserEvent('message', [
                                    'text'   => 'Product Added to Cart',
                                    'type'   => 'success',
                                    'status' => 200,
                                ]);
                            }else{
                                $this->dispatchBrowserEvent('message', [
                                        'text' => 'Only'.$this->product->quantity.'Quantity Available',
                                        'type' => 'warning',
                                        'status' => 409,
                                ]);
                            }
                        }else{
                            $this->dispatchBrowserEvent('message', [
                                'text'   => 'Sorry! The product is Out Of Stock',
                                'type'   => 'warning',
                                'status' => 404,
                            ]);
                        }
                    }

                }
            }else{
                $this->dispatchBrowserEvent('message', [
                    'text'   => 'Product does not exist!',
                    'type'   => 'warning',
                    'status' => 404,
                ]);
            }
        }else{
            $this->dispatchBrowserEvent('message', [
                'text'   => 'Please Login to Continue!',
                'type'   => 'info',
                'status' => 401,
            ]);
            return false;
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.products.views', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }


}
