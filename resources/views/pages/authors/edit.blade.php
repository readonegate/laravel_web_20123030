@extends('layouts.app')

@section('title', 'Edit Author')

@section('content')
  <div class="flex justify-between items-center mb-8">
    <h1 class="text-2xl font-bold text-gray-900">Edit Author</h1>
  </div>

  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
      <form action="{{ route('authors.update', $author) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-6">
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $author->name) }}"
              class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50 @error('name') border-red-500 @enderror">
            @error('name')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <div class="mt-6">
          <button type="submit"
            class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-teal-700">
            Update Author
          </button>
          <a href="{{ route('authors.index') }}"
            class="ml-4 rounded-md bg-gray-200 px-5 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-300">
            Cancel
          </a>
        </div>
      </form>
    </div>
  </div>
@endsection
