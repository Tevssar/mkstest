<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Models\Counters;
use Carbon\Carbon;

class CountersController extends Controller
{
    public function incrementLike(Request $request)
    {
        $likes = Redis::get("$request->article:likes:");
        $likes = ($likes) ? $likes : 0;
        Redis::set("$request->article:likes:", ++$likes);


        $likes_timestamp =Redis::get("$request->article:likes_update:");
        $current_timestamp = Carbon::now()->timestamp;
        if ($likes_timestamp < $current_timestamp) { //better to use cron
            Counters::where('articles_id', $request->article)->update(array('likes' => $likes));
            Redis::set("$request->article:likes_update:", 5 + $current_timestamp);

        }

        return response()->json($likes);
    }

    public function incrementViev(Request $request)
    {
        $views = Redis::get("$request->article:views:");
        $views = ($views) ? $views : 0;
        Redis::set("$request->article:views:", ++$views);

        $likes_timestamp =Redis::get("$request->article:views_update:");
        $current_timestamp = Carbon::now()->timestamp;
        if ($likes_timestamp < $current_timestamp) { //better to use cron
            Counters::where('articles_id', $request->article)->update(array('views' => $views));
            Redis::set("$request->article:views_update:", 5 + $current_timestamp);

        }



        return response()->json($views);
    }
}
