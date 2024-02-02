<!--Admin- Add Category-->
@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <!--error message-->
        @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
        @endif
         <!--error message-->
         @if ($errors->any())
         <div class="alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
         @endif
            <div class="card">
                <!--card header -->
                <div class="card-header">
                    <h3 style="font-size: 25px; font-weight: bold; font-family: 'Roboto Condensed', sans-serif;margin:20px;">
                        <i class="fas fa-plus" style="margin-right: 10px; color: #3c3c3d;"></i> Add Color:
                        <a href="{{url('admin/colors')}}" style="font-weight:bold" class="btn btn-danger  text-white float-end"><i class="fas fa-arrow-left" style="margin-right:7px; font-size:15px"></i>Back</a>
                    </h3>
                </div>
                 <!--card body -->
                <div class="card-body">
                    <form method="POST" action="{{url('admin/colors') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="mb-3">
                                <label for="">Color Name</label>
                                <input type="text" name="name" class="form-control" style="border :1px solid #ccc" required>
                            </div>

                            <div class="mb-3">
                                <label for="">Color Code</label>
                                <input type="text" name="code" class="form-control" style="border :1px solid #ccc" required>
                            </div>

                            <div class="mb-3">
                            <input class="form-check-input" type="checkbox" id="status" style="width:30px ; height:30px;border :1px solid #ccc" >
                                    <label class="form-check-label" for="status" >
                                        Status (mark the checkbox if it is hidden)
                                    </label>
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
