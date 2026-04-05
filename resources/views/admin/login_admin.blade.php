<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Data Sbanda</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <style>
        body { font-family: 'Poppins', sans-serif; }
        h1, h2, h3, button { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded-xl shadow-[0_0_20px_8px_rgba(147,197,253,0.7)] w-full max-w-md">
            <div class="flex flex-col items-center mb-4">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock w-8 h-8 text-blue-600">
                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                </div>
            </div>
            <h2 class="text-2xl font-bold mb-6 text-center">Admin Login</h2>
            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 mb-1">Email:</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 rounded border border-gray-300 bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-200" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 mb-1">Password:</label>
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 rounded border border-gray-300 bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-200" required>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white font-bold text-xl py-2 rounded hover:bg-blue-600">Login</button>

                {{-- Tampilkan error khusus field email --}}
                @error('email')
                    <div class="text-red-600 mb-3 mt-2">{{ $message }}</div>
                @enderror
            </form>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>