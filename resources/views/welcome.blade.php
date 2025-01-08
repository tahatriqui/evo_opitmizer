@extends('layout.navbar')
@section('content')
<style>

        .row {
            margin-right: 0 !important;
        }
                .col-5-custom {
            width: 20%;
        }

        .custom-control .carousel-control-prev-icon,
        .custom-control .carousel-control-next-icon {
            background-color: #00008b22;

        }

        @media (max-width: 1200px) {
            .col-5-custom {
                width: 25%;
            }
        }

        @media (max-width: 992px) {
            .col-5-custom {
                width: 33.33%;
            }
        }



        @media (max-width: 576px) {
            .col-5-custom
            {
                width: 100%;
            }
        }
            .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease !important;
    }

    .card:hover {
        transform: scale(1.05) !important; /* Slightly scale up the card */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15 !important); /* Add a subtle shadow */
        opacity: 0.8 !important;
    }
</style>

    <!-- Code pour le banner image -->
    <div id="carousel" class="carousel slide carousel-custom" data-bs-ride="carousel"  >
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img class="d-block" style="height: auto !important;  width: 100%;" src="{{ asset('images\EXCAVATORS 1.png') }}" alt="Slide 1">
            </div>

            <div class="carousel-item ">
                <img class="d-block" style="height: auto !important;  width: 100%;" src="{{ asset('images\LOADERS 1.png') }}" alt="Slide 1">
            </div>

            <div class="carousel-item ">
                <img class="d-block" style="height: auto !important;  width: 100%;" src="{{ asset('images\PECIAL VEUICLE.png') }}" alt="Slide 1">
            </div>

            <div class="carousel-item ">
                <img class="d-block" style="height: auto !important;  width: 100%;" src="{{ asset('images\Aerial Work 4.png') }}" alt="Slide 1">
            </div>

            <div class="carousel-item ">
                <img class="d-block" style="height: auto !important;  width: 100%;" src="{{ asset('images\PORT MACHINERY logo.png') }}" alt="Slide 1">
            </div>
    </div>

        <a class="carousel-control-prev custom-control" href="#carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next custom-control" href="#carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
    </div>
<!-- partie about -->
<div class="about" id="">
   <div class="ab-content">
     <h1 data-aos="fade-up" class="text-center about-title" style="padding-bottom: 40px">À propos</h1>
    <p data-aos="fade-up">
        Lorem ipsum dolor sit amet consectetur adipisicing elit.
        Pariatur voluptas ut beatae quod.
        Excepturi in consequatur sint.
        Natus, voluptates rerum! Quam omnis sit suscipit fugit voluptatibus.
        Expedita aliquid voluptates eius. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis ullam adipisci eaque aperiam tempora officiis eligendi voluptatem esse temporibus. Ea atque eaque dolorum placeat modi. Sit explicabo provident tempore perspiciatis?
    </p>
   </div>
</div>
<!-- afficher le texte -->
<div class="my-5 text-center">
    <h2  data-aos="fade-up"  style="font-size: 40px; font-weight: bold; color:#2042be;" >Nos produits</h2>
    <h3  data-aos="fade-up"  style="font-size: 16px; color: black; line-height: 1.6;">
       EVO MACHINERY est l'un des principaux fabricants et fournisseurs d'équipements d'ingénierie de construction en Maroc.
    </h3>
</div>
    <!-- Code pour la partie produit -->
        <div class="container">
        <div class="row justify-content-center" style="margin-top: 50px" data-aos="fade-up">
            @forelse ($categories as $categorie)
                <div data-aos="fade-up" class="mb-4 col-5-custom" >
                    <div class="border-0 shadow-sm card h-100" style="border-radius: 15px;" >
                        <a href="{{ url('product/' . $categorie->id) }}" class="text-decoration-none">
                            <img src="{{ asset('images/' . $categorie->img_cat) }}" class="card-img-top" alt="Product Image"
                                style="border-radius: 15px 15px 0 0; height: 200px; object-fit: cover;">
                            <div class="text-center card-body" >
                                <h5 class="card-title" style="font-size: 18px; font-weight: bold; color: #2042be;">
                                    {{__('messages.'.$categorie->nom_cat)  }}
                                </h5>
                            </div>
                        </a>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
        </div>
@endsection
