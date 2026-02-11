<?php

namespace App\Http\Controllers;

use App\Models\publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publisher = publisher::all();

        return view("publisher.index", [
            "publisher" => $publisher
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("publisher._form", [
            "publisher" => new publisher(),
            "action" => route("publisher.store"),
            "method" => "POST",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
        ]);

        $publisher = new publisher();
        $publisher->name = $request->name;
        $publisher->save();
        return redirect(route("publisher.index"))->with("success", "publisher created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(publisher $publisher)
    {
        return view("publisher._form", [
            "publisher" => $publisher,
            "action" => route("publisher.update", $publisher->id),
            "method" => "PUT",
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, publisher $publisher)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
        ]);

        $publisher->name = $request->name;
        $publisher->save();
        return redirect(route("publisher.index"))->with("success", "publisher updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(publisher $publisher)
    {
        $publisher->delete();
        return redirect(route("publisher.index"))->with("success", "publisher deleted successfully.");
    }
}
