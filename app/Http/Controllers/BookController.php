<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    //
    protected $apiBaseUrl;

    public function __construct()
    {
        $this->apiBaseUrl = env('API_BASE_URL');
    }

    public function index()
    {
        $response = Http::get("{$this->apiBaseUrl}/books");
        $books = $response->json();

        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $response = Http::get("{$this->apiBaseUrl}/books/{$id}");
        $book = $response->json();

        return view('books.show', compact('book'));
    }
}
