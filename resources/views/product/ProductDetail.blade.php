@extends('layout.navbar')

@section('content')
<style>
    .row {
        margin-right: 0 !important;
        margin-left: 20px
    }

    @media (max-width: 600px) {
        .fdiv {
            margin-bottom: 20px
        }

        .ps-lg-5 {
            margin-left: 20px
        }

        dd {
            display: inline-block;
            margin-right: 20px
        }

        .parali {
            font-size: 14px !important;
            padding-top: 30px;

        }

    }

    #menu {
        display: flex;
        flex-direction: row;
    }


    @media (max-width: 600px) {
        #navbar {
            display: none;

        }



    }
</style>
<section class="py-5 mt-5 mb-5">
    <div class="">
        <div class="row gx-5">
            <aside class="col-lg-6">
                <div class="mb-3 border rounded-4 d-flex justify-content-center">
                    <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image">
                        <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit"
                            src="{{ asset('/images/' . $product->img_pro) }}" />
                    </a>
                </div>
            </aside>
            <main class="col-lg-6">
                <div class="ps-lg-5">
                    <h4 class="title text-dark">
                        <h1>{{ $product->nom_pro }}</h1> <br> {{Config::get('languages')[App::getLocale()]['flag-icon']
                        == "us" && $product->desc_pro_en != null ? $product->desc_pro_en : $product->dec_pro }}


                    </h4>
                </div>
                <hr style="margin-top: 60px">
                @foreach ($filteredDetails as $detail)
                <div class="row" style="margin-top: 40px;margin-right: 20px !important;">
                    @foreach ($detail as $column => $value)
                    <dt class="col-10 "> {{ ucfirst(__('messages.'. $column)) }}</dt>
                    <dd class="col-1 ">{{$value, }}</dd>
                    @endforeach
                </div>
                @endforeach
                <hr style="margin-top: 30px" />
                <br>
                <a href="{{ route('order', [$product->category_id, $product->nom_pro]) }}"
                    class="btn btn-warning shadow-0">
                    <i class="me-1 fa fa-shopping-basket"></i>{{__( 'messages.cmd_enligne') }}
                </a>

        </div>
        </main>
    </div>
    </div>
</section>
<section>
    <div id="navbar"
        style="position: relative; z-index: 10000; background-color: #2042be;  justify-content: space-between; align-items: center; color: white;height: 70px; width: 100%;padding: 0 20px;padding-top: 20px;">
        <div class="container d-flex justify-content-between align-items-center">

            <ul id="menu" class="gap-4 mb-0 list-unstyled d-lg-flex">
                <div class="logo" style="font-size: 20px;">{{$product->nom_pro}}</div>
                <li class="parali" style="font-size: 18px;"><a style="color: white; text-decoration: none"
                        href="#Product_facture">{{__('messages.c_t_d')}}</a></li>
                <li class="parali" style="font-size: 18px;"><a style="color: white; text-decoration: none"
                        href="#parameter">{{'PARAMÈTRES', }}</a></li>
            </ul>
        </div>
    </div>
    <div id="Product_facture" class="mt-5 text-white">margin</div>
    {{-- Product fetures --}}
    <div style="margin-top: 10px" class="container mt-3 ">
        <h2 style="font-weight: bold;color:#2042be">{{__('messages.c_t_d')}}</h2>
        <span class="mt-2 ">
            @php
            // Split the text into paragraphs by periods, followed by one or more spaces
            $paragraphs = preg_split('/(?<=\.)\s+ /', $product->caracteristique);

                $paragraphseng = preg_split('/(?<=\.)\s+ /', $product->cara_eng);

                    // Clean up each paragraph by trimming any extra spaces and removing empty paragraphs
                    $paragraphs = array_filter(array_map('trim', $paragraphs));

                    // Clean up each paragraph by trimming any extra spaces and removing empty paragraphs
                    $paragraphseng = array_filter(array_map('trim', $paragraphseng));
                    @endphp

                    @if(Config::get('languages')[App::getLocale()]['flag-icon'] == "us" )
                    @if($product->cara_eng)
                    @foreach ($paragraphseng as $paragraph)
                    <div>{{ $paragraph }}</div>
                    @endforeach
                    @elseif($product->desc_pro_eng)
                    {{ $product->desc_pro_eng }}
                    @else
                    {{ $product->dec_pro }}
                    @endif
                    @else
                    @if($product->caracteristique)
                    @foreach ($paragraphs as $paragraph)
                    <div>{{ $paragraph }}</div>
                    @endforeach
                    @else {{ $product->dec_pro }}
                    @endif
                    @endif
        </span>
    </div>

    <div id="parameter" class="mt-5 text-white">margin</div>
    {{-- parametre --}}
    <div style="margin-top: 10px" class="container mt-3 ">
        <h2 style="font-weight: bold;color:#2042be">{{'PARAMÈTRES', }}</h2>
        <span class="mt-2 ">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">{{'Article' }}</th>
                        <th scope="col">{{'Unité' }}</th>
                        <th scope="col">{{'Paramètre' }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($parametres as $parametre)
                    <tr>
                        <th scope="row">{{__('messages.'.$parametre->Article)  }}</th>
                        <td>{{ $parametre->Unité }}</td>
                        <td>{{$parametre->Paramètre, }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </span>
    </div>
</section>
<br>
<script>
    window.onscroll = function() {
            var navbar = document.getElementById("navbar");
            var sticky = navbar.offsetTop;

            if (window.pageYOffset > sticky) {
                navbar.style.position = "fixed";
                navbar.style.top = "0";
                navbar.style.width = "100%";
            } else {
                navbar.style.position = "relative";
                navbar.style.width = "auto";
            }
        };
</script>
@endsection