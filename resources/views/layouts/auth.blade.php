<!DOCTYPE html>
<html lang="id">
    <head>
        {{-- Meta Tags --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSS --}}
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @yield('css')

        <title>@yield('title')</title>
    </head>
    <body class="d-flex flex-column h-100">
        <main class="main">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>

        @yield('js')
    </body>
</html>
