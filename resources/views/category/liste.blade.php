@extends('layout.navbar')
@section('content')
<style>
        .row {
            margin-right: 0 !important;
        }

    /* CSS personnalisé pour définir 5 colonnes sur les écrans larges */
    .col-5-custom {
        width: 20%; /* chaque colonne prend 20% pour faire 5 colonnes */
    }

    @media (max-width: 1200px) {
        .col-5-custom {
            width: 25%; /* 4 colonnes sur écran de taille moyenne */
        }
    }

    @media (max-width: 992px) {
        .col-5-custom {
            width: 33.33%; /* 3 colonnes sur écran de taille moyenne */
        }
    }

    @media (max-width: 768px) {
        .col-5-custom {
            width: 50%; /* 2 colonnes sur les petits écrans */
        }
    }

    @media (max-width: 576px) {
        .col-5-custom {
            width: 100%; /* 1 colonne sur les écrans très petits */
        }
    }

    </style>
    <div style="position: relative; width: 100%;">
        <img style="width: 100%; max-height: 400px; object-fit: cover; opacity: .4;" src="{{ asset('images/Original.png') }}"
            loading="lazy" alt="">
        <div
            style="font-weight: bold; position: absolute; top: 20%; left:40%;  color: #2042be; font-size: 24px; padding: 10px;">
            <span style="font-size: 50px;">{{__('messages.Produits') }}</span>
        </div>
    </div>
    <div class="container mb-5">


        <!-- Barre de recherche -->
        <div class="search-bar col-12 text-center mt-4 mb-4">
            <form action="{{ route('category.search') }}" method="GET" class="d-inline-flex">
                <input type="text" class="form-control form-control-lg search-input" name="query"
                    placeholder="Entrer le modèle de produit..." aria-label="Search"
                    style="border-radius: 25px 0 0 25px; border: 1px solid #ccc; padding: 10px;">
                <button type="submit" class="btn btn-primary btn-lg"
                    style="border-radius: 0 25px 25px 0; padding: 10px 20px;">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <ul class="category-list">
            @forelse ($categories as $categorie)
                <li class="category-item">
                    <a href="{{ url('product/' . $categorie->id) }}" class="text-decoration-none">
                        {{Config::get('languages')[App::getLocale()]['flag-icon'] == "us" && $categorie->nom_cat_en !== null ? $categorie->nom_cat_en : $categorie->nom_cat    }}
                    </a>
                </li>
            @empty
            @endforelse
        </ul>
        <!-- Grille de produits -->
        <div class="row justify-content-center">
            @forelse ($categories as $categorie)
                 <div class="col-5-custom mb-4">
            <div class="card h-100 shadow-sm border-0" style="border-radius: 15px;">
                <a href="{{ url('product/' . $categorie->id) }}" class="text-decoration-none">
                    <img src="{{ asset('images/' .$categorie->img_cat) }}"  class="card-img-top" alt="Product Image"
                         style="border-radius: 15px 15px 0 0; height: 250px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title" style="font-size: 18px; font-weight: bold; color: #333;">
                            {{Config::get('languages')[App::getLocale()]['flag-icon'] == "us" && $categorie->nom_cat_en !== null ? $categorie->nom_cat_en : $categorie->nom_cat    }}
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
