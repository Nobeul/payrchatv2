<?php

namespace App\Http\Controllers\Friends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class FriendsController extends Controller
{
    public function findFriends(Request $request) {
        $friends = User::inRandomOrder()->paginate(10);

        return response($friends);
    }

    public function viewFriendPage(Request $request)
    {
        $data['menu'] = 'people-you-may-know';
        $data['users'] = $users = User::where('id', '!=', Auth::user()->id)->select(['first_name', 'last_name', 'profile_image', 'cover_photo'])->inRandomOrder()->paginate('12');

        if ($request->ajax()) {
            return response($users);
        }

        return view('people_you_may_know.index', $data);
    }
}