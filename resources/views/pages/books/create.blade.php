@extends('layouts.app')

@section('title', 'Create Book')

@section('content')
  <h1 class="text-2xl font-bold text-gray-900 mb-8">Create New Book</h1>

  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
      <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
              class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('title') border-red-500 @enderror">
            @error('title')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <label for="author_id" class="block text-sm font-medium text-gray-700">Author</label>
            <select name="author_id" id="author_id"
              class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('author_id') border-red-500 @enderror">
              <option value="">Select an author</option>
              @foreach ($authors as $author)
                <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                  {{ $author->name }}
                </option>
              @endforeach
            </select>
            @error('author_id')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
            <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}"
              class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('isbn') border-red-500 @enderror">
            @error('isbn')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <label for="published_year" class="block text-sm font-medium text-gray-700">Published Year</label>
            <input type="number" name="published_year" id="published_year" value="{{ old('published_year') }}"
              class="p-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('published_year') border-red-500 @enderror">
            @error('published_year')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <div class="mt-8 flex justify-end">
          <a href="{{ route('books.index') }}"
            class="rounded-md bg-gray-200 px-5 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-300 mr-4">
            Cancel
          </a>
          <button type="submit"
            class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-teal-700">
            Save Book
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
