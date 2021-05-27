<?php

namespace App\Http\Controllers\Friends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class FriendsController extends Controller
{
    public function findFriends(Request $request) {
        $friends = User::inRandomOrder()->paginate(10);

        return response($friends);
    }

    public function viewFriendPage()
    {
        return view('people_you_may_know.index');
    }
}
