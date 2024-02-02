<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;

    public function decrementQuantity(int $cartId){
        $cartData = Cart::where('id',$cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData){
            if ($cartData->quantity > 1) {
                $cartData->decrement('quantity');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Quantity Updated!',
                    'type' => 'success',
                    'status' => 200,
                ]);
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Cannot decrement quantity. Minimum quantity reached.',
                    'type' => 'error',
                    'status' => 400,
                ]);
            }
        }else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong',
                'type' => 'error',
                'status' => 404,
            ]);
        }
    }



    public function incrementQuantity(int $cartId){
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();

        if ($cartData) {
            $product = $cartData->product;
            $productColor = $cartData->productColor;

            // Check if the product has a color
            if ($productColor) {
                // Check if the product color quantity is greater than or equal to the incremented quantity
                if ($productColor->quantity >= $cartData->quantity + 1) {
                    $cartData->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Updated!',
                        'type' => 'success',
                        'status' => 200,
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Cannot increment quantity. Maximum available quantity for the selected color reached.',
                        'type' => 'warning',
                        'status' => 409,
                    ]);
                }
            } else {
                // Check if the product quantity is greater than or equal to the incremented quantity
                if ($product->quantity >= $cartData->quantity + 1) {
                    $cartData->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Updated!',
                        'type' => 'success',
                        'status' => 200,
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Cannot increment quantity. Maximum available quantity reached.',
                        'type' => 'warning',
                        'status' => 409,
                    ]);
                }
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong',
                'type' => 'error',
                'status' => 404,
            ]);
        }
    }

    public function removecartItem(int $cartId){
        $cartRemoveData = Cart::where('user_id', auth()->user()->id)->where('id',$cartId)->first();
        if($cartRemoveData){
            $cartRemoveData->delete();
            $this->emit('cartAddedUpdated');
            //session()->flash('message','Wishlist Item Removed Successfully!');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Cart Item Removed Successfully!',
                'type' => 'success',
                'status' => 200,
            ]);
        }else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong!',
                'type' => 'error',
                'status' => 500,
            ]);
        }
    }



    public function render()
    {
        if (auth()->check()) {
            // Check if a user is authenticated before accessing properties
            $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        }

        return view('livewire.frontend.cart.cart-show',[
            'cart'=> $this->cart
        ]);
    }
}

