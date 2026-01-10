@extends('layouts.app')

@section('title', 'Books')

@section('content')
  <div class="flex justify-between items-center mb-8">
    <h1 class="text-2xl font-bold text-gray-900">Books</h1>
    @if (Auth::user()->role_id == 1)
      <a href="{{ route('books.create') }}"
        class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-teal-700">
        Create Book
      </a>
    @endif
  </div>

  <div class="mb-6">
    <form action="{{ route('books.index') }}" method="GET" class="flex items-center space-x-2">
      <input type="text" name="search" placeholder="Search books..."
        class="p-3 flex-1 rounded-md border-gray-300 shadow-sm focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50"
        value="{{ request('search') }}">
      <button type="submit"
        class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-teal-700">
        Search
      </button>
    </form>
  </div>

  @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
      <span class="block sm:inline">{{ session('success') }}</span>
    </div>
  @endif

  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Title
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Author
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                ISBN
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Published Year
              </th>
              @if (Auth::user()->role_id == 1)
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Actions</span>
                </th>
              @endif
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($books as $book)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                  {{ $book->title }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{ $book->author->name }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{ $book->isbn }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{ $book->published_year }}
                </td>
                @if (Auth::user()->role_id == 1)
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route('books.edit', $book) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline-block ml-4">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-red-600 hover:text-red-900"
                        onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                  </td>
                @endif
              </tr>
            @empty
              <tr>
                <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                  No books found.
                  d>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="mt-6">
        {{ $books->links() }}
      </div>
    </div>
  </div>
@endsection
