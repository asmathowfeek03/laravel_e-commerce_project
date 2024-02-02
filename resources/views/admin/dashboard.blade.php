<!--Admin Dashboard Analitics -->
@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <!--heading / welcome-message / links -->
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <!--error message -->
                @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <!--heading -->
                <div class="me-md-3 me-xl-5">
                    <h2 style="font-size: 24px;font-family: 'Roboto Condensed', sans-serif;font-weight: 500; color: #333;text-align: left;">
                        Welcome back, <span style="letter-spacing: 0px; color: #4285f4; font-weight: 600;">{{Auth::user()->name}}</span>!
                    </h2>
                </div>
            </div>
            <!--links -->
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <div class="d-flex float-end">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                    <a href="{{ url('admin/dashboard') }}" class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a>
                    <a href="{{ url('admin/chart') }}" class="text-muted mb-0 hover-cursor">Analytics</a>
                </div>
            </div>
        </div> <br><hr><br>

        <!--Orders Count -->
        <h1>Order Statistics:</h1><br>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-body text-white mb-3" style="padding: 15px; text-align: center; background: #4285f4;">
                    <i class="fas fa-shopping-cart" style="font-size: 20px; color: #ffffff;"></i>
                    <label style="margin-top: 10px;">Total Orders</label>
                    <div style="background: #ffffff; padding: 15px; margin: 10px 70px;">
                        <h1 style="color: #000000; margin: 0; font-weight:bold">{{$totalOrder}}</h1>
                    </div>
                    <a href="{{ url('admin/orders') }}" style="color: #ffffff; font-size: 13px; text-decoration: underline;">View Details</a>
                </div>
            </div>
           <!-- <div class="col-md-3">
                <div class="card card-body text-white mb-3" style="padding: 15px; text-align: center; background: #299938; ">
                    <i class="fas fa-shopping-cart" style="font-size: 20px; color: #ffffff;"></i>
                    <label style="margin-top: 10px;">Todays' Orders</label>
                    <div style="background: #ffffff; padding: 15px; margin: 10px 70px;">
                        <h1 style="color: #000000; margin: 0; font-weight:bold">{{$todayOrder}}</h1>
                    </div>
                    <a href="{{ url('admin/orders') }}" style="color: #ffffff; font-size: 13px; text-decoration: underline;">View Details</a>
                </div>
            </div>-->
            <div class="col-md-4">
                <div class="card card-body text-white mb-3" style="padding: 15px; text-align: center; background: #d65804;">
                    <i class="fas fa-shopping-cart" style="font-size: 20px; color: #ffffff;"></i>
                    <label style="margin-top: 10px;">This Month Orders</label>
                    <div style="background: #ffffff; padding: 15px; margin: 10px 70px;">
                        <h1 style="color: #000000; margin: 0; font-weight:bold">{{ $thisMonthOrder }}</h1>
                    </div>
                    <a href="{{ url('admin/orders') }}" style="color: #ffffff; font-size: 13px; text-decoration: underline;">View Details</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body text-white mb-3" style="padding: 15px; text-align: center;  background: #029c7b;">
                    <i class="fas fa-shopping-cart" style="font-size: 20px; color: #ffffff;"></i>
                    <label style="margin-top: 10px;">This Year Orders</label>
                    <div style="background: #ffffff; padding: 15px; margin: 10px 70px;">
                        <h1 style="color: #000000; margin: 0; font-weight:bold">{{ $thisYearOrder }}</h1>
                    </div>
                    <a href="{{ url('admin/orders') }}" style="color: #ffffff; font-size: 13px; text-decoration: underline;">View Details</a>
                </div>
            </div>
        </div> <br><hr><br>


        <!--Users Count -->
        <h1>User Statistics:</h1><br>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-body text-white mb-3" style="padding: 15px; text-align: center; background: #a80202;">
                    <i class="fas fa-user" style="font-size: 20px; color: #ffffff;"></i>
                    <label style="margin-top: 10px;">Total Users</label>
                    <div style="background: #ffffff; padding: 15px; margin: 10px 70px;">
                        <h1 style="color: #000000; margin: 0; font-weight:bold">{{ $totalAllUsers }}</h1>
                    </div>
                    <a href="{{ url('/admin/users') }}"  style="color: #ffffff; font-size: 13px; text-decoration: underline;">View Details</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-body text-white mb-3" style="padding: 15px; text-align: center; background: #aca001;">
                    <i class="fas fa-user" style="font-size: 20px; color: #ffffff;"></i>
                    <label style="margin-top: 10px;">Admin Users</label>
                    <div style="background: #ffffff; padding: 15px; margin: 10px 70px;">
                        <h1 style="color: #000000; margin: 0; font-weight:bold">{{ $totalAdmin }}</h1>
                    </div>
                    <a href="{{ url('/admin/users') }}" style="color: #ffffff; font-size: 13px; text-decoration: underline;">View Details</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-body text-white mb-3" style="padding: 15px; text-align: center; background: #740297; ">
                    <i class="fas fa-user" style="font-size: 20px; color: #ffffff;"></i>
                    <label style="margin-top: 10px;">Customers</label>
                    <div style="background: #ffffff; padding: 15px; margin: 10px 70px;">
                        <h1 style="color: #000000; margin: 0; font-weight:bold">{{ $totalUser }}</h1>
                    </div>
                    <a href="{{ url('/admin/users') }}" style="color: #ffffff; font-size: 13px; text-decoration: underline;">View Details</a>
                </div>
            </div>
        </div>
        <br><hr><br>

        <!--Products Count -->
        <h1>Product Statistics:</h1><br>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-body text-white mb-3" style="padding: 15px; text-align: center; background: #016b31; ">
                    <i class="fas fa-tags" style="font-size: 20px; color: #ffffff;"></i>
                    <label style="margin-top: 10px;">Total No of Brands</label>
                    <div style="background: #ffffff; padding: 15px; margin: 10px 70px;">
                        <h1 style="color: #000000; margin: 0; font-weight:bold">{{ $totalBrands }}</h1>
                    </div>
                    <a  href="{{ url('/admin/brands') }}"  style="color: #ffffff; font-size: 13px; text-decoration: underline;">View Details</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body text-white mb-3" style="padding: 15px; text-align: center; background: #016674; ">
                    <i class="fas fa-chart-pie" style="font-size: 20px; color: #ffffff;"></i>
                    <label style="margin-top: 10px;">Total No of Categories</label>
                    <div style="background: #ffffff; padding: 15px; margin: 10px 70px;">
                        <h1 style="color: #000000; margin: 0; font-weight:bold">{{  $totalCategories }}</h1>
                    </div>
                    <a  href="{{ url('/admin/category') }}" style="color: #ffffff; font-size: 13px; text-decoration: underline;">View Details</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body text-white mb-3" style="padding: 15px; text-align: center; background: #446801; ">
                    <i class="fas fa-cube" style="font-size: 20px; color: #ffffff;"></i>
                    <label style="margin-top: 10px;">Total No of Products</label>
                    <div style="background: #ffffff; padding: 15px; margin: 10px 70px;">
                        <h1 style="color: #000000; margin: 0; font-weight:bold">{{ $totalProducts }}</h1>
                    </div>
                    <a  href="{{ url('/admin/products') }}"  style="color: #ffffff; font-size: 13px; text-decoration: underline;">View Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
