<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chusu - @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #22C55E 0%, #FBBF24 100%);
        }
        .hover-scale {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-scale:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(34, 197, 94, 0.2);
        }
        .shadow-glow {
            box-shadow: 0 4px 20px rgba(34, 197, 94, 0.2);
        }
        .search-list {
            position: absolute;
            z-index: 50;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
            border-radius: 0.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .list-group-item {
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        .list-group-item:hover {
            background-color: #F3F4F6;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans text-gray-800 antialiased min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center space-x-4">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <img 
                            src="{{ asset('image/logo.png') }}" 
                            alt="Chusu Logo" 
                            class="h-12 w-auto"
                            onerror="this.onerror=null; this.src='https://via.placeholder.com/100x40/22C55E/ffffff?text=Chusu';"
                        >
                    </div>
                    <!-- Brand name -->
                    <div class="flex-shrink-0">
                        <h1 class="text-2xl font-extrabold bg-gradient-to-r from-green-600 to-yellow-400 bg-clip-text text-transparent">
                            Chusu
                        </h1>
                    </div>
                </div>
                
                <!-- Navigation Links and Search -->
                <div class="flex items-center space-x-4">
                    <!-- Dashboard Button -->
                    <a 
                        href="{{ route('dashboard') }}" 
                        class="flex items-center px-5 py-2 bg-green-600 hover:bg-green-700 text-white rounded-full text-sm font-medium transition-all duration-300 shadow-glow hover-scale"
                    >
                        <i data-feather="home" class="h-4 w-4 mr-2"></i>
                        home
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-16">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script>
        $(document).on('click', '.list-group-item', function () {
            $('#search').val($(this).data('name'));
            $('#search_list').fadeOut(200);
        });

        // Initialize Feather Icons
        document.addEventListener('DOMContentLoaded', function() {
            feather.replace();
        });
    </script>
</body>
</html>