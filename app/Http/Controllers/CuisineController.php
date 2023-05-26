<?php

namespace App\Http\Controllers;

use App\Models\Cuisine;
use Illuminate\Http\Request;

class CuisineController extends Controller
{
    public function index(){
        $cuisines = Cuisine::all();
        return view('backend.cuisine.index', compact('cuisines'));
    }

    public function store(Request $request){
        $cuisine = new Cuisine();
        $cuisine->name = $request->name;
        $cuisine->save();

        return redirect()->route('backend.cuisine.index')->with('message', 'Cuisine Successfully Created.');
    }

    public function destroy($id) {
        $cuisine = Cuisine::findOrFail($id);
        $cuisine->delete();

        return redirect()->route('backend.cuisine.index')->with('message', 'Cuisine Successfully Deleted.');
    }
}
