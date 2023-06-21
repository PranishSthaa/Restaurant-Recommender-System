<?php

namespace App\Http\Controllers;

use App\Models\Cuisine;
use App\Models\Restaurant;
use App\Models\RestTypes;
use App\Models\Review;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $totalRatings = [];
        $cuisines = Cuisine::all();
        $rest_types = RestTypes::all();
        $restaurants = Restaurant::paginate(10);

        foreach($restaurants as $restaurant){
            $totalRating = Review::where('restaurant_id', $restaurant->id)->sum('rating');
            $restaurant->totalRating = $totalRating;
        }

        return view('backend.restaurant.index', compact('restaurants', 'rest_types', 'cuisines'));
    }

    public function details($id){
        $restaurant = Restaurant::with('cuisine', 'restaurant_type')->find($id);
        // dd($restaurant);
        return view('frontend.restaurant.detail', compact('restaurant'));
    }

    public function store(Request $request)
    {
    }

    public function destroy($id)
    {
    }
}
