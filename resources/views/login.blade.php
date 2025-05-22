<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ChusuApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-50 font-sans">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-sm m-4">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold bg-gradient-to-r from-green-500 to-yellow-400 bg-clip-text text-transparent mb-1">Chusu</h1>
            <h2 class="text-xl font-bold text-gray-800 mb-2">Login</h2>
            <p class="text-sm text-gray-600">Catat kriminalitas demi masa depan emas!</p>
        </div>

        <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
            @csrf
            <div class="space-y-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                    </div>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        placeholder="Masukkan email" 
                        class="block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-md focus:ring-2 focus:ring-green-500 focus:border-transparent bg-white placeholder-gray-400"
                        required
                    >
                </div>
            </div>
            
            <div class="space-y-2">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        placeholder="Masukkan password" 
                        class="block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-md focus:ring-2 focus:ring-green-500 focus:border-transparent bg-white placeholder-gray-400"
                        required
                    >
                </div>
            </div>
            <button 
                type="submit" 
                class="w-full py-3 text-white font-medium rounded-md bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors duration-200"
            >
                Login
            </button>
        </form>
        
        <div class="mt-6 pt-5 border-t border-gray-100">
            <p class="text-center text-sm text-gray-600">
                Belum punya akun? 
                <a 
                    href="https://wa.me/qr/FEYKANSJ64TDN1" 
                    class="font-medium text-green-600 hover:text-green-700 hover:underline transition-colors"
                >
                    Hubungi wewe
                </a>
            </p>
        </div>
        
        <div class="mt-6 flex items-center justify-center">
            <a href="/" class="inline-flex items-center text-sm text-gray-500 hover:text-green-600 transition-colors">
                <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke beranda
            </a>
        </div>
    </div>
    
    <!-- Decorative Elements -->
    <div class="fixed left-0 top-0 w-full h-2 bg-gradient-to-r from-green-500 to-yellow-400"></div>
</body>
</html>