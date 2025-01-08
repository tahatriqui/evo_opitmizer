@extends('layout.navbar')

@section('url')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endsection

@section('content')
<style>
	body {
		font-family: Arial, sans-serif;
	}

	.contact-section {
		padding: 40px 20px;
		background-color: #f8f9fa;
	}

	.contact-form {
		background-color: #ffffff;
		border-radius: 5px;
		padding: 20px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	}

	.contact-details {
		text-align: center;
	}

	.contact-details i {
		font-size: 24px;
		color: #007bff;
		margin-bottom: 10px;
	}

	.google-map-error {
		text-align: center;
		padding: 20px;
		border: 1px solid #e0e0e0;
		border-radius: 5px;
		background-color: #ffffff;
	}
</style>
</head>

<body>
	<div class="container contact-section">
		<h2 data-aos="fade-down" class="text-center">CONTACTEZ-NOUS</h2>
		<p data-aos="fade-down" class="text-center">
			Vous avez des questions ou besoin d'aide ? Contactez-nous en utilisant le formulaire de contact ci-dessous.
			Notre équipe du Groupe EVO MACHINERY est là pour vous aider.
		</p>

		<div class="mt-4 row">
			<!-- Formulaire de contact -->
			<div class="col-md-6">
				<form data-aos="fade-right" class="contact-form" action={{ route('contact.send') }} method="POST">
					@csrf
					<div class="mb-3">
						<label for="fullName" class="form-label">Nom</label>
						<input type="text" class="form-control" id="Nom" name="Nom" placeholder="Nom">
					</div>
					<div class="mb-3">
						<label for="emailAddress" class="form-label">Email </label>
						<input type="email" class="form-control" id="Email" name="Email"  placeholder="Email">
					</div>
					<div class="mb-3">
						<label for="subject" class="form-label">Sujet </label>
						<input type="text" class="form-control" id="Sujet" name="Sujet" placeholder="Sujet">
					</div>
					<div class="mb-3">
						<label for="message" class="form-label">Message</label>
						<textarea class="form-control" id="Message" name="Message" rows="5" placeholder="Message"></textarea>
					</div>
					<button type="submit" class="btn btn-primary w-100">Envoie Message</button>
				</form>
			</div>

			<!-- Carte Google et informations -->
			<div class="col-md-6">
				<div data-aos="fade-left" class="google-map-error">
					<iframe
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3683.2286964911116!2d114.19695241505405!3d22.33827738530811!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x340406da6bfd00c1%3A0xbec707f31aaccdb5!2sMaxgrand%20Plaza%2C%203%20Tai%20Yau%20St%2C%20San%20Po%20Kong%2C%20Hong%20Kong!5e0!3m2!1sen!2sfr!4v1693923123456!5m2!1sen!2sfr"
						width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
						referrerpolicy="no-referrer-when-downgrade">
					</iframe>
				</div>
				<div class="mt-4 contact-details">
					<p data-aos="fade-left"><i class="bi bi-geo-alt"></i> Address: 19h Maxgrand Plaza No.3 Tai Yau
						Street San Po Kong, Kowloon, Hong Kong</p>
					<p data-aos="fade-left"><i class="bi bi-telephone"></i> Phone: +86 19 826 086 894</p>
					<p data-aos="fade-left"><i class="bi bi-envelope"></i> Email: export@gmg-market.com</p>
					<p data-aos="fade-left"><i class="bi bi-globe"></i> Website: evo-machinery.com</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	@endsection