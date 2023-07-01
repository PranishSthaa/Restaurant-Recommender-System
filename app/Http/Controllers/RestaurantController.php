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

        $reviews = Review::where('restaurant_id', $id)->get();
        $displayReviews = Review::where('restaurant_id', $id)->paginate(4);
        $rating = $reviews->sum('rating');
        $numberOfReviews = $reviews->count();
        $ratingOutOf5 = round(($rating / (5 * $numberOfReviews)) * 5);

        $restaurantSimilarity = new RestaurantSimilarity($selectedRestaurants);
        $similarityMatrix = $restaurantSimilarity->calculateSimilarityMatrix();
        $resultRestaurants = array_slice($restaurantSimilarity->getRestaurantsSortedBySimularity($id, $similarityMatrix), 0, 5, true);

        return view('frontend.restaurant.detail', compact('selectedRestaurant', 'resultRestaurants', 'ratingOutOf5', 'numberOfReviews', 'displayReviews'));
    }

    public function show($id)
    {
        $restaurant = Restaurant::with('cuisine', 'restaurant_type')->find($id);
        return view('backend.restaurant.detail', compact('restaurant'));
    }

    public function store(Request $request)
    {
    }

    public function destroy($id)
    {
    }
}
