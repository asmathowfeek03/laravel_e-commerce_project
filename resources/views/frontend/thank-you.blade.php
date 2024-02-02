@extends('layouts.frontend')

@section('title', "Thank-You")

@section('content')

<div class="py-3 pyt-md-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                @if (session('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="p-4 shadow bg-white">
                    <h2>Luxe</h2> <br>
                    <h4>Thank You for shopping with Luxe</h4> <br><br><br><br>
                    <a href="{{ url('collections') }}" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


















