@extends('layouts.main')
@section('title', 'profile')
@section('content')
  <section>
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:items-center md:gap-8">
        <div>
          <div class="max-w-prose md:max-w-none">
            <h2 class="text-2xl font-semibold text-gray-900 sm:text-3xl">
              {{ $nama }}
            </h2>
            <p class="mt-4 text-pretty text-gray-700">
              {{ $prodi }}
            </p>
            <p class="mt-4 text-pretty text-gray-700">
              {{ $nidn }}
            </p>

          </div>
        </div>

        <div>
          <img
            src="https://images.unsplash.com/photo-1731690415686-e68f78e2b5bd?auto=format&amp;fit=crop&amp;q=80&amp;w=1160"
            class="rounded" alt="">
        </div>
      </div>
    </div>
  </section>
@endsection
