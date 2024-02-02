<!--Fronend Category Page-->
@extends('layouts.frontend')

@section('title', "All Categories")

@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h4 class="mb-4 fw-bold" style="font-size:25px;letter-spacing:1px; font-family: 'Playfair Display', serif; margin-top: 10px; text-align:center">Our Categories</h4>
            </div>
            @forelse ($categories as $categoryItem )
            <div class="col-6 col-md-3" >
                <div class="category-card">
                    <a href="{{ url('/collections/'.$categoryItem->slug) }}">
                        <div class="category-card-img">
                            <img src="{{ asset('uploads/category/'.$categoryItem->image) }}" class="w-100" alt="Category Image" style="border:1px solid rgb(196, 194, 194)">
                        </div>
                        <div class="category-card-body" style="border:1px solid rgb(211, 209, 209)">
                            <h5>{{$categoryItem->name}}</h5>
                        </div>
                    </a>
                </div>
            </div>
            @empty
                <div class="col-md-12">
                    <h5>No Categories Available</h5>
                </div>
            @endforelse
        </div>

    </div>
</div>
@endsection

