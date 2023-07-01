<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    protected $titles = [
        'Excellent Experience',
        'Disappointing Visit',
        'Highly Recommended',
        'Average Food Quality',
        'Friendly Staff',
        'Unforgettable Dining',
        'Great Value for Money',
        'Lacking Atmosphere',
        'Delicious Dishes',
        'Exceptional Service',
    ];

    protected $positivePhrases = [
        'Excellent',
        'Highly Recommended',
        'Friendly',
        'Unforgettable',
        'Delicious',
        'Exceptional',
    ];

    protected $negativePhrases = [
        'Disappointing',
        'Average',
        'Lacking',
    ];

    public function run()
    {
        $users = range(2, 11);
        $restaurants = range(1, 20);

        foreach ($restaurants as $restaurantId) {
            foreach ($users as $userId) {
                $rating = $this->generateRating();
                $title = $this->generateTitle($rating);
                $comment = $this->generateComment($rating);

                Review::create([
                    'user_id' => $userId,
                    'restaurant_id' => $restaurantId,
                    'rating' => $rating,
                    'title' => $title,
                    'comment' => $comment,
                ]);
            }
        }
    }

    protected function generateRating(): int
    {
        // Assign a higher rating for positive phrases and a lower rating for negative phrases
        $rating = mt_rand(1, 5);
        $isPositive = mt_rand(0, 1);

        if ($isPositive) {
            $rating += mt_rand(1, 2);
            $rating = min($rating, 5); // Ensure rating doesn't exceed 5
        } else {
            $rating -= mt_rand(1, 2);
            $rating = max($rating, 1); // Ensure rating doesn't go below 1
        }

        return $rating;
    }

    protected function generateTitle(int $rating): string
    {
        // Select a random title from the array
        return $this->titles[array_rand($this->titles)];
    }

    protected function generateComment(int $rating): string
    {
        $phrases = $rating > 3 ? $this->positivePhrases : $this->negativePhrases;
        $comment = '';

        // Generate a comment by combining multiple phrases
        for ($i = 0; $i < 3; $i++) {
            $comment .= $phrases[array_rand($phrases)];

            if ($i < 2) {
                $comment .= ' ';
            }
        }

        return $comment;
    }
}
