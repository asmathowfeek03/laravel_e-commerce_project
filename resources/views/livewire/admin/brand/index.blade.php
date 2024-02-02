<!--Admin - Brand List View- Using Livewire -->
<div>
    @include('livewire.admin.brand.modal-form')
    <div class="row">
        <div class="col-md-12">
               <!--error message-->
                @if (session('message'))
                <div class="alert {{ session('message_type') == 'success' ? 'alert-success' : 'alert-danger' }}">
                    {{ session('message') }}
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if ($validationErrorMessage)
                    <div class="alert alert-danger">{{ $validationErrorMessage }}</div>
                @endif

            <!--card starts -->
            <div class="card">
                <!--card header -->
                <div class="card-header">
                    <h3 style="font-size: 25px; font-weight: bold; font-family: 'Roboto Condensed', sans-serif;margin:20px;">
                        <i class="fas fa-tags" style="margin-right: 10px; color: #3c3c3d;"></i> Brands List:
                        <a href="#" data-bs-toggle="modal" data-bs-target="#addBrandModal" style="font-weight:bold" class="btn btn-primary text-white  float-end"><i class="fas fa-plus" style="margin-right: 5px; font-size:15px"></i>Add Brands</a>
                    </h3>
                </div>
                 <!--Brand data table -->
                <div class="card-body ">
                    <table class="table table-bordered table-striped  ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                                <tr>
                                    <td>{{$brand->id}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td>
                                        @if ($brand->category)
                                            {{$brand->category->name}}
                                        @else
                                            <h5>No Category</h5>
                                        @endif
                                    </td>
                                    <td>{{$brand->slug}}</td>
                                    <td>{{$brand->status == '1'? 'Hidden':'Visible'}}</td>
                                    <td>
                                        <a href="#"  wire:click="editBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#updateBrandModal" class="btn btn-sm btn-success text-white fw-bold"><i class="fas fa-edit" style="margin-right: 5px; font-size:15px"></i>Edit</a>

                                        <a href="#" wire:click="deleteBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#deleteBrandModal" class="btn btn-sm btn-danger text-white fw-bold"><i class="fas fa-trash-alt" style="margin-right: 5px;font-size:15px"></i>Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">No Brands Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Brand CRUD models - script -->
@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addBrandModal').modal('hide');
            $('#updateBrandModal').modal('hide');
            $('#deleteBrandModal').modal('hide');
        });
    </script>
@endpush

