<!-- Brade Create Modal -->
        <div wire:ignore.self class="modal fade" id="addBrandModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"style="font-weight:bold">Add Brands</h5>
                        <button type="button" class="close" wire:click="closeModal" aria-label="Close"  data-bs-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form wire:submit.prevent ="storeBrand">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Select Category</label>
                                <select wire:model.defer="category_id" class="form-control" style="border :1px solid #ccc ; color:black"  required >
                                    <option value="">--Select the Category--</option>
                                    @foreach ($categories as $cateItem)
                                    <option value="{{$cateItem->id}}"> {{$cateItem->name}}</option>
                                    @endforeach
                                </select>
                           </div>
                           <div class="mb-3">
                                <label>Brand Name</label>
                                <input type="text" class="form-control" wire:model.defer="name" placeholder="Brand Name" style="border :1px solid #ccc ,padding-left:2px" required >
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                              
                           </div>

                           <div class="mb-3">
                                <label>Brand Slug</label>
                                <input type="text" class="form-control" wire:model.defer="slug" placeholder="Slug" style="border :1px solid #ccc , padding-left:2px" required >
                                @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                           </div>

                           <div class="mb-3">
                                <div class="form-check"  style="margin-left:30px;">
                                <input class="form-check-input" type="checkbox" wire:model.defer="status" >
                                <label class="form-check-label" for="status">
                                    Status (Checked=Hidden / Unchecked = Visible)
                                </label>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" wire:click="closeModal" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


<!-- Brand Update Modal -->
        <div wire:ignore.self class="modal fade" id="updateBrandModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"style="font-weight:bold">Update Brands</h5>
                        <button type="button" class="close" wire:click="closeModal" aria-label="Close"  data-bs-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div wire:loading>
                    <div class="text-center">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>Loading...
                        </div>
                    </div>
                    <div wire:loading.remove>
                        <form wire:submit.prevent ="updateBrand">
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label>Select Category</label>
                                    <select wire:model.defer="category_id" class="form-control" style="border :1px solid #ccc ; color:black"  required >
                                        @foreach ($categories as $cateItem)
                                        <option value="{{$cateItem->id}}"> {{$cateItem->name}}</option>
                                        @endforeach
                                    </select>
                               </div>

                            <div class="mb-3">
                                    <label>Brand Name</label>
                                    <input type="text" class="form-control" wire:model.defer="name" placeholder="Brand Name" style="border :1px solid #ccc ,padding-left:2px" required >
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="mb-3">
                                    <label>Brand Slug</label>
                                    <input type="text" class="form-control" wire:model.defer="slug" placeholder="Slug" style="border :1px solid #ccc , padding-left:2px" required >
                                    @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="mb-3">
                                    <div class="form-check"  style="margin-left:30px;">
                                    <input class="form-check-input" type="checkbox" wire:model.defer="status" >
                                    <label class="form-check-label" for="status">
                                        Status (Checked=Hidden / Unchecked = Visible)
                                    </label>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" wire:click="closeModal" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


<!-- Brand delete Modal -->
        <div wire:ignore.self class="modal fade" id="deleteBrandModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"style="font-weight:bold">Delete Brand</h5>
                        <button type="button" class="close" aria-label="Close"  data-bs-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form wire:submit.prevent ="destroyBrand">
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
