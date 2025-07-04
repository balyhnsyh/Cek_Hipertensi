<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Styles-->
    <link href="Logis/assets/img/logo_baru.png" rel="icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--Font Awesome-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Deteksi Hipertensi | {{ $title }} </title>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const originalTitle = '| Deteksi Hipertensi | {{ $title }} '; // Blade syntax
            let titleText = originalTitle;
            let position = 0;
            const speed = 500; // Kecepatan dalam milidetik

            function animateTitle() {
                document.title = titleText.substring(position) + titleText.substring(0, position);
                position = (position + 1) % titleText.length;
                setTimeout(animateTitle, speed);
            }

            animateTitle();
        });
    </script>
</head>

<body>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"
            style="position: absolute; z-index:9999;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert"
            style="position: absolute; z-index:9999;">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a class="text-decoration-none fs-h1 text-white m-4 ps-5" style="position: absolute; z-index: 9999;"
        href="/">Deteksi Hipertensi</a>
    <div class="container-fluid d-flex justify-content-center align-items-center p-0" style="height: 100vh; ">
        <div class="container-fluid"
            style="width:100%; height:100% ;background-image: url(/img/background.jpg); background-size:cover; filter: brightness(20%);">
        </div>

        <div class="card1" style="position: absolute;">
            <div class="card2">
                <form class="form" action="/login" method="POST">
                    @csrf
                    <p id="heading" class="fs-h2 m-5 mb-4">Login</p>
                    <div>
                        <div class="field @error('email') is-invalid @enderror">
                            <i class="fa-solid fa-at"></i>
                            <input required name="email" type="email" class="input-field"
                                placeholder="Example@gmail.com" autocomplete="off" value="{{ old('email') }}" />
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="field">
                        <svg viewBox="0 0 16 16" fill="currentColor" height="16" width="16"
                            xmlns="http://www.w3.org/2000/svg" class="input-icon">
                            <path
                                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z">
                            </path>
                        </svg>
                        <input required name="password" type="password" class="input-field" placeholder="Password" />
                    </div>
                    @if (Route::has('password.request'))
                        <a class="forgot text-decoration-none" style="margin-top: -15px;"
                            href="{{ route('password.request') }}">Forgot
                            Password?</a>
                    @endif


                    <div class="btn mt-2">
                        <button type="submit" class="button1">Login</button>
                    </div>
                    <p class="regis text-white text-center" style="margin-top: -20px">Does'nt have account? <a
                            class="link-regis" href="/register">Register</a></p>

                    <a href="{{ route('google.login') }}" class="signin mb-5">
                        <svg viewBox="0 0 256 262" preserveAspectRatio="xMidYMid" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027"
                                fill="#4285F4"></path>
                            <path
                                d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1"
                                fill="#34A853"></path>
                            <path
                                d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782"
                                fill="#FBBC05"></path>
                            <path
                                d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251"
                                fill="#EB4335"></path>
                        </svg>
                        Sign in with Google
                    </a>
                </form>
            </div>
        </div>

    </div>


    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
