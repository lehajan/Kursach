<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

    public function update(Request $request, Review $review)
    {
        $user_id = Auth::id();

        $data = $request->validate([
            'rating' => 'required|integer',
            'comment' => 'required|string',
            'trainer_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        if ($review->user_id == $user_id) {
            $review->rating = $data['rating'];
            $review->comment = $data['comment'];
            $review->save();
            return response()->json(['message' => 'review was updated']);
        } else {
            return response()->json(['message' => 'you are not the owner of this review'], 403);
        }
    }

    public function userReviews()
    {
        $user = Auth::user();
        $data = $user->reviews;
        return $data;
    }

    public function delete(Review $review)
    {
        $user = Auth::user();
        if($review->user_id == $user->id){
            $review->delete();
            return response()->json(['review was deleted']);
        }else{
            return response()->json(['you are not allowed to delete this review']);
        }
    }
}
