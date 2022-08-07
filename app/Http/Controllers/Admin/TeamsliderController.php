<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Teamslider;
use Image;

class TeamsliderController extends Controller
{
    public function Teamslider()
    {
        $teamslider = Teamslider::get();
        Session::flash('page', 'teamslider');
        return view('admin.teamslider.view_teamslider', compact('teamslider'));
    }

    public function addEditTeamslider(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Team Slider";
            $button ="Submit";
            $teamslider = new Teamslider;
            $teamsliderdata = array();
            $message = "Team Slider has been added sucessfully!";
        }else{
            $title = "Edit Team Slider";
            $button ="Update";
            $teamslider = Teamslider::where('id',$id)->first();
            $teamsliderdata= json_decode(json_encode($teamslider),true);
            $teamslider = Teamslider::find($id);
            $message = "Team Slider has been updated sucessfully!";
        }
        if($request->isMethod('post')) {
          $data = $request->all();
            //dd($data);
            if(empty($data['title'])){
                return redirect()->back()->with('error_message', 'Title is required !');
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
                    $imagePath = 'images/teamslider_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $teamslider->image =$imagePath;
    
                }
            }
            $teamslider->title = $data['title'];
            $teamslider->save();
            Session::flash('success_message', $message);
            return redirect()->route('admin.teamslider');
        }

        Session::flash('page', 'teamslider');
        return view('admin.teamslider.add_edit_teamslider', compact('title','button','teamsliderdata'));
    }

    public function deleteTeamslider($id)
    {
      $id =Teamslider::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Team Slider has been deleted successfully!');

    }
}
