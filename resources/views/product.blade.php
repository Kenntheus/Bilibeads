@extends('dashboard')


<section id="necklace" class="product-section">
    <div class="container" style="margin-top: 5%">

        @if (session('message'))
            <h4 class= "alert alert-success">{{ session('message') }}</h4>
        @endif
        @foreach ($products->chunk(4) as $chunkedProducts)
            @foreach ($chunkedProducts as $category => $categoryProducts)
                <div class="col border border-2" style="margin-top: 5%">
                    <div class="category-border">
                        <h1 class="text-center"><span class="category">{{ ucfirst($category) }}</span></h1>
                        <div class="row mx-auto ">
                            @foreach ($categoryProducts as $product)
                                <div class="card mx-1 mt-3 mb-3">
                                    <div class="text-center tumb">
                                        <img src="{{ asset('products/' . $product->gallery) }}" class="img-fluid p-3"
                                            alt="{{ $product->title }}">
                                    </div>
                                    <div class="card-body details">
                                        <h4 class="text-center">{{ $product->title }}</h4>
                                        {{-- <p>{{ $product->description }}</p> --}}
                                        <div class="position-relative bottom-details">
                                            <div class="row mb-2">
                                                <div class="col text-start">
                                                    <strong>Price:</strong>
                                                </div>
                                                <div class="col text-end card-text">
                                                    <strong>₱{{ $product->price }}</strong>
                                                </div>
                                            </div>
                                            <div class="links">
                                                <form action="{{ url('addcart', $product->id) }}" method="POST">
                                                    @csrf
                                                    <input type="number" value="1" min="1" max="10"
                                                        class="form-control" name="quantity">

                                                    <br>
                                                    <input type="hidden" name="product_id">
                                                    <button class="btn" style="background-color: #bfdaa4; width: 100%;">Add to Cart</button>

                                                    {{-- wala pang function sa buy --}}


                                                </form>
                                                <form action="{{ url('addbuy', $product->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="Add Cart">
                                                    <button class="btn" style="background-color: #bfdaa4; width: 100%;">Buy</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
    <div class="bottom" style="margin-top: 10%;">
        {{ View::make('frontend.footer') }}
    </div>
</section>



