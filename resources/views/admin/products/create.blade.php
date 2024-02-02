<!--Admin- Add Products-->
@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-14 ">
        <div class="card">
              <!--validation error message-->
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
                        <i class="fas fa-plus" style="margin-right: 10px; color: #3c3c3d;"></i> Add Product:
                        <a href="{{url('admin/products')}}" style="font-weight:bold" class="btn btn-danger  text-white float-end"><i class="fas fa-arrow-left" style="margin-right:7px; font-size:15px"></i>Back</a>
                    </h3>
                </div>
                 <!--card body -->
                <div class="card-body">
                    <form method="POST" action="{{url('admin/products') }}" enctype="multipart/form-data">
                        @csrf
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist" >
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true" style="padding-right:5%; padding-left:5%; color:black;"><i class="fas fa-home"></i>
                                    Home
                                    </button>
                                    <button class="nav-link" id="nav-seotag-tab" data-bs-toggle="tab" data-bs-target="#nav-seotag" type="button" role="tab" aria-controls="nav-seotag" aria-selected="false" style="padding-right:5%; padding-left:5%; color:black;"> <i class="fas fa-tags"></i>
                                    SEO Tags
                                    </button>
                                    <button class="nav-link" id="nav-details-tab" data-bs-toggle="tab" data-bs-target="#nav-details" type="button" role="tab" aria-controls="nav-details" aria-selected="false" style="padding-right:5.5%; padding-left:6%; color:black;"><i class="fas fa-info"></i>
                                    Details
                                    </button>
                                    <button class="nav-link" id="nav-image-tab" data-bs-toggle="tab" data-bs-target="#nav-image" type="button" role="tab" aria-controls="nav-image" aria-selected="false" style="padding-right:5%; padding-left:5%; color:black;"> <i class="fas fa-image"></i>
                                    Product Image
                                    </button>
                                    <button class="nav-link" id="nav-color-tab" data-bs-toggle="tab" data-bs-target="#nav-color" type="button" role="tab" aria-controls="nav-color" aria-selected="false" style="padding-right:5%; padding-left:5%; color:black;"><i class="fas fa-paint-brush"></i>
                                    Product Color
                                    </button>
                            </div>
                        </nav> <br><br><br>
                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="mb-3">
                                        <label>Category</label>
                                        <select name="category_id" class="form-control" style="border :1px solid #ccc ; color:black"  required >
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Product Name</label>
                                        <input type="text" name="name" class="form-control" style="border :1px solid #ccc" required  />
                                    </div>
                                    <div class="mb-3">
                                        <label>Product Slug</label>
                                        <input type="text" name="slug" class="form-control"  style="border :1px solid #ccc" required/>
                                    </div>
                                    <div class="mb-3">
                                        <label>Select Brand</label>
                                        <select name="brand" class="form-control" style="border :1px solid #ccc ; color:black" required>
                                            @foreach ($brands as $brand)
                                            <option value="{{$brand->name}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Small Description (200 Words)</label>
                                    <textarea name="small_description" class="form-control"  rows="4" style="border :1px solid #ccc" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label>Description </label>
                                    <textarea name="description" class="form-control"  rows="4" style="border :1px solid #ccc" required></textarea>
                                    </div>
                            </div>

                            <div class="tab-pane fade" id="nav-seotag" role="tabpanel" aria-labelledby="nav-seotag-tab">
                                    <div class="mb-3">
                                        <label>Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control" style="border :1px solid #ccc" required/>
                                    </div>
                                    <div class="mb-3">
                                        <label>Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control"  rows="4" style="border :1px solid #ccc" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label>Meta Description </label>
                                    <textarea name="meta_description" class="form-control"  rows="4" style="border :1px solid #ccc" required></textarea>
                                    </div>
                            </div>

                            <div class="tab-pane fade" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">
                                    <div class="row">
                                        <h4 style="font-size:15px;color:rgb(92, 90, 90)"><span style="font-weight:bold;color:red;font-size:17px">Instractions: </span>If the product is available in a specific color, please navigate to the <span style="font-weight:bold;color:rgb(37, 82, 179)">Product Color </span> and select the quantity. For products without a specific color, enter 0 in the quantity field.</h4> <br><br><hr><br>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Original Price</label>
                                                <input type="text" name="original_price" class="form-control" style="border :1px solid #ccc" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Selling Price</label>
                                                <input type="text" name="selling_price" class="form-control"  style="border :1px solid #ccc" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Quantity</label>
                                                <input type="number" name="quantity" class="form-control" style="border :1px solid #ccc" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Trending</label>
                                                <input type="checkbox" name="trending" class="form-control" style=" height:50px; width:50px"  />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Featured</label>
                                                <input type="checkbox" name="featured" class="form-control" style=" height:50px; width:50px"  />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Status</label>
                                                <input type="checkbox" name="status" class="form-control" style=" height:50px; width:50px" />
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="tab-pane fade" id="nav-image" role="tabpanel" aria-labelledby="nav-image-tab">
                                <div class="mb-3">
                                    <label for="">Image</label><br><br>
                                    <input type="file" multiple class="form-control" name="image[]" style="border :1px solid #ccc" required>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-color" role="tabpanel" aria-labelledby="nav-color-tab">
                                    <div class="mb-3">
                                        <label>Select Color:</label><br><br>
                                            <div class="row">
                                                @forelse($colors as $coloritem)
                                                <div class="col-md-3">
                                                    <div class="p-2 border mb-3" style="background :#f2f2f2">
                                                        Color: <input type="checkbox" name="colors[{{$coloritem->id}}]" value="{{$coloritem->id}}" style="border :1px solid #ccc"/>
                                                        {{$coloritem ->name}}
                                                        <br><br>
                                                        Quantity: <input type="number" name="colorquantity[{{$coloritem->id}}]" style="border :1px solid #ccc; width:50px;height:20px" min="0"/>
                                                    </div>
                                                </div>
                                                @empty
                                                <div class="col-md-12">
                                                <h6> No Colors Found</h6>
                                                </div>
                                                @endforelse

                                            </div>
                                    </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary text-white float-end" style="background:#0066ff; font-weight:bold;">
                                <i class="fas fa-save" style="margin-right: 5px;font-size:15px"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
