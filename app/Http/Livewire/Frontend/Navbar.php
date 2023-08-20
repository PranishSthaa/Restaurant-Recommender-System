<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Restaurant;
use Livewire\Component;

class Navbar extends Component
{
    public $search = "";
    public $searching = false;

    public function render()
    {
        $searchResults = $this->getSearchResults();
        return view('livewire.frontend.navbar', compact('searchResults'));
    }

    public function getSearchResults()
    {
        $results = Restaurant::where('name', 'like', '%' . $this->search . '%')->get();

        return $results;
    }

    public function updatingSearch()
    {
        $this->searching = true;
    }

    public function updatedSearch()
    {
        $this->searching = false;
    }
}
