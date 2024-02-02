<div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="col-md-12 text-center" >
                <h2 class="mb-4 fw-bold" style="font-size:25px;letter-spacing:1px; font-family: 'Playfair Display', serif; margin-top: 10px;">Wishlists</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>
                        @forelse ($wishlist as $wishlistItem)
                            @if ($wishlistItem->product)
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-md-8 my-auto">
                                            <a href="{{ url('collections/'.$wishlistItem->product->category->slug.'/'.$wishlistItem->product->slug) }}">
                                                <label class="product-name">
                                                    @if($wishlistItem->product->productImage->count() > 0)
                                                    <img src=" {{ asset($wishlistItem->product->productImage[0]->image)}}" style="width: 150px; height: 100px" alt="">
                                                    @endif
                                                    <br>
                                                    {{$wishlistItem->product->name}}
                                                </label>
                                            </a>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="price">{{$wishlistItem->product->selling_price}}</label>
                                        </div>

                                        <div class="col-md-2  my-auto">
                                            <div class="remove">
                                                <button type="button" class="btn btn-danger btn-sm"  style="background:#cc0000;font-weight:bold" wire:click="removeWishlistItem({{ $wishlistItem->id }})">
                                                    <span wire:loading.remove wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                                                        <i class="fa fa-trash"></i> Remove
                                                    </span>
                                                    <span wire:loading wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                                                        <i class="fa fa-trash"></i> Removing...
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <h4>No Wishlist Added!</h4>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
