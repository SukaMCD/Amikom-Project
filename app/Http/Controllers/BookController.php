<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;
use App\Models\author;
use App\Models\publisher;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = Book::with(['author', 'publisher'])->get();

        return view("book.index", [
            "book" => $book
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("book._form", [
            "book" => new book(),
            "action" => route("book.store"),
            "method" => "POST",
            "authors" => author::all(),
            "publishers" => publisher::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'date_of_publish' => 'required|date',
            'total_page' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        Book::create($validated);
        return redirect(route("book.index"))->with("success", "Book created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(book $book)
    {
        return view("book._form", [
            "book" => $book,
            "action" => route("book.update", $book->id),
            "method" => "PUT",
            "authors" => author::all(),
            "publishers" => publisher::all()
        ]);
            }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'date_of_publish' => 'required|date',
            'total_page' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        $book->update($validated);
        return redirect(route("book.index"))->with("success", "Book updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(book $book)
    {
        $book->delete();
        return redirect(route("book.index"))->with("success", "Book deleted successfully.");
    }
}
