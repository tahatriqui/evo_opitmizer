<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>EVO</title>
        <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
        <link rel="icon" href="{{ asset('images/Original.png') }}" type="image/x-icon" />

        <!-- Fonts and icons -->
        <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
        <script>
            WebFont.load({
                google: {
                    families: ["Public Sans:300,400,500,600,700"]
                },
                custom: {
                    families: [
                        "Font Awesome 5 Solid",
                        "Font Awesome 5 Regular",
                        "Font Awesome 5 Brands",
                        "simple-line-icons",
                    ],
                    urls: ["{{ asset('assets/css/fonts.min.css') }}"],
                },
                active: function() {
                    sessionStorage.fonts = true;
                },
            });
        </script>

        <!-- CSS Files -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}" />

        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    </head>

    <body>
        <div class="wrapper">
            <!-- Sidebar -->
            <div class="sidebar" data-background-color="dark">
                <div class="sidebar-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="{{ asset('images/Original.png') }}" alt="navbar brand" class="navbar-brand"
                                height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <div class="sidebar-wrapper scrollbar scrollbar-inner">
                    <div class="sidebar-content">
                        <ul class="nav nav-secondary">
                            <li class="nav-item active">
                                <a data-bs-toggle="collapse" href="{{ route('dashboard') }}" class="collapsed"
                                    aria-expanded="false">
                                    <i class="fas fa-home"></i>
                                    <p>Dashboard</p>
                                    <span class="caret"></span>
                                </a>
                            </li>
                            <li class="nav-section">
                                <span class="sidebar-mini-icon">
                                    <i class="fa fa-ellipsis-h"></i>
                                </span>
                                <h4 class="text-section">EVO</h4>
                            </li>
                            <li class="nav-item">
                                <a data-bs-toggle="collapse" href="#base">
                                    <i class="fas fa-layer-group"></i>
                                    <p>Produits</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="base">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a href="{{ route('admin.product') }}">
                                                <span class="sub-item">Liste Produit</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.ajouter_pro') }}">
                                                <span class="sub-item">Ajouter Produit</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a data-bs-toggle="collapse" href="#e">
                                    <i class="fas fa-bars"></i>
                                    <p>Details</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="e">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a href='{{ route('admin.detail') }}'>
                                                <span class="sub-item">Liste des details</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a data-bs-toggle="collapse" href="#h">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>Commande</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="h">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a href='{{ route('admin.cmd') }}'>
                                                <span class="sub-item">Liste Commande</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a data-bs-toggle="collapse" href="#t">
                                    <i class="fas fa-th-large"></i>
                                    <p>Categorie</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="t">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a href='{{ route('admin.categorie') }}'>
                                                <span class="sub-item">Liste Categorie</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href='{{ route('admin.ajouter_cat') }}'>
                                                <span class="sub-item">Ajouter Categorie</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a data-bs-toggle="collapse" href="#f">
                                    <i class="fas fa-cogs"></i>
                                    <p>Parametre</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="f">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a href='{{ route('admin.Parametre') }}'>
                                                <span class="sub-item">Liste Parametre</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href='{{ route('admin.ajouter_par') }}'>
                                                <span class="sub-item">Ajouter Parametre</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Sidebar -->

            <div class="main-panel">
                <div class="main-header">
                    <div class="main-header-logo">
                        <!-- Logo Header -->
                        <div class="logo-header" data-background-color="dark">
                            <a href="index.html" class="logo">
                                <img src="{{ asset('images/Original.png') }}" alt="navbar brand"
                                    class="navbar-brand" height="20" />
                            </a>
                            <div class="nav-toggle">
                                <button class="btn btn-toggle toggle-sidebar">
                                    <i class="gg-menu-right"></i>
                                </button>
                                <button class="btn btn-toggle sidenav-toggler">
                                    <i class="gg-menu-left"></i>
                                </button>
                            </div>
                            <button class="topbar-toggler more">
                                <i class="gg-more-vertical-alt"></i>
                            </button>
                        </div>
                        <!-- End Logo Header -->
                    </div>
                    <!-- Navbar Header -->
                    <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                        <div class="container-fluid">
                            <nav
                                class="p-0 navbar navbar-header-left navbar-expand-lg navbar-form nav-search d-none d-lg-flex">
                            </nav>
                            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                                <li class="nav-item topbar-user dropdown hidden-caret">
                                    <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                                        aria-expanded="false">
                                        <div class="avatar-sm">
                                            <img src="{{ asset('images/Original.png') }}" alt="..."
                                                class="avatar-img rounded-circle" />
                                        </div>
                                        <span class="profile-username">
                                            <span class="op-7">Hi,</span>
                                            <span class="fw-bold">{{ Auth::user()->name }}</span>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                                        <div class="dropdown-user-scroll scrollbar-outer">
                                            <li>
                                                <div class="user-box">
                                                    <div class="avatar-lg">
                                                        <img src="{{ asset('images/Original.png') }}"
                                                            alt="image profile" class="rounded avatar-img" />
                                                    </div>
                                                    <div class="u-text">
                                                        <h4>{{ Auth::user()->name }}</h4>
                                                        <p class="text-muted">{{ Auth::user()->email }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </div>
                                    </ul>
                        </div>
                    </nav>
                    <!-- End Navbar -->
                </div>

                <div class="container">
                    <div class="page-inner">
                        <div class="pt-2 pb-4 d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h3 class="mb-3 fw-bold">Dashboard</h3>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="card card-stats card-round">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-icon">
                                                <div class="text-center icon-big icon-primary bubble-shadow-small">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                            </div>
                                            <div class="col col-stats ms-3 ms-sm-0">
                                                <div class="numbers">
                                                    <p class="card-category">Visitors</p>
                                                    <h4 class="card-title"></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="card card-stats card-round">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-icon">
                                                <div class="text-center icon-big icon-info bubble-shadow-small">
                                                    <i class="fas fa-user-check"></i>
                                                </div>
                                            </div>
                                            <div class="col col-stats ms-3 ms-sm-0">
                                                <div class="numbers">
                                                    <p class="card-category">Subscribers</p>
                                                    <h4 class="card-title"></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="card card-stats card-round">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-icon">
                                                <div class="text-center icon-big icon-success bubble-shadow-small">
                                                    <i class="fas fa-luggage-cart"></i>
                                                </div>
                                            </div>
                                            <div class="col col-stats ms-3 ms-sm-0">
                                                <div class="numbers">
                                                    <p class="card-category">Sales</p>
                                                    <h4 class="card-title"></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="card card-stats card-round">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-icon">
                                                <div class="text-center icon-big icon-secondary bubble-shadow-small">
                                                    <i class="far fa-check-circle"></i>
                                                </div>
                                            </div>
                                            <div class="col col-stats ms-3 ms-sm-0">
                                                <div class="numbers">
                                                    <p class="card-category">Order</p>
                                                    <h4 class="card-title">{{ $nbrorder }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- l'affichage des view --}}
                    <main class="py-2 flex-grow-1">
                        @yield('content')
                    </main>
                </div>
            </div>


        </div>
        <!--   Core JS Files   -->
        <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

        <!-- jQuery Scrollbar -->
        <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

        <!-- Chart JS -->
        <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>

        <!-- jQuery Sparkline -->
        <script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

        <!-- Datatables -->
        <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

        <!-- jQuery Vector Maps -->
        <script src="{{ asset('assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/jsvectormap/world.js') }}"></script>


        <!-- Kaiadmin JS -->
        <script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>


        <script src="{{ asset('assets/js/demo.js') }}"></script>

    </body>

</html>
