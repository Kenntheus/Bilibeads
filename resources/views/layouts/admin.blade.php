<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bilibeads') }}</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="surfside media" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('font/fonts.css')}}">
    <link rel="stylesheet" href="{{ asset('icon/style.css')}}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/favicon.ico')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css')}}">

    @stack("styles")
</head>

<body class="body">
    <div id="wrapper">
        <div id="page" class="">
            <div class="layout-wrap">
                <div class="section-menu-left">
                    <div class="box-logo">
                        <a href="{{route('admin.index')}}" id="site-logo-inner">
                            <img class="" id="logo_header" alt="" src="{{asset ('images/logo/Logo2.png')}}"
                                data-light="{{asset ('images/logo/Logo2.png')}}" data-dark="{{asset ('images/logo/Logo2.png')}}">
                        </a>
                        <div class="button-show-hide">
                            <i class="icon-menu-left"></i>
                        </div>
                    </div>
                    <div class="center">
                        <div class="center-item">
                            <div class="center-heading">Main Home</div>
                            <ul class="menu-list">
                                <li class="menu-item">
                                    <a href="{{route('admin.index')}}" class="">
                                        <div class="icon"><i class="icon-grid"></i></div>
                                        <div class="text">Dashboard</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="center-item">
                            <ul class="menu-list">
                                <li class="menu-item has-children">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><i class="icon-layers"></i></div>
                                        <div class="text">Category</div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="sub-menu-item">
                                            <a href="{{route('admin.category.add')}}" class="">
                                                <div class="text">New Category</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{route('admin.categories')}}" class="">
                                                <div class="text">Categories</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item has-children">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><i class="icon-shopping-cart"></i></div>
                                        <div class="text">Products</div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="sub-menu-item">
                                            <a href="{{route('admin.product.add')}}" class="">
                                                <div class="text">Add Product</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{route('admin.products')}}" class="">
                                                <div class="text">Products</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item has-children">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><i class="icon-file-plus"></i></div>
                                        <div class="text">Orders</div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="sub-menu-item">
                                            <a href="{{route('admin.orders')}}" class="">
                                                <div class="text">Orders</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.pending-orders') }}" class="">
                                                <div class="text">Pending Orders</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.rejected-orders') }}" class="">
                                                <div class="text">Rejected Orders</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.cancelled-orders') }}" class="">
                                                <div class="text">Canceled Orders</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.processing-orders') }}" class="">
                                                <div class="text">Processing Orders</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.delivered-orders') }}" class="">
                                                <div class="text">Delivered Orders</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <form method="POST" action={{route('logout')}} id="logout-form">
                                        @csrf
                                        <a href="{{route('logout')}}" class="" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <div class="icon"><i class="icon-settings"></i></div>
                                            <div class="text">Logout</div>
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="section-content-right">
                    <div class="header-dashboard">
                        <div class="wrap">
                            <div class="header-left">
                                <a href="index-2.html">
                                    <img class="" id="logo_header_mobile" alt="" src="{{asset ('images/logo/Logo2.png')}}"
                                        data-light="{{asset ('images/logo/Logo2.png')}}" data-dark="{{asset ('images/logo/Logo2.png')}}"
                                        data-width="154px" data-height="52px" data-retina="{{asset ('images/logo/Logo2.png')}}">
                                </a>
                                <div class="button-show-hide">
                                    <i class="icon-menu-left"></i>
                                </div>
                                <form class="form-search flex-grow">
                                    <fieldset class="name">
                                        <input type="text" placeholder="Search here..." class="show-search" name="name" id="search-input"
                                            tabindex="2" value="" aria-required="true" required="" autocomplete="off">
                                    </fieldset>
                                    <div class="button-submit">
                                        <button class="" type="submit"><i class="icon-search"></i></button>
                                    </div>
                                    <div class="box-content-search">
                                        <ul id="box-content-search">
                                        </ul>
                                    </div>
                                </form>
                            </div>
                            <div class="header-grid">
                                @if(isset($recentOrders) && $recentOrders->where('status', 'pending')->count() > 0)
                                <div class="popup-wrap message type-header">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-item">
                                                <span class="text-tiny" style="background-color: #483d34;">{{ $recentOrders->where('status', 'pending')->count() }}</span>
                                                <i class="icon-bell"></i>
                                            </span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton2">
                                            <li>
                                                <h6>Notification</h6>
                                            </li>
                                            @foreach($recentOrders->where('status', 'pending') as $order)
                                            <li>
                                                <a href="{{ route('admin.order.details', ['order_id' => $order->id]) }}">
                                                    <div class="message-item item-{{ $loop->index + 1 }}">
                                                        <div>
                                                            <div class="body-title-2">Order #{{ $order->id }} - {{ $order->name }}</div>
                                                            <div class="text-tiny">₱{{ number_format($order->total, 2) }} | Status: {{ ucfirst($order->status) }}</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            @endforeach
                                            <li>
                                                <a href="{{ route('admin.orders') }}" class="tf-button w-full">View all orders</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @else
                                <div class="popup-wrap message type-header">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-item">
                                                <span class="text-tiny" style="background-color: #483d34;">0</span>
                                                <i class="icon-bell"></i>
                                            </span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton2">
                                            <li>
                                                <div class="message-item">
                                                    <div>
                                                        <div class="text-tiny">No pending orders</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin.orders') }}" class="tf-button w-full">View all orders</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @endif

                                <div class="popup-wrap user type-header">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-user wg-user">
                                                <span class="flex flex-column">
                                                    <span class="body-title mb-2">{{ Auth::user()->name }}</span>
                                                    <span class="text-tiny">Admin</span>
                                                </span>
                                            </span>
                                        </button>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="main-content">
                        @yield('content')

                        <div class="bottom-page">
                            <div class="body-text">Copyright © 2024 Bilibeads</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        $(function() {
            $("#search-input").on("keyup", function() {
                var searchQuery = $(this).val();
                if (searchQuery.length > 2) {
                    $.ajax({
                        type: "GET",
                        url: "{{route('admin.search')}}",
                        data: {
                            query: searchQuery
                        },
                        dataType: 'json',
                        success: function(data) {
                            $("#box-content-search").html('');
                            $.each(data, function(index, item) {
                                var url = "{{route('admin.product.edit',['id'=>'product_id'])}}";
                                var link = url.replace('product_id', item.id);

                                $("#box-content-search").append(`
                                    <li>
                                        <ul>
                                            <li class="product-item gap14 mb-10">
                                                <div class="image no-bg">
                                                    <img src="{{asset('uploads/products/thumbnails')}}/${item.image}" alt="${item.name}">
                                                </div>
                                                <div class="flex items-center justify-between gap20 flex-grow">
                                                    <div class="name">
                                                        <a href="${link}" class="body-text">${item.name}</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-10">
                                                <div class="divider"></div>
                                            </li>
                                        </ul>
                                    </li>
                                `);
                            });
                        }
                    });
                }
            });
        });
    </script>
    @stack("scripts")
</body>

</html>