@extends('layouts.main')

@section('container')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 class="text-start" data-aos="fade-up">Deteksi Hipertensi</h2>
          <p class="text-start" data-aos="fade-up" data-aos-delay="100">Deteksi Hipertensi adalah platform web yang menggunakan teknologi Sistem Pakar untuk membantu pengguna mengidentifikasi risiko hipertensi. Pengguna menjawab serangkaian pertanyaan, dan hasilnya ditampilkan dalam bentuk persentase, memberikan gambaran tentang kondisi kesehatan mereka.</p>
          
          <a href="/konsultasi" class="btn-go btn mb-3 p-3 rounded-5 rounded-start" data-aos="fade-up" data-aos-delay="300">Cek Sekarang Yuk!</a>
          <style>
            .btn-go{
              width: fit-content;
              font-size: 18px;
              font-weight: 500;
              background-image: linear-gradient(90deg, #316f66 0%, #61a097 100%);
              border: 0px;
              color: white;
            }
            .btn-go:hover{
              background-image: linear-gradient(90deg, #61a097 0%, rgb(144, 212, 203) 100%);
            }
            .btn-go:active{
              border: 0px;
            }
          </style>

          <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">
            <div class="col-lg-4 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{ $userCount }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Clients</p>
              </div>
              <script>
                $(document).ready(function() {
                    $.ajax({
                        url: '/',
                        type: 'GET',
                        success: function(response) {
                            $('#userCount').attr('data-purecounter-end', response.count);
                            // Re-initialize PureCounter to update the count
                            new PureCounter();
                        }
                    });
                });
            </script>
            </div><!-- End Stats Item -->

            <div class="col-lg-4 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{ $expertCount }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Experts</p>
              </div>
              <script>
                $(document).ready(function() {
                    $.ajax({
                        url: '/',
                        type: 'GET',
                        success: function(response) {
                            $('#expertCount').attr('data-purecounter-end', response.count);
                            // Re-initialize PureCounter to update the count
                            new PureCounter();
                        }
                    });
                });
            </script>
            </div><!-- End Stats Item -->

            <div class="col-lg-4 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{ $pasienCount }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Pasien</p>
              </div>
              <script>
                $(document).ready(function() {
                    $.ajax({
                        url: '/',
                        type: 'GET',
                        success: function(response) {
                            $('#expertCount').attr('data-purecounter-end', response.count);
                            // Re-initialize PureCounter to update the count
                            new PureCounter();
                        }
                    });
                });
            </script>
            </div><!-- End Stats Item -->

          </div>
        </div>

        <div class="col-lg-5 order-1 order-lg-4 hero-img" data-aos="zoom-out">
          <img src="Logis/assets/img/bokem.png" class="img-fluid mb-3 mb-lg-0" style="scale:79%;" alt="">
        </div>

      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">
    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>Pertanyaan Yang Sering Diajukan</span>
          <h2>Pertanyaan Yang Sering Diajukan</h2>
        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-10">

            <div class="accordion accordion-flush" id="faqlist">

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                    <i class="bi bi-question-circle question-icon"></i>
                    Apa itu hipertensi?
                  </button>
                </h3>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body text-start">
                    Hipertensi, atau tekanan darah tinggi, adalah kondisi medis di mana tekanan darah dalam arteri meningkat secara kronis. Hal ini dapat menyebabkan berbagai komplikasi serius seperti penyakit jantung, stroke, dan kerusakan ginjal jika tidak diobati. 
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                    <i class="bi bi-question-circle question-icon"></i>
                    Apa saja gejala umum dari hipertensi?
                  </button>
                </h3>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body text-start">
                    Banyak orang dengan hipertensi tidak menunjukkan gejala. Namun, beberapa gejala yang mungkin muncul termasuk sakit kepala parah, kelelahan, pusing, penglihatan kabur, dan sesak napas.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                    <i class="bi bi-question-circle question-icon"></i>
                    Apa penyebab utama hipertensi?
                  </button>
                </h3>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body text-start">
                    Penyebab hipertensi bisa bervariasi, termasuk faktor genetik, diet tinggi garam, obesitas, kurang aktivitas fisik, konsumsi alkohol berlebihan, dan stres. Faktor-faktor risiko lain termasuk usia, ras, dan riwayat keluarga.
                  </div>
                </div>
              </div><!-- # Faq item-->
              
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                    <i class="bi bi-question-circle question-icon"></i>
                    Apa saja pilihan pengobatan untuk hipertensi?
                  </button>
                </h3>
                <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body text-start">
                    Pengobatan hipertensi biasanya melibatkan perubahan gaya hidup, seperti diet rendah garam, olahraga teratur, penurunan berat badan, dan pengurangan konsumsi alkohol. Dokter juga mungkin meresepkan obat-obatan seperti diuretik, ACE inhibitor, beta-blocker, dan lainnya.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                    <i class="bi bi-question-circle question-icon"></i>
                    Bagaimana cara mencegah hipertensi?
                  </button>
                </h3>
                <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body text-start">
                    Untuk mencegah hipertensi, disarankan untuk menjaga berat badan sehat, makan diet seimbang rendah garam, berolahraga secara teratur, mengurangi konsumsi alkohol, dan tidak merokok. Mengelola stres juga penting dalam pencegahan hipertensi.
                  </div>
                </div>
              </div><!-- # Faq item-->

            </div>

          </div>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

  </main><!-- End #main -->
@endsection