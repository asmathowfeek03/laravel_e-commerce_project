<!--Admin Update Users -->
@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <!--error message -->
        @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
            <!--warnings -->
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
                    <i class="fas fa-edit" style="margin-right: 10px; color: #3c3c3d;"></i> Edit Users:
                    <a href="{{url('admin/users')}}" style="font-weight:bold" class="btn btn-danger  text-white float-end"><i class="fas fa-arrow-left" style="margin-right:7px; font-size:15px"></i>Back</a>
                </h3>
            </div>
            <!--card boady-->
            <div class="card-body">
                <form method="POST" action="{{url('admin/users/'.$user->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>User Role</label>
                        <select name="role_id" class="form-control" style="border :1px solid #ccc ; color:black" required>
                            <option value="">Select User Role</option>
                            <option value="0" {{$user->role_id == '0' ? 'selected': ''}} >User</option>
                            <option value="1" {{$user->role_id == '1' ? 'selected': ''}} >Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label >Name</label>
                        <input type="text" name="name" value="{{$user->name}}" class="form-control" style="border :1px solid #ccc" />
                    </div>
                    <div class="mb-3">
                        <label >Address</label>
                        <textarea type="text" name="address"  class="form-control" style="border :1px solid #ccc" >{{$user->address}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label >Date of Birth</label>
                        <input type="date" name="dob" value="{{$user->dob}}" class="form-control" style="border :1px solid #ccc"/>
                    </div>
                    <div class="mb-3">
                        <label>Contact Number</label>
                        <input type="text" name="phone" value="{{$user->phone}}" class="form-control" style="border :1px solid #ccc" />
                    </div>
                    <div class="mb-3">
                        <label >Email</label>
                        <input type="text" name="email" readonly value="{{$user->email}}" class="form-control" style="border :1px solid #ccc" />
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="text" name="password" value="" class="form-control" style="border :1px solid #ccc" required/>
                    </div>

                    <button type="submit" class="btn btn-success text-white float-end" style="background:#2eb82e;font-weight:bold; margin-right:30px,margin-bottom:30px"><i class="fas fa-pencil-alt" style="margin-right:8px;font-size:15px"></i>Update</button>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection
