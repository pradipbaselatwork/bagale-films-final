<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Uploadvideo;
use App\Playlist;
use App\Pbanner;
use App\Teamslider;
use App\Team;
use App\Counter;
use Session;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $counters = new Counter;
        $counters->total_views = 1;
        $counters->save();

        $banner= Banner::get();
        $first_home_video= Uploadvideo::latest()->first();
        $video= Uploadvideo::where('id', "!=", $first_home_video->id)->latest()->get();
        // DB::table('counters')->increment('total_views');
        $viewscounter = DB::table('counters')->limit(1)->get();
        $playlist= Playlist::with('uploadvideo')->get();
        $playlistbanner= Pbanner::get();
        $teamslider= Teamslider::get();
        $core_team= Team::orderBy('id', 'Asc')->where('team_type',1)->get();
        $associate_team = Team::orderBy('id','Asc')->where('team_type',  2)->get();
        return view('front.home', compact('banner', 'first_home_video' ,'video','playlist','viewscounter','teamslider','associate_team','core_team','playlistbanner'));
    }

    public function updateViews(Request $request)
    {
       DB::table('uploadvideos')->where('id',$request['viewscount_id'])->increment('views',1);
    }
}
