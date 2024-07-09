<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return Book::with('author')->get();
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);

        $book = Book::create($request->all());

        return response()->json([
            'message' => 'Book created successfully.',
            'data' => $book,
        ], 201);
    }

    public function show($id)
    {
        $book = Book::with('author')->findOrFail($id);

        return response()->json($book);
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $this->validateRequest($request, $book->id);

        $book->update($request->all());

        return response()->json([
            'message' => 'Book updated successfully.',
            'data' => $book,
        ]);
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json(['message' => 'Book deleted successfully']);
    }

    private function validateRequest(Request $request, $bookId = null)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'published_date' => 'required|date',
            'isbn' => 'required|string|unique:books,isbn,' . ($bookId ? $bookId : 'NULL'),
            'summary' => 'required|string',
        ], [
            'title.required' => 'The title is required.',
            'author_id.required' => 'The author ID is required.',
            'author_id.exists' => 'The selected author ID does not exist.',
            'published_date.required' => 'The published date is required.',
            'isbn.required' => 'The ISBN is required.',
            'isbn.unique' => 'The ISBN must be unique.',
            'summary.required' => 'The summary is required.',
        ]);
    }
}
