<!--Admin- Add Category-->
@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
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
            <!--card header -->
            <div class="card-header">
                <h3 style="font-size: 25px; font-weight: bold; font-family: 'Roboto Condensed', sans-serif;margin:20px;">
                    <i class="fas fa-plus" style="margin-right: 10px; color: #3c3c3d;"></i> Add Category
                    <a href="{{url('admin/category')}}" style="font-weight:bold" class="btn btn-danger  text-white float-end"><i class="fas fa-arrow-left" style="margin-right:7px; font-size:15px"></i>Back</a>
                </h3>
            </div>
             <!--card body-->
            <div class="card-body">
            <form method="POST" action="{{url('admin/category') }}" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" style="border :1px solid #ccc" required >
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Slug</label>
                            <input type="text" class="form-control" name="slug"  placeholder="Slug" style="border :1px solid #ccc"  required>
                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control"  name="description" placeholder="Description"   style="border :1px solid #ccc"  required>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </textarea>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 ">
                            <label for="">Image</label>
                            <input type="file" class="form-control" name="image" style="border :1px solid #ccc" required>
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 "><br>
                            <div class="form-check"  style="margin-left:30px;">
                            <input class="form-check-input" type="checkbox" id="status">
                            <label class="form-check-label" for="status"  required>
                                Status (mark the checkbox if it is visible)
                            </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <h4 style="font-weight:bold">SEO Tags</h4>
                    </div>

                    <div class="form-group">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title"  placeholder="Meta Title" style="border :1px solid #ccc"  required>
                        @error('meta_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Meta Keyword</label>
                        <textarea class="form-control" name="meta_keyword" placeholder="Meta Keyword"  style="border :1px solid #ccc"  required>
                        @error('meta_keyword')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Meta Description</label>
                        <textarea class="form-control" name="meta_description" placeholder="Meta Description"  style="border :1px solid #ccc"  required>
                        @error('meta_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </textarea>
                    </div>

                    <button type="submit" class="btn btn-primary text-white float-end" style="background:#0066ff; font-weight:bold; margin-right:30px; margin-bottom:30px">
                        <i class="fas fa-save" style="margin-right: 5px;font-size:15px"></i> Save
                    </button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
