<div class="row">
        <div class="col-md-3">
            <!-- Brands Filter Option -->
            @if ($category->brands)
            <div class="card" style="margin-top: 20px">
                <div class="card-header bg-dark text-center text-white">
                    <h4>Brands <i class="fas fa-tag ml-2"></i></h4>
                </div>
                <div class="card-body">
                    @foreach ($category->brands as $brandItem)
                    <label class="d-block">
                        <input type="checkbox" wire:model="brandInputs" value="{{$brandItem->name}}" />
                        {{ $brandItem->name }}
                    </label>
                    @endforeach
                </div>
            </div>
            @endif
            <br><br>

            <!-- Price Filter Option -->
            <div class="card mt-3">
                <div class="card-header bg-dark text-center text-white">
                    <h4>Price <i class="fas fa-dollar-sign ml-2"></i></h4>
                </div>
                <div class="card-body">
                    <label class="d-block">
                        <input type="radio" wire:model="priceInput" name="priceSort" value="high-to-low" /> High to Low
                    </label>
                    <label class="d-block">
                        <input type="radio" wire:model="priceInput" name="priceSort" value="low-to-high" /> Low to High
                    </label>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $productItem)
                        <div class="col-md-4"  style="margin-bottom: 20px;">
                            <div class="product-card">
                                <div class="product-card-body">
                                    <p class="product-brand">{{$productItem->brand  }}</p>
                                    <h5 class="product-name">
                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                        {{$productItem->name }}
                                    </a>
                                    </h5>
                                </div> <br>
                                <div class="float-end">
                                @php
                                    $discount = round(($productItem->original_price - $productItem->selling_price) / $productItem->original_price * 100);
                                @endphp

                                @if ($discount > 0)
                                    <span class="discount-badge" style="background-color: red; color: white; padding: 5px; border-radius: 5px;">{{$discount}}% OFF</span>
                                @endif
                                </div>

                                <div class="product-card-img">
                                    @if ($productItem->quantity>0)
                                    <label class="stock bg-success">In Stock</label>
                                    @else
                                    <label class="stock bg-danger">Out of Stock</label>
                                    @endif

                                    @if($productItem->productImage->count() > 0)
                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                    <img src="{{ asset($productItem->productImage[0]->image) }}" alt=" {{$productItem->name }}" class="me-4 img-thumbnail img-fluid" style="width: 100px; height: 150px;">
                                    </a>
                                    @else
                                    <h5>No Image Added</h5>
                                    @endif
                                </div>

                                <div class="product-card-body2">
                                    <div style="text-align: center">
                                            <span class="selling-price">${{$productItem->selling_price }}</span>
                                            <span class="original-price">${{$productItem->original_price }}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <div class="p-2">
                                <h4>No Products Available for {{$category->name}} </h4>
                            </div>
                        </div>
                @endforelse
            </div>
        </div>
</div>
