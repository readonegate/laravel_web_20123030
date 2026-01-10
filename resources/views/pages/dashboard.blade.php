@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
      <h1 class="text-2xl font-bold text-gray-900">
        Welcome back, {{ Auth::user()->name }}!
      </h1>
      <p class="mt-2 text-gray-600">
        This is your dashboard. You can manage books from here.
      </p>
    </div>
  </div>

  <div class="mt-8">
    <h2 class="text-xl font-semibold text-gray-800">Quick Stats</h2>
    <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
          <h3 class="text-lg font-medium text-gray-900">Total Books</h3>
          <p class="mt-2 text-3xl font-bold text-teal-600">
            {{ $sum_books }}
          </p>
        </div>
      </div>
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
          <h3 class="text-lg font-medium text-gray-900">Total Authors</h3>
          <p class="mt-2 text-3xl font-bold text-teal-600">
            {{ $sum_authors }}
          </p>
        </div>
      </div>
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
          <h3 class="text-lg font-medium text-gray-900">Total Users</h3>
          <p class="mt-2 text-3xl font-bold text-teal-600">
            {{ $sum_users }}
          </p>
        </div>
      </div>
    </div>
  </div>
@endsection
