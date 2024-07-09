<?php
namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return Author::with('books')->get();
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);

        $author = Author::create($request->all());

        return response()->json([
            'message' => 'Author created successfully.',
            'data' => $author,
        ], 201);
    }

    public function show($id)
    {
        $author = Author::with('books')->findOrFail($id);

        return response()->json($author);
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $this->validateRequest($request);

        $author->update($request->all());

        return response()->json([
            'message' => 'Author updated successfully.',
            'data' => $author,
        ]);
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return response()->json(['message' => 'Author deleted successfully']);
    }


    private function validateRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'biography' => 'required|string',
            'date_of_birth' => 'required|date',
        ], [
            'name.required' => 'The name is required.',
            'biography.required' => 'The biography is required.',
            'date_of_birth.required' => 'The date of birth is required.',
            'date_of_birth.date' => 'The date of birth must be a valid date.',
        ]);
    }
}

