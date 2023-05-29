<?php

namespace App\Http\Livewire\Fronetend\Cuisine;

use App\Models\Cuisine;
use Livewire\Component;
use App\Models\Restaurant;

class RestaurantListing extends Component
{
    public $selectedCuisine;

    public function render()
    {
        $cuisines = Cuisine::all();
        $restaurants = Restaurant::when($this->selectedCuisine, function ($query) {
            $query->where('cuisine_id', $this->selectedCuisine);
        })->get();
        return view('livewire.fronetend.cuisine.restaurant-listing', compact('cuisines', 'restaurants'));
    }

    public function filterByCuisine($cuisineId)
    {
        $this->selectedCuisine = $cuisineId;
    }
}
