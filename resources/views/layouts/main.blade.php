<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

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

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="Logis/assets/img/logo_baru.png" rel="icon">
  <link href="Logis/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset('Logis/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('Logis/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('Logis/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
<link href="{{ asset('Logis/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('Logis/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
<link href="{{ asset('Logis/assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <!-- Menggunakan fungsi asset untuk path yang benar -->
<link href="{{ asset('Logis/assets/css/main.css') }}" rel="stylesheet">
<link href="{{ asset('css/team.css') }}" rel="stylesheet">


  <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <!-- =======================================================
  * Template Name: Logis - v1.0.1
  * Template URL: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    @include('partials.navbar')

  <div class="container-fluid m-0 p-0">
    @yield('container')
  </div>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <span>Deteksi Hipertensi</span>
          </a>
          <p class="text-start">Deteksi Hipertensi adalah platform web berbasis Sistem Pakar yang membantu pengguna mengidentifikasi risiko hipertensi melalui serangkaian pertanyaan, menampilkan hasil untuk gambaran kondisi kesehatan.</p>
          <div class="social-links d-flex mt-4">
            <a href="#" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          </div>
        </div>
        <div class="offset-lg-1 col-lg-3 col-6 footer-links">
          <h4 class="text-start">Useful Links</h4>
          <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/konsultasi">Cek Hipertensi</a></li>
            <li><a href="/team">About us</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4 class="text-start">Contact Us</h4>
          <p class="text-start">
            Jatiwaringin <br>
            Kota Bekasi, Jawa Barat<br>
            Indonesia <br><br>
            <strong>Phone:</strong> +62 815-8716-011<br>
            <strong>Company:</strong> Team 404 <br>
          </p>

        </div>

      </div>
    </div>

    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Deteksi Hipertensi</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{ asset('Logis/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('Logis/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('Logis/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('Logis/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('Logis/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('Logis/assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('Logis/assets/js/main.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('js/team.js') }}"></script>
  
</body>

</html>