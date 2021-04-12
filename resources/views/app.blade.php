<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css')."?v={now()}" }}">

    </head>
    <body class="bg-primary">
        
        <div id="app" class="">
          
        </div>

        <script src="{{ mix('js/app.js') }}" defer></script>
    </body>
</html>
