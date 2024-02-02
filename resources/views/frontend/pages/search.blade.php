@extends('layouts.frontend')

@section('title', "Search Products")

@section('content')

<div class="py-5" style="padding-top: 2rem; padding-bottom: 3rem;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center" >
                <h2 class="mb-4 fw-bold" style="font-size:25px;letter-spacing:1px; font-family: 'Playfair Display', serif; margin-top: 10px;">Search Results</h2>
            </div>

                @forelse ($searchProducts as $productItem)
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-card-body">
                            <p class="product-brand">{{$productItem->brand  }}</p>
                            <h5 class="product-name">
                            <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                {{$productItem->name }}
                            </a>
                            </h5>
                        </div>
                        <div class="product-card-img">
                            <label class="stock"  style="background:rgb(156, 3, 3);font-weight:bold; font-size:13px;color:white;border-radius: 5px;letter-spacing:1px">New</label>

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
                </div>
                @empty
                    <div class="col-md-12 p-2">
                        <h4>No Products Available</h4>
                    </div>
                @endforelse <br>
                <div class="text-center">
                    <a href="{{url('/collections')}}" class="btn btn-success px-3" style="margin-top:10px">View More Products</a>
                </div>

        </div>
    </div>
</div>
@endsection












