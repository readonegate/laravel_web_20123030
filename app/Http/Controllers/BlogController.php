<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function profile()
    {
        $nama = 'Ridwan';
        $nidn = '20123030';
        $prodi = 'Teknik Informatika';
        return view('pages.blog.profile', compact('nama', 'nidn', 'prodi'));
    }
    public function gallery()
    {
        $count = 5;
        return view('pages.blog.gallery', compact('count'));
    }
    public function contact()
    {
        $contact = '0812312343';
        return view('pages.blog.contact', compact('contact'));
    }
}
