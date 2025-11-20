<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title', 'My App')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
  @include('layouts.app-header')
  <main class="py-10">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        @yield('content')
    </div>
  </main>
  @include('layouts.footer')
</body>

</html>
