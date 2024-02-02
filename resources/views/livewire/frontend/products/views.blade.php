<div>
    <div class="py-3 py-md-5 bg-light" style="margin:50px">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white  " wire:ignore>
                        @if($product->productImage)
                       {{-- <img src="{{ asset($product->productImage[0]->image)}}" class="w-100" alt="Img"> --}}
                       <div class="exzoom" id="exzoom">
                        <div class="exzoom_img_box">
                          <ul class='exzoom_img_ul'>
                            @foreach ( $product->productImage as $itemImg)
                                <li><img src="{{ asset($itemImg->image)}}"/></li>
                            @endforeach
                          </ul>
                        </div>
                        <div class="exzoom_nav"></div>
                        <p class="exzoom_btn">
                            <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                            <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                        </p>
                      </div>
                      @else
                            No Images Added
                       @endif
                    </div>
                </div>

                <div class="col-md-7 mt-3">
                    <div class="product-view p-4" style="border: 1px solid #ddd; border-radius: 8px;">
                         <h3 class="product-name mb-4 text-black fw-bold"  >
            		        {{ $product->name }}
        		        </h3>
                        <hr>
                        <p class="product-path mb-3" style="font-size:13px">
            			 Home / {{ $product->category->name }}/ {{ $product->name }}
        		        </p>
                        <p class="product-path mb-3" style="font-size:20px">
                            Brand: {{ $product->brand }}
                        </p>
                        <div class="mb-3">
                            <span class="selling-price h4">${{ $product->selling_price}}</span>
                            <span class="original-price h6 text-muted ml-3">${{ $product->original_price}}</span>
                        </div>

                        <div>
                            @if ($product->productColors->count() > 0)
                            <label>Select the Color:</label>
                                @if($product->productColors)
                                        @foreach ($product->productColors as $colorItem)
                                        {{-- <input type="radio" name="colorSelection" value="{{ $colorItem->id }}" />{{ $colorItem->color->name }} --}}
                                        <label class="colorSelectionLabel" style="background-color:{{ $colorItem->color->name }};padding:10px; font-weight:bold;" wire:click="colorSelected({{ $colorItem->id }})">
                                            {{ $colorItem->color->name }}
                                        </label>
                                        @endforeach
                                @endif
                                <div>
                                    @if ($this->prodColorSelectedQuantity =='outOfStock')
                                    <label class="label-stock py-1 mt-2 text-white bg-danger">Out of Stock</label>
                                    @elseif ($this->prodColorSelectedQuantity > 0)
                                    <label class="label-stock py-1 mt-2 text-white bg-success">In Stock</label>
                                    @endif
                                </div>
                            @else
                                @if ($product->quantity)
                                    <label class="label-stock py-1 mt-2 text-white bg-success fw-bold" style="padding:10px">In Stock</label>
                                @else
                                    <label class="label-stock py-1 mt-2 text-white bg-danger fw-bold" style="padding:10px">Out of Stock</label>
                                @endif
                            @endif
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" value="{{ $this->quantityCount }}" class="input-quantity" readonly/>
                                <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="addToCart({{$product->id}})" class="btn btn1" style="background: rgb(1, 156, 1);color:white">
                                <span wire:loading.remove wire:target="addToCart">
                                    <i class="fa fa-shopping-cart" style="color:white"></i> Add To Cart
                                </span>
                                <span wire:loading wire:target="addToCart">Adding...</span>
                            </button>

                            <button type="button" wire:click="addToWishList({{ $product->id}})" class="btn btn1" style="background: rgb(156, 1, 1);color:white">
                                <span wire:loading.remove wire:target="addToWishList">
                                    <i class="fa fa-heart" style="color:white"></i> Add To Wishlist
                                </span>
                                <span wire:loading wire:target="addToWishList">Adding...</span>
                            </button>

                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0 fw-bold">Tag Line:</h5>
                            <p>
                                {{ $product->small_description}}
                            </p>
                        </div>

                        <div class="mt-3">
                            <h5 class="mb-0 fw-bold" >Description:</h5>
                            <p>
                                {{ $product->description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Related Products by Category-->
    <div class="py-5" style="padding-top: 2rem; padding-bottom: 3rem;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center" style="animation: zoomIn 4s ease-out infinite;">
                    <h2 class="mb-4 fw-bold" style="font-size:25px;letter-spacing:1px; font-family: 'Playfair Display', serif; margin-top: 10px;">
                        Related
                            @if ($category)
                                {{$category->name}}
                            @endif
                        Products
                    </h2>
                </div>
            </div>
            <div class="row">
                @if ($category)
                    <div class="col-md-12" >
                        <div class="owl-carousel owl-theme four-carousel" >
                            @foreach ($category->products as $relatedProductItem)
                            <div class="item">
                                <div class="product-card">
                                    <div class="product-card-body">
                                        <p class="product-brand">{{$relatedProductItem->brand  }}</p>
                                        <h5 class="product-name">
                                        <a href="{{ url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug)}}">
                                            {{$relatedProductItem->name }}
                                        </a>
                                        </h5>
                                    </div> <br>
                                    <div class="float-end">
                                    @php
                                        $discount = round(($relatedProductItem->original_price - $relatedProductItem->selling_price) / $relatedProductItem->original_price * 100);
                                    @endphp

                                    @if ($discount > 0)
                                        <span class="discount-badge" style="background-color: red; color: white; padding: 5px; border-radius: 5px;">{{$discount}}% OFF</span>
                                    @endif
                                    </div>
                                    <div class="product-card-img">
                                        @if($relatedProductItem->productImage->count() > 0)
                                        <a href="{{ url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug)}}">
                                        <img src="{{ asset($relatedProductItem->productImage[0]->image) }}" alt=" {{$relatedProductItem->name }}" class="me-4 img-thumbnail img-fluid" style="width: 100px; height: 150px;">
                                        </a>
                                        @else
                                        <h5>No Image Added</h5>
                                        @endif
                                    </div>
                                    <div class="product-card-body2">
                                        <div style="text-align: center">
                                                <span class="selling-price">${{$relatedProductItem->selling_price }}</span>
                                                <span class="original-price">${{$relatedProductItem->original_price }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach <br>
                        </div>
                    </div>
                    @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Related Products Available</h4>
                        </div>
                    </div>
                @endif
            </div>
            <div class="text-center">
                <a href="{{url('/collections')}}" class="btn btn-dark px-3" style="margin-top:20px">
                    View More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>

    <!--Related Products by Brands-->
    <div class="py-5" style="padding-top: 2rem; padding-bottom: 3rem;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center" style="animation: zoomIn 4s ease-out infinite;">
                    <h2 class="mb-4 fw-bold" style="font-size:25px;letter-spacing:1px; font-family: 'Playfair Display', serif; margin-top: 10px;">
                        Related
                            @if ($product)
                                {{$product->brand}}
                            @endif
                        Products
                    </h2>
                </div>
            </div>
            <div class="row">
                @if ($product)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme four-carousel" >
                            @foreach ($category->products as $relatedProductItem)
                                @if ($relatedProductItem->brand == "$product->brand")
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-card-body">
                                            <p class="product-brand">{{$relatedProductItem->brand  }}</p>
                                            <h5 class="product-name">
                                            <a href="{{ url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug)}}">
                                                {{$relatedProductItem->name }}
                                            </a>
                                            </h5>
                                        </div><br>
                                        <div class="float-end">
                                            @php
                                                $discount = round(($relatedProductItem->original_price - $relatedProductItem->selling_price) / $relatedProductItem->original_price * 100);
                                            @endphp

                                            @if ($discount > 0)
                                                <span class="discount-badge" style="background-color: red; color: white; padding: 5px; border-radius: 5px;">{{$discount}}% OFF</span>
                                            @endif
                                        </div>
                                        <div class="product-card-img">
                                            @if($relatedProductItem->productImage->count() > 0)
                                            <a href="{{ url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug)}}">
                                            <img src="{{ asset($relatedProductItem->productImage[0]->image) }}" alt=" {{$relatedProductItem->name }}" class="me-4 img-thumbnail img-fluid" style="width: 100px; height: 150px;">
                                            </a>
                                            @else
                                            <h5>No Image Added</h5>
                                            @endif
                                        </div>
                                        <div class="product-card-body2">
                                            <div style="text-align: center">
                                                    <span class="selling-price">${{$relatedProductItem->selling_price }}</span>
                                                    <span class="original-price">${{$relatedProductItem->original_price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach <br>
                        </div>
                    </div>
                @else
                    <div class="col-md-12 p-2">
                        <div class="p-2">
                            <h4>No Related Products Available</h4>
                        </div>
                    </div>
                @endif
                </div>
            </div>
            <div class="text-center">
                <a href="{{url('/collections')}}" class="btn btn-dark px-3" style="margin-top:20px">
                    View More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
    //exzoom script
    $(function(){

        $("#exzoom").exzoom({

        // thumbnail nav options
        "navWidth": 60,
        "navHeight": 60,
        "navItemNum": 5,
        "navItemMargin": 7,
        "autoPlay": false,
        "autoPlayTimeout": 2000
        });
    });

    //owlCarousel Script
    $('.four-carousel').owlCarousel({
    loop:true,
    margin:10,
    dots:true,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
    })
</script>

@endpush


