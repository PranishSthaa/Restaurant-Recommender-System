<?php

declare(strict_types=1);

namespace App;

use Exception;
use Illuminate\Support\Collection;

class RestaurantSimilarity
{
    protected $restaurants;
    protected $cuisineWeight = 1;
    protected $restTypeWeight = 1;

    public function __construct(Collection $restaurants)
    {
        $this->restaurants = $restaurants;
    }

    public function setCuisineWeight(float $weight): void
    {
        $this->cuisineWeight = $weight;
    }

    public function setRestTypeWeight(float $weight): void
    {
        $this->restTypeWeight = $weight;
    }

    public function calculateSimilarityMatrix(): array
    {
        $matrix = [];

        foreach ($this->restaurants as $restaurant) {

            $similarityScores = [];

            foreach ($this->restaurants as $_restaurant) {
                if ($restaurant->id === $_restaurant->id) {
                    continue;
                }
                $similarityScores['restaurant_id_' . $_restaurant->id] = $this->calculateSimilarityScore($restaurant, $_restaurant);
            }
            $matrix['restaurant_id_' . $restaurant->id] = $similarityScores;
        }
        return $matrix;
    }

    public function getRestaurantsSortedBySimularity(int $restaurantId, array $matrix): array
    {
        $similarities   = $matrix['restaurant_id_' . $restaurantId] ?? null;
        $sortedRestaurants = [];

        if (is_null($similarities)) {
            throw new Exception('Can\'t find restaurant with that ID.');
        }
        arsort($similarities);

        foreach ($similarities as $restaurantIdKey => $similarity) {
            $id       = intval(str_replace('restaurant_id_', '', $restaurantIdKey));
            $restaurants = $this->restaurants->filter(function ($restaurant) use ($id) {
                return $restaurant->id === $id;
            });
            if ($restaurants->isEmpty()) {
                continue;
            }
            $restaurant = $restaurants->first();
            $restaurant->similarity = $similarity;
            $sortedRestaurants[] = $restaurant;
        }
        return $sortedRestaurants;
    }

    protected function calculateSimilarityScore($restaurantA, $restaurantB)
    {
        $restaurantACuisine = (string)$restaurantA->cuisine_id;
        $restaurantBCuisine = (string)$restaurantB->cuisine_id;
        $restaurantAType = (string)$restaurantA->rest_type_id;
        $restaurantBType = (string)$restaurantB->rest_type_id;

        return array_sum([
            (Similarity::jaccard($restaurantACuisine, $restaurantBCuisine) * $this->cuisineWeight),
            (Similarity::jaccard($restaurantAType, $restaurantBType) * $this->restTypeWeight),
        ]) / ($this->cuisineWeight + $this->restTypeWeight);
    }
}
