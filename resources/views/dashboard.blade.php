<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChusuApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: '#22C55E', // Green
                        secondary: '#FBBF24', // Yellow
                        accent: '#10B981', // Darker Green
                    },
                    animation: {
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* CSS Reset to normalize margins and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html, body {
            width: 100%;
            overflow-x: hidden;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #22C55E 0%, #FBBF24 100%);
        }
        .hover-scale {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-scale:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 24px rgba(34, 197, 94, 0.3);
        }
        .hero-image {
            background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROat3IdfouAmblD1Ts5A6X3wN4NGHQsLoRMFdwScswRsYFQoybw2DO6TM&s=10') no-repeat center center;
            background-size: cover;
        }
        .mobile-menu {
            transition: max-height 0.3s ease-in-out, opacity 0.3s ease-in-out;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
        }
        .mobile-menu.open {
            max-height: 500px;
            opacity: 1;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans text-gray-800 antialiased min-w-full">
    <div class="w-full">
        <!-- Navigation -->
        <nav class="bg-white shadow-lg sticky top-0 z-50 w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <a href="#" class="flex-shrink-0 flex items-center">
                            <span class="text-2xl font-extrabold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">Chusu</span>
                        </a>
                    </div>
                    
                    <!-- Desktop menu -->
                    <div class="hidden lg:flex lg:items-center lg:space-x-6">
                        <a href="#about" class="px-4 py-2 text-gray-600 hover:text-primary hover:bg-gray-100 rounded-full transition-all duration-200">Tentang</a>
                        <a href="#tools" class="px-4 py-2 text-gray-600 hover:text-primary hover:bg-gray-100 rounded-full transition-all duration-200">Tools</a>
                        <a href="#developer" class="px-4 py-2 text-gray-600 hover:text-primary hover:bg-gray-100 rounded-full transition-all duration-200">Developer</a>
                    </div>
                    
                    <!-- Mobile menu button -->
                    <div class="flex items-center lg:hidden">
                        <button id="menu-toggle" class="text-gray-600 hover:text-primary focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Mobile menu -->
            <div id="mobile-menu" class="lg:hidden bg-white shadow-md mobile-menu w-full">
                <div class="pt-2 pb-4 space-y-1 border-t border-gray-100">
                    <a href="#about" class="block px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-primary">Tentang</a>
                    <a href="#tools" class="block px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-primary">Tools</a>
                    <a href="#developer" class="block px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-primary">Developer</a>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="relative hero-image py-24 md:py-32 text-white w-full">
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/30"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-4 text-center">
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold mb-6" data-aos="fade-up">
                    <span class="bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">Selamat Datang di ChusuApp</span>
                </h1>
                <p class="text-lg sm:text-xl md:text-2xl text-gray-100 mb-8 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                    Solusi modern untuk mencatat sanksi siswa, diakses dengan mudah oleh siswa, guru, dan wali murid.
                </p>
                <a href="{{ route('login') }}" class="inline-block px-8 py-4 bg-primary hover:bg-accent text-white rounded-full text-lg font-semibold transition-all duration-300 hover-scale animate-pulse-slow" data-aos="fade-up" data-aos-delay="200">
                    Mulai Sekarang
                </a>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-16 md:py-24 bg-white w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-3xl sm:text-4xl font-extrabold mb-4">Tentang <span class="bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">Chusu</span></h2>
                    <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto">
                        Aplikasi ini dirancang untuk mempermudah pengelolaan sanksi siswa di SMKN 6 Jember dengan teknologi modern.
                    </p>
                </div>
                
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div class="order-2 md:order-1" data-aos="fade-right">
                        <div class="p-6 bg-gray-50 rounded-xl border border-gray-100 hover-scale">
                            <h3 class="text-xl sm:text-2xl font-semibold mb-4 text-gray-800">Fitur Utama</h3>
                            <ul class="space-y-3">
                                <li class="flex items-center">
                                    <svg class="h-5 w-5 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Pencatatan sanksi siswa yang cepat dan efisien</span>
                                </li>
                                <li class="flex items-center">
                                    <svg class="h-5 w-5 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Akses mudah untuk guru, siswa, dan wali murid</span>
                                </li>
                                <li class="flex items-center">
                                    <svg class="h-5 w-5 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Laporan dan statistik yang intuitif</span>
                                </li>
                                <li class="flex items-center">
                                    <svg class="h-5 w-5 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Antarmuka yang ramah pengguna dan modern</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="order-1 md:order-2" data-aos="fade-left">
                        <div class="relative rounded-xl overflow-hidden hover-scale">
                            <img 
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgkHnPjCpPA88ma41wRWyjWE9A2ShY5xtPbg&usqp=CAU" 
                                alt="Sistem Pengelolaan Sanksi Siswa"
                                loading="lazy"
                                class="w-full h-80 sm:h-96 object-cover"
                                onerror="this.onerror=null; this.src='https://via.placeholder.com/640x360/4ade80/ffffff?text=Chusu'; this.classList.add('bg-gradient-to-br', 'from-primary', 'to-secondary');"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tools Section -->
        <section id="tools" class="py-16 md:py-24 bg-gray-50 w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-3xl sm:text-4xl font-extrabold mb-4">Tools yang Digunakan</h2>
                    <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto">
                        Teknologi terbaik untuk pengembangan ChusuApp yang inovatif.
                    </p>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white p-6 rounded-xl hover-scale" data-aos="fade-up" data-aos-delay="100">
                        <div class="bg-primary/10 text-primary p-3 rounded-lg inline-block mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Acode</h3>
                        <p class="text-gray-600 text-sm">Editor kode mobile untuk pengembangan aplikasi, setara dengan VSCode.</p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl hover-scale" data-aos="fade-up" data-aos-delay="200">
                        <div class="bg-secondary/10 text-secondary p-3 rounded-lg inline-block mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Termux</h3>
                        <p class="text-gray-600 text-sm">Terminal emulator untuk menjalankan perintah seperti di desktop.</p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl hover-scale" data-aos="fade-up" data-aos-delay="300">
                        <div class="bg-primary/10 text-primary p-3 rounded-lg inline-block mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Ksweb</h3>
                        <p class="text-gray-600 text-sm">Server lokal untuk pengembangan web, alternatif XAMPP di Android.</p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl hover-scale" data-aos="fade-up" data-aos-delay="400">
                        <div class="bg-secondary/10 text-secondary p-3 rounded-lg inline-block mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Android</h3>
                        <p class="text-gray-600 text-sm">Perangkat pengembangan (Infinix Note 11 Pro).</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Developer Section -->
        <section id="developer" class="py-16 md:py-24 bg-white w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-3xl sm:text-4xl font-extrabold mb-4">Developer ChusuApp</h2>
                </div>
                
                <div class="flex flex-col items-center" data-aos="fade-up">
                    <div class="mb-6">
                        <div class="w-24 h-24 sm:w-32 sm:h-32 rounded-full overflow-hidden ring-4 ring-primary ring-offset-2 hover-scale">
                            <img 
                                src="{{ asset('image/wewe.jpg') }}"
                                alt="Chusu Developer" 
                                loading="lazy"
                                class="w-full h-full object-cover"
                                onerror="this.onerror=null; this.src='https://via.placeholder.com/150/4ade80/ffffff?text=Dev';"
                            />
                        </div>
                    </div>
                    
                    <div class="text-center mb-6">
                        <h3 class="text-xl sm:text-2xl font-semibold mb-2">Chusu Developer</h3>
                        <p class="text-gray-600 text-sm sm:text-base max-w-md mx-auto">
                            Berusaha menjadi lebih baik setiap hari.
                        </p>
                    </div>
                    
                    <div class="inline-flex items-center bg-gray-50 rounded-full px-4 py-2 hover:bg-gray-100 transition-colors duration-200">
                        <svg 
                            class="w-5 h-5 text-primary mr-2" 
                            fill="none" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <a 
                            href="mailto:wewe@gmail.com" 
                            class="text-primary hover:text-accent text-sm sm:text-base font-medium"
                        >
                            wewe@gmail.com
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="gradient-bg text-white py-8 w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4 text-center">
                <span class="text-2xl font-extrabold bg-clip-text text-transparent bg-white">ChusuApp</span>
                <p class="text-gray-100 text-sm mt-2">© 2025 SMKN 6 Jember. All rights reserved.</p>
            </div>
        </footer>
    </div>

    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 50
        });

        const menuToggle = document.getElementById("menu-toggle");
        const mobileMenu = document.getElementById("mobile-menu");

        menuToggle.addEventListener("click", () => {
            mobileMenu.classList.toggle("open");
        });
    </script>
</body>
</html>