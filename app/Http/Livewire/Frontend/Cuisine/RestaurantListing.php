<?php

namespace App\Http\Livewire\Frontend\Cuisine;

use App\Models\Cuisine;
use Livewire\Component;
use App\Models\Restaurant;
use Livewire\WithPagination;

class RestaurantListing extends Component
{
    use WithPagination;

    public $selectedCuisine;

    public function render()
    {
        $cuisines = Cuisine::all();
        if ($this->selectedCuisine) {
            $restaurants = Restaurant::when($this->selectedCuisine, function ($query) {
                $query->where('cuisine_id', $this->selectedCuisine);
            })
                ->with('restaurant_type', 'cuisine')
                ->orderBy('name', 'asc')
                ->paginate(6);
            return view('livewire.frontend.cuisine.restaurant-listing', compact('cuisines', 'restaurants'));
        } else {
            return view('livewire.frontend.cuisine.restaurant-listing', compact('cuisines'));
        }
    }

    public function filterByCuisine($cuisineId)
    {
        $this->selectedCuisine = $cuisineId;
        $this->resetPage();
    }
}
