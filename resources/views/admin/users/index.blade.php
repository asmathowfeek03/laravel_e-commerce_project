<!--Admin - Users List View-->
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
                    <i class="fas fa-user" style="margin-right: 10px; color: #3c3c3d;"></i> Users List:
                    <a href="{{url('admin/users/create')}}" style="font-weight:bold" class="btn btn-primary text-white  float-end"><i class="fas fa-plus" style="margin-right: 5px; font-size:15px"></i>Add Users</a>
                </h3>
            </div>
            <!--card body -->
            <div class="card-body">
            <table class="table table-bordered table-striped ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User-Role</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                    @forelse ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>
                                            @if ($user->role_id == '0')
                                                <label><span  class=" border p-2 text-uppercase"  style="background:rgb(0, 0, 0);font-weight:bold; font-size:12px;color:white;border-radius: 5px;letter-spacing:1px">Customer</span></label>
                                            @elseif ($user->role_id == '1')
                                                <label><span  class=" border p-2 text-uppercase"  style="background:rgb(0, 0, 0);font-weight:bold; font-size:12px;color:white;border-radius: 5px;letter-spacing:1px">Admin</span></label>
                                            @else
                                                <label class="badge btn-danger">None</label>
                                            @endif
                                        </td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <a href="{{url('admin/users/'.$user->id.'/edit') }}"class="btn btn-sm btn-success text-white fw-bold"><i class="fas fa-edit" style="margin-right: 5px; font-size:15px"></i>Edit</a>
                                            <a href="{{url('admin/users/'.$user->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-sm btn-danger text-white fw-bold"><i class="fas fa-trash-alt" style="margin-right: 5px;font-size:15px"></i>
                                            Delete
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">No Users Found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                    </table>
                    <div>
                        {{ $users->links() }}
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
