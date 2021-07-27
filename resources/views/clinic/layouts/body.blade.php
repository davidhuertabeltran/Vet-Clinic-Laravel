<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <title>{{$title}}</title>
</head>
<body>
    <div class="content">
        <div class="navigation">
            {{-- NAVIGATION BAR --}}
            @include('clinic/partials.nav_bar',[
                'current'=> $current_menu_item ?? null
            ])
        </div>

        <main class="content-clinic">
        {{-- MAIN BODY  --}}
            @include('clinic/partials.messages')

            @yield('content')
            
        </main>

        @include('clinic/partials.logo')
    </div>
</body>
</html>
