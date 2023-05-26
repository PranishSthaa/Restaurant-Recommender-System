<?php

namespace App\Http\Controllers;

use App\Models\RestTypes;
use Illuminate\Http\Request;

class RestTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rest_types = RestTypes::all();

        return view('backend.restaurant_type.index', compact('rest_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rest_type = new RestTypes();
        $rest_type->name = $request->name;
        $rest_type->save();

        return redirect()->route('backend.restaurant_type.index')->with('message', 'Restaurant Type Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rest_type = RestTypes::findOrFail($id);
        $rest_type->delete();

        return redirect()->route('backend.restaurant_type.index')->with('message', 'Restaurant Type Deleted Successfully');
    }
}
