<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style>
    .hover-effect {
        background-color: transparent;
        transition: background-color 0.3s ease;
    }

    .hover-effect:hover {
        background-color: #bfdaa4;
        font-weight: bold;
    }

    .text-fonts {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .hover-effect-red {
        background-color: transparent;
        transition: background-color 0.3s ease;
    }

    .hover-effect-red:hover {
        background-color: #e74242;
        font-weight: bold;
    }

    /* Sidebar Styles */
    .left-sidebar {
        height: 100vh; /* Full viewport height */
        background-color: #505C45;
    }

    
</style>

<body>

    <aside class="left-sidebar" style="background-color:#505C45; position:fixed">
        <h1 class="text-white text-start" style="margin-bottom: 20px; margin-left: 27px;">Bilibeads</h1>
        <div class="scroll-sidebar" style="height: auto;">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="sidebar-item">
                        <a class="sidebar-link text-white hover-effect" href="{{ url('admindashboard') }}"
                            aria-expanded="false">
                            <i data-feather="home" class="feather-icon"></i>
                            <span class="hide-menu">Home</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link text-white hover-effect" href="{{ url('/shop') }}"
                            aria-expanded="false">
                            <i data-feather="shopping-bag" class="feather-icon"></i>
                            <span class="hide-menu">Shop</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link text-white hover-effect" href="{{ url('adminusers') }}"
                            aria-expanded="false">
                            <i data-feather="users" class="feather-icon"></i>
                            <span class="hide-menu">User List</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link text-white hover-effect" href="{{ url('adminproduct') }}"
                            aria-expanded="false">
                            <i data-feather="box" class="feather-icon"></i>
                            <span class="hide-menu">Products</span>
                        </a>
                    </li>
                    {{-- <li class="sidebar-item">
                        <a class="sidebar-link text-white hover-effect" href="#" aria-expanded="false">
                            <i data-feather="image" class="feather-icon"></i>
                            <span class="hide-menu">Carousel</span>
                        </a>
                    </li> --}}
                    {{-- <li class="sidebar-item">
                        <a class="sidebar-link text-white hover-effect" href="#" aria-expanded="false">
                            <i data-feather="star" class="feather-icon"></i>
                            <span class="hide-menu">Latest Product</span>
                        </a>
                    </li> --}}
                    <li class="sidebar-item">
                        <a href="{{ route('logout') }}" class="sidebar-link hover-effect-red"
                            onclick="event.preventDefault(); document.querySelector('#logout').submit()"
                            aria-expanded="false">
                            <i data-feather="log-out" class="feather-icon"></i>
                            <span class="hide-menu">Logout</span>
                        </a>
                        <form id="logout" action="{{ route('logout') }}" method="post" style="display: none;">@csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Feather icons script -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace();
    </script>
</body>
@style('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css')
@script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
@script('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
@script('https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.2/dist/alpine.min.js')
@script('/assets/admin/js/ckeditor.min.js')

{{-- Styles --}}
@livewireStyles
@style('/assets/admin/css/style.min.css')
@if (config('easy_panel.rtl_mode'))
    @style('/assets/admin/css/rtl.css')
    @style('https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v27.2.1/dist/font-face.css')
@endif
</html>
