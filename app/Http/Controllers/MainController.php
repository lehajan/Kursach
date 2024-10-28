<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Subscription;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();
        $trainers = Trainer::all();
        $trainers = $trainers->map(function ($trainer) {
            $reviews = $trainer->reviews->toArray();
            $reviews = array_slice($reviews, 0, 3);
            return [
                'trainer' => $trainer,
                'reviews' => $reviews
            ];
        })->toArray();
        return compact('subscriptions', 'trainers');

    }
}
