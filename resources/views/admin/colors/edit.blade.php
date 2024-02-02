<!--Admin Update Colors -->
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
            <div class="card">
                <!--card header -->
                <div class="card-header">
                    <h3 style="font-size: 25px; font-weight: bold; font-family: 'Roboto Condensed', sans-serif;margin:20px;">
                        <i class="fas fa-edit" style="margin-right: 10px; color: #3c3c3d;"></i> Edit Colors:
                        <a href="{{url('admin/colors')}}" style="font-weight:bold" class="btn btn-danger  text-white float-end"><i class="fas fa-arrow-left" style="margin-right:7px; font-size:15px"></i>Back</a>
                    </h3>
                </div>
                <!--card boady-->
                </div>
                <div class="card-body">
                    <form method="POST" action="{{url('admin/colors/'.$color->id) }}" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                            <div class="mb-3">
                                <label for="">Color Name</label>
                                <input type="text" name="name"  value="{{$color->name}}" class="form-control" style="border :1px solid #ccc" required>
                            </div>

                            <div class="mb-3">
                                <label for="">Color Code</label>
                                <input type="text" name="code" value="{{$color->code}}"class="form-control" style="border :1px solid #ccc" required>
                            </div>

                            <div class="mb-3">
                            <input class="form-check-input" type="checkbox" name="status" style="width:30px ; height:30px;border :1px solid #ccc" {{$color->status == '1' ? 'checked':'' }}  />
                                    <label class="form-check-label" for="status" >
                                        Status (mark the checkbox if it is hidden)
                                    </label>
                            </div>

                            <button type="submit"  class="btn btn-success text-white float-end" style="background:#2eb82e;font-weight:bold; margin-right:30px,margin-bottom:30px"><i class="fas fa-pencil-alt" style="margin-right:8px;font-size:15px"></i>Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
