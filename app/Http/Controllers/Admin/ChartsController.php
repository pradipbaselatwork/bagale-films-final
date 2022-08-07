<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Uploadvideo;
use Carbon\Carbon;
use App\Counter;

class ChartsController extends Controller
{

    public function ajaxReport()
    {
        $current_day = date('D');
        $last_day1 = date('D',strtotime("-1 day"));
        $last_day2 = date('D',strtotime("-2 day"));
        $last_day3 = date('D',strtotime("-3 day"));
        $last_day4 = date('D',strtotime("-4 day"));
        $last_day5 = date('D',strtotime("-5 day"));
        $last_day6 = date('D',strtotime("-6 day"));
  
        $today = Counter::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->whereDay('created_at', Carbon::now()->day)->sum('total_views');
        $yestdaday = Counter::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->whereDay('created_at', Carbon::now()->subDay(1))->sum('total_views');
        $lastday1 = Counter::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->whereDay('created_at', Carbon::now()->subDay(2))->sum('total_views');
        $lastday2 = Counter::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->whereDay('created_at', Carbon::now()->subDay(3))->sum('total_views');
        $lastday3 = Counter::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->whereDay('created_at', Carbon::now()->subDay(4))->sum('total_views');
        $lastday4 = Counter::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->whereDay('created_at', Carbon::now()->subDay(5))->sum('total_views');
        $lastday5 = Counter::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->whereDay('created_at', Carbon::now()->subDay(6))->sum('total_views');
         return response()->json(['today'=>$today,'yestdaday'=>$yestdaday,'lastday1'=>$lastday1,'lastday2'=>$lastday2,'lastday3'=>$lastday3,'lastday4'=>$lastday4,'lastday5'=>$lastday5,'current_day'=>$current_day,'last_day1'=>$last_day1,'last_day2'=>$last_day2,'last_day3'=>$last_day3,'last_day4'=>$last_day4,'last_day5'=>$last_day5,'last_day6'=>$last_day6], 200);
        //  return view('admin.admin_dashboard',);
    }
}
