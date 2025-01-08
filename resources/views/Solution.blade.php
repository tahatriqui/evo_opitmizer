@extends('layout.navbar')
@section('url')
    <link rel="stylesheet" href="{{ asset('css/solution.css') }}">
@endsection
@section('content')
    <!-- Page Image -->
    <div style="position: relative; width: 100%;" data-aos="fade-up" data-aos-duration="1000">
        <img style="width: 100%; max-height: 400px; object-fit: cover; opacity: .4;"
            src="{{ asset('images/Original.png') }}"
            loading="lazy" alt="">
        <div style="font-weight: bold; position: absolute; top: 20%; left:30%; color: #2042be; font-size: 24px; padding: 10px;" data-aos="zoom-in" data-aos-duration="1000">
            <span style="font-size: 50px;">{{ __("messages.eq_blinde") }}</span>
        </div>
    </div>

    <!-- la partie etapes design -->
    <section class="design-steps">
    <h1>{{ __('messages.design_etap') }}</h1>
    <div class="steps-container">
        <div class="step" data-aos="fade-up" data-aos-duration="1000">
            <i class="fas fa-drafting-compass icon"></i>
            <h2>{{ 'DESIGN' }}</h2>
            <p>{{ 'L’art de la beauté au service de l’industrie' }}</p>
        </div>
        <div class="step" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
            <i class="fas fa-search icon"></i>
            <h2>{{ __('messages.rv') }}</h2>
            <p>{{ 'Les meilleurs spécialistes à votre écoute' }}</p>
        </div>
        <div class="step" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
            <i class="fas fa-industry icon"></i>
            <h2>{{ 'FABRICATION' }}</h2>
            <p>{{ 'Les meilleurs ingénieurs de production' }}</p>
        </div>
        <div class="step" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
            <i class="fas fa-cube icon"></i>
            <h2>{{ 'PROTOTYPAGE' }}</h2>
            <p>{{ 'L’innovation à portée de main' }}</p>
        </div>
        <div class="step" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
            <i class="fas fa-vial icon"></i>
            <h2>{{ 'TEST ET ESSAI' }}</h2>
            <p>{{ 'Maîtrise des risques au maximum' }}</p>
        </div>
        <div class="step" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
            <i class="fas fa-couch icon"></i>
            <h2>{{ 'CONFORT' }}</h2>
            <p>{{ 'La robustesse du blindage et le confort d’une' }}</p>
        </div>
    </div>
</section>



    {{-- //////////// --}}
 <section>
    <div class="section">
        <div class="contain">
            <!-- Content Section with Animation -->
            <div class="content-section" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
                <div class="title">
                    <h1>{{ __("messages.eq") }}</h1>
                </div>
                <div class="content">
                    <p>
                        {{ __('messages.eq_intro') }}
                    </p>
                    {{-- <div class="button mb-5">
                        <a href="">{{ 'Nos services' }}</a>
                    </div> --}}
                </div>
            </div>

            <!-- Image Section with Animation -->
            <div class="image-section" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
                <img src="{{ asset('/images/EXCAVATORS/EI15X.jpg') }}" alt="Équipement blindé">
            </div>
        </div>
    </div>
</section>

@endsection
