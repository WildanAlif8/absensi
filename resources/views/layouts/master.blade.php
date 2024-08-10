<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Hadir Karyawan </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="icon" type="image/png" href="{{ asset('assets/image/logo test.jpeg') }}">
    <style>
        /* Global Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
    
        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #2c3e50; /* Dark Blue Gray */
            color: #ecf0f1; /* Light Gray */
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }
    
        .sidebar .nav-link {
            color: #ecf0f1; /* Light Gray */
            padding: 15px;
            display: block;
            text-decoration: none;
            border-left: 4px solid transparent;
            transition: background-color 0.3s, border-color 0.3s;
        }
    
        .sidebar .nav-link:hover {
            background-color: #34495e; /* Slightly Lighter Blue Gray */
            border-left: 4px solid #f39c12; /* Gold */
            color: #ecf0f1; /* Light Gray */
        }
    
        .sidebar .nav-link.active {
            background-color: #34495e; /* Slightly Lighter Blue Gray */
            border-left: 4px solid #f39c12; /* Gold */
        }
    
        /* Navbar Styles */
        .navbar {
            background-color: #2c3e50; /* Dark Blue Gray */
            color: #ecf0f1; /* Light Gray */
            padding: 10px 20px;
            position: fixed;
            top: 0;
            left: 250px;
            width: calc(100% - 250px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    
        .navbar .btn-secondary {
            background-color: #f39c12; /* Gold */
            border: none;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 14px;
            transition: background-color 0.3s;
        }
    
        .navbar .btn-secondary:hover {
            background-color: #e67e22; /* Darker Gold */
        }
    
        .navbar .dropdown-menu {
            background-color: #2c3e50; /* Dark Blue Gray */
            color: #ecf0f1; /* Light Gray */
            border: none;
            border-radius: 4px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
    
        .navbar .dropdown-menu .dropdown-item {
            color: #ecf0f1; /* Light Gray */
            padding: 10px 20px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s;
        }
    
        .navbar .dropdown-menu .dropdown-item:hover {
            background-color: #34495e; /* Slightly Lighter Blue Gray */
            color: #ffffff;
        }
    
        /* Content Area Styles */
        .content-area {
            margin-left: 250px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            min-height: 100vh;
            margin-top: 50px;
        }
    
        /* Icon Styles */
        .icon {
            margin-right: 10px;
            font-size: 16px;
        }
    </style>
     
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="d-flex flex-column flex-shrink-0 p-3 sidebar">
            <a href="{{ route('dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-light text-decoration-none">
                <span class="fs-4">Absen Karyawan</span>
            </a>
            <hr style="color: white">
            <ul class="nav flex-column mb-auto">
                @if (Auth::user()->role == 'admin')
                    <li class="nav-item mb-2">
                        <a href="{{ route('dashboard') }}" class="nav-link link-light border-bottom" aria-current="page">
                            <i class="fas fa-home me-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('karyawan') }}" class="nav-link link-light border-bottom">
                            <i class="fas fa-user me-2"></i>Karyawan
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('absensiForm') }}" class="nav-link link-light border-bottom">
                            <i class="fas fa-calendar-check me-2"></i>Absensi
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('showSalaryForm') }}" class="nav-link link-light border-bottom">
                            <i class="fas fa-dollar-sign me-2"></i>Gaji
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('showWorkday') }}" class="nav-link link-light border-bottom">
                            <i class="fas fa-clock me-2"></i>Jam Kerja
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('showAbsensiReport') }}" class="nav-link link-light border-bottom">
                            <i class="fas fa-file-alt me-2"></i>Laporan Absensi
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('showPayrollReport') }}" class="nav-link link-light border-bottom">
                            <i class="fas fa-file-alt me-2"></i>Laporan Gaji
                        </a>
                    </li>
                @else
                    <li class="nav-item mb-2">
                        <a href="{{ route('dashboard') }}" class="nav-link link-light border-bottom" aria-current="page">
                            <i class="fas fa-home me-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('absensiForm') }}" class="nav-link link-light border-bottom">
                            <i class="fas fa-cog me-2"></i>Absensi Karyawan
                        </a>
                    </li>
                @endif
            </ul>
            <hr class="text-white">
            <div class="mt-auto">
                <a href="{{ route('logout') }}" class="nav-link link-light d-flex align-items-center">
                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                </a>
            </div>
        </div>

        <!-- Main content -->
        <div class="w-100">
            <!-- Topbar -->
            <nav class="navbar navbar-light bg-white border-bottom">
                <div class="container-fluid justify-content-end">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="userDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->username }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Content area -->
            <div class="p-4 content-area">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!--- Script Data Tables --->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    @yield('scripts')
</body>
</html>
