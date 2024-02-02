<!DOCTYPE html>
<html lang="en">
@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 ">
        @if (session('message'))
                <div class="alert alert-success mb-3">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3  style="font-size:25px; font-weight:bold">{{ $order->fullname}}'s Order Details: </h3>
                    <div class="d-flex justify-content-end align-items-end flex-wrap">
                        <a href="{{url('admin/invoice/'.$order->id.'/mail')}}" style="font-weight:bold"  class="btn btn-sm btn-info text-white d-flex align-items-center">
                            <i class="mdi mdi-send menu-icon"></i>&nbsp;
                            Mail Invoice
                        </a>&nbsp;&nbsp;
                        <a href="{{url('admin/invoice/'.$order->id)}}" style="font-weight:bold" target="_black" class="btn btn-sm btn-primary text-white d-flex align-items-center">
                            <i class="mdi mdi-eye menu-icon"></i>&nbsp;
                            View Invoice
                        </a>&nbsp;&nbsp;
                        <a href="{{url('admin/invoice/'.$order->id.'/generate')}}"  style="font-weight:bold" class="btn btn-sm btn-success text-white d-flex align-items-center">
                            <i class="mdi mdi-download menu-icon"></i>&nbsp;
                            Download Invoice
                        </a>&nbsp;&nbsp;
                        <a href="{{url('admin/orders')}}" style="font-weight:bold" class="btn btn-sm btn-danger text-white  d-flex align-items-center">
                            <i class="mdi mdi-arrow-left menu-icon"></i>&nbsp;
                            Back
                        </a>&nbsp;&nbsp;
                    </div>
            </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 " >
                                <h5 style="color:blue;font-size:16px">Order Details</h5><br>
                                <hr>
                                <table class="table table-hover">
                                    <tbody>
                                       <tr>
                                        <th scope="row">Order Id:</th>
                                        <td>{{ $order->id }} </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Tracking Id:</th>
                                        <td>{{ $order->tracking_no }}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Order Placed Date:</th>
                                        <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Payment Mode:</th>
                                        <td> {{ $order->payment_mode }}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Order Status Message:</th>
                                        <td> <span  class=" border p-2 text-uppercase"  style="background:rgb(0, 0, 0);font-weight:bold; font-size:13px;color:white;border-radius: 5px;letter-spacing:1px">{{ $order->status_message}}</span></td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-6" >
                                <h5 style="color:blue;font-size:16px">User Details</h5><br>
                                <hr>
                                <table class="table table-hover">
                                    <tbody>
                                       <tr>
                                        <th scope="row">Full Name:</th>
                                        <td>{{ $order->fullname}} </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Email Address:</th>
                                        <td>{{ $order->email}}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Phone Number:</th>
                                        <td>{{ $order->phone}}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Address:</th>
                                        <td>{{ $order->address }}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Pin Code:</th>
                                        <td> {{ $order->pincode }} </td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> <br><br><br>

                        <h5 style="color:blue;font-size:16px">Order Items:</h5><br>
                        <hr><br>
                        <div class="table-responsive">
                            <table class="table table-bordered" >
                                <thead>
                                    <tr class="table-active">
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
                                            <img src=" {{ asset($orderItem->product->productImage[0]->image)}}" style="width: 100px; height: 100px" alt="">
                                            @endif
                                        </td>
                                        <td>
                                            {{ $orderItem ->product->name }}
                                            @if ( $orderItem ->productColor)
                                                @if ($orderItem ->productColor->color)
                                                    <span style="color:{{$orderItem ->productColor->color->name}};font-weight:bold"> &nbsp;&nbsp;&nbsp;&nbsp;: {{ $cartItem->productColor->color->name }}</span>
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
                                        <td  class="fw-bold" colspan="5" style="font-size:16px;letter-spacing:1px">Total Amount:</td>
                                        <td colspan="1"> <span style="font-weight:bold; font-size:13px;letter-spacing:1px">${{ $totalPrice }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
        </div> <br>

        <div class="card border mt-3">
            <div class="card-body">
                <h4 style="color:blue;font-size:16px">Order Process (Order Status Updates)</h4> <br><hr> <br>
                <div class="row">
                    <div class="col-md-5">
                        <form action="{{ url('admin/orders/'.$order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for=""> Update Your Older Status</label>
                            <div class="input-group">
                                <select name="order_status" class="form-select">
                                    <option value="">Select All Status</option>
                                    <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="completed" {{ Request::get('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="pending" {{ Request::get('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected' : '' }}>Out for delivery</option>
                                </select>

                                <button type="submit" class="btn btn-primary text-white bg-blue-600 fw-bold d-flex align-items-center">
                                    <i class="mdi mdi-pencil menu-icon"></i>
                                    <span class="ms-2">Update</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-7">
                        <br>
                        <h4 class="mt-3">Current Order Status: <span class="text-uppercase">{{ $order->status_message }}</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

