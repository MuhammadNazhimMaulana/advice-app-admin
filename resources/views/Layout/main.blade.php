<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Link untuk font-awesone -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <!-- Link menuju CSS -->
    <link href="{{ asset('CSS/style_admin.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    {{-- Flatpickr CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <title>Admin Aplikasi Penilaian Kepuasan Pelanggan</title>
  </head>
  <body>

    {{-- Sidebar --}}
    @include('Layout/Partials.sidebar')
    
    <section id="interface">
      <div class="navigation">
        {{-- Navigation --}}
        @include('Layout/Partials.navigation')
      </div>

      <h3 class="i-name">
        {{ $title }}
      </h3>
      
      {{-- Content --}} 
      @yield('container')

  </div>
</section>

  
    <!-- JS Bootstrap -->
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    {{-- Jquery --}}
    <script src="{{ asset('JS/javascript.js') }}"></script>

    {{-- Custom JS --}}
    <script src="{{ asset('JS/main.js') }}"></script>
    
    {{-- Flatpickr JS --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    
    {{-- Content --}} 
    @yield('script')
  </body>
</html>