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
                <form class="form" action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <p id="heading" class="fs-h2 m-5 mb-4">Forgot Password</p>
                    <div>
                        <div class="field @error('email') is-invalid @enderror">
                            <i class="fa-solid fa-at"></i>
                            <input required name="email" type="email" class="input-field"
                                placeholder="Example@gmail.com" autocomplete="off" />
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                        <a class="forgot text-decoration-none" style="margin-top: -15px;"
                            href="{{ route('login') }}">Remember Password?</a>


                    <div class="btn mt-2 mb-5">
                        <button type="submit" class="button1">Email Password Reset Link</button>
                    </div>
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
