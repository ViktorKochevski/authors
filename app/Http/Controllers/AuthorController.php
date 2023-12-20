<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = Author::all();

        return view('authors.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $files = Author::all();

        return view('authors.index', compact('files'));
    }

    public function store(Request $request)
    {

    }

}
