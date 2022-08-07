<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Team;
use Image;

class TeamController extends Controller
{
    public function Team()
    {
        $team = Team::get();
        Session::flash('page', 'team');
        return view('admin.team.view_team', compact('team'));
    }

    public function addEditTeam(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Team";
            $button ="Submit";
            $team = new Team;
            $teamdata = array();
            $message = "Team has been added sucessfully!";
        }else{
            $title = "Edit Team";
            $button ="Update";
            $team = Team::where('id',$id)->first();
            $teamdata= json_decode(json_encode($team),true);
            $team = Team::find($id);
            $message = "Team has been updated sucessfully!";
        }
        if($request->isMethod('post')) {
          $data = $request->all();
            //dd($data);
            if(empty($data['title'])){
                return redirect()->back()->with('error_message', 'Title is required !');
            }
            if(empty($data['team_type'])){
                return redirect()->back()->with('error_message', 'TeaM type is required !');
            }
            if(empty($data['post']))
            {
                $data['post'] = "";
            }
            
             if(empty($data['position_number']))
            {
                $data['position_number'] = "";
            }
            
            if(empty($data['description']))
            {
                $data['description'] = "";
            }
            if(empty($data['facebook']))
            {
                $data['facebook'] = "";
            }
            if(empty($data['instagram']))
            {
                $data['instagram'] = "";
            }
            if(empty($data['youtube']))
            {
                $data['youtube'] = "";
            }
            if(empty($data['tiktok']))
            {
                $data['tiktok'] = "";
            }
            if(empty($data['twitter']))
            {
                $data['twitter'] = "";
            }
            if(!empty($data['image'])){
                $image_tmp = $data['image'];
                // dd($image_tmp);
                if($image_tmp->isValid())
                {
                    // get extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // generate new image name
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'images/team_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $team->image =$imagePath;
    
                }
            }
            $team->title = $data['title'];
            $team->post = $data['post'];
            $team->position_number = $data['position_number'];
            $team->description = $data['description'];
            $team->team_type = $data['team_type'];
            $team->facebook = $data['facebook'];
            $team->instagram = $data['instagram'];
            $team->youtube = $data['youtube'];
            $team->tiktok = $data['tiktok'];
            $team->twitter = $data['twitter'];
            $team->save();
            Session::flash('success_message', $message);
            return redirect()->route('admin.team');
        }
        Session::flash('page', 'team');
        return view('admin.team.add_edit_team', compact('title','button','teamdata'));
    }

    public function deleteTeam($id)
    {
      $id =Team::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Team has been deleted successfully!');

    }
}
