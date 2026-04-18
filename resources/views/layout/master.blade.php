<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      @hasSection('title')
      @yield('title') - Data Sbanda
      @else
        Data Sbanda
      @endif
    </title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="flex flex-col min-h-screen relative overflow-x-hidden font-['Nunito'] bg-[#f0f7ff] text-slate-800">
    <div class="fixed bottom-[-10%] right-[-5%] w-[35vw] h-[35vw] bg-indigo-100 rounded-[60%_40%_30%_70%/60%_30%_70%_40%] -z-10 animate-morph-reverse opacity-60 pointer-events-none"></div>
    
    @include('layout.nav')
    
    <main class="flex-1 w-full relative z-10 pt-24 pb-12">
      @yield('content')
    </main>
    
    @include('layout.footer')
    
    @stack('scripts')
  </body>
</html>