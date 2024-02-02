<!--Admin - Products List View-->
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
                    <i class="fas fa-cube" style="margin-right: 10px; color: #3c3c3d;"></i>Products List:
                    <a href="{{url('admin/products/create')}}" style="font-weight:bold" class="btn btn-primary text-white  float-end"><i class="fas fa-plus" style="margin-right: 5px; font-size:15px"></i>Add Procucts</a>
                </h3>
            </div>
            <!--card body -->
            <div class="card-body">
                <table class="table table-bordered table-striped ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                    @forelse ($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>
                                            @if($product -> category)
                                            {{$product->category->name}}
                                            @else
                                                No Category
                                            @endif
                                        </td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->selling_price}}</td>
                                        <td>
                                            @if ($product->productColors->isNotEmpty())
                                                @foreach ($product->productColors as $productColor)
                                                <h4>{{$productColor->color->name}}: {{$productColor->quantity}}</h4><br>
                                                 @endforeach
                                             @else
                                                {{$product->quantity}}
                                            @endif
                                        </td>
                                        <td>{{$product->status == '1'? 'Hidden':'Visible'}}</td>
                                        <td>
                                            <a href="{{url('admin/products/'.$product->id.'/edit') }}" class="btn btn-sm btn-success text-white fw-bold"><i class="fas fa-edit" style="margin-right: 5px; font-size:15px"></i>Edit</a>
                                            <a href="{{url('admin/products/'.$product->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-sm btn-danger text-white fw-bold"><i class="fas fa-trash-alt" style="margin-right: 5px;font-size:15px"></i>
                                            Delete
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7">No Products Found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                </table>
                <div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
