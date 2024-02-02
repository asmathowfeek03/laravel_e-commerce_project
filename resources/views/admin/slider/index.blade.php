<!-- Admin-slider list view -->
@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
            <div class="card">
                <!--card header -->
                <div class="card-header">
                    <h3 style="font-size: 25px; font-weight: bold; font-family: 'Roboto Condensed', sans-serif;margin:20px;">
                        <i class="fas fa-images" style="margin-right: 10px; color: #3c3c3d;"></i>Home Sliders:
                        <a href="{{url('admin/sliders/create')}}" style="font-weight:bold" class="btn btn-primary text-white  float-end"><i class="fas fa-plus" style="margin-right: 5px; font-size:15px"></i>Add Slider</a>
                    </h3>
                </div>
                <!--card body -->
                <div class="card-body">
                    <table  class="table table-bordered table-striped  ">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($sliders as $slider)
                                        <tr>
                                            <td>{{$slider->id}}</td>
                                            <td>{{$slider->title}}</td>
                                            <td>{{$slider->description}}</td>
                                            <td>
                                            <img src="{{ asset($slider->image) }}" style="width:100px; height:100px" alt="">
                                            </td>
                                            <td>{{$slider->status == '1' ? 'Hidden':'Visible'}}</td>
                                            <td>
                                                <a href="{{ url('admin/sliders/'.$slider->id.'/edit')}}" class="btn btn-sm btn-success text-white fw-bold"><i class="fas fa-edit" style="margin-right: 5px; font-size:15px"></i>Edit</a>
                                            <a href="{{ url('admin/sliders/'.$slider->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete this data?')"  class="btn btn-sm btn-danger text-white fw-bold"><i class="fas fa-trash-alt" style="margin-right: 5px;font-size:15px"></i>Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                    </table>
                    <div>
                    {{ $sliders->links() }}
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
