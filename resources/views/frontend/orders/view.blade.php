@extends('layouts.frontend')

@section('title', "My Order Details")

@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 style="font-weight:bold;font-size:20px" >
                        <i class="fa fa-shopping-cart"></i> My Order Details:
                        <a href="{{url('/orders')}}" style="font-weight:bold" class="btn btn-danger  text-white float-end">Back</a>
                    </h4> <br>
                    <hr> <br>
                        <div class="row">
                            <div class="col-md-6 " >
                                <h5 style="color:blue;font-size:16px">Order Details</h5><br>
                                <hr><br>
                                <h6>Order ID: <span style="font-weight:bold;">{{ $order->id }}</span> </h6><br>
                                <h6>Tracking Id/No: <span style="font-weight:bold;"> {{ $order->tracking_no }}</span> </h6><br>
                                <h6>Order Created Date: <span  style="font-weight:bold;)">{{ $order->created_at->format('d-m-Y') }}</span> </h6><br>
                                <h6>Payment Mode: <span style="font-weight:bold;">{{ $order->payment_mode }}</span> </h6><br>
                                <h6>
                                    Order Status Message:  <span  class=" border p-2 text-uppercase"  style="background:rgb(54, 151, 15);font-weight:bold; font-size:15px;color:white;border-radius: 5px;">{{ $order->status_message}}</span>
                                </h6>
                            </div>

                            <div class="col-md-6" >
                                <h5 style="color:blue;font-size:16px">User Details</h5><br>
                                <hr><br>
                                <h6>Full Name: <span style="font-weight:bold;">{{ $order->fullname}}</span> </h6><br>
                                <h6>Email Address: <span style="font-weight:bold;">{{ $order->email}}</span> </h6><br>
                                <h6>Phone Number: <span style="font-weight:bold;">{{ $order->phone}}</span> </h6><br>
                                <h6>Address: <span style="font-weight:bold;">{{ $order->address }}</span> </h6><br>
                                <h6>Pin Code: <span style="font-weight:bold;"> {{ $order->pincode }}</span></h6><br>
                            </div>
                        </div>
                        <br><br>
                        <h5 style="color:blue;font-size:16px">Order Items:</h5><br>
                        <hr><br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" >
                                <thead>
                                    <tr>
                                        <th>Item ID</th>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalPrice =0;
                                    @endphp
                                    @foreach ($order->orderItems as $orderItem )
                                    <tr>
                                        <td width="10%">{{ $orderItem->id }}</td>
                                        <td width="10%">
                                            @if($orderItem->product->productImage->count() > 0)
                                            <img src=" {{ asset($orderItem->product->productImage[0]->image)}}" style="width: 150px; height: 100px" alt="">
                                            @endif
                                        </td>
                                        <td>
                                            {{ $orderItem ->product->name }}
                                            @if ( $orderItem ->productColor)
                                                @if ($orderItem ->productColor->color)
                                                    <span style="color:{{$orderItem ->productColor->color->name}};font-weight:bold"> &nbsp;&nbsp;&nbsp;&nbsp;: {{ $orderItem->productColor->color->name }}</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td width="10%">${{ $orderItem->price }}</td>
                                        <td width="10%">{{ $orderItem->quantity }}</td>
                                        <td width="10%" class="fw-bold">${{ $orderItem->quantity * $orderItem->price }}</td>
                                        @php
                                        $totalPrice += $orderItem->quantity * $orderItem->price;
                                    @endphp
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" class="fw-bold " style="color:rgb(170, 3, 3);">Total Amount:</td>
                                        <td colspan="1" class="fw-bold">${{ $totalPrice }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

