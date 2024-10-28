<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function previewUsers()
    {
        $data = User::all();
        return $data;
    }

    public function previewReviews()
    {
        $data = Review::all();
        return $data;
    }

    public function banUser(User $user)
    {
        $you = Auth::user();
        if($you->is_admin == 1){
            $user->is_active = false;
            $user->save();
            return response()->json(['user was banned'], 200);
        }else{
            return response()->json(['you are not admin'], 403);
        }
    }

    public function deleteReview(Review $review)
    {
        $user = Auth::user();
        if($user->is_admin == 1){
            $review->delete();
            return response()->json(['review deleted' => true]);
        }else{
            return response()->json(['you are not allowed to delete this review'], 403);
        }
    }
}
