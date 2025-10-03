<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #0a0a0a !important;
            color: white !important;
        }

        /* Set default text color for common elements */
        p,
        div,
        span,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        a {
            color: white;
            margin-bottom: 0;
        }

        /* Navbar specific styles */

        .navbar-brand,
        .nav-link,
        .navbar-nav .nav-link {
            color: white !important;
        }

        .nav-item {
            padding: 12px;
        }

        .nav-item:hover,
        .nav-item:focus {
            background-color: #444 !important;
            color: white !important;
        }

        .dropdown-menu {
            background-color: #2a2a2a !important;
            border: 1px solid #444 !important;
        }

        /* Make Season dropdown scrollable */
        .nav-item:nth-child(4) .dropdown-menu {
            max-height: 300px;
            overflow-y: auto;
        }

        .dropdown-item {
            color: white !important;
        }

        .dropdown-item:hover {
            background-color: #007bff !important;
            color: white !important;
        }

        .navbar-toggler {
            border-color: #444 !important;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
        }

        /* Override Bootstrap's default link colors */
        a {
            color: #007bff;
        }

        a:hover {
            color: #0056b3;
        }

        /* Line clamp utility */
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-12 {
            display: -webkit-box;
            -webkit-line-clamp: 12;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Dark theme pagination */
        .pagination {
            --bs-pagination-bg: #2a2a2a;
            --bs-pagination-border-color: #444;
            --bs-pagination-color: #fff;
            --bs-pagination-hover-bg: #007bff;
            --bs-pagination-hover-border-color: #007bff;
            --bs-pagination-hover-color: #fff;
            --bs-pagination-active-bg: #007bff;
            --bs-pagination-active-border-color: #007bff;
            --bs-pagination-active-color: #fff;
            --bs-pagination-disabled-bg: #1a1a1a;
            --bs-pagination-disabled-border-color: #333;
            --bs-pagination-disabled-color: #666;
        }

        .anime-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: rgb(152, 152, 207);
            cursor: pointer;
        }

        .anime-title:hover {
            color: #007bff;
            text-decoration: underline;
        }

        /* Hover scroll effect for synopsis */
        .synopsis-container {
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .synopsis-container:hover {
            overflow-y: auto;
        }

        /* Custom scrollbar styling for dark theme */
        .synopsis-container::-webkit-scrollbar {
            width: 6px;
        }

        .synopsis-container::-webkit-scrollbar-track {
            background: #2a2a2a;
        }

        .synopsis-container::-webkit-scrollbar-thumb {
            background: #555;
            border-radius: 3px;
        }

        .synopsis-container::-webkit-scrollbar-thumb:hover {
            background: #777;
        }

        .text-secondary {
            color: #cfd2d5 !important;
        }
    </style>

</head>

<body class="container-fluid px-3 px-lg-4">

    {{-- Navbar or header --}}
    @include('components.header')

    {{-- Main page content --}}
    @yield('content')

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</html>
