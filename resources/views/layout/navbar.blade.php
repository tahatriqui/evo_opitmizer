<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EVO</title>
    <meta name="description" content="">
    <meta name="keywords" content="Evo , machinery,excavating machinery,crane,forklift,chariot élévateur,grue">
    <!-- Fonts -->
    @yield('url')
    <link rel="stylesheet" href={{ asset('css/nav.css') }}>
    <link rel="stylesheet" href={{ asset('css/product.css') }}>
    <link rel="stylesheet" href={{ asset('css/liste.css') }}>
    <link rel="icon" href="{{ asset('images/Original.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>

<style>
    /* Scrollbar track */
    ::-webkit-scrollbar {
        width: 8px;
        /* Width of the scrollbar */
        height: 12px;
        /* Height for horizontal scrollbar */
    }

    /* Scrollbar thumb (the draggable part) */
    ::-webkit-scrollbar-thumb {
        background-color: #0d2471;
        /* Color of the scrollbar thumb */
        border-radius: 2px;
        /* Rounded corners */
        border: 3px solid transparent;
        /* Optional for spacing */
    }

    /* Scrollbar track (background) */
    ::-webkit-scrollbar-track {
        background: #ffffff;
        /* Background color of the track */

    }

</style>

<body class="font-sans antialiased">
    <nav>
        <!---le logo --->
        <div class="logo">
            <a href="/"><img src="{{ asset('logo.png') }}" alt=""></a>
        </div>
        <ul id="menuList">
            <!--acceuill --->
            <li id="s"> <a href="{{ url('/') }}" class="menu-item">{{__('messages.acceuill') }}</a>
            </li>
            {{-- products --}}
<li class="web-products">
    <a class="nav-link dropdown-toggle " href="#" role="button" style="color:#ffd700;font-size:23px">
        {{ __('messages.Produits') }}
    </a>
    <ul class="pt-4 dropdown-menu drm">
        <div class="dropdown-item-group dit d-flex">
            @foreach ($categories->sortBy(function($category) {
                return strlen($category->nom_cat); // Sort by the length of the category name
            })->chunk(ceil($categories->count() / 3)) as $chunk)
                <div class="dropdown-column drc me-5">
                    @foreach ($chunk as $category)
                       <span class="pb-2 d-flex">
                         <a class="dropdown-item dit" href="{{ url('product/' . $category->id) }}">
                            {{ __('messages.' . $category->nom_cat) }}
                        </a>
                        <img src="{{ asset('images/' . $category->img_cat) }}" style="width:50px;height:auto">
                       </span>
                    @endforeach
                </div>
            @endforeach
        </div>
    </ul>
