<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Produk')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9NDikXlfyF+NNg5dTgr8cGFtK9i+7IpFfQ2s4fH5uOVfxUMGHobNq3VDX8k33rhX" crossorigin="anonymous">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            background-color: #343a40 !important;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #ffc107 !important;
        }
        .nav-link.active {
            font-weight: 600;
            color: #ffc107 !important;
        }
        .container-fluid {
            padding-top: 2rem;
        }
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 1rem 0;
            margin-top: 2rem;
        }
        .navbar-nav li {
            margin-right: 15px;
        }
        .dropdown-menu {
            background-color: #343a40;
        }
        .dropdown-item {
            color: white;
        }
        .dropdown-item:hover {
            background-color: #ffc107;
        }
    </style>

    @vite(['resources/sass/app.scss'])
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Produk</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('produks.index') ? 'active' : '' }}" href="{{ route('produks.index') }}">Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('produks.create') ? 'active' : '' }}" href="{{ route('produks.create') }}">Tambah Produk</a>
                    </li>
                    <!-- Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Elektronik</a></li>
                            <li><a class="dropdown-item" href="#">Pakaian</a></li>
                            <li><a class="dropdown-item" href="#">Aksesoris</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content Section -->
    <div class="container">
        @yield('body')
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Produk - All Rights Reserved</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ksmD9mqmhMmmzOz6cpK1yzoKpvx4NR0FtI4nR7KcLeYlBiXJjkz4zrbjZFLGFpMt" crossorigin="anonymous"></script>
    @vite(['resources/js/app.js'])
</body>
</html>

