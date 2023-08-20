<?php

namespace App\Http\Livewire\Frontend\Restaurant;

use App\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Reviews extends Component
{
    // use WithPagination;

    public $reviews;
    public $restaurantId;
    public $title;
    public $rating;
    public $review;

    public function mount($id)
    {
        $this->reviews = Review::where('restaurant_id', $id)->get();
        $this->restaurantId = $id;
    }

    public function render()
    {
        $rating = $this->reviews->sum('rating');
        $numberOfReviews = $this->reviews->count();
        $ratingOutOf5 = round(($rating / (5 * $numberOfReviews)) * 5);

        $displayReviews = Review::where('restaurant_id', $this->restaurantId)->latest('created_at')->paginate(4);

        return view('livewire.frontend.restaurant.reviews', compact('ratingOutOf5', 'rating', 'numberOfReviews', 'displayReviews'));
    }

    public function submitReview()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required',
        ]);
        $review = new Review();
        $review->title = $this->title;
        $review->rating = $this->rating;
        $review->comment = $this->review;
        $review->restaurant_id = $this->restaurantId;
        $review->user_id = Auth::user()->id;
        $review->save();

        // Review::create([
        //     'title' => $this->title,
        //     'rating' => $this->rating,
        //     'comment' => $this->review,
        //     'restaurant_id' => $this->restaurantId,
        // ]);

        $this->title = '';
        $this->rating = '';
        $this->review = '';

        $this->redirect('/restaurant/details/' . $this->restaurantId);
    }
}
