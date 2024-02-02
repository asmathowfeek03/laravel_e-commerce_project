<!--Admin Update Category -->
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
                    <i class="fas fa-edit" style="margin-right: 10px; color: #3c3c3d;"></i> Edit Category
                    <a href="{{url('admin/category')}}" style="font-weight:bold" class="btn btn-danger  text-white float-end"><i class="fas fa-arrow-left" style="margin-right:7px; font-size:15px"></i>Back</a>
                </h3>
            </div>
             <!--card boady-->
            <div class="card-body">
            <form method="POST" action="{{url('admin/category/'.$category->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="row">
                        <div class="form-group col-md-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$category -> name}}" placeholder="Name" style="border :1px solid #ccc" >
                        </div>
                        <div class="form-group col-md-6">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" placeholder="Slug" name="slug" value="{{$category -> slug}}" style="border :1px solid #ccc" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control"  placeholder="Description"  name="description" style="border :1px solid #ccc" > {{$category -> description}}</textarea>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 ">
                            <label for="">Previous Image</label>
                            <img src="{{ asset('uploads/category/'.$category->image) }}" alt="" width="60px" height="60px"><br>
                            <label for="">Select a New Image</label>
                            <input type="file" class="form-control" name="image" style="border :1px solid #ccc" >

                        </div>
                        <div class="form-group col-md-6 "><br>
                            <div class="form-check"  style="margin-left:30px;">
                            <input class="form-check-input" type="checkbox" name="status" {{$category -> status == '1' ? 'checked': ''}}>
                            <label class="form-check-label" for="" >Status</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <h4 style="font-weight:bold">SEO Tags</h4>
                    </div>
                    <div class="form-group">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control"  placeholder="Meta Title" name="meta_title" value="{{$category -> meta_title}}"  style="border :1px solid #ccc" >
                    </div>
                    <div class="form-group">
                        <label for="">Meta Keyword</label>
                        <textarea class="form-control"  placeholder="Meta Keyword" name="meta_keyword" style="border :1px solid #ccc" >{{$category -> meta_keyword }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Meta Description</label>
                        <textarea class="form-control"  placeholder="Meta Description" name="meta_description" style="border :1px solid #ccc"  >{{$category -> meta_description}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success text-white float-end" style="background:#2eb82e;font-weight:bold; margin-right:30px,margin-bottom:30px"><i class="fas fa-pencil-alt" style="margin-right: 5px;font-size:15px"></i>Update</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
