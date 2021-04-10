<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    </head>
    <body class="antialiased bg-gray-800">
        
        <div id="app">
            {{-- <header>
                <navbar></navbar>
              </header>
          
              <main class="bg-primary h-auto">
                <dropdown-navbar> </dropdown-navbar>
                <div class="mx-4 my-2">
                  <router-view/>
                </div>
                
                <login-popup> </login-popup>
                
              </main> --}}
          
        </div>

        <script src="{{ mix('js/app.js') }}" def></script>
    </body>
</html>
