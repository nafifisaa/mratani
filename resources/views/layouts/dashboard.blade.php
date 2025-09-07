<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard - MRATANI')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg">
            <div class="p-6">
                <div class="flex items-center space-x-2">
                    <span class="text-2xl">🌶️</span>
                    <span class="font-bold text-xl text-gray-800">MRATANI</span>
                </div>
            </div>

            <nav class="mt-6">
                <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 {{ request()->routeIs('dashboard') ? 'bg-green-50 text-green-600 border-r-2 border-green-600' : '' }}">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="{{ route('dashboard.products.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 {{ request()->routeIs('dashboard.products.*') ? 'bg-green-50 text-green-600 border-r-2 border-green-600' : '' }}">
                    <i class="fas fa-seedling mr-3"></i>
                    Products
                </a>
                <a href="{{ route('dashboard.articles.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 {{ request()->routeIs('dashboard.articles.*') ? 'bg-green-50 text-green-600 border-r-2 border-green-600' : '' }}">
                    <i class="fas fa-newspaper mr-3"></i>
                    Articles
                </a>
                <a href="{{ route('home') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600" target="_blank">
                    <i class="fas fa-external-link-alt mr-3"></i>
                    View Website
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b">
                <div class="flex justify-between items-center px-6 py-4">
                    <h1 class="text-2xl font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h1>

                    <div class="flex items-center space-x-4">
                        <span class="text-gray-600">Welcome, {{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
