<!DOCTYPE html>
<html>
<head>
    <title>Login form</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('AuthCss/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Overlay notification container */
        .alert-overlay {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1055; /* above everything */
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <!--<img class="wave" src="{{ asset('assets/dash/board_files/back.jpg')}}">-->

    <!-- Overlay Notifications -->
    <div class="alert-overlay">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <!-- End Overlay Notifications -->

    <div class="container">
        <div class="img">
            <img src="{{asset ('assets/dash/board_files/insur.png')}}">
        </div>

        <div class="login-content">

            <!-- Loader (hidden initially) -->
            <div id="loader" class="d-none text-center">
                <div class="spinner-border text-danger" style="width: 4rem; height: 4rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-3 text-danger">Redirecting to your dashboard...</p>
            </div>

            <!-- Login Form -->
            <form id="loginForm" method="POST" action="{{ url('/Authentication/login') }}">
                @csrf

                <img src="{{asset ('assets/dash/board_files/logo.png')}}" style="width: 250px; height: auto;">
                <h2 class="title">Login</h2>

                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input type="email" class="input" name="email" required>
                    </div>
                </div>

                <div class="input-div pass">
                    <div class="i"> 
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" name="password" required>
                    </div>
                </div>

                <a href="#">Forgot Password?</a>

                <input type="submit" class="btn btn-primary btn-sm" value="Login" style="background-color: #d4141c;">
            </form>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('AuthCss/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    // Auto-close alerts after 5 seconds
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(alert => {
            const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
            bsAlert.close();
        });
    }, 5000);

    // If login success exists, delay to show loader then redirect
    @if (session('success') && str_contains(session('success'), 'Redirecting'))
        // After 1.5s hide form and show loader
        setTimeout(() => {
            document.getElementById('loginForm').classList.add('d-none');
            document.getElementById('loader').classList.remove('d-none');
        }, 1500);

        // After another 2s, redirect to dashboard
        setTimeout(() => {
            window.location.href = '/dash/index';
        }, 3500);
    @endif
    </script>

</body>
</html>
