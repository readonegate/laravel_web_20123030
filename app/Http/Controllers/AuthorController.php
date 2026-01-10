<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $authors = Authors::when($search, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        })
            ->latest()
            ->paginate(10);
        return view('pages.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('pages.authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Authors::create($request->all());

        return redirect()->route('authors.index')->with('success', 'Author created successfully.');
    }

    public function edit(Authors $author)
    {
        return view('pages.authors.edit', compact('author'));
    }

    public function update(Request $request, Authors $author)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author->update($request->all());

        return redirect()->route('authors.index')->with('success', 'Author updated successfully.');
    }

    public function destroy(Authors $author)
    {
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
    }
}
