<!-- Admin-Category list view -->
    <div>
        <!-- Category delete Modal -->
        <div wire:ignore.self class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"style="font-weight:bold">Category Delete</h5>
                        <button type="button" class="close" aria-label="Close"  data-bs-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form wire:submit.prevent ="destroyCategory">
                        <div class="modal-body">
                            <h6>Are you sure you want to delete this data?</h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <div class="card">
                    <!--card header -->
                    <div class="card-header">
                        <h3 style="font-size: 25px; font-weight: bold; font-family: 'Roboto Condensed', sans-serif;margin:20px;">
                            <i class="fas fa-chart-pie" style="margin-right: 10px; color: #3c3c3d;"></i> Categories List:
                            <a href="{{url('admin/category/create')}}" style="font-weight:bold" class="btn btn-primary text-white  float-end"><i class="fas fa-plus" style="margin-right: 5px; font-size:15px"></i>Add Category</a>
                        </h3>
                    </div>
                     <!--card body -->
                    <div class="card-body">
                        <table  class="table table-bordered table-striped  ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->status == '1'? 'Hidden':'Visible'}}</td>
                                            <td>
                                                <a href="{{ url('admin/category/'.$category->id.'/edit')}}" class="btn btn-sm btn-success text-white fw-bold"><i class="fas fa-edit" style="margin-right: 5px; font-size:15px"></i>Edit</a>
                                                <a href="#" wire:click="deleteCategory({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-sm btn-danger text-white fw-bold"><i class="fas fa-trash-alt" style="margin-right: 5px;font-size:15px"></i>Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                        <div>
                            {{ $categories->links() }}
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>

<!--Category delete model- script-->
@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteModal').modal('hide');
        });
    </script>
@endpush





