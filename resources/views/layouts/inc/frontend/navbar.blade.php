<!--Frontend - Nav Bar-->
<div class="main-navbar shadow-sm sticky-top">
    <div class="top-navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1 my-auto d-none d-sm-none d-md-block d-lg-block" >
                    <h5 class="brand-name" style="padding-left:18px">LuXe</h5>
                </div>
                <div class="col-md-8 my-auto mx-auto text-center" >
                    <form action="{{  url('search')}}" method="GET" role="search" style="padding-top:15px; margin-right:10%">
                        <div class="input-group">
                            <input type="search" name="search" value="{{ Request::get('search') }}" placeholder="Search your product" class="form-control" style="background:#f2f2f2; border:white;width: 300px;" />&nbsp;
                            <button class="btn btn-sm" type="submit" style="background:#d9d9d9">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 my-auto">
                    <ul class="nav justify-content-end" >
                        @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline" style="font-weight:bold;color:black">
                                        <x-app-layout>
                                        </x-app-layout>
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="text text-gray-700 " style="font-weight:bold;color:black">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 text text-gray-700 " style="font-weight:bold;color:black">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <ul class="nav justify-content-center" style="background: #f2f2f2;" >
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}" style="font-weight:bold;color:black">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/collections') }}" style="font-weight:bold;color:black">All Categories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/new-arrivals') }}" style="font-weight:bold;color:black">New Arrivals</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/featured-products') }}" style="font-weight:bold;color:black">Featured Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('cart') }}" style="font-weight:bold;color:black">
                <i class="fa fa-shopping-cart"></i> Cart (<livewire:frontend.cart.cart-count/>)
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('wishlist') }}" style="font-weight:bold;color:black">
                <i class="fa fa-heart"></i> Wishlist (<livewire:frontend.wishlist-count/>)
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-weight:bold;color:black">
                <i class="fa fa-user"> My Shopping</i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ url('/orders') }}"><i class="fa fa-list"></i> My Orders</a></li>
            <li><a class="dropdown-item" href="{{ url('wishlist') }}"><i class="fa fa-heart"></i> My Wishlist</a></li>
            <li><a class="dropdown-item" href="{{ url('cart') }}"><i class="fa fa-shopping-cart"></i> My Cart</a></li>
            </ul>
        </li>
    </ul>
</div>
