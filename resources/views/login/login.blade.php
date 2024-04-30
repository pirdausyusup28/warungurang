<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="public/img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

	<title>Aplikasi Warung</title>

	<link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	
</head>

<body>
	<div style="display: flex; align-items: center; justify-content: center; height: 100vh;"> <!-- Menerapkan flexbox untuk memposisikan secara vertikal dan horizontal -->
		<section class="py-3 py-md-5 py-xl-8">
		  <div class="container">
			<div class="row gy-4 align-items-center justify-content-center"> <!-- Menggunakan justify-content-center untuk memposisikan secara horizontal -->
			  <div class="col-12 col-md-6 col-xl-7">
				<div class="d-flex justify-content-center">
				  <div class="col-12 col-xl-9">
					<img class="img-fluid rounded mb-4" src="{{ asset('public/img/logo.png') }}" width="245" height="80" alt="BootstrapBrain Logo">
					<hr class=" mb-4">
					<h2 class="h1 mb-4">Warehouse Management</h2>
					<p class="lead mb-5">Custom for babemu</p>
					{{-- <div class="text-center"> <!-- Menggunakan justify-content-center untuk memposisikan secara horizontal -->
					  <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-grip-horizontal" viewBox="0 0 16 16">
						<path d="M2 8a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
					  </svg>
					</div> --}}
				  </div>
				</div>
			  </div>
			  <div class="col-12 col-md-6 col-xl-5">
				<div class="card border-0 rounded-4">
				  <div class="card-body p-3 p-md-4 p-xl-5">
					<div class="row">
					  <div class="col-12">
						<div class="mb-4">
							<center><img class="img-fluid rounded mb-4" src="{{ asset('public/img/logo3.png') }}" width="50" height="40" alt=""></center>
						  <h3 class="text-center">Masuk Dengan Akun anda</h3> <!-- Posisikan judul di tengah -->
						</div>
					  </div>
					</div>
					<form action="{{ route('login') }}" method="POST">
					  @csrf
					  <div class="row gy-3 overflow-hidden">
						<div class="col-12">
						  <div class="form-floating mb-3">
							<input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
							<label for="email" class="form-label">Email</label>
						  </div>
						</div>
						<div class="col-12">
						  <div class="form-floating mb-3">
							<input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
							<label for="password" class="form-label">Password</label>
						  </div>
						</div>
						  @error('email')
							  <span class="text-danger">{{ $message }}</span>
						  @enderror
						  @error('password')
							  <span class="text-danger">{{ $message }}</span>
						  @enderror
						<div class="col-12">
						  <div class="d-grid">
							<button class="btn btn-primary btn-lg" type="submit">Masuk</button>
						  </div>
						</div>
					  </div>
					</form>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</section>
	  </div>
	  

	<script src="{{ asset('public/js/app.js') }}"></script>

</body>

</html>