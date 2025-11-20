<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Login</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

  <!-- Styles / Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="flex h-[100vh]">
  <div class="w-full hidden md:inline-block">
    <img class="h-full"
      src="https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/login/leftSideImage.png"
      alt="leftSideImage">
  </div>

  <div class="w-full flex flex-col items-center justify-center">

    <form action="{{ route('auth.authenticate') }}" method="POST"
      class="md:w-96 w-80 flex flex-col items-center justify-center">
      @csrf

      <h2 class="text-4xl text-gray-900 font-medium">Sign in</h2>
      <p class="text-sm text-gray-500/90 mt-3 mb-5">Welcome back! Please sign in to continue</p>

      @error('email')
        <div class="text-red-500 text-sm mb-4">{{ $message }}</div>
      @enderror

      <div
        class="flex items-center w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden pl-6 gap-2">
        <svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M0 .55.571 0H15.43l.57.55v9.9l-.571.55H.57L0 10.45zm1.143 1.138V9.9h13.714V1.69l-6.503 4.8h-.697zM13.749 1.1H2.25L8 5.356z"
            fill="#6B7280" />
        </svg>
        <input type="email" placeholder="Email" name="email"
          class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full" value="{{ old('email') }}">
      </div>

      <div
        class="flex items-center mt-6 w-full bg-transparent border border-gray-300/60 h-12 rounded-full overflow-hidden pl-6 gap-2">
        <svg width="13" height="17" viewBox="0 0 13 17" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M13 8.5c0-.938-.729-1.7-1.625-1.7h-.812V4.25C10.563 1.907 8.74 0 6.5 0S2.438 1.907 2.438 4.25V6.8h-.813C.729 6.8 0 7.562 0 8.5v6.8c0 .938.729 1.7 1.625 1.7h9.75c.896 0 1.625-.762 1.625-1.7zM4.063 4.25c0-1.406 1.093-2.55 2.437-2.55s2.438 1.144 2.438 2.55V6.8H4.061z"
            fill="#6B7280" />
        </svg>
        <input type="password" placeholder="Password" name="password"
          class="bg-transparent text-gray-500/80 placeholder-gray-500/80 outline-none text-sm w-full h-full">
      </div>

      <button type="submit"
        class="mt-8 w-full h-11 rounded-full text-white bg-indigo-500 hover:opacity-90 transition-opacity">
        Login
      </button>
    </form>

  </div>
  {{-- <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  </script> --}}
</body>

</html>
