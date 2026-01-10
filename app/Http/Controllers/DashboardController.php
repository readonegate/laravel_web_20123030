<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Books;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $sum_books = Books::get()->count();
        $sum_authors = Authors::get()->count();
        $sum_users = User::get()->count();
        return view('pages.dashboard', compact('sum_books', 'sum_authors', 'sum_users'));
    }
}
