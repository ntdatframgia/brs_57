<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;

class FollowController extends Controller
{
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $checkFollow = Follow::where([
                ['user_id', $request->follower],
                ['follow_id', $request->userId],
                ])->get()->first();
            if ($checkFollow) {
                    $checkFollow->delete();
                    return 'Follow';
            } else {
                $newFollow = new Follow;
                $newFollow->user_id = $request->follower;
                $newFollow->follow_id = $request->userId;
                $newFollow->save();
                return 'Following';
            }
        }
    }
}
