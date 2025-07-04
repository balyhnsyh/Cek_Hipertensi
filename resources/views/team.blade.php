@extends('layouts.main')

@section('container')

    <!--START HERO-->
    <div id="back-marq" style="width: 100vw">
        <div class="container-fluid text-marq d-flex flex-column align-items-center p-0">
            <h1>About Us</h1>
            <p class="text-center" style="width: 60%;">Kami adalah tim profesional yang berdedikasi untuk menyediakan solusi deteksi dini hipertensi. Dengan teknologi terkini dan pengetahuan medis, kami membantu Anda mengidentifikasi risiko hipertensi secara akurat dan cepat. Tujuan kami adalah meningkatkan kualitas hidup Anda dengan pencegahan dini.</p>
        </div>
        <div class="opacity"></div>
        <div class="img-marq">
            <div class="marquee">
                <img src="img/back-1.jpg" height="500"/>
                <img src="img/back-6.jpg" height="500"/>   
                <img src="img/back-2.jpg" height="500"/>
                <img src="img/back-3.jpg" height="500"/>
                <img src="img/back-4.jpg" height="500"/>  
                <img src="img/back-5.jpg" height="500"/>
            </div>
            <div class="marquee">
                <img src="img/back-1.jpg" height="500"/>
                <img src="img/back-6.jpg" height="500"/>   
                <img src="img/back-2.jpg" height="500"/>
                <img src="img/back-3.jpg" height="500"/>
                <img src="img/back-4.jpg" height="500"/>
                <img src="img/back-5.jpg" height="500"/>
            </div>
        </div>
    </div>
    <!--END HERO-->
    
    
    <div class="container expert mt-5 d-flex flex-column align-items-center">
        <div class="row">
            <div class="section-header">
                <span>Our Expert</span>
                <h2>Our Expert</h2>
              </div>    
            <p class="text-center">Tim pakar kami siap membantu Anda dengan deteksi hipertensi yang akurat dan pencegahan komplikasi.</p>
        </div>
        <div class="card-expert rounded-5 p-4 d-flex" style="width: 700px; height: 300px; margin-top: 50px;">
            <div>
                <h4 style="font-size: 1.5rem; font-weight:900;">Yeni Aryanti</h4>
                <p style="font-weight:100 !important;">Perawat RS Cipto Mangunkusumo</p>
                <p style="font-weight:100 !important; width:80% ;">D3 Keperawatan Akademi Yayasan Jalan Kimia</p>
                <p style="font-weight:100 !important; width:50% ;">Jl. Pangeran Diponegoro No.71, Kenari, Kec. Senen, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10430</p>
                <p style="font-weight:500 !important;">Phone (RS) : (021) 1500135</p>
                
            </div>
        </div>
        <img class="img-pakar" style="position: absolute;scale: 70%; margin-left:370px; margin-top:136px;" src="img/pakar.png">
    </div>
    
    
    
    
    <section class="container mt-5 p-5">
        <div class="row p-0 d-flex flex-column align-items-center">
            <div class="section-header">
                <span>Our Team</span>
                <h2>Our Team</h2>
              </div>
            <p class="text-center" style="width: 70%;">Kami adalah tim berdedikasi menciptakan sistem pakar deteksi hipertensi. Dengan kreativitas dan keahlian teknis, kami komitmen memberikan pengalaman online terbaik.</p>
        </div>
        <div class="row d-flex justify-content-center">
            <!-- Column 1-->
            <div class="column" style="margin: 10px 0px 10px 0px;">
                <div class="card">
                    <div class="img-container">
                        <img src="img/team-ul.png" />
                    </div>
                    <h4 style="font-size: 1.3rem">Maulana Iqbal Yuhansyah</h4>
                    <p>17220087</p>
                    <div class="icons">
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Column 2-->
            <div class="column" style="margin: 10px 0px 10px 0px;">
                <div class="card">
                    <div class="img-container">
                        <img src="img/team-luk.png" />
                    </div>
                    <h4 style="font-size: 1.3rem">Mahammad Rizdhan Syahlan</h4>
                    <p>17220120</p>
                    <div class="icons">
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Column 3-->
            <div class="column" style="margin: 10px 0px 10px 0px;">
                <div class="card">
                    <div class="img-container">
                        <img src="img/team-mek.png" />
                    </div>
                    <h4 style="font-size: 1.3rem">Fahri Ardian Mulyana</h4>
                    <p>17220820</p>
                    <div class="icons">
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Column 4-->
            <div class="column" style="margin: 10px 0px 10px 0px;">
                <div class="card">
                    <div class="img-container">
                        <img src="img/team-cin.png" />
                    </div>
                    <h4 style="font-size: 1.3rem">Erlangga Pratama</h4>
                    <p>17220734</p>
                    <div class="icons">
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Column 5-->
            <div class="column" style="margin: 10px 0px 10px 0px;">
                <div class="card">
                    <div class="img-container">
                        <img src="img/team-di.png" />
                    </div>
                    <h4 style="font-size: 1.3rem">Adi Darma Putra Wiyono</h4>
                    <p>17220638</p>
                    <div class="icons">
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
