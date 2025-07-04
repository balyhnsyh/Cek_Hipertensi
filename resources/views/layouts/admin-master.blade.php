<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Deteksi Hipertensi | {{ $title }}</title>
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

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Logis/assets/filepond/filepond.css') }}" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>




</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon">
                    DH
                </div>
                <div class="sidebar-brand-text mx-3">Deteksi Hipertensi</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            @if (Auth::user()->role === 'admin')
                <!-- Nav Item - Dashboard -->
                <li class="nav-item {{ $title === 'Admin Dashboard' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Data User
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item {{ $title === 'Data Pakar' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pakar') }}">
                        <i class="fa-solid fa-user-doctor"></i>
                        <span>Data Pakar</span>
                    </a>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item {{ $title === 'Data Riwayat' ? 'active' : '' }}">
                    <a class="nav-link" href="">
                        <i class="fa-solid fa-user"></i>
                        <span>Riwayat Pasien</span>
                    </a>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item {{ $title === 'Data Pengguna' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pengguna') }}">
                        <i class="fa-solid fa-user-gear"></i>
                        <span>Data Pengguna</span>
                    </a>
                </li>
            @elseif (Auth::user()->role === 'pakar')
                <!-- Heading -->
                <div class="sidebar-heading mt-3">
                    Data User
                </div>
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item {{ $title === 'Data Riwayat' ? 'active' : '' }}">
                    <a class="nav-link" href="">
                        <i class="fa-solid fa-user"></i>
                        <span>Riwayat Pasien</span>
                    </a>
                </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Penyakit & Gejala
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ $title === 'Data Penyakit' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('penyakit') }}">
                    <i class="fa-solid fa-book-skull"></i>
                    <span>Data Penyakit</span>
                </a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item {{ $title === 'Data Gejala' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('gejala') }}">
                    <i class="fa-solid fa-receipt"></i>
                    <span>Data Gejala</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Solusi & Rules
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ $title === 'Data Solusi' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('solusi') }}">
                    <i class="fa-solid fa-book-medical"></i>
                    <span>Data Solusi</span>
                </a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fa-solid fa-circle-nodes"></i>
                    <span>Rules</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    @yield('topbar')

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                                @if (Auth::user()->pfp)
                                    <img class="img-profile rounded-circle"
                                        src="{{ asset('storage/' . Auth::user()->pfp) }}" alt="Profile Photo"
                                        style="object-fit: cover;">
                                @endif
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="" aria-labelledby="userDropdown">
                                <ul class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                                    <li><a class="dropdown-item" href="{{ route('profile.home') }}">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Profile</a></li>

                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </ul>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('admincontent')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Deteksi Hipertensi 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script>
    <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>


    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>



</body>

</html>
