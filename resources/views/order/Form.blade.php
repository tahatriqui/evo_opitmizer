@extends('layout.navbar')

<style>
@media (max-width: 768px) {
    .image-desktop-only {
        display: none; /* Cache l'image sur mobile */
    }

    .form-container {
        margin: 0 auto; /* Centre horizontalement */
        width: 90%; /* Prend 90% de la largeur de l'écran */
    }

    .form-container form {
        margin: 0; /* Supprime les marges */
    }

    .form-container h2, .form-container p {
        text-align: center; /* Centrer le texte */
    }
}
</style>
@section('content')
    <!-- Page Image -->
        <div style="position: relative; width: 100%;"class="image-desktop-only">
    <img  style="width: 100%; max-height: 400px; object-fit: cover; opacity: .4;" src="{{ asset('images/Original.png') }}" alt="">
    <div class="image-desktop-only"
        style="font-weight: bold; position: absolute; top: 20%; left:40%;  color: #2042be; font-size: 24px; padding: 10px;">
        <span style="font-size: 50px;">{{'PRODUITS' }}</span>
    </div>
</div>
    <section>
        <div class="container text-center">
            <h2 style="font-weight: bold">{{'Devis gratuit',  }}
            </h2>
            <p> {{
                "Nous vous contacterons dans les 24 heures (jours ouvrables), veuillez garder votre téléphone portable ouvert. Si vous avez besoin d'autres services,
                n'hésitez pas à appeler la",

            ) }}
            </p>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form method="post" action="{{ route('order.inser') }}" class="w-75 "
                style="margin-left: 120px;margin-top:40px">
                @csrf
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fname">
                                {{'Catégorie de produit :',  }}</label>
                            <input type="text" name="prod_cat" value="{{ $spesificcat }}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label
                                for="lname">{{'Modèle de produit :',  }}</label>
                            <input type="text" class="form-control" name="prod_mod" readonly value="{{ $name }}">
                        </div>
                    </div>
                </div>


                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fname">{{' Votre nom:',  }}</label>
                            <input type="text" class="form-control" id="fname" name="name"
                                placeholder={{'Enter your first name',  }}>
                            @if ($errors->has('name'))
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lname">{{'Téléphone:',  }}</label>
                            <input type="text" class="form-control" id="lname" name="phone"
                                placeholder={{'Enter your last name',  }}>
                            @if ($errors->has('phone'))
                                <small class="text-danger">{{ $errors->first('phone') }}</small>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fname"> {{'E-mail:',  }}</label>
                            <input type="mail" name="email" class="form-control" id="fname"
                                placeholder={{'Enter your first name',  }}>
                            @if ($errors->has('email'))
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            @endif
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lname">{{'Pays:',  }}</label>
                            <input type="text" class="form-control" id="lname" name="country">
                            @if ($errors->has('country'))
                                <small class="text-danger">{{ $errors->first('country') }}</small>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fname"> {{'Message:',  }}</label>
                        <textarea class="form-control" name="message"></textarea>
                        @if ($errors->has('message'))
                            <small class="text-danger">{{ $errors->first('message') }}</small>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="form-group">

                        <input type="text" class="form-control  " id="fname"
                            placeholder={{'security code',  }}>
                    </div>
                </div>


                <button type="submit"
                    class="btn btn-primary btn-block mt-4">{{'Soumettre',  }}</button>
            </form>


        </div>


    </section>
@endsection
