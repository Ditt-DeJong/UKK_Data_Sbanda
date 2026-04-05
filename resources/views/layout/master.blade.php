<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>
      @hasSection('title')
      @yield('title') - Data Sbanda
      @else
        Data Sbanda
      @endif
    </title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <style>
      body {
        font-family: 'Poppins', sans-serif;
      }
      h1, h2, h3, h4, h5, h6, .navbar-brand, .btn-futuristic {
        font-family: 'Outfit', sans-serif;
      }
    </style>
  </head>
  <body class="flex flex-col min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/30 to-slate-100 overflow-x-hidden">
    {{-- Background decorative elements --}}
    <div class="fixed inset-0 pointer-events-none overflow-hidden -z-10">
      <div class="orb orb-blue w-96 h-96 top-20 -left-48 opacity-10"></div>
      <div class="orb orb-cyan w-80 h-80 bottom-40 -right-40 opacity-10"></div>
      <div class="orb orb-blue w-64 h-64 top-1/2 left-1/3 opacity-5"></div>
    </div>
    
    {{-- ini adalah navbar --}}
    @include('layout.nav')
    
    {{-- ini adalah isi --}}
    <main class="container mx-auto flex-1 mt-2">
      @yield('content')
    </main>
    
    {{-- ini adalah footer --}}
    @include('layout.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>