<!--Admin- Add Users-->
@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <!--error message-->
        @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
        @endif

        <div class="card">
            <!--warnings-->
            @if ($errors->any())
                <div class="alert alert-warning">
                    @forelse($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @empty
                    @endforelse
                </div>
            @endif
            <!--card header -->
            <div class="card-header">
                <h3 style="font-size: 25px; font-weight: bold; font-family: 'Roboto Condensed', sans-serif;margin:20px;">
                    <i class="fas fa-plus" style="margin-right: 10px; color: #3c3c3d;"></i> Add Users:
                    <a href="{{url('admin/users')}}" style="font-weight:bold" class="btn btn-danger  text-white float-end"><i class="fas fa-arrow-left" style="margin-right:7px; font-size:15px"></i>Back</a>
                </h3>
            </div>
             <!--card body -->
            <div class="card-body">
                <form method="POST" action="{{ url('/admin/users') }}" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                        <label>User Role</label>
                        <select name="role_id" class="form-control" style="border :1px solid #ccc ; color:black" required>
                            <option value="">Select User Role</option>
                            <option value="0">Customer</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label >Name</label>
                        <input type="text" name="name" class="form-control" style="border :1px solid #ccc" required />
                    </div>
                    <div class="mb-3">
                        <label >Address</label>
                        <textarea type="text" name="address" class="form-control" style="border :1px solid #ccc" required ></textarea>
                    </div>
                    <div class="mb-3">
                        <label >Date of Birth</label>
                        <input type="date" name="dob" class="form-control" style="border :1px solid #ccc" required />
                    </div>
                    <div class="mb-3">
                        <label>Contact Number</label>
                        <input type="text" name="phone" class="form-control" style="border :1px solid #ccc" required />
                    </div>
                    <div class="mb-3">
                        <label >Email</label>
                        <input type="text" name="email" class="form-control" style="border :1px solid #ccc" required />
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control" style="border :1px solid #ccc" required />
                    </div>
                    <button type="submit" class="btn btn-primary text-white float-end" style="background:#0066ff; font-weight:bold;">
                        <i class="fas fa-save" style="margin-right: 5px;font-size:15px"></i> Save
                    </button>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection
