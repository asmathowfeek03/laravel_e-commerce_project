<!--Frontend - Home Page-->
@extends('layouts.frontend')

@section('title', "Home Page")

@section('content')

<!--Frontend - Home Page - Slider view-->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div style="margin-left:40px;margin-right:40px">
            @foreach ($sliders as $key => $sliderItem)
            <div class="carousel-item  {{ $key == 0 ? 'active' : '' }}">
                @if ($sliderItem->image)
                    <img src="{{ asset($sliderItem->image) }}" class="d-block w-100" alt="..." style="height:500px">
                @endif

                <div class="carousel-caption d-none d-md-block">
                    <div class="custom-carousel-content">
                        <h1>
                           {{ $sliderItem->title }}
                        </h1>
                        <p>
                            {{ $sliderItem->description }}
                        </p>
                        <div>
                            <a href="{{ url('/collections') }}" class="btn btn-dark btn-slider" style="padding-top:15px;padding-bottom:15px">
                                Get Now<i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!--Frontend - Home Page - Welcome Message-->
<div class="py-5" style="padding-top: 3rem; padding-bottom: 3rem; background-color: #000000; margin-top: 20px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div style="color: #979393; line-height: 1.6;">
                        <p style="font-size: 30px; letter-spacing:5px; font-family: 'Playfair Display', serif;">
                            Welcome to Luxe
                        </p>
                        <p style="font-size: 18px;letter-spacing:2px; font-family: 'Playfair Display', serif; margin-top: 20px;">
                            We're delighted to have you here. Discover the beauty within you with our exquisite range of makeup and skincare products. Embrace the art of self-expression and let Luxe be your beauty sanctuary.
                        </p>
                    </div> <br>
                    <div style="color: #979393; font-family: 'Brush Script MT', cursive; line-height: 1.6;">
                        <p style="font-size: 30px">
                            "Makeup is not a mask; makeup is art, passion, expression."
                        </p>
                    </div>
                </div>
            </div>
        </div>
</div>

<!--Trending Products -->
<div class="py-5" style="padding-top: 3rem; padding-bottom: 3rem;margin: 30px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center" style="animation: zoomIn 4s ease-out infinite;">
                <h2 class="mb-4 fw-bold" style="font-size:25px;letter-spacing:1px; margin-top: 10px;">Trending Products</h2>
            </div>
        </div>
        <div class="row ">
            @if ($trendingProducts)
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme four-carousel" >
                        @foreach ($trendingProducts as $productItem)
                            <div class="product-card">
                                <div class="product-card-body">
                                    <p class="product-brand">{{$productItem->brand  }}</p>
                                    <h5 class="product-name">
                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                        {{$productItem->name }}
                                    </a>
                                    </h5>
                                </div> <br>
                                <div class="float-end">
                                @php
                                    $discount = round(($productItem->original_price - $productItem->selling_price) / $productItem->original_price * 100);
                                @endphp

                                @if ($discount > 0)
                                    <span class="discount-badge" style="background-color: red; color: white; padding: 5px; border-radius: 5px;">{{$discount}}% OFF</span>
                                @endif
                                </div>
                                <div class="product-card-img">
                                    <label class="stock"  style="background:rgb(0, 0, 0);font-weight:bold; font-size:13px;color:white;border-radius: 5px;letter-spacing:1px">Trending</label>

                                    @if($productItem->productImage->count() > 0)
                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                    <img src="{{ asset($productItem->productImage[0]->image) }}" alt=" {{$productItem->name }}" class="me-4 img-thumbnail img-fluid" style="width: 100px; height: 150px;">
                                    </a>
                                    @else
                                    <h5>No Image Added</h5>
                                    @endif
                                </div>
                                <div class="product-card-body2">
                                    <div style="text-align: center">
                                            <span class="selling-price">${{$productItem->selling_price }}</span>
                                            <span class="original-price">${{$productItem->original_price }}</span>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>No Treanding Products Available</h4>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!--New Arrivals -->