</li>



            <!--about --->
            <li> <a href="{{ url('/about') }}" class="menu-item">{{__('messages.a_propos') }}</a>
            </li>
            {{-- solution --}}
            <li><a href="{{ url('/solution') }}">{{ __('messages.Solution')}}</a>

            </li>
            {{-- Contact --}}
            <li>
                <a href="{{ route('contact') }}">{{ __('messages.Contact')}}</a>
            </li>




            {{-- Mobile products --}}
            <li style="display: none;z-index:210;" class=" mobile-products nav-item dropdown">
                <a class="text-white nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{__('messages.Produits')}}
                </a>
                <ul style="min-height:190px;font-size:12px !important;background:#0017acdc" class="dropdown-menu mobile-ul" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="text-white dropdown-item" href="{{ route('category.liste') }}">
                            {{__('messages.Produits')}}
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </li>
                    @foreach ($categories as $categorie)
                    <li>
                        <a class="text-white dropdown-item" href="{{ url('product/' . $categorie->id) }}">
                           {{__('messages.'.$categorie->nom_cat)  }}   </a>
                    </li>
                    @endforeach
                </ul>
            </li>


                    {{-- mobile langue --}}

            <li style="display: none;z-index:200;" class=" mobile-products nav-item dropdown">
                <a class="text-white nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span style="display: flex; align-items: center;">
                        <img style="width: 30px; height: 20px; margin-right: 8px;" src="{{ asset('images/' . Config::get('languages')[App::getLocale()]['flag-icon'] . '.png') }}" alt="">
                        {{ Config::get('languages')[App::getLocale()]['display'] }}
                    </span>
                </a>
                <ul style="min-height:90px;font-size:12px !important;background:#0017acdc" class="dropdown-menu mobile-ul" aria-labelledby="navbarDropdownMenuLink">

                    @foreach (Config::get('languages') as $lang => $language)
                    @if ($lang != App::getLocale())
                    <li style="display: flex; align-items: center; padding: 5px 12px;">
                        <a href="{{ route('lang.switch', $lang) }}"><img style="width: 30px;  margin-right: 8px;" src="{{ asset('images/' . $language['flag-icon'] . '.png') }}" alt=""></a>
                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}" style="color: white; text-decoration: none; padding: 0;">
                            {{ $language['display'] }}
                        </a>
                    </li>
                    @endif
                    @endforeach

                </ul>
            </li>

        </ul>
         {{-- pc langue --}}
            <span>
                <div class="col-md-4 w-100">
                    <div class="pt-4 lang dropdown" style="margin-bottom:46px">
                        <button class=" lbtn btn btn-secondary dropdown-toggle" style="border: none; background: rgba(255, 255, 255, 0); padding-top: 35px !important;padding-bottom:35px"type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <span style="padding: 5px 2px 26px 1px !important ; color:#ffd700">
                                <img style="width: 30px; height: 20px; margin-right: 8px;" src="{{ asset('images/' . Config::get('languages')[App::getLocale()]['flag-icon'] . '.png') }}" alt="">
                                {{ Config::get('languages')[App::getLocale()]['display'] }}
                            </span>
                        </button>
                        <ul class="dropdown-menu lang" style="background: linear-gradient(to right, #2042be, #0d2471); padding: 8px 0; border-radius: 8px;" aria-labelledby="dropdownMenuButton">
                            @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                            <li style="display: flex; align-items: center; padding: 5px 12px;">
                                <a href="{{ route('lang.switch', $lang) }}"><img style="width: 30px; height: 20px; margin-right: 8px;" src="{{ asset('images/' . $language['flag-icon'] . '.png') }}" alt=""></a>
                                <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}" style="color: white; text-decoration: none; padding: 0;">
                                    {{ $language['display'] }}
                                </a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </span>
        <div class="menu-icon" onclick="toggleMenu()">
            <i class="fa-solid fa-bars"></i>
        </div>
    </nav>
    {{-- l'affichage des view --}}
    <main class="py-2 flex-grow-1">
        @yield('content')

    </main>
    {{-- le button whatssap --}}
    <div class="whatsapp-btn-container ps-5">
        <a class="whatsapp-btn" href="https://wa.me/91999999999"><i class="fab fa-whatsapp"></i></a>
        <span>{{__('messages.contact_m')}}</span>
    </div>
    <footer class="mb-0 text-center text-white text-lg-start" style="background: linear-gradient(to right,#2042be ,#0d2471)">
        <div class="container p-4 pb-0">
            <div class="row">
                <!-- About Us -->
                <div class="mx-auto mt-3 col-md-3 col-lg-3 col-xl-3">
                    <h6 class="mb-4 text-uppercase font-weight-bold"> {{__('messages.a_propos') }}</h6>
                    <p>
                        {{__('messages.f_aboute') }}
                    </p>
                </div>
                <hr class="clearfix w-100 d-md-none" />
                <!-- Products -->
                <div class="mx-auto mt-3 col-md-2 col-lg-2 col-xl-2">
                    <h6 class="mb-4 text-uppercase font-weight-bold">
                        {{__('messages.Produits')}}</h6>
                    @foreach ($categories->take(7) as $categorie)
                    <p>
                        <a class="text-white" style="text-decoration: none" href="{{ url('product/' . $categorie->id) }}" >{{__('messages.'.$categorie->nom_cat)  }} </a>
                    </p>
                    @endforeach
                     <p>
                        <a class="text-white" style="text-decoration: none" href="{{ route('category.liste') }}">{{__('messages.voir_tous') }}</a>
                    </p>
                </div>
                <hr class="clearfix w-100 d-md-none" />
                <!-- Contact Us -->
                <div class="mx-auto mt-3 col-md-4 col-lg-3 col-xl-3">
                    <h6 class="mb-4 font-weight-bold">
                        {{__('messages.contact') }}</h6>
                    <p><i class="mr-3 fas fa-home"></i>
                        <a href="https://www.google.com/maps/dir//%E8%90%AC%E5%BB%B8%E5%BB%A3%E5%A0%B4+Maxgrand+Plaza+3+Tai+Yau+St+San+Po+Kong+Hong+Kong/@22.3382773,114.1991415,6444m/data=!3m1!1e3!4m8!4m7!1m0!1m5!1m1!1s0x340406da6bfd00c1:0xbec707f31aaccdb5!2m2!1d114.1991415!2d22.3382773?entry=ttu&g_ep=EgoyMDI0MTExMC4wIKXMDSoASAFQAw%3D%3D" style="text-decoration: none; color: inherit;" target="_blank">
                            19h Maxgrand Plaza No.3 Tai Yau Street San Po Kong, Kowloon, Hong Kong
                        </a>
                    </p>

                    <p><i class="mr-3 fas fa-envelope"></i>
                        <a href="mailto:export@gmg-market.com" style="color:white;text-decoration: none">export@gmg-market.com</a>
                    </p>

                    <p><i class="mr-3 fas fa-phone"></i>
                        <a href="tel:+8619826086894" style="text-decoration: none; color: inherit;">+86 19 826 086
                            894</a>
                    </p>

                </div>
            </div>
            <hr class="my-3">
            <div class="p-3 pt-0">
                <div class="row d-flex align-items-center">
                    <!-- Copyright -->
                    <div class="text-center col-md-7 col-lg-8 text-md-start">
                        <div class="p-3">
                            © 2024 Copyright: <a class="text-white" href="https://evo-machinery.com">EVO.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script>
    $('.changeLanguage').change(function(event) {
        var url = "{{ route('translate.change') }}";
        window.location.href = url + "?lang=" + $(this).val()
    })
    let menuList = document.getElementById("menuList")
    let s = document.getElementById("s")
    menuList.style.minHeight = "0px";

    function toggleMenu() {
        if (menuList.style.minHeight === "0px") {
            menuList.style.minHeight = "100vh";
            s.style.paddingTop = "30px";
        } else {
            s.style.paddingTop = "0px";
            menuList.style.minHeight = "0px";
        }
    }
</script>

 <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    // Function to set the AOS offset dynamically based on the screen width
    function setAOSOffset() {
        const offsetValue = window.innerWidth <= 768 ? 400 : 250; // 768px as breakpoint (common for tablets)

        AOS.init({
            duration: 1000, // Durée de l'animation en ms
            easing: 'ease-in-out', // Type d'animation
            once: false,
            offset: offsetValue, // Set dynamic offset
        });
    }

    // Initialize AOS with appropriate offset
    setAOSOffset();

    // Reinitialize on window resize to update offset dynamically
    window.addEventListener('resize', function() {
        setAOSOffset();
    });
</script>


</html>
