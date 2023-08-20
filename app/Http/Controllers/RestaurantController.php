<?php

namespace App\Http\Controllers;

use App\Models\Cuisine;
use App\Models\Restaurant;
use App\Models\RestTypes;
use App\Models\Review;
use App\RestaurantSimilarity;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $totalRatings = [];
        $cuisines = Cuisine::all();
        $rest_types = RestTypes::all();
        $restaurants = Restaurant::paginate(10);

        foreach ($restaurants as $restaurant) {
            $totalRating = Review::where('restaurant_id', $restaurant->id)->sum('rating');
            $restaurant->totalRating = $totalRating;
        }

        return view('backend.restaurant.index', compact('restaurants', 'rest_types', 'cuisines'));
    }

    public function details($id)
    {
        $selectedRestaurants = Restaurant::all();
        $selectedRestaurant = Restaurant::with('cuisine', 'restaurant_type')->find($id);

        $restaurantSimilarity = new RestaurantSimilarity($selectedRestaurants);
        $similarityMatrix = $restaurantSimilarity->calculateSimilarityMatrix();
        $resultRestaurants = array_slice($restaurantSimilarity->getRestaurantsSortedBySimularity($id, $similarityMatrix), 0, 5, true);

        return view('frontend.restaurant.detail', compact('selectedRestaurant', 'resultRestaurants'));
    }

    public function show($id)
    {
        $restaurant = Restaurant::with('cuisine', 'restaurant_type')->find($id);
        return view('backend.restaurant.detail', compact('restaurant'));
    }

    public function store(Request $request)
    {
        $restaurant = new Restaurant();
        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->address = $request->address;
        $restaurant->contact = $request->contact;
        $restaurant->description = $request->description;
        $restaurant->online_order = ($request->online_order) ? 1 : 0;
        $restaurant->avg_cost_min = $request->avg_cost_min;
        $restaurant->avg_cost_max = $request->avg_cost_max;
        $restaurant->cuisine_id = $request->cuisine;
        $restaurant->rest_type_id = $request->rest_type;
        $restaurant->save();

        return redirect()->route('backend.restaurant.index')->with('message', 'Restaurant Successfully Created.');
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();

        return redirect()->route('backend.restaurant.index')->with('message', 'Restaurant Successfully Deleted.');
    }
}
