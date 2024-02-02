<!--Purchase History -->
@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <!--error message -->
        @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
             <!--card header -->
            <div class="card-header">
                <h3 style="font-size: 25px; font-weight: bold; font-family: 'Roboto Condensed', sans-serif;margin:20px;">
                    <i class="fas fa-history" style="margin-right: 10px; color: #3c3c3d;"></i> Purchase History:
                </h3>
            </div>
            <!--card body-->
            <div class="card-body">
                <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Filter by Date</label>
                            <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">Filter by Status</label>
                            <select name="status" class="form-select">
                                <option value="">Select All Status</option>
                                <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="completed" {{ Request::get('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="pending" {{ Request::get('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected' : '' }}>Out for delivery</option>
                            </select>
                        </div>
                        <div class="col-md-6"><br>
                            <button type="submit" class="btn btn-primary bg-blue-600 text-white fw-bold">
                                <i class="fas fa-filter" style="margin-right: 5px;font-size:15px"></i> Filter
                            </button>
                        </div>
                    </div>
                </form><br><br>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Tracking No</th>
                                <th>User Name</th>
                                <th>Payment Mode</th>
                                <th>Ordered Date</th>
                                <th>Status Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $item )
                            <tr>
                                <td>{{ $item ->id }}</td>
                                <td>{{ $item ->tracking_no }}</td>
                                <td>{{ $item ->fullname }}</td>
                                <td>{{ $item ->payment_mode}}</td>
                                <td>{{ $item ->created_at->format('d-m-Y')}}</td>
                                <td>{{ $item ->status_message }}</td>
                                <td> <a href="{{url('admin/orders/'.$item->id) }}" class="btn btn-sm btn-primary text-white">
                                    <i class="fas fa-eye" style="margin-right: 5px;font-size:12px"></i> View</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">No Orders Available</h5>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