<div class="py-5" style="padding-top: 3rem; padding-bottom: 3rem;margin: 30px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="mb-4 fw-bold" style="font-size:25px;letter-spacing:1px; margin-top: 10px;animation: zoomIn 4s ease-out infinite;"> New Arrivals </h2>
            </div>
        </div>
        <div class="row ">
            @if ($newArrivalProducts)
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme four-carousel" >
                        @foreach ($newArrivalProducts as $productItem)
                            <div class="product-card">
                                <div class="product-card-body">
                                    <p class="product-brand">{{$productItem->brand  }}</p>
                                    <h5 class="product-name">
                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                        {{$productItem->name }}
                                    </a>
                                    </h5>
                                </div> <br>
                                <div class="float-end">
                                @php
                                    $discount = round(($productItem->original_price - $productItem->selling_price) / $productItem->original_price * 100);
                                @endphp

                                @if ($discount > 0)
                                    <span class="discount-badge" style="background-color: red; color: white; padding: 5px; border-radius: 5px;">{{$discount}}% OFF</span>
                                @endif
                                </div>
                                <div class="product-card-img">
                                    <label class="stock"  style="background:rgb(0, 0, 0);font-weight:bold; font-size:13px;color:white;border-radius: 5px;letter-spacing:1px">New</label>

                                    @if($productItem->productImage->count() > 0)
                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                    <img src="{{ asset($productItem->productImage[0]->image) }}" alt=" {{$productItem->name }}" class="me-4 img-thumbnail img-fluid" style="width: 100px; height: 150px;">
                                    </a>
                                    @else
                                    <h5>No Image Added</h5>
                                    @endif
                                </div>
                                <div class="product-card-body2">
                                    <div style="text-align: center">
                                            <span class="selling-price">${{$productItem->selling_price }}</span>
                                            <span class="original-price">${{$productItem->original_price }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>No New Arrivals Available</h4>
                    </div>
                </div>
            @endif
        </div> <br><br>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="{{ url('new-arrivals') }}" class="btn btn-dark ">
                    View More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>


<!--Featured Products -->
<div class="py-5" style="padding-top: 3rem; padding-bottom: 3rem;margin: 30px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="mb-4 fw-bold" style="font-size:25px;letter-spacing:1px; margin-top: 10px;animation: zoomIn 4s ease-out infinite;"> Featured Products </h2>
            </div>
        </div>
        <div class="row ">
            @if ($featuredProducts)
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme four-carousel" >
                        @foreach ($featuredProducts as $productItem)
                            <div class="product-card">
                                <div class="product-card-body">
                                    <p class="product-brand">{{$productItem->brand  }}</p>
                                    <h5 class="product-name">
                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                        {{$productItem->name }}
                                    </a>
                                    </h5>
                                </div> <br>
                                <div class="float-end">
                                @php
                                    $discount = round(($productItem->original_price - $productItem->selling_price) / $productItem->original_price * 100);
                                @endphp

                                @if ($discount > 0)
                                    <span class="discount-badge" style="background-color: red; color: white; padding: 5px; border-radius: 5px;">{{$discount}}% OFF</span>
                                @endif
                                </div>
                                <div class="product-card-img">
                                    <label class="stock"  style="background:rgb(0, 0, 0);font-weight:bold; font-size:13px;color:white;border-radius: 5px;letter-spacing:1px">Featured</label>

                                    @if($productItem->productImage->count() > 0)
                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                    <img src="{{ asset($productItem->productImage[0]->image) }}" alt=" {{$productItem->name }}" class="me-4 img-thumbnail img-fluid" style="width: 100px; height: 150px;">
                                    </a>
                                    @else
                                    <h5>No Image Added</h5>
                                    @endif
                                </div>
                                <div class="product-card-body2">
                                    <div style="text-align: center">
                                            <span class="selling-price">${{$productItem->selling_price }}</span>
                                            <span class="original-price">${{$productItem->original_price }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>No Featured Products Available</h4>
                    </div>
                </div>
            @endif
        </div> <br><br>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="{{ url('featured-products') }}" class="btn btn-dark">
                    View More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
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

@endsection










