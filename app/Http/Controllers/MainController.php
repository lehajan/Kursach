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
        $object = Review::find(3);
        $subscription = $object->trainer;
        return $subscription;
    }
    public function biba()
    {
        $object = Trainer::find(1);
        return $object;
    }
    public function boba()
    {
        $object = Subscription::find(1);
        $user = $object->user_id;
        return $user;
    }
}
