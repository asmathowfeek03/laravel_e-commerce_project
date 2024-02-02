<!--Admin Update Colors -->
@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-14 ">
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
                <!--error message -->
                @if (session('message'))
                        <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <!--card header -->
                <div class="card-header">
                    <h3 style="font-size: 25px; font-weight: bold; font-family: 'Roboto Condensed', sans-serif;margin:20px;">
                        <i class="fas fa-edit" style="margin-right: 10px; color: #3c3c3d;"></i> Edit Product:
                        <a href="{{url('admin/products')}}" style="font-weight:bold" class="btn btn-danger  text-white float-end"><i class="fas fa-arrow-left" style="margin-right:7px; font-size:15px"></i>Back</a>
                    </h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{url('admin/products/' .$product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                        </nav>
                        <br><br><br>
                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="mb-3">
                                        <label>Category</label>
                                        <select name="category_id" class="form-control" style="border :1px solid #ccc ; color:black"  required >
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected':''}}>
                                                {{$category->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Product Name</label>
                                        <input type="text" name="name" value="{{$product->name }}" class="form-control" style="border :1px solid #ccc" required  />
                                    </div>
                                    <div class="mb-3">
                                        <label>Product Slug</label>
                                        <input type="text" name="slug" value="{{$product->slug }}" class="form-control"  style="border :1px solid #ccc" required/>
                                    </div>
                                    <div class="mb-3">
                                        <label>Select Brand</label>
                                        <select name="brand" class="form-control" style="border :1px solid #ccc ; color:black" required>
                                            @foreach ($brands as $brand)
                                            <option value="{{$brand->name}}" {{$brand->name == $product->brand ? 'selected':''}}>
                                                {{$brand->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Small Description (200 Words)</label>
                                    <textarea name="small_description"  class="form-control"  rows="4" style="border :1px solid #ccc" required>
                                    {{$product->small_description }}
                                    </textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label>Description </label>
                                    <textarea name="description"  class="form-control"  rows="4" style="border :1px solid #ccc" required>
                                    {{$product->description }}
                                    </textarea>
                                    </div>
                            </div>

                            <div class="tab-pane fade" id="nav-seotag" role="tabpanel" aria-labelledby="nav-seotag-tab">
                                    <div class="mb-3">
                                        <label>Meta Title</label>
                                        <input type="text" name="meta_title"  value="{{$product->slug }}" class="form-control" style="border :1px solid #ccc" required/>
                                    </div>
                                    <div class="mb-3">
                                        <label>Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control"  rows="4" style="border :1px solid #ccc" required>
                                    {{$product->meta_keyword}}
                                    </textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label>Meta Description </label>
                                    <textarea name="meta_description" class="form-control"  rows="4" style="border :1px solid #ccc" required>
                                    {{$product->meta_description}}
                                    </textarea>
                                    </div>
                            </div>

                            <div class="tab-pane fade" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">
                                    <div class="row">
                                        <h4 style="font-size:15px;color:rgb(92, 90, 90)"><span style="font-weight:bold;color:red;font-size:17px">Instractions: </span>If the product is available in a specific color, please navigate to the <span style="font-weight:bold;color:rgb(37, 82, 179)">Product Color </span> and select the quantity. For products without a specific color, enter 0 in the quantity field.</h4> <br><br><hr><br>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Original Price</label>
                                                <input type="text" name="original_price"  value="{{$product->original_price}}" class="form-control" style="border :1px solid #ccc" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Selling Price</label>
                                                <input type="text" name="selling_price"  value="{{$product->selling_price }}" class="form-control"  style="border :1px solid #ccc" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Quantity</label>
                                                <input type="number" name="quantity"  value="{{$product->quantity }}" class="form-control" style="border :1px solid #ccc" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Trending</label>
                                                <input type="checkbox" name="trending"  class="form-control" style=" height:50px; width:50px" {{$product->trending == '1' ? 'checked':''}}  />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Featured</label>
                                                <input type="checkbox" name="featured"  class="form-control" style=" height:50px; width:50px" {{$product->featured == '1' ? 'checked':''}}  />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Status</label>
                                                <input type="checkbox" name="status" class="form-control" style=" height:50px; width:50px" {{$product->status == '1' ? 'checked':'' }}  />
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="tab-pane fade" id="nav-image" role="tabpanel" aria-labelledby="nav-image-tab">
                                <div class="mb-3">
                                    <label for="">Select New Image/s</label><br><br>
                                    <input type="file" name="image[]"  multiple class="form-control" style="border :1px solid #ccc" />
                                </div> <br><br>


                                    <label for="">Previous Image/s</label><br><br>
                                    <div class="d-flex flex-wrap">
                                        @if($product->productImage)

                                        @foreach($product->productImage as $image)
                                        <div class="me-4 mb-4">
                                                <img src="{{ asset($image->image) }}" alt="" class="me-4 img-thumbnail img-fluid" style="width: 100px; height: 150px;">
                                                <a href="{{url('admin/product-image/'.$image->id.'/delete')}}" class="link-danger" style="margin:15%">Remove</a>

                                        </div>
                                        @endforeach
                                        @else
                                            <h5>No Image Added</h5>
                                        @endif
                                    </div>
                            </div>

                            <div class="tab-pane fade" id="nav-color" role="tabpanel" aria-labelledby="nav-color-tab">
                                    <div class="mb-3">
                                        <h4 style="font-weight:bold; font-size:15px">Add Product Colors:</h4><br>
                                        <label>Select Color:</label><br><br>
                                            <div class="row">
                                                @forelse($colors as $coloritem)
                                                <div class="col-md-3">
                                                    <div class="p-2 border mb-3" style="background:#e6e6ff">
                                                        Color: <input type="checkbox" name="colors[{{$coloritem->id}}]" value="{{$coloritem->id}}" style="border :1px solid #ccc"/>
                                                        {{$coloritem ->name}}
                                                        <br><br>
                                                        Quantity: <input type="number" name="colorquantity[{{$coloritem->id}}]" style="border :1px solid #ccc; width:100px;height:50px" min="0"/>
                                                    </div>
                                                </div>
                                                @empty
                                                <div class="col-md-12">
                                                <h6> No Colors Found</h6>
                                                </div>
                                                @endforelse
                                            </div>
                                    </div>
                                     <br>
                                    <h4 style="font-weight:bold; font-size:15px">Remove Product Colors:</h4><br>
                                    <div class="table-responsive">
                                        <table class="table  table-bordered" style="border :1px solid #ccc">
                                            <thead class="table-light">
                                                <tr >
                                                    <th>Color Name</th>
                                                    <th>Quantity</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($product ->productColors as $prodColor)
                                                <tr class="prod-color-tr">
                                                <td>
                                                    @if($prodColor->color)
                                                    {{$prodColor->color->name}}
                                                    @else
                                                    No Color Found!
                                                    @endif
                                                </td>
                                                    <td >
                                                        <div class="input-group mb-3" style="width:150px">
                                                            <input type="text"  value="{{$prodColor->quantity}}" class="productColorQuantity form-control form-control-sm" />
                                                            <button type="button" value="{{$prodColor->id}}" class="updateProductColorBtn btn btn-primary btn-sm text-white " style="background:#0066ff; font-weight:bold">Update</button>
                                                        </div>
                                                    </td>
                                                    <td >
                                                    <button type="button"value="{{$prodColor->id}}" class="deleteProductColorBtn btn btn-danger btn-sm text-white " style="background:red;font-weight:bold">Delete</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div >
                            <button type="submit"  class="btn btn-success text-white float-end" style="background:#2eb82e;font-weight:bold;margin-right:30px; margin-bottom:30px"><i class="fas fa-pencil-alt" style="margin-right:8px;font-size:15px"></i>Update</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click','.updateProductColorBtn', function (){
                    var product_id = "{{$product->id}}";
                    var prod_color_id = $(this).val();
                    var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();
                    //alert (prod_color_id);

                    if(qty <= 0){
                        alert ("Quantity is Required");
                        return false;
                    }

                    var data = {
                        'product_id': product_id,
                        'qty':qty
                    };

                    $.ajax({
                        type: "POST",
                        url: "/admin/product-color/"+prod_color_id,
                        data: data,
                        success: function(response){
                            alert (response.message);
                        }
                    });
            });


            $(document).on('click', '.deleteProductColorBtn', function () {
                var prod_color_id = $(this).val();
                var thisClick = $(this); // Store the reference to $(this)

                $.ajax({
                    type: "DELETE",
                    url: "/admin/product-color/" + prod_color_id,
                    success: function (response) {
                        thisClick.closest('.prod-color-tr').remove();
                        alert(response.message);
                    }
                });
            });

        });
    </script>
@endsection
