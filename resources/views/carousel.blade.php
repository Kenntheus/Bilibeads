@extends('dashboard')
<div class="container" style="padding-top: 80px;" >
    <div class="row">
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-7">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner ml-3">
                        @foreach ($pictures as $index => $carousel)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img class="img-fluid rounded" src="{{ asset('carousel/' . $carousel->photo) }}"
                                    alt="Carousel Photo" alt="Carousel Image {{ $index + 1 }}">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-5 px-5">

                <h1 class="font-weight-light">Bilibeads: Fashion Accessories</h1>
                <p>
                    Bilibeads: Fashion Accessories is an application for people who like bead accessories.
                    Bilibeads is designed to cater to the vibrant world of bead products. Bilibeads will be a
                    comprehensive platform where users can explore, purchase, create, and customize a wide range
                    of bead-based products and craft ideas.</p>
            </div>
        </div>
        {{-- <div class="border p-4">
            <div class="row">
                <div class="text-center">
                    <h4 class="text-center">Latest Product</h4>
                    <div class="row text-center">
                        @foreach ($latest_product as $latest => $index)
                            <div class="col-md-3 mb-4">
                                <img class="img-thumbnail"
                                    src="{{ asset('latest_product/' . $index->latest_product) }}">
                                <div class="card-title">
                                    <h4 class="card-title">{{ $index->name }}</h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>--}}

    </div>
    <div class="border-p4" style="margin-top: 5%">
        @if (session('message'))
            <h4 class="alert alert-success">{{ session('message') }}</h4>
        @endif
        <div style="margin-top: 5%;">
            <div class="category-border">
                <h1 class="text-center"><span class="category">Best Seller</span></h1>
                <div class="row mx-auto">
                    @foreach ($latest_products as $product)
                        <div class="card mt-3 mb-3">
                            <div class="text-center tumb">
                                <img src="{{ asset('products/' . $product->gallery) }}" class="img-fluid p-3"
                                     alt="{{ $product->title }}">
                            </div>
                            <div class="card-body details">
                                <h4 class="text-center">{{ $product->title }}</h4>
                                <div class="position-relative bottom-details">
                                    <div class="links">
                                        {{-- Add Cart or Buy button can go here --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    
</div>
<div class="bottom" style="margin-top:10%">
    {{View::make("frontend.footer")}}
    </div>
