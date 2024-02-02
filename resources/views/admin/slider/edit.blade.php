<!--Admin Update slider -->
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
                    <i class="fas fa-edit" style="margin-right: 10px; color: #3c3c3d;"></i> Edit Slider:
                    <a href="{{url('admin/sliders')}}" style="font-weight:bold" class="btn btn-danger  text-white float-end"><i class="fas fa-arrow-left" style="margin-right:7px; font-size:15px"></i>Back</a>
                </h3>
            </div>
            <!--card boady-->
            <div class="card-body">
                <form method="POST" action="{{url('admin/sliders/'.$slider->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="mb-3">
                            <label for="">Title:</label>
                            <input type="text" name="title"  value="{{$slider->title}}" class="form-control" style="border :1px solid #ccc" required />
                        </div>

                        <div class="mb-3">
                            <label for="">Description:</label>
                            <textarea class="form-control" rows="3" name="description"  placeholder="Description"   style="border :1px solid #ccc"  required>
                            {{$slider->description}}
                            </textarea><br>
                        </div>

                        <div class="mb-3">
                            <label for="">Select a New Image:</label>
                            <input type="file" name="image" class="form-control" style="border :1px solid #ccc" /> <br>

                            <label for="">Previous Image:</label>
                            <img src="{{ asset($slider->image) }}" style="width:100px; height:100px" alt=""> <br>
                        </div>

                        <div class="mb-3">
                        <input class="form-check-input" type="checkbox" name="status" style="width:30px ; height:30px;border :1px solid #ccc" {{$slider->status == '1' ? 'checked':'' }}>
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
@endsection
