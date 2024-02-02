@extends('layouts.frontend')

@section('title')
{{ $category->meta_title }}
@endsection

@section('meta_keyword')
{{ $category->meta_keyword }}
@endsection

@section('meta_description')
{{ $category->meta_description }}
@endsection

@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="mb-4 fw-bold" style="font-size:25px;letter-spacing:1px; font-family: 'Playfair Display', serif; margin-top: 10px;">Our Products</h2>
            </div>
             <livewire:frontend.products.index :category="$category"/>
        </div>
    </div>
</div>
@endsection

