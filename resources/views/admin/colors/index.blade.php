<!--Admin - Colors List View-->
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
                    <i class="fas fa-palette" style="margin-right: 10px; color: #3c3c3d;"></i> Colors List:
                    <a href="{{url('admin/colors/create')}}" style="font-weight:bold" class="btn btn-primary text-white  float-end"><i class="fas fa-plus" style="margin-right: 5px; font-size:15px"></i>Add Colors</a>
                </h3>
            </div>
            <!--card body -->
            <div class="card-body">
                <table class="table table-bordered table-striped ">
                        <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Color Name</th>
                                        <th>Color Code</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($colors as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->code}}</td>
                                        <td>{{$item->status == '1'? 'Hidden':'Visible'}}</td>
                                        <td>
                                            <a href="{{ url('admin/colors/'.$item->id.'/edit')}}"class="btn btn-sm btn-success text-white fw-bold"><i class="fas fa-edit" style="margin-right: 5px; font-size:15px"></i>Edit</a>
                                            <a href="{{ url('admin/colors/'.$item->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete this data?')"   class="btn btn-sm btn-danger text-white fw-bold"><i class="fas fa-trash-alt" style="margin-right: 5px;font-size:15px"></i>Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                        <div>
                            {{ $colors->links() }}
                        </div>
            </div>
        </div>
    </div>
</div>

@endsection
