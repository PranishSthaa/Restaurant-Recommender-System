<?php

namespace App\Http\Livewire\Frontend\Restaurant;

use App\Models\Restaurant;
use Livewire\Component;
use Livewire\WithPagination;

class AllRestaurants extends Component
{
    use WithPagination;

    public $sortBy = 'name';
    public $sortOrder = 'asc';

    public function updatingSortBy(){
        $this->resetPage();
    }

    public function updatingSortOrder(){
        $this->resetPage();
    }

    public function render()
    {
        $restaurants = Restaurant::when($this->sortBy, function ($query, $sortBy) {
            $query->orderBy($sortBy, $this->sortOrder);
        })->paginate(9);
        return view('livewire.frontend.restaurant.all-restaurants', compact('restaurants'));
    }
}
