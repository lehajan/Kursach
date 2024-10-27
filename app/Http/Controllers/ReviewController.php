<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create()
    {
        $trainers = Trainer::all();
        return $trainers;
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'trainer_id' => 'integer | required',
            'rating' => 'integer | required',
            'comment' => 'string | required',
        ]);
        $user_id = Auth::id();
        $data['user_id'] = $user_id;
        Review::create($data);
        return response()->json(['review was created']);
    }
}
